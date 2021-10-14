<?php

/**
 * Class Hero
 */
class Hero extends Player
{
    /** @var Hero|null  */
    protected static ?Hero $instance = null;

    /** @var int  */
    public int $rapidStrike;

    /** @var int  */
    public int $magicShield;

    /**
     * Hero class constructor.
     */
    private function construct()
    {
    }

    /**
     * @return Hero
     */
    public static function getInstance(): Hero
    {
        if (null !== self::$instance) {
            return self::$instance;
        }

        return new Hero();
    }

    /**
     * Initialize random stats.
     */
    public function initializeStats()
    {
        $this->health = rand(HeroConstants::MINIMUM_HEALTH, HeroConstants::MAXIMUM_HEALTH);
        $this->strength = rand(HeroConstants::MINIMUM_STRENGTH, HeroConstants::MAXIMUM_STRENGTH);
        $this->defence = rand(HeroConstants::MINIMUM_DEFENCE, HeroConstants::MAXIMUM_DEFENCE);
        $this->speed = rand(HeroConstants::MINIMUM_SPEED, HeroConstants::MAXIMUM_SPEED);
        $this->luck = rand(HeroConstants::MINIMUM_LUCK, HeroConstants::MAXIMUM_LUCK);
    }

    /**
     * @return Hero
     */
    public static function getHero(): Hero
    {
        $director = new HeroDirector();
        $heroBuilder = new HeroBuilder();

        return $director->build($heroBuilder);
    }
}
