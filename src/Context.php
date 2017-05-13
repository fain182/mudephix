<?php

namespace Mudephix;


class Context
{

    private $environmentName;

    public function __construct($environmentName)
    {
        $this->environmentName = $environmentName;
    }

    public function get($key) {
        if (empty($this->environmentName)) {
            echo 'Error: no environment specified';
            exit(1);
        }

        $environment = new Environment($this->environmentName, './mdxrc.php');
        return $environment->get($key);
    }

    public function writeln($string) {
        echo $string."\n";
    }

}