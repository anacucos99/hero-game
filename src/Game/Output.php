<?php

namespace src\Game;

use ReflectionClass;
use src\Players\Player;

/**
 * Class Output
 */
class Output
{
    /**
     * @param Player $winner
     */
    public function outputWinner(Player $winner): void
    {
        print 'The winner is: '.(new ReflectionClass($winner))->getShortName().PHP_EOL;
    }

    /**
     * @param int $turn
     * @param int $damage
     * @param Player $attacker
     * @param Player $defender
     * @param array $usedSkills
     */
    public function outputStats(int $turn, int $damage, Player $attacker, Player $defender, array $usedSkills): void
    {
        print 'Current turn: '.$turn.PHP_EOL;
        print 'Current attacker: '.(new ReflectionClass($attacker))->getShortName().PHP_EOL;

        if (!empty($usedSkills)) {
            print 'Used skills: ';
            foreach ($usedSkills as $usedSkill) {
                print $usedSkill.' ';
            }
            print PHP_EOL;
        }

        print 'Defender: '.(new ReflectionClass($defender))->getShortName().PHP_EOL;
        print 'Damage done: '.$damage.PHP_EOL;
        print 'Defender\'s Health: '.$defender->getHealth().PHP_EOL.PHP_EOL.PHP_EOL;
    }

    /**
     * @param Player $player
     * @param string $type
     */
    public function outputInitialsStats(Player $player, string $type): void
    {
        $objectName = (new ReflectionClass($player))->getShortName();
        print "$type which is $objectName has been initialized with the following stats:".PHP_EOL;
        print 'HEALTH: '.$player->getHealth().PHP_EOL;
        print 'STRENGTH: '.$player->getStrength().PHP_EOL;
        print 'DEFENCE: '.$player->getDefence().PHP_EOL;
        print 'SPEED: '.$player->getSpeed().PHP_EOL;
        print 'LUCK: '.$player->getLuck().PHP_EOL.PHP_EOL;
    }

    /**
     * @return void
     */
    public function outputTie(): void
    {
        print "It's a tie".PHP_EOL;
    }
}
