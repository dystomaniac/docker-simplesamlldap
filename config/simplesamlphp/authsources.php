<?php

$config = array(
    'admin' => array(
        'core:AdminPassword',
    ),

    'ldap' => [
        'ldap:Ldap',

        /**
         * The connection string for the LDAP-server.
         * You can add multiple by separating them with a space.
         */
        'connection_string' => 'ldap.movieking.com',

        /**
         * Whether SSL/TLS should be used when contacting the LDAP server.
         * Possible values are 'ssl', 'tls' or 'none'
         */
        'encryption' => 'ssl',

        /**
         * The LDAP version to use when interfacing the LDAP-server.
         * Defaults to 3
         */
        'version' => 3,

        /**
         * Set to TRUE to enable LDAP debug level. Passed to the LDAP connector class.
         *
         * Default: FALSE
         * Required: No
         */
        'debug' => false,

        /**
         * The LDAP-options to pass when setting up a connection
         * See [Symfony documentation]
         */
        'options' => [
            /**
             * Set whether to follow referrals.
             * AD Controllers may require 0x00 to function.
             * Possible values are 0x00 (NEVER), 0x01 (SEARCHING),
             *   0x02 (FINDING) or 0x03 (ALWAYS).
             */
            'referrals' => 0x00,

            'network_timeout' => 3,
        ],

        /**
         * The connector to use.
         * Defaults to '\SimpleSAML\Module\ldap\Connector\Ldap', but can be set
         * to '\SimpleSAML\Module\ldap\Connector\ActiveDirectory' when
         * authenticating against Microsoft Active Directory. This will
         * provide you with more specific error messages.
         */
        'connector' => '\SimpleSAML\Module\ldap\Connector\Ldap',

        /**
         * Which attributes should be retrieved from the LDAP server.
         * This can be an array of attribute names, or NULL, in which case
         * all attributes are fetched.
         */
        'attributes' => null,

        /**
         * Which attributes should be base64 encoded after retrieval from
         * the LDAP server.
         */
        'attributes.binary' => [
            'jpegPhoto',
            'objectGUID',
            'objectSid',
            'mS-DS-ConsistencyGuid'
        ],

        /**
         * The pattern which should be used to create the user's DN given
         * the username. %username% in this pattern will be replaced with
         * the user's username.
         *
         * This option is not used if the search.enable option is set to TRUE.
         */
        'dnpattern' => 'cn=%username%,dc=movieking,dc=com',

        /**
         * As an alternative to specifying a pattern for the users DN, it is
         * possible to search for the username in a set of attributes. This is
         * enabled by this option.
         */
        'search.enable' => false,

        /**
         * An array on DNs which will be used as a base for the search. In
         * case of multiple strings, they will be searched in the order given.
         */
        'search.base' => [
            'dc=movieking,dc=com',
        ],

        /**
         * The scope of the search. Valid values are 'sub' and 'one' and
         * 'base', first one being the default if no value is set.
         */
        'search.scope' => 'sub',

        /**
         * The attribute(s) the username should match against.
         *
         * This is an array with one or more attribute names. Any of the
         * attributes in the array may match the value the username.
         */
        'search.attributes' => ['uid', 'mail'],

        /**
         * Additional filters that must match for the entire LDAP search to
         * be true.
         *
         * This should be a single string conforming to [RFC 1960]
         * and [RFC 2544]. The string is appended to the search attributes
         */
        'search.filter' => '(&(objectClass=Person)(|(sn=Doe)(cn=John *)))',

        /**
         * The username & password where SimpleSAMLphp should bind to before
         * searching. If this is left NULL, no bind will be performed before
         * searching.
         */
        'search.username' => null,
        'search.password' => null,
    ],

);