<?php

$config = array(
    'admin' => array(
        'core:AdminPassword',
    ),

    'ldap' => [
        'ldap:Ldap',
        'hostname' => 'ldap.movieking.com',
        'enable_tls' => true,
        'timeout' => 10,
        'dnpattern' => 'cn=%username%,dc=movieking,dc=com',
        'search.enable' => false,
    ],

);