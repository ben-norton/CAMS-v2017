<?php

namespace App;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Param;

class Asset extends Model
{

    protected $table = 'assets';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function assetType()
    {
        return $this->belongsTo('App\AssetType','asset_type_id');
    }
    public function uploadedBy()
    {
        return $this->belongsTo('App\User','uploaded_by');
    }
    public function collectionKeys()
    {
        return $this->hasMany('App\CollectionKey','asset_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','uploaded_by');
    }
    public function projects()
    {
        return $this->belongsToMany('App\Project', 'assets_projects');
    }
    public function collections()
    {
        return $this->belongsToMany('App\Collection', 'assets_collections');
    }

    public static function getObjectImages($collectionId,$keyId,$keyValue){
        $assets = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->join('collection_keys', 'assets.id','=','collection_keys.asset_id')
            ->join('collection_key_types','collection_keys.key_type_id','=','collection_key_types.id')
            ->join('collections','collection_keys.collection_id','=','collections.id')
            ->where('asset_types.parameter_id','=',4)
            ->where('collection_keys.collection_id', '=',$collectionId)
            ->where('collection_keys.key_type_id','=',$keyId)
            ->where('collection_keys.key_value','=',$keyValue)
            ->where('assets.public_yn','=', 1)
            ->get();
        return $assets;
    }
    public static function getObjectImagesSearch($collectionId,$keyId,$keyValue){
        $assets = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->join('collection_keys', 'assets.id','=','collection_keys.asset_id')
            ->join('collection_key_types','collection_keys.key_type_id','=','collection_key_types.id')
            ->join('collections','collection_keys.collection_id','=','collections.id')
            ->where('asset_types.parameter_id','=',4)
            ->where('collection_keys.collection_id', '=',$collectionId)
            ->where('collection_keys.key_type_id','=',$keyId)
            ->where('collection_keys.key_value','like',$keyValue)
            ->where('assets.public_yn','=', 1)
            ->get();
        return $assets;
    }
    public static function getObjectAssets($collectionId,$keyId,$keyValue){
        $assets = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->join('collection_keys', 'assets.id','=','collection_keys.asset_id')
            ->join('collection_key_types','collection_keys.key_type_id','=','collection_key_types.id')
            ->join('collections','collection_keys.collection_id','=','collections.id')
            ->where('collection_keys.collection_id', '=',$collectionId)
            ->where('collection_keys.key_type_id','=',$keyId)
            ->where('collection_keys.key_value','=',$keyValue)
            ->where('assets.public_yn','=', 1);
        return $assets;
    }
    public static function getProjectAssets($project){
        $assets = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->join('assets_projects','assets.id','=','assets_projects.asset_id')
            ->join('projects','assets_projects.project_id','=','projects.id')
            ->where('projects.id', '=',$project)
            ->where('projects.public_yn','=',1)
            ->where('assets.public_yn','=', 1);
        return $assets;
    }
    public static function getPrivateProjectAssets($project){
        $assets = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->join('assets_projects','assets.id','=','assets_projects.asset_id')
            ->join('projects','assets_projects.project_id','=','projects.id')
            ->where('projects.id', '=',$project);
        return $assets;
    }
    public static function getProjectImages($project){
        $assets = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->join('assets_projects','assets.id','=','assets_projects.asset_id')
            ->join('projects','assets_projects.project_id','=','projects.id')
            ->where('asset_types.parameter_id','=',4)
            ->where('projects.id', '=',$project)
            ->where('projects.public_yn','=',1)
            ->where('assets.public_yn','=', 1);
        return $assets;
    }
    public static function getPrivateProjectImages($project){
        $assets = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->join('assets_projects','assets.id','=','assets_projects.asset_id')
            ->join('projects','assets_projects.project_id','=','projects.id')
            ->where('asset_types.parameter_id','=',4)
            ->where('projects.id', '=',$project);
        return $assets;
    }

    public static function getRandomProjectImage($project){
        $asset = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->join('assets_projects','assets.id','=','assets_projects.asset_id')
            ->join('projects','assets_projects.project_id','=','projects.id')
            ->where('asset_types.parameter_id','=',4)
            ->where('projects.id', '=',$project)
            ->where('projects.public_yn','=',1)
            ->where('assets.public_yn','=', 1)
            ->inRandomOrder()
            ->first();
        return $asset;
    }
    public static function getRandomProjectImageAdmin($project){
        $asset = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->join('assets_projects','assets.id','=','assets_projects.asset_id')
            ->join('projects','assets_projects.project_id','=','projects.id')
            ->where('asset_types.parameter_id','=',4)
            ->where('projects.id', '=',$project)
            ->inRandomOrder()
            ->first();
        return $asset;
    }
    public static function getCollectionImages($collectionId){
        $assets = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->join('collection_keys', 'assets.id','=','collection_keys.asset_id')
            ->join('collections','collection_keys.collection_id','=','collections.id')
            ->where('asset_types.parameter_id','=',4)
            ->where('collection_keys.collection_id', '=',$collectionId)
            ->where('assets.public_yn','=', 1);
        return $assets;
    }
    public static function getPaleoCollectionImages(){
        $assets = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->join('collection_keys', 'assets.id','=','collection_keys.asset_id')
            ->join('collections','collection_keys.collection_id','=','collections.id')
            ->where('asset_types.parameter_id','=',4)
            ->whereIn('collection_keys.collection_id', array(4,6,9))
            ->where('assets.public_yn','=', 1);
        return $assets;
    }
    public static function getRandomCollectionImage($collection){
        $asset = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->join('collection_keys', 'assets.id','=','collection_keys.asset_id')
            ->join('collections','collection_keys.collection_id','=','collections.id')
            ->where('asset_types.parameter_id','=',4)
            ->where('collection_keys.collection_id', '=',$collection)
            ->where('assets.public_yn','=', 1)
            ->inRandomOrder()
            ->first();
        return $asset;
    }

    public static function getSpecimenImages($collectionId,$k,$v){
        $assets = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->join('collection_keys', 'assets.id','=','collection_keys.asset_id')
            ->join('collection_key_types','collection_keys.key_type_id','=','collection_key_types.id')
            ->join('collections','collection_keys.collection_id','=','collections.id')
            ->where('asset_types.parameter_id','=',4)
            ->where('collection_keys.collection_id', '=',$collectionId)
            ->where('collection_keys.key_type_id','=',$k)
            ->where('collection_keys.key_value','like','%' .$v. '%')
            ->where('assets.public_yn','=', 1)
            ->get();
        return $assets;
    }
    public static function getAssetTypeImages($assetTypeId){
        $assets = Asset::join('asset_types', 'assets.asset_type_id', '=','asset_types.id')
            ->where('assets.asset_type_id','=',$assetTypeId)
            ->where('assets.public_yn','=', 1);
        return $assets;
    }
}
