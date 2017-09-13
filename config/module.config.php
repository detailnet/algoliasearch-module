<?php

return array(
    'service_manager' => array(
        'abstract_factories' => array(
        ),
        'aliases' => array(
        ),
        'invokables' => array(
        ),
        'factories' => array(
            'AlgoliaSearch\Client' => 'Detail\AlgoliaSearch\Factory\Client\AlgoliaSearchClientFactory',
            'Detail\AlgoliaSearch\Options\ModuleOptions' => 'Detail\AlgoliaSearch\Factory\Options\ModuleOptionsFactory',
        ),
        'initializers' => array(
        ),
        'shared' => array(
        ),
    ),
    'algoliasearch' => array(
    ),
);
