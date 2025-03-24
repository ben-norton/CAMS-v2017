<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| CAMS API Routes
|--------------------------------------------------------------------------
*/
/* Pattern:
    General
        [asset type name]/[identifier]/identifier
        [asset type name]/[grouping]/[identifier]
        [grouping] is the name of the model (Specimen, FieldLocation, Project)
    Photos
        specimenPhoto/{collection_id}/[catalog_number}
        locationPhoto/{field_number}
        specimenPhotos/collection/[collection_id]
    Projects
        [asset type name]/project/[project id]
*/

Route::group(['middleware' => 'cors', 'namespace' => 'Api\v1', 'prefix' => '/v1'], function () {

	    // Collections
        Route::get('/collections', 'CollectionsController@index');
        Route::get('/collection/{id}', 'CollectionsController@getCollection');
        Route::get('/collections/search/{term}', 'CollectionsController@searchCollections');
        Route::get('/collection/links/{id}', 'CollectionsController@getCollectionLinks');
		Route::get('/collection/stats/{id}', 'CollectionsController@getCollectionStats');
		Route::get('/collection/stat/{id}/{parameter}', 'CollectionsController@getCollectionStat');
        Route::get('/collections/assets/true', 'CollectionsController@getCollectionsWithAssets');
        
        // Projects
        Route::get('/projects', 'ProjectsController@getProjects');
        Route::get('/projects/assets', 'ProjectsController@getProjectsAssets');

        // Galleries
        Route::get('/images/collection/{collectionId}', 'GalleriesController@getCollectionImages');
        Route::get('/images/project/{project}', 'GalleriesController@getProjectImages');
        Route::get('/images/project/{project}/private', 'GalleriesController@getPrivateProjectImages');
        Route::get('/images/assetType/{assetTypeId}', 'GalleriesController@getAssetTypeImages');
        // Assets
        // Single Asset
        Route::get('asset/{id}', 'DigitalAssetsController@getAsset');
        Route::get('asset', 'DigitalAssetsController@asset');

        Route::get('resources/asset', 'DigitalAssetsController@getAssetResource');

        Route::get('assets/{id}', 'DigitalAssetsController@getAsset');
        Route::get('assets', 'DigitalAssetsController@asset');
        
        // Recently Updated Assets
        Route::get('assets/recent', 'DigitalAssetsController@getRecent');
                Route::get('/assets/latest', 'DigitalAssetsController@latest');
        
        // Collection Keys
        Route::get('collections/keys', 'DigitalAssetsController@getCollectionKeyTypes');
        // Collection Object Assets
        Route::get('assets/object/{collectionId}/{keyType}/{keyValue}', 'DigitalAssetsController@getCollectionObjectAssets');
        // Collection Object Images
        Route::get('images/object/{collectionId}/{keyType}/{keyValue}', 'DigitalAssetsController@getCollectionObjectImages');

		Route::get('specimen/images', 'DigitalAssetsController@getSpecimenImages');
		Route::get('/specimen/paleo/images', 'DigitalAssetsController@getSpecimenPaleoImages');

        // Search Collection Object Images
        Route::post('images/search', 'DigitalAssetsController@searchCollectionObjectImages');

        Route::get('assets/search', [
            'as' => 'api.search',
            'uses' => 'SearchController@search'
        ]);


});
