<?php

$environments = array(
    'prod' => array(
        'hosts' => array('127.0.0.1', '33.33.33.10'),
        'ssh_params' => array(
            'user' => 'ideato'
        ),
    ),
    'stage' => array(
        'hosts' => array('192.168.169.170'),
        'ssh_params' => array(
            'user' => 'ideato'
        ),
    ),
    'test' => array(
        'hosts' => array('127.0.0.1'),
        'ssh_params' => array('user' => 'kea'),
    ),
);

return array(
    'envs' => $environments
);
