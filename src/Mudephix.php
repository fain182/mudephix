<?php

namespace Mudephix;

class Mudephix
{
    const MDXFILE_PATH = './mdxfile.php';

    public function run($argv) {

        $taskList = TaskList::fromMdxFile(self::MDXFILE_PATH);

        $command = new Command($argv);
        if ($command->isEmpty()) {
            $this->showAllCommands($taskList);
        }

        $taskList->execute($command);
    }

    protected function showAllCommands(TaskList $taskList)
    {
        echo "mdxfile - available commands:\n";
        foreach ($taskList->getAll() as $command) {
            echo "$command\n";
        }
        exit(1);
    }
}