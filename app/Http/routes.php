  <?php

  $app->register('Dingo\Api\Provider\LumenServiceProvider');

  $api = $app['api.router'];
  /*
   * Version 1 API
   */
  $api->version('v1', function ($api) use ($app) {

    $api->group(['namespace' => 'App\Http\Controllers'], function ($api) {
        $api->get('/', ['uses' => 'BaseController@helloWorld']);

        $api->group(['prefix' => 'payment'], function ($api) {
            $api->post('/', ['uses' => 'AppController@payment']);
        });

    });
  });
