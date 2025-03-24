<?php

namespace App\Transformers;
use App\Asset;
use League\Fractal\TransformerAbstract;

class ProjectAssetTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Asset $asset)
    {
        return [
            'title' => $asset->title,
            'original_filename' => $asset->original_filename,
            'filename' => $asset->s3filename,
            'path' => $asset->s3path,
            'remarks' => $asset->remarks,
            'source' => $asset->source,
            'type' => $asset->assetType->name,
            'project_name' => $asset->project_name,
        ];
    }
}
