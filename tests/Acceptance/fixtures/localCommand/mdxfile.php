<?php

function hello(\Mudephix\Context $context)
{
    $context->local("echo 'hello world'");
}

function helloFailure(\Mudephix\Context $context)
{
    $context->local("WRONGCOMMAND THAT NOT EXISTS");
    $context->local("echo 'hello world'");
}