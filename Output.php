<?php

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
        print 'The winner is: '.get_class($winner).PHP_EOL;
    }

    /**
     * @param int $round
     * @param int $damage
     * @param Player $attacker
     * @param Player $defender
     * @param array $usedSkills
     */
    public function outputStats(int $round, int $damage, Player $attacker, Player $defender, array $usedSkills): void
    {
        print 'Current round: '.$round.PHP_EOL;
        print 'Current attacker: '.get_class($attacker).PHP_EOL;

        if (!empty($usedSkills)) {
            print 'Used skills: ';
            foreach ($usedSkills as $usedSkill) {
                print $usedSkill.' ';
            }
            print PHP_EOL;
        }

        print 'Defender: '.get_class($defender).PHP_EOL;
        print 'Damage done: '.$damage.PHP_EOL;
        print 'Defender\'s Health: '.$defender->getHealth().PHP_EOL.PHP_EOL.PHP_EOL;
    }
}
