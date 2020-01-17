<?php

class JoinEventCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/calendar');
        $I->dontSeeElement('#calendar');
        $I->seeCurrentUrlEquals('/login');

        $I->fillField('email', 'joao.paulo@gmail.com');
        $I->fillField('password', 'jp2gmd2137');

        $I->click('#login_button');

        $I->seeCurrentUrlEquals('/calendar');

        $I->seeElement('#calendar');

        $I->seeElement('//span[text()="Pielgrzymka"]');
        $I->dontSeeElement('//span[text()="Project X"]');



    }
}
