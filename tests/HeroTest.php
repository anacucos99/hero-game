<?php

use PHPUnit\Framework\TestCase;
use Traits\TestTrait;

/**
 * Class HeroTest
 */
class HeroTest extends TestCase
{
    use TestTrait;

    /**
     * Check if hero instance is created
     */
    public function testGetHeroInstance()
    {
        $hero = Hero::getInstance();
        $this->assertInstanceOf(Hero::class, $hero);
    }

    /**
     * Check if hero has a singleton pattern
     */
    public function testSingleton()
    {
        $firstInstance = Hero::getInstance();
        $secondInstance = Hero::getInstance();

        $this->assertSame($firstInstance, $secondInstance);
    }

    /**
     * Check if stats are initialized
     */
    public function testInitializeStats()
    {
        $hero = Hero::getInstance();

        $this->assertEquals(0, $hero->getLuck());
        $this->assertEquals(0, $hero->getHealth());
        $this->assertEquals(0, $hero->getDefence());
        $this->assertEquals(0, $hero->getStrength());
        $this->assertEquals(0, $hero->getSpeed());

        $hero->initializeStats();

        $this->assertNotEquals(0, $hero->getLuck());
        $this->assertNotEquals(0, $hero->getHealth());
        $this->assertNotEquals(0, $hero->getDefence());
        $this->assertNotEquals(0, $hero->getStrength());
        $this->assertNotEquals(0, $hero->getSpeed());
    }

    /**
     * Check if states are in supposed range
     */
    public function testStatsAreInRange()
    {
        $hero = Hero::getInstance();
        $hero->initializeStats();

        $this->assertIsInRange($hero->getLuck(), HeroConstants::MINIMUM_LUCK, HeroConstants::MAXIMUM_LUCK);
        $this->assertIsInRange($hero->getHealth(), HeroConstants::MINIMUM_HEALTH, HeroConstants::MAXIMUM_HEALTH);
        $this->assertIsInRange($hero->getDefence(), HeroConstants::MINIMUM_DEFENCE, HeroConstants::MAXIMUM_DEFENCE);
        $this->assertIsInRange($hero->getStrength(), HeroConstants::MINIMUM_STRENGTH, HeroConstants::MAXIMUM_STRENGTH);
        $this->assertIsInRange($hero->getSpeed(), HeroConstants::MINIMUM_SPEED, HeroConstants::MAXIMUM_SPEED);
    }

    /**
     * Check if hero has skills
     */
    public function testHeroHasSkills()
    {
        $hero = Hero::getHero();

        $this->assertObjectHasAttribute(HeroConstants::RAPID_STRIKE_ATTRIBUTE, $hero);
        $this->assertObjectHasAttribute(HeroConstants::MAGIC_SHIELD_ATTRIBUTE, $hero);
    }
}
