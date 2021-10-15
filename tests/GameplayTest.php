<?php

use PHPUnit\Framework\TestCase;
use src\Game\Gameplay;
use src\Game\Output;
use src\Players\Beast;
use src\Players\Hero;
use Traits\TestTrait;

/**
 * Class GameplayTest
 */
class GameplayTest extends TestCase
{
    use TestTrait;

    /** @var Hero  */
    private Hero $hero;

    /** @var Beast  */
    private Beast $beast;

    /** @var Gameplay  */
    private Gameplay $gameplay;

    /** @var Output  */
    private Output $output;

    /**
     * setUp function
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->hero = Hero::getHero();
        $this->beast = Beast::getInstance();
        $this->output = $this->getMockBuilder(Output::class)->getMock();
        $this->gameplay = new Gameplay($this->output);

        $this->hero->initializeStats();
        $this->beast->initializeStats();

        $setAttackerAndDefender = self::getMethod('setAttackerAndDefender', Gameplay::class);
        $setAttackerAndDefender->invokeArgs($this->gameplay, [$this->hero, $this->beast]);
    }

    /**
     * @throws ReflectionException
     */
    public function testGetDamage()
    {
        $getDamage = self::getMethod('getDamage', Gameplay::class);
        $damage = $getDamage->invokeArgs($this->gameplay, []);

        $this->assertIsInt($damage);
        $this->assertGreaterThan(0, $damage);
    }

    /**
     * @throws ReflectionException
     */
    public function testSwitchPlayers()
    {
        $currentAttacker = $this->gameplay->getAttacker();
        $currentDefender = $this->gameplay->getDefender();

        $switchPlayers = self::getMethod('switchPlayers', Gameplay::class);
        $switchPlayers->invokeArgs($this->gameplay, []);

        $newAttacker = $this->gameplay->getAttacker();
        $newDefender = $this->gameplay->getDefender();

        $this->assertNotSame($currentAttacker, $newAttacker);
        $this->assertNotSame($currentDefender, $newDefender);
    }

    /**
     * @throws ReflectionException
     */
    public function testSetDamageToDefender()
    {
        $currentDefenderHealth = $this->gameplay->getDefender()->getHealth();

        $setDamageToDefender = self::getMethod('setDamageToDefender', Gameplay::class);
        $setDamageToDefender->invokeArgs($this->gameplay, []);

        $newDefenderHealth = $this->gameplay->getDefender()->getHealth();

        $this->assertGreaterThanOrEqual($newDefenderHealth, $currentDefenderHealth);
    }

    /**
     * tearDown function
     */
    public function tearDown(): void
    {
        $this->hero->destroy();
        $this->beast->destroy();
    }
}
