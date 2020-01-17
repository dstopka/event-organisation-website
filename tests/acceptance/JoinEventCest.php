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
        $I->click('//a[contains(@href, "/join")]');

        $I->dontSeeElement('//a[text()="Add to cart"] | //a[text()="Join"]');
        $I->seeElement('//a[text()="Your cart"]');

        $I->click('//a[text()="Your cart"]');

        $I->seeCurrentUrlEquals('/cart');

        $I->click('Pay');
        $I->seeCurrentUrlEquals('/cart');

        $I->fillField('card_no', '11111111');
        $I->click('Pay');
        $I->seeCurrentUrlEquals('/tickets');

        $I->seeElement( '//div//strong[contains(., "Project X")]');

        $I->click( '//div//strong[contains(., "Project X")]/../../../../div//a[text()="Download ticket"]');

        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $handles=$webdriver->getWindowHandles();
            $last_window = next($handles);
            $webdriver->switchTo()->window($last_window);
        });

        $I->seeElement( '//embed[@id="plugin"]');

        $I->executeInSelenium(function (\Facebook\WebDriver\Remote\RemoteWebDriver $webdriver) {
            $webdriver->close();
        });
    }
}
