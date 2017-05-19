<?php

namespace Mudephix;


class Command
{

    public function __construct($argv)
    {
        $this->argv = $argv;
    }

    public function isEmpty()
    {
        return count($this->argv) < 2;
    }

    public function getName()
    {
        return $this->argv[1];
    }

    public function getArguments() {
        $arguments = array_slice($this->argv, 2);
        return array_diff($arguments, $this->getOptions());
    }

    public function getOptions() {
        $arguments = array_slice($this->argv, 2);
        $options = [];
        for ($i = 0; $i < count($arguments); $i++) {
            $prefix = substr($arguments[$i], 0, 2);
            if ($prefix == '--') {
                $optionString = substr($arguments[$i], 2);
                list($name, $value) = explode('=', $optionString);
                $options[$name] = $value;
            }
        }
        return $options;
    }

}