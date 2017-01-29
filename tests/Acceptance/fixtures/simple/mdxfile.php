<?php

function yell(\Mudephix\Context $context, $name = 'foo')
{
    $context->writeln(strtoupper($name)."!");
}

function greet(\Mudephix\Context $context, $name)
{
    $context->writeln("Hello ".$name."!");
}