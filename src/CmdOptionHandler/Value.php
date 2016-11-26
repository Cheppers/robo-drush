<?php

namespace Cheppers\Robo\Drush\CmdOptionHandler;

use Cheppers\Robo\Drush\CmdOptionHandlerInterface;
use Cheppers\Robo\Drush\Utils;

class Value implements CmdOptionHandlerInterface
{
    public static function getCommand(array $option, $value, string &$cmdPattern, array &$cmdArgs)
    {
        if ($value || $value === '') {
            $cliValue = (is_array($value)) ? implode(',', Utils::filterDisabled($value)) : $value;

            $cmdPattern .= " --{$option['name']}=%s";
            $cmdArgs[] = escapeshellarg($cliValue);
        }
    }
}