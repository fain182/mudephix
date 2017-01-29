<?php

function yell(\Mudephix\Context $context, $name = 'foo')
{
    $context->writeln(strtoupper($name));
}