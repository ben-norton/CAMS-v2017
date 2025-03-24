<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* CAMS */
Route::get('/','PublicController@galleryPortal');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::get('password/reset','Auth\ResetPasswordController@showResetForm')->name('password.request');

Route::get('gallery/portal', 'PublicController@galleryPortal');
Route::get('gallery/collection/{id}', 'PublicController@collectionGallery');
Route::get('gallery/project/{id}', 'PublicController@projectGallery');
Route::get('gallery/asset-type/{assetTypeId}', 'PublicController@assetTypeGallery');
Route::get('public/assets/{id}', 'PublicController@showAsset');

Route::get('dashboard', ['middleware' => 'roleRoute', 'uses' => 'PagesController@dashboard']);
Route::get('unauthorized','PagesController@unauthorized');

Route::group( ['middleware' => 'auth' ], function() {

    Route::get('home', 'PagesController@home');
    Route::get('api','PagesController@getApi');

    Route::get('collections', 'CollectionsController@index');
    Route::get('datatables/collections-data', array('uses' => 'DatatablesController@getCollectionsData'));

    Route::get('assets', 'DigitalAssetsController@index');
    Route::get('datatables/assets-data', array('uses' => 'DatatablesController@getAssetsData'));

    Route::get('user', 'UserController@show');
    Route::get('user/edit', 'UserController@edit');
    Route::post('user/edit', 'UserController@update');

	Route::get('galleries/select-collection', 'GalleriesController@selectCollection');
	Route::get('galleries/select-project', 'GalleriesController@projects');
	Route::get('galleries/projects', 'GalleriesController@projects');
	Route::get('galleries/collection/{id}', 'GalleriesController@collectionGallery');
	Route::get('galleries/project/{id}', 'GalleriesController@projectGallery');


    Route::group( ['middleware' => 'access' ], function() {
        Route::get('dashboard', 'PagesController@dashboard');

        Route::get('collections/{id}/show', 'CollectionsController@show');
        Route::get('collections/create', 'CollectionsController@create');
        Route::post('collections/create', ['as' => 'collections.create', 'uses' => 'CollectionsController@store']);
        Route::get('collections/{id}/edit', 'CollectionsController@edit');
        Route::patch('collections/{id}/edit', 'CollectionsController@update');
        Route::delete('collections/{id}/delete', ['as' => 'collections.destroy', 'uses' => 'CollectionsController@destroy']);

        Route::get('datatables/asset-types-data',  'DatatablesController@getAssetTypesData');
        Route::get('datatables/parameter-keys-data', 'DatatablesController@getParameterKeysData');
        Route::get('datatables/projects-data', 'DatatablesController@getProjectsData');
        Route::get('datatables/alt/projects-data', 'DatatablesController@getProjectsDataAlt');
        Route::get('datatables/collection-key-types-data', 'DatatablesController@getCollectionKeyTypesData');

        Route::get('asset-types', 'AssetTypesController@index');
        Route::get('asset-types/{id}/show', 'AssetTypesController@show');
        Route::get('asset-types/create', 'AssetTypesController@create');
        Route::post('asset-types/create', ['as' => 'asset-types.create', 'uses' => 'AssetTypesController@store']);
        Route::get('asset-types/{id}/edit', 'AssetTypesController@edit');
        Route::patch('asset-types/{id}/edit', 'AssetTypesController@update');
        Route::delete('asset-types/{id}/delete', ['as' => 'asset-types.destroy', 'uses' => 'AssetTypesController@destroy']);

        Route::get('assets/{id}/show', 'DigitalAssetsController@show');
        Route::get('assets/create', 'DigitalAssetsController@create');
        Route::post('assets/create', ['as' => 'assets.create', 'uses' => 'DigitalAssetsController@store']);
        Route::get('assets/{id}/edit', 'DigitalAssetsController@edit');
        Route::patch('assets/{id}/edit', 'DigitalAssetsController@update');
        Route::delete('assets/{id}/delete', ['as' => 'assets.destroy', 'uses' => 'DigitalAssetsController@destroy']);
        Route::get('assets/search','DigitalAssetsController@search');

        Route::get('parameter-keys', 'ParameterKeysController@index');
        Route::get('parameter-keys/{id}/show', 'ParameterKeysController@show');
        Route::get('parameter-keys/create', 'ParameterKeysController@create');
        Route::post('parameter-keys/create', ['as' => 'parameter-keys.create', 'uses' => 'ParameterKeysController@store']);
        Route::get('parameter-keys/{id}/edit', 'ParameterKeysController@edit');
        Route::patch('parameter-keys/{id}/edit', 'ParameterKeysController@update');
        Route::delete('parameter-keys/{id}', ['as' => 'parameter-keys.destroy', 'uses' => 'ParameterKeysController@destroy']);

        Route::get('projects', 'ProjectsController@index');
        Route::get('projects/{id}/show', 'ProjectsController@show');
        Route::get('projects/create', 'ProjectsController@create');
        Route::post('projects/create', ['as' => 'projects.create', 'uses' => 'ProjectsController@store']);
        Route::get('projects/{id}/edit', 'ProjectsController@edit');
        Route::patch('projects/{id}/edit', 'ProjectsController@update');
        Route::delete('projects/{id}/delete', ['as' => 'projects.destroy', 'uses' => 'ProjectsController@destroy']);

        Route::get('collection-key-types', 'CollectionKeyTypesController@index');
        Route::get('collection-key-types/{id}/show', 'CollectionKeyTypesController@show');
        Route::get('collection-key-types/create', 'CollectionKeyTypesController@create');
        Route::post('collection-key-types/create', ['as' => 'collection-key-types.create', 'uses' => 'CollectionKeyTypesController@store']);
        Route::get('collection-key-types/{id}/edit', 'CollectionKeyTypesController@edit');
        Route::patch('collection-key-types/{id}/edit', 'CollectionKeyTypesController@update');
        Route::delete('collection-key-types/{id}', ['as' => 'collection-key-types.destroy', 'uses' => 'CollectionKeyTypesController@destroy']);

        // Modal Ajax
        Route::post('collection/keys/add', 'CollectionKeysController@add');
        Route::delete('collection/keys/{id}', ['as' => 'collection.keys.destroy', 'uses' => 'CollectionKeysController@destroyKeyRelations']);
        Route::post('assets/metadata/add', 'AssetMetadataController@add');
        Route::delete('assets/metadata/{id}/{key}/delete', ['as' => 'assets.metadata.destroy', 'uses' => 'AssetMetadataController@destroy']);
        Route::post('links/add', 'CollectionLinksController@add');
        Route::delete('links/{id}/delete', ['as' => 'link.destroy', 'uses' => 'CollectionLinksController@destroy']);
        Route::post('stats/add', 'CollectionStatsController@add');
        Route::delete('stats/{id}/delete', ['as' => 'stats.destroy', 'uses' => 'CollectionStatsController@destroy']);
        Route::post('assets/projects/add', 'AssetsProjectsController@add');
        Route::delete('assets/projects/{assetId}/{projectId}/delete', ['as' => 'assets.projects.destroy', 'uses' => 'AssetsProjectsController@destroy']);

        Route::get('processTiff/{id}', 'DigitalAssetsController@processTiff');

	});

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {
        Route::get('users','UsersController@index');
        Route::get('users/{id}', 'UsersController@show');
        Route::get('users/{id}/edit', 'UsersController@edit');
        Route::patch('user/{id}/edit', 'UsersController@update');
        Route::delete('users/{id}', 'UsersController@destroy');
    });
});

