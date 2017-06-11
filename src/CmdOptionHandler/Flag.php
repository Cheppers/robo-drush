<?php

namespace Cheppers\Robo\Drush\CmdOptionHandler;

use Cheppers\Robo\Drush\CmdOptionHandlerInterface;

class Flag implements CmdOptionHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getCommand(array $option, $value, string &$cmdPattern, array &$cmdArgs): void
    {
        if ($value === true) {
            $cmdPattern .= " {$option['name']}";
        }
    }
}
