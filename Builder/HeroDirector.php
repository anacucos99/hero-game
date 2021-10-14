<?php

/**
 * Class HeroDirector
 */
class HeroDirector
{
    /**
     * @param HeroBuilderInterface $builder
     *
     * @return Hero
     */
    public function build(HeroBuilderInterface $builder): Hero
    {
        $builder->addMagicShield();
        $builder->addRapidStrike();

        return $builder->getHero();
    }
}
