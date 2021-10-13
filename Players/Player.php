<?php

/**
 * Class Player
 */
class Player
{
    /** @var int  */
    protected int $health;

    /** @var int  */
    protected int $strength;

    /** @var int  */
    protected int $defence;

    /** @var int  */
    protected int $speed;

    /** @var int  */
    protected int $luck;

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
     * @param int $strength
     *
     * @return Player
     */
    public function setStrength(int $strength): Player
    {
        $this->strength = $strength;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * @param int $defence
     *
     * @return Player
     */
    public function setDefence(int $defence): Player
    {
        $this->defence = $defence;

        return $this;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @param int $speed
     *
     * @return Player
     */
    public function setSpeed(int $speed): Player
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * @return int
     */
    public function getLuck(): int
    {
        return $this->luck;
    }

    /**
     * @param int $luck
     *
     * @return Player
     */
    public function setLuck(int $luck): Player
    {
        $this->luck = $luck;
        return $this;
    }
}
