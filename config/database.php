<?php

return [

    'default' => 'mongodb',

    'connections' => [

      'mongodb' => [
          'driver'   => 'mongodb',
          'host'     => env('MONGO_ENV_HOST'),
          'port'     => env('MONGO_ENV_PORT', 27017),
          'database' => env('MONGO_ENV_DATABASE'),
          'username' => env('MONGO_ENV_USERNAME'),
          'password' => env('MONGO_ENV_PASSWORD')
      ],

    ],
    'migrations' => 'migrations',
];
