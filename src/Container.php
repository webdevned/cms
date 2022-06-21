<?php

namespace App;

use App\Exceptions\Container\ContainerException;
use Psr\Container\ContainerInterface;

final class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id)
    {
        if ($this->has($id)) {
            $entry = $this->entries[$id];

            return $entry($this);
        }

        return $this->resolve($id);
    }

    public function resolve(string $id)
    {
        // 1. Inspect the class that we are trying to get from container
        $reflectionClass = new \ReflectionClass($id);
        if (!$reflectionClass->isInstantiable()) {
            throw new ContainerException("Class '$id' is not instantiable.");
        }

        // 2. Inspect the constructor of a class
        $constructor = $reflectionClass->getConstructor();

        if (!$constructor) {
            return new $id;
        }

        // 3. Inspect constructor parameters (dependencies)
        $parameters = $constructor->getParameters();

        if (!$parameters) {
            return new $id;
        }

        // 4. If the constructor parameter is a class then try to resolve that class using the container
        $dependencies = array_map(
            function(\ReflectionParameter $parameter) use ($id) {
                $name = $parameter->getName();
                $type = $parameter->getType();

                if (!$type) {
                    throw new ContainerException(
                        "Failed to resolve class '$id' because param '$name' is missing a type hint."
                    );
                }

                // ReflectionUnionType - only from PHP8
//                if ($type instanceof \ReflectionUnionType) {
//                    throw new ContainerException(
//                        "Failed to resolve class '$id' because ReflectionUnionType param '$name'."
//                    );
//                }

                if ($type instanceof \ReflectionNamedType && !$type->isBuiltin()) {
                    return $this->get($type->getName());
                }

                throw new ContainerException(
                    "Failed to resolve class '$id' because of invalid param '$name'."
                );

                },
            $parameters
        );

        return $reflectionClass->newInstanceArgs($dependencies);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $concrete)
    {
        $this->entries[$id] = $concrete;
    }
}