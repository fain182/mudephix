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

        include self::MDXFILE_PATH;
        $commandName = $argv[1];
        $commandName(new Context());
    }
}