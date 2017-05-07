<?php

namespace Mudephix;


class CommandList
{

    public static function fromMdxFile($filePath)
    {
        if (! file_exists($filePath)) {
            echo "No mdxfile found.\n";
            exit(1);
        }

        $definedFunctions = get_defined_functions();
        include $filePath;
        $newDefinedFunction = get_defined_functions();
        $commands = array_diff($newDefinedFunction['user'], $definedFunctions['user']);

        return new self($commands);
    }

    public function __construct(Array $commands)
    {
        $this->commands = $commands;
    }

    public function getAll()
    {
        return $this->commands;
    }

    public function execute($commandName, $arguments)
    {
        if (!function_exists($commandName)) {
            echo "Command '$commandName' not found.\n";
            exit(1);
        }

        $fct = new \ReflectionFunction($commandName);
        $parametersNumber = $fct->getNumberOfRequiredParameters();

        if (count($arguments) + 1 < $parametersNumber) {
            echo "Too few arguments.\n";
            exit(1);
        }

        call_user_func_array($commandName, array_merge([new Context()], $arguments));

    }
}