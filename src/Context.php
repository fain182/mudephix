<?php

namespace Mudephix;

class Context
{

    public function __construct($writer)
    {
        $this->writer = $writer;
    }

    public function writeln($string) {
        $this->writer->write($string."\n");
    }
}