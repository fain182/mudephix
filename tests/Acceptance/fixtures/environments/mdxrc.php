<?php

$environments = array(
    'prod' => array(
        'host' => '127.0.0.1',
        'ssh_params' => array(
            'user' => 'ideato'
        ),
    ),
    'stage' => array(
        'host' => '192.168.169.170',
        'ssh_params' => array(
            'user' => 'ideato'
        ),
    ),
    'test' => array(
        'host' => '127.0.0.1',
        'ssh_params' => array('user' => 'kea'),
    ),
);

return array(
    'envs' => $environments
);
