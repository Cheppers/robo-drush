<?php

namespace Cheppers\Robo\Drush\StdOutputParser;

use Cheppers\Robo\Drush\StdOutputParserInterface;
use Cheppers\Robo\Drush\Task\DrushTask;

class Version implements StdoutputParserInterface
{

    public static function parse(DrushTask $task, string $stdOutput)
    {
        $format = $task->getCmdOption('format');
        $version = null;
        switch ($format) {
            case null:
            case '':
            case 'key-value':
                $parts = explode(':', $stdOutput, 2);
                if (isset($parts[1])) {
                    return trim($parts[1]);
                }
                break;

            case 'var_export':
                $parts = explode('=', $stdOutput, 2);
                if (isset($parts[1])) {
                    return trim($parts[1], "'; \t\n");
                }
                break;


            case 'json':
                return json_decode($stdOutput);

            case 'string':
            case 'yaml':
                return trim($stdOutput);
        }

        return null;
    }
}