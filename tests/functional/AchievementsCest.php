<?php
use Faker\Factory;
use \FunctionalTester;

include_once 'UserTests.php';

class AchievementsCest extends UserTests
{

    public function _before(FunctionalTester $I)
    {
        $this->createUsers();
    }

    // tests
    public function addAnAchievementToTheList(FunctionalTester $I)
    {
        $I->amLoggedAs($this->committeeUser);
        $I->amOnRoute('admin.index');
        $I->click('Add achievement');

        $I->seeCurrentRouteIs('achievements.create');

        $I->submitForm('form', [
                'name' => 'Amazing pun', 'description' => 'Pun'
            ]
        );

        $I->see('Achievement added');
        $I->seeCurrentRouteIs('admin.index');
        $I->seeRecord('achievements', [
            'name' => 'Amazing pun', 'description' => 'Pun'
        ]);
    }

    public function viewAllAchievements(FunctionalTester $I)
    {
        $faker = Factory::create();
        $achievements = [];
        foreach(range(1, 30) as $i)
        {
            $achievements[] = \BoardSoc\Achievement::create([
                'name' => $i . $faker->sentence(),
                'description' => $i . $faker->paragraph(),
            ]);
        }

        $I->amOnRoute('achievements.index');

        foreach($achievements as $achievement)
        {
            $I->see($achievement->name);
            $I->see($achievement->description);
        }
    }

    public function giveAnAchievementToSomeone(FunctionalTester $I)
    {
        $faker = Factory::create();

        $achievementToGive = \BoardSoc\Achievement::create([
            'name' => 1 . $faker->sentence(),
            'description' => 1 . $faker->paragraph(),
        ]);
        $achievementToNotGive = \BoardSoc\Achievement::create([
            'name' => 2 . $faker->sentence(),
            'description' => 2 . $faker->paragraph(),
        ]);
        $I->amLoggedAs($this->committeeUser);

        $I->amOnRoute('achievements.give',
            [
                'achievement' => $achievementToGive,
                'user' => $this->user
            ]
        );
        $I->amOnRoute('users.show', ['user' => $this->user]);

        $I->see($achievementToGive->name);
        $I->dontSee($achievementToNotGive->name);

        $I->seeRecord('achievement_user', [
            'user_id' => $this->user->id,
            'achievement_id' => $achievementToGive->id
        ]);
        $I->dontSeeRecord('achievement_user', [
            'user_id' => $this->user->id,
            'achievement_id' => $achievementToNotGive->id
        ]);
    }

    public function sayIOwnAnAchievement(FunctionalTester $I)
    {
	$faker = Factory::create();

        $achievementToGive = \BoardSoc\Achievement::create([
            'name' => 1 . $faker->sentence(),
            'description' => 1 . $faker->paragraph(),
        ]);

	$I->amLoggedAs($this->user);
	$I->amOnRoute('achievements.index');

	$I->click("Claim '{$achievementToGive->name}'");
	$I->see("Request to claim");
    }

}
