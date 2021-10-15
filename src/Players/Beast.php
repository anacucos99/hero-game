<?php

namespace src\Players;

use src\Constants\BeastConstants;

/**
 * Class Beast
 */
class Beast extends Player
{
    /** @var Beast|null  */
    protected static ?Beast $instance = null;

    /**
     * Hero class constructor.
     */
    private function construct()
    {
    }

    /**
     * @return Beast
     */
    public static function getInstance(): Beast
    {
        if (null !== self::$instance) {
            return self::$instance;
        }

        return new Beast();
    }

    /**
     * Initialize random stats.
     */
    public function initializeStats()
    {
        $this->health = rand(BeastConstants::MINIMUM_HEALTH, BeastConstants::MAXIMUM_HEALTH);
        $this->strength = rand(BeastConstants::MINIMUM_STRENGTH, BeastConstants::MAXIMUM_STRENGTH);
        $this->defence = rand(BeastConstants::MINIMUM_DEFENCE, BeastConstants::MAXIMUM_DEFENCE);
        $this->speed = rand(BeastConstants::MINIMUM_SPEED, BeastConstants::MAXIMUM_SPEED);
        $this->luck = rand(BeastConstants::MINIMUM_LUCK, BeastConstants::MAXIMUM_LUCK);
    }

    /**
     * Destroy method
     */
    public function destroy()
    {
        self::$instance = null;
    }
}
