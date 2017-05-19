<?php

namespace Mudephix;


class TaskList
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

    public function execute(Command $command)
    {
        if (! in_array($command->getName(), $this->commands)) {
            echo "Command '".$command->getName()."' not found.\n";
            exit(1);
        }

        $task = new Task($command);
        $task->execute();


    }
}