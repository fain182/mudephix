<?php

namespace Mudephix;


class Mudephix
{

    public function __construct($writer)
    {
        $this->context = new Context($writer);
    }

    public function run($filePath, $command)
    {
        include($filePath);
        $command($this->context);
    }
}