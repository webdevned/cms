<?php

use Codeception\Util\HttpCode;

class FirstCest {
    public function productsHrefsAreCorrect(AcceptanceTester $I) {
        $repo = new \App\Repository\ProductRepository();
        $ids = array_keys($repo->getList());

        $I->amOnPage('/index.php?page=list');
        $I->seeNumberOfElements('a', count($repo->getList()));

        foreach ($ids as $id) {
            $I->amOnPage('/index.php?page=list');
            $I->seeLink($id);
            $I->click($id);
            $I->amOnPage('/index.php?page=detail&id=' . $id);
        }
    }

    public function frontpageWorks(AcceptanceTester $I) {
        $I->amOnPage('/index.php?page=home');
        $I->see('Home');
    }

    public function listPageWorks(AcceptanceTester $I) {
        $I->amOnPage('/index.php?page=list');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeNumberOfElements('ul', 4);
    }

    public function detailPageWorks(AcceptanceTester $I) {
        $I->amOnPage('/index.php?page=detail');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeElement('ul');
    }

    public function pageNotFound(AcceptanceTester $I) {
        $I->amOnPage('/index.php?page=error');
        $I->seeResponseCodeIs(HttpCode::NOT_FOUND);
    }
}
