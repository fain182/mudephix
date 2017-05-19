<?php
/**
 * Created by PhpStorm.
 * User: fain182
 * Date: 19/05/2017
 * Time: 20:37
 */

namespace Mudephix;


class Task
{

    /**
     * @var Command
     */
    private $command;

    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    public function getRequiredArgumentsNumber()
    {
        $fct = new \ReflectionFunction($this->command->getName());
        $parametersNumber = $fct->getNumberOfRequiredParameters();
        return $parametersNumber -1;
    }

    public function execute()
    {
        if (count($this->command->getArguments()) < $this->getRequiredArgumentsNumber()) {
            echo "Too few arguments.\n";
            exit(1);
        }

        $context = new Context($this->command->getOption('env'));

        call_user_func_array(
            $this->command->getName(),
            array_merge([$context], $this->command->getArguments())
        );
    }
}