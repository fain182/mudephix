<?php

function showUser(\Mudephix\Context $context)
{
    echo $context->get('ssh_params.user');
}

function missingKey(\Mudephix\Context $context)
{
    echo $context->get('ssh_params.NOT_EXISTS');
}