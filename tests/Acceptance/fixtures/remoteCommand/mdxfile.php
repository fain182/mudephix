<?php

function remoteUser(\Mudephix\Context $context)
{
    echo $context->remote('whoami');
}

function remoteFail(\Mudephix\Context $context)
{
    echo $context->remote('NOT_EXISTENT_COMMAND');
}
