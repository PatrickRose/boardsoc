<?php

require_once __DIR__ . '/UserTests.php';

use BoardSoc\Event;
use Faker\Factory;

class EventsCest extends UserTests
{
    public function _before(FunctionalTester $I)
    {
        $this->createUsers();
    }

    public function createEventAsAnAdmin(FunctionalTester $I)
    {
        $I->am('an admin');
        $I->wantTo('create events');
        $I->lookForwardTo('people knowing about boardsoc events');

        $I->amLoggedAs($this->committeeUser);
        $I->amOnRoute('admin.index');
        $I->click('Create new event');
        $I->submitForm('form', [
            'name' => 'Test Event',
            'date' => \Carbon\Carbon::tomorrow()->toDateString(),
            'details' => 'blah blah blah',
            'facebook' => '12345',
        ]);

        $I->see("'Test Event' created", '.alert.alert-success');
        $I->seeRecord('events', [
            'name' => 'Test Event',
            'date' => \Carbon\Carbon::tomorrow()->format('Y-m-d'),
            'details' => 'blah blah blah',
            'facebook' => '12345',
        ]);
    }

    public function failCreateEventAsANonAdmin(FunctionalTester $I)
    {
        $I->amLoggedAs($this->user);
        $I->amOnRoute('events.create');

        $I->seeCurrentUrlEquals('');
    }

    public function beAskedToLogInToCreateEvents(FunctionalTester $I)
    {
        $I->amOnRoute('events.create');

        $I->seeIAmAskedToLogIn();
    }

    public function getValidationErrors(FunctionalTester $I)
    {
        $I->amLoggedAs($this->committeeUser);
        $I->amOnRoute('events.create');
        $I->submitForm('form', []);

        $I->see('required');
    }

    public function viewEvents(FunctionalTester $I)
    {
        list($eventOne, $eventTwo, $eventThree) = $this->createThreeEvents();

        $I->amOnRoute('events.index');
        $I->see($eventOne->name);
        $I->see($eventTwo->name);
        $I->see($eventThree->name);
        $I->see($eventOne->getFirstParagraph());

        $I->click($eventOne->name);
        $I->see($eventOne->details);
        $I->seeCurrentRouteIs('events.show', ['event' => $eventOne->id]);
    }

    public function seeEventsOnHomePage(FunctionalTester $I)
    {
        list($eventOne, $eventTwo, $eventThree) = $this->createThreeEvents();

        $I->amOnRoute('home');
        $I->see($eventOne->name);

        $I->click($eventOne->name);
        $I->seeCurrentRouteIs('events.show', ['event' => $eventOne->id]);
    }

    /**
     * @return array
     */
    protected function createThreeEvents()
    {
        $faker = Factory::create();

        $paragraph = $faker->paragraph();
        $eventOne = Event::create(
            [
                'name' => $faker->sentence(),
                'date' => \Carbon\Carbon::tomorrow(),
                'details' => implode(
                    "\n\n",
                    [$paragraph] + [$faker->paragraphs(2)]
                ),
                'facebook' => $faker->randomNumber(),
            ]
        );
        $eventTwo = Event::create(
            [
                'name' => $faker->sentence(),
                'date' => \Carbon\Carbon::tomorrow()->addWeek(),
                'details' => implode("\n\n", $faker->paragraphs(3)),
                'facebook' => $faker->randomNumber(),
            ]
        );
        $eventThree = Event::create(
            [
                'name' => $faker->sentence(),
                'date' => \Carbon\Carbon::tomorrow()->addMonth(),
                'details' => implode("\n\n", $faker->paragraphs(3)),
                'facebook' => $faker->randomNumber(),
            ]
        );
        return array($eventOne, $eventTwo, $eventThree);
    }

    public function checkThatDoubleNewLinesAreParagraphs(FunctionalTester $I)
    {
        $faker = Factory::create();

        $paragraphs = $faker->paragraphs(3);

        $event = Event::create(
            [
                'name' => $faker->sentence(),
                'date' => \Carbon\Carbon::tomorrow()->addMonth(),
                'details' => implode("\n\n", $paragraphs),
                'facebook' => $faker->randomNumber(),
            ]
        );

        $I->amOnRoute('events.show', ['event' => $event->id]);
        foreach($paragraphs as $index => $paragraph)
        {
            $I->see($paragraph, 'p');
            $I->dontSee(implode("\n\n", $paragraphs), 'p');
        }
    }

    public function seeAnEditLinkOnEventPages(FunctionalTester $I)
    {
        list($eventOne, $eventTwo, $eventThree) = $this->createThreeEvents();

        $I->amLoggedAs($this->committeeUser);
        $I->amOnRoute('events.show', ['event' => $eventOne->id]);
        $I->click('Edit Event');

        $I->seeCurrentRouteIs('events.edit', ['event' => $eventOne->id]);
        $I->fillField('name', 'Edited name');
        $I->click('Edit Event');

        $I->seeCurrentRouteIs('events.show', ['event' => $eventOne->id]);
        $I->see('Edited name');
    }
}
