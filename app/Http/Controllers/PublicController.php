<?php

namespace App\Http\Controllers;

use App\Asset;
use App\AssetType;
use App\CollectionKeyType;
use App\MetadataKeys;
use App\Project;
use Auth;
use App\Collection;
use DB;

class PublicController extends Controller
{
    public function collectionGallery($id)
    {
        $collection = Collection::find($id);
        $projects = Project::hasGallery();
        $collections = Collection::hasGallery();
        $assetTypes = AssetType::hasGallery();
        $collectionAssetTypes = DB::table('asset_types')->join('assets','asset_types.id','=','assets.asset_type_id')
            ->join('collection_keys','assets.id','=','collection_keys.asset_id')
            ->where('collection_keys.collection_id','=',$id)
            ->select([
                'asset_types.id',
                'asset_types.name'
            ])
            ->get();
        return view('public.collection-gallery', compact('collection','id','collections','projects','assetTypes','collectionAssetTypes'));
    }
    public function projectGallery($id)
    {
        $project = Project::find($id);
        $projects = Project::hasGallery();
        $collections = Collection::hasGallery();
        $assetTypes = AssetType::hasGallery();
        $projectAssetTypes = DB::table('asset_types')->join('assets','asset_types.id','=','assets.asset_type_id')
            ->join('assets_projects','assets.id','=','assets_projects.asset_id')
            ->where('assets_projects.project_id','=',$id)
            ->select([
                'asset_types.id',
                'asset_types.name'
            ])
        ->get();
        return view('public.project-gallery', compact('project','id','collections','projects','assetTypes','projectAssetTypes'));
    }
    public function assetTypeGallery($assetTypeId)
    {
        $assetType = AssetType::find($assetTypeId);
        $projects = Project::hasGallery();
        $collections = Collection::hasGallery();
        $assetTypes = AssetType::hasGallery();
        return view('public.asset-type-gallery', compact('assetType','assetTypeId','collections','projects','assetTypes'));
    }

    /* Tiled Pages - Gallery Selection */
    public function galleryPortal()
    {
        $projects = Project::hasGallery();
        $collections = Collection::hasGallery();
        $assetTypes = AssetType::hasGallery();
        return view('public.gallery-portal', compact('projects','collections','assetTypes'));
    }
    public function showAsset($id)
    {
        /* Public-facing pages */
        $projects = Project::hasGallery();
        $collections = Collection::hasGallery();
        $assetTypes = AssetType::hasGallery();
        /* Asset Fields */
        $asset = Asset::with('collectionKeys')->find($id);
        if($asset->assetType->parameterKey->variable == 'image') {
            $exif = @exif_read_data($asset->s3path);
        }
        else {
            $exif = null;
        }
        $collections = Collection::all()->sortby('collection_name');
        $meta = DB::table('assets_meta')
            ->join('metadata_keys','assets_meta.metakey_id','=','metadata_keys.id')
            ->where('assets_meta.metable_id','=',$id)
            ->get();
        $metakeys = MetadataKeys::getKeysByModel('App\Asset');
        $collectionKeyTypes = CollectionKeyType::all();
        $projects = Project::all()->sortby('project_name');
        return view('public.assets.show', compact('projects','collections','assetTypes','asset','collections','exif','meta','metakeys','collectionKeyTypes','projects'));
    }


}

