<?php

class DeleteEventCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo("log in");
        $I->amOnPage('/home');
        $I->seeCurrentUrlEquals('/login');
        $I->fillField('email', 'testo@gmail.com');
        $I->fillField('password', 'caleczki123');
        $I->click('#login_button');
        $I->seeCurrentUrlEquals('/home');

        $I->wantTo("delete date from 'pielgrzymka'");
        $I->click('#navbarDropdown');
        $I->click('#my_events');
        $I->seeCurrentUrlEquals('/user/3/events');
        $I->seeElement('//div//strong[contains(., "Pielgrzymka")]');
        $I->click('//div//strong[contains(., "Pielgrzymka")]/..');
        $I->seeCurrentUrlEquals('/events/1');
        $I->click('//a[text()="edit"]');
        $I->seeCurrentUrlEquals('/events/1/edit');
        $I->see("2020-01-25 12:00:00");
        $I->click('Delete');
        $I->dontSee("2020-01-25 12:00:00");
        $I->dontSeeInDatabase("event_dates",[ "id" => 1]);

        $I->wantTo("delete from 'pielgrzymka'");
        $I->moveBack();
        $I->moveBack();
        $I->seeCurrentUrlEquals('/events/1');
        $I->click('Delete');
        $I->seeCurrentUrlEquals('/events');
        $I->dontSeeElement('//div//strong[contains(., "Pielgrzymka")]');
        $I->dontSeeInDatabase("events",[ "id" => 1]);

        $I->wantTo("check if all dates were removed after deleted event");
        $I->seeElement('//div//strong[contains(., "Szkolenie z Cyberbezpieczeństwa")]');
        $I->click('//div//strong[contains(., "Szkolenie z Cyberbezpieczeństwa")]/..');
        $I->seeCurrentUrlEquals('/events/2');
        $I->click('Delete');
        $I->dontSeeInDatabase("events",[ "id" => 2]);
        $I->dontSeeInDatabase("event_dates",[ "event_id" => 2]);
    }
}
