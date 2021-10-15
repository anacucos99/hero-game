<?php

namespace src\Game;

use src\Constants\GameplayConstants;
use src\Constants\HeroConstants;
use src\Players\Beast;
use src\Players\Hero;
use src\Players\Player;

/**
 * Class Gameplay
 */
class Gameplay
{
    /** @var Player  */
    private Player $attacker;

    /** @var Player  */
    private Player $defender;

    /** @var array  */
    private array $usedSkills = [];

    /**
     * @param Output $output
     */
    public function __construct(private Output $output)
    {}

    /**
     * @return Player
     */
    public function getDefender(): Player
    {
        return $this->defender;
    }

    /**
     * @return Player
     */
    public function getAttacker(): Player
    {
        return $this->attacker;
    }

    /**
     * Play function
     */
    public function play(): void
    {
        $winnerFound = false;
        $turns = 1;

        $hero = Hero::getHero();
        $beast = Beast::getInstance();
        $hero->initializeStats();
        $beast->initializeStats();

        $this->setAttackerAndDefender($hero, $beast);
        $this->output->outputInitialsStats($this->attacker, GameplayConstants::ATTACKER);
        $this->output->outputInitialsStats($this->defender, GameplayConstants::DEFENDER);

        while ($turns <= GameplayConstants::MAXIMUM_NO_OF_ROUNDS) {
            $damage = $this->setDamageToDefender();
            $this->output->outputStats($turns, $damage, $this->attacker, $this->defender, $this->usedSkills);

            if ($this->defender->getHealth() <= 0) {
                $winnerFound = true;

                break;
            }

            $this->switchPlayers();

            $turns++;
        }

        if ($winnerFound) {
            $this->output->outputWinner($this->attacker);

            return;
        }

        $this->output->outputTie();
    }

    /**
     * @param Hero $hero
     * @param Beast $beast
     */
    private function setAttackerAndDefender(Hero $hero, Beast $beast): void
    {
        if (($hero->getSpeed() > $beast->getSpeed()) || ($hero->getSpeed() === $beast->getSpeed() && $hero->getLuck() > $beast->getLuck())) {
            $this->attacker = $hero;
            $this->defender = $beast;

            return;
        }

        $this->attacker = $beast;
        $this->defender = $hero;
    }

    /**
     * @return int
     */
    private function getDamage(): int
    {
        return $this->attacker->getStrength() - $this->defender->getDefence();
    }

    /**
     * @return void
     */
    private function switchPlayers(): void
    {
        list($this->attacker, $this->defender) = [$this->defender, $this->attacker];
    }

    /**
     * @return int
     */
    private function setDamageToDefender()
    {
        $damage = 0;
        $this->usedSkills = [];

        if (rand(GameplayConstants::MINIMUM_LUCK_RANGE, GameplayConstants::MAXIMUM_LUCK_RANGE) <= $this->defender->getLuck()) {
            return $damage;
        }

        if ($this->attacker instanceof Hero && rand(GameplayConstants::MINIMUM_SKILL_RANGE, GameplayConstants::MAXIMUM_SKILL_RANGE) <= $this->attacker->rapidStrike) {
            $this->usedSkills[] = HeroConstants::RAPID_STRIKE_SKILL;
            $damage += $this->getDamage();
        }

        if ($this->defender instanceof Hero && rand(GameplayConstants::MINIMUM_SKILL_RANGE, GameplayConstants::MAXIMUM_SKILL_RANGE) <= $this->defender->magicShield) {
            $this->usedSkills[] = HeroConstants::MAGIC_SHIELD_SKILL;
            $damage += ($this->getDamage() / 2);
        }

        $defenderCurrentHealth = $this->defender->getHealth();
        $damage += $this->getDamage();
        $this->defender->setHealth($defenderCurrentHealth - $damage);

        return $damage;
    }
}
