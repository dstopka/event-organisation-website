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

        $I->amOnPage('/events');

        $I->seeElement('//div//strong[contains(., "Project X")]');

        $I->click('//div//strong[contains(., "Project X")]/..');

        $I->seeInCurrentUrl('/events/');
        $I->dontSeeElement('//a[text()="edit"]');
        $I->dontSeeElement('//input[@value="Delete"]');
        $I->seeElement('//a[text()="Return to events list"]');
        $I->click('//a[text()="Return to events list"]');

        $I->click( '//div//strong[contains(., "Project X")]/../../../../div//a[text()="Details"]');

        $I->seeInCurrentUrl('/event_date/');

        $I->seeElement('//a[text()="Add to cart"] | //a[text()="Join"]');
        $I->click('//a[ends-with(@href, "/join")]');

    }
}
