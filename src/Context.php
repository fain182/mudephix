<?php

namespace Mudephix;


class Context
{

    private $environment;

    public function __construct($environmentName)
    {
        $this->environment = new Environment($environmentName, './mdxrc.php');
    }

    public function get($key) {
        return $this->environment->get($key);
    }

    public function writeln($string) {
        echo $string."\n";
    }

    public function local($shellCommand)
    {
        exec($shellCommand ." 2>&1", $output, $exitCode);
        echo implode("\n", $output)."\n";
        if ($exitCode > 0) {
            echo "ERROR in console command.\n";
            exit($exitCode);
        }
    }

    public function remote($shellCommand)
    {
        $sshCommand = "ssh ";
        if ($this->environment->has('key')) {
            $sshCommand .= " -i ".$this->get('key')." ";
        }
        $sshCommand .= $this->get('user') . "@" . $this->get('host') . " ";
        $sshCommand .= escapeshellarg($shellCommand);

        $this->local($sshCommand);
    }

}