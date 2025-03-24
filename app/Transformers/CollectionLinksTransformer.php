<?php

namespace App\Transformers;

use App\CollectionLink;
use League\Fractal\TransformerAbstract;

class CollectionLinksTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(CollectionLink $link)
    {
        return [
            'link_name' => $link->parameterKey->display_name,
            'url' => $link->url,
            'link_remarks' => $link->remarks,
            'collection' => $link->collection->collection_name,
            'collection_id' => $link->collection_id

        ];
    }
}
