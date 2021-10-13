<?php

/**
 * Class HeroBuilder
 */
class HeroBuilder implements HeroBuilderInterface
{
    /** @var Hero  */
    private Hero $hero;

    /**
     * HeroBuilder class constructor.
     */
    public function __construct()
    {
        $this->hero = Hero::getInstance();
    }

    /**
     * @return void
     */
    public function addRapidStrike(): void
    {
        $this->hero->rapidStrike = HeroConstants::RAPID_STRIKE;
    }

    /**
     * @return void
     */
    public function addMagicShield(): void
    {
        $this->hero->magicShield = HeroConstants::MAGIC_SHIELD;
    }

    /**
     * @return Hero
     */
    public function getHero(): Hero
    {
        return $this->hero;
    }
}
