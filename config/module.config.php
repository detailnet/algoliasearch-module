<?php

use AlgoliaSearch\Client;

use Detail\AlgoliaSearch\Factory;
use Detail\AlgoliaSearch\Options;

return [
    'service_manager' => [
        'abstract_factories' => [
        ],
        'aliases' => [
        ],
        'invokables' => [
        ],
        'factories' => [
            Client::CLASS => Factory\Client\AlgoliaSearchClientFactory::CLASS,
            Options\ModuleOptions::CLASS => Factory\Options\ModuleOptionsFactory::CLASS,
        ],
        'initializers' => [
        ],
        'shared' => [
        ],
    ],
    'algoliasearch' => [
    ],
];
