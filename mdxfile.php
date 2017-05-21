<?php

function test(\Mudephix\Context $context) {
    $context->local('./vendor/bin/phpunit tests ');
}

function testOnCI(\Mudephix\Context $context) {
    $context->local('./vendor/bin/phpunit --coverage-clover build/logs/clover.xml --whitelist=src/ tests ');
    $context->local('./vendor/bin/test-reporter'); // report coverage to codeclimate
}