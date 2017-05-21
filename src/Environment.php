<?php

namespace Mudephix;


class Environment
{

    private $environmentName;
    private $environments;

    public function __construct($environmentName, $filePath)
    {
        $this->environmentName = $environmentName;
        if ($this->environmentName != '') {

            if (! file_exists($filePath)) {
                echo "Error: No mdxrc file found.\n";
                exit(1);
            }

            $this->environments = include $filePath;
        }
    }

    public function has($key)
    {
        if (!isset($this->environments['envs'][$this->environmentName])) {
            echo "Error: no environment found";
            exit(1);
        }
        $environmentData = $this->environments['envs'][$this->environmentName];

        $parts = explode('.', $key);
        foreach($parts as $part) {
            if (!isset($environmentData[$part])) {
                return false;
            }
            $environmentData = $environmentData[$part];
        }

        return true;
    }

    public function get($key)
    {
        if (!isset($this->environments['envs'][$this->environmentName])) {
            echo "Error: no environment found";
            exit(1);
        }
        $environmentData = $this->environments['envs'][$this->environmentName];

        $parts = explode('.', $key);
        foreach($parts as $part) {
            if (!isset($environmentData[$part])) {
                echo "Error: key $key is missing in environment ".$this->environmentName;
                exit(1);
            }
            $environmentData = $environmentData[$part];
        }
        return $environmentData;
    }

}