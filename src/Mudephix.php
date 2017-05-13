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

        $options = [];
        for ($i = 0; $i < count($arguments); $i++) {
            if (substr($arguments[$i], 0, 2) == '--') {
                $optionString = substr($arguments[$i], 2);
                list($name, $value) = explode('=', $optionString);
                $options[$name] = $value;
                unset($arguments[$i]);
            }
        }
        $commandList->execute($commandName, $arguments, $options);
    }
}