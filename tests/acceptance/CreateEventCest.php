<?php

class CreateEventCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {

        $I->wantTo('create new event');

        $I->amOnPage('/home');

        $I->seeCurrentUrlEquals('/login');

        $I->fillField('email', 'john.doe@gmail.com');
        $I->fillField('password', 'secret');

        $I->click('#login_button');

        $I->seeCurrentUrlEquals('/home');

        $I->click('Create Event');
        $I->seeCurrentUrlEquals('/events/create');

        $I->fillField('title', 'Deadline projektu z PHP');
        $I->fillField('description', 'Zajęcia z zaawansowanego programowania PHP, na których zostana przedstawione projekty');
        $I->fillField('start', '2020-01-22T8:00:00');
        $I->fillField('end', '2020-01-22T09:30:00');
        $I->fillField('latitude', '50.064913');
        $I->fillField('longtitude', '19.923643');
        $I->fillField('places', '23');
        $I->fillField('price', '600');
        $I->attachFile('images[]', 'images.jpeg');
        $I->click('Create');

        $I->seeCurrentUrlEquals('/events/4');

        $I->click('Return to events list');

        $I->seeCurrentUrlEquals('/events');
        $I->see('Deadline projektu z PHP');

        $I->click('Deadline projektu z PHP');
        $I->see('Deadline projektu z PHP');
        $I->click('Deadline projektu z PHP');
        $I->seeCurrentUrlEquals('/events/4');
        $I->see('Zajęcia z zaawansowanego programowania PHP, na których zostana przedstawione projekty');
        $I->click('edit');
        $I->fillField('title', 'Ostateczny deadline projektu z PHP');
        $I->fillField('description', 'Zajęcia z zaawansowanego programowania PHP, na których przedstawiono projekty');
        $I->fillField('places', '23');
        $I->fillField('price', '0');
        $I->click('Edit');
        $I->seeCurrentUrlEquals('/events/4');
        $I->see('Ostateczny deadline projektu z PHP');
        $I->see('Zajęcia z zaawansowanego programowania PHP, na których przedstawiono projekty');
    }
}
