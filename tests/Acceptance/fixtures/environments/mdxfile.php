<?php

function showUser(\Mudephix\Context $context)
{
    echo $context->get('ssh_params.user');
}