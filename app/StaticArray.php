<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticArray extends Model
{
    public static $imageMimeTypes = [
        'image/jpeg',
        'image/gif',
        'image/png',
        'image/bmp'
    ];
    public static $fileTypes = [
        "image",
        "binary",
        "document",
        'model'
    ];
    public static $frequencies = [
		null => null,
		"daily" => "Daily",
		"monthly" => "Monthly",
		"yearly" => "Yearly",
     ];
      public static $statMonths = [
        null => null,
        "1" => "January",
        "2" => "February",
        "3" => "March",
        "4" => "April",
        "5" => "May",
        "6" => "June",
        "7" => "July",
        "8" => "August",
        "9" => "September",
        "10" => "October",
        "11" => "November",
        "12" => "December"
    ];
    public static $models = [
        "Asset" => "Asset",
        "AssetsMeta" => "AssetsMeta",
        "AssetType" => "AssetType",
        "Collection" => "Collection",
        "CollectionLink" => "CollectionLink",
        "CollectionsMeta" => "CollectionsMeta",
        "CollectionStat" => "CollectionStat",
        "FieldLocation" => " FieldLocation",
        "IanaType" => "  IanaType",
        "MetadataKeys" => "MetadataKeys",
        "ParameterKey" => "ParameterKey",
        "Project" => "Project",
        "ProjectsMeta" => "ProjectsMeta",
        "Role" => "Role",
        "Specimen" => "Specimen",
        "SpecimenIdentifier" => "SpecimenIdentifier",
        "User" => "User",
    ];
    public static $parameterTypes = [
        "media" => "media",
        "link" => "link",
        "statistic" => "statistic",
    ];
    /**
     * Metadata Keys
     * Metakeys are stored in the meta tables of applicable models. The metakeys listed below are the controller vocabulary for metakeys. To add metakeys to the form
     * dropdowns, insert them into the model-specific array as variable name => display name pairs.
     */
    /**
     * Assets
     */
    public static $asset_meta_keys = [
        "prev_catalog_number" => "Previous Catalog Number",
        "accession_number" => "Accession Number",
    ];

    public static $project_meta_keys = [
        "project_group" => "Project Group",
    ];
     	
}
