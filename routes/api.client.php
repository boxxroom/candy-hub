<?php

/*
|--------------------------------------------------------------------------
| API Client Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API Client routes for GetCandy
| These are READ ONLY routes
|
*/

$this->get('categories', 'CategoryController@index');
$this->get('channels', 'ChannelController@index');
$this->get('channels/{id}', 'ChannelController@show');
$this->get('collections', 'CollectionController@index');

$this->get('product-families', 'ProductFamilyController@index');
$this->get('routes', 'RouteController@index');
$this->get('routes/{slug}', [
    'uses' => 'RouteController@show'
])->where(['slug' => '.*']);