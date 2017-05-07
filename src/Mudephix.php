<?php

namespace Mudephix;

class Mudephix
{
    const MDXFILE_PATH = './mdxfile.php';

    public function run($argv) {

        $commandList = CommandList::fromMdxFile(self::MDXFILE_PATH);

        if (count($argv) < 2) {
            echo "mdxfile - available commands:\n";
            foreach ($commandList->getAll() as $command) {
                echo "$command\n";
            }
            exit(1);
        }

        $commandName = $argv[1];
        $arguments = array_slice($argv, 2);

        $commandList->execute($commandName, $arguments);
    }
}