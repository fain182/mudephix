<?php

function test(\Mudephix\Context $context) {
    $context->local('./vendor/bin/phpunit tests ');
}