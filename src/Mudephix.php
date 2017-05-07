<?php

namespace Mudephix;

class Mudephix
{
    const MDXFILE_PATH = './mdxfile.php';

    public function run($argv) {
        if (! file_exists(self::MDXFILE_PATH)) {
            echo "No mdxfile found.\n";
            exit(1);
        }

        $definedFunctions = get_defined_functions();
        include self::MDXFILE_PATH;
        $newDefinedFunction = get_defined_functions();

        if (count($argv) < 2) {
            $commands = array_diff($newDefinedFunction['user'], $definedFunctions['user']);
            echo "mdxfile - available commands:\n";
            foreach ($commands as $command) {
                echo "$command\n";
            }
            exit(1);
        }

        $commandName = $argv[1];

        if (!function_exists($commandName)) {
            echo "Command '$commandName' not found.\n";
            exit(1);
        }

        $fct = new \ReflectionFunction($commandName);
        $parametersNumber = $fct->getNumberOfRequiredParameters();

        if (count($argv) < $parametersNumber +1) {
            echo "Too few arguments.\n";
            exit(1);
        }

        $arguments = array_merge([new Context()], array_slice($argv, 2));

        call_user_func_array($commandName, $arguments);
    }
}