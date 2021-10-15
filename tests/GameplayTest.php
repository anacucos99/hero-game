<?php

/**
 * Class GameplayTest
 */
class GameplayTest extends BaseTest
{
    public function testGetDamage()
    {
        $output = $this->createMock(Output::class);
        $gameplay = new Gameplay($output);

        $hero = $this->createMock(Hero::class);
        $hero->initializeStats();

        $beast = $this->createMock(Beast::class);
        $beast->initializeStats();

        $setAttackerAndDefender = self::getMethod('setAttackerAndDefender', Gameplay::class);
        $setAttackerAndDefender->invokeArgs($gameplay, [$hero, $beast]);

        $getDamage = self::getMethod('getDamage', Gameplay::class);

        $damage = $getDamage->invokeArgs($gameplay, []);
    }
}
