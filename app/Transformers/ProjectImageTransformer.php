<?php

namespace App\Transformers;
use App\Asset;
use League\Fractal\TransformerAbstract;

class ProjectImageTransformer extends TransformerAbstract
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
            'url_lg' => $asset->imgpath_lg,
            'url_md' => $asset->imgpath_md,
            'url_sm' => $asset->imgpath_thumb,
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
