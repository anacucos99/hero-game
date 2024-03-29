<?php

namespace src\Players;

/**
 * Class Player
 */
class Player
{
    /** @var int  */
    protected int $health = 0;

    /** @var int  */
    protected int $strength = 0;

    /** @var int  */
    protected int $defence = 0;

    /** @var int  */
    protected int $speed = 0;

    /** @var int  */
    protected int $luck = 0;

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     *
     * @return Player
     */
    public function setHealth(int $health): Player
    {
        $this->health = $health;

        return $this;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @return int
     */
    public function getLuck(): int
    {
        return $this->luck;
    }
}
