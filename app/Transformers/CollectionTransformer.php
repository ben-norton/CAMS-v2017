<?php

namespace App\Transformers;
use App\Collection;
use League\Fractal\TransformerAbstract;

class CollectionTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'links',
        'stats'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Collection $collection)
    {
        return [
            'id' => $collection->id,
            'collection' => $collection->collection_name,
            'collection shortname' => $collection->collection_shortname,
            'slug' => $collection->collection_slug,
            'collection manager firstname' => $collection->collection_manager_fname,
            'collection manager lastname' => $collection->collection_manager_lname,
            'collection manager lastname' => $collection->collection_manager_email,
            'collection manager lastname' => $collection->collection_manager_phone,
            'Curator firstname' => $collection->curator_fname,
            'Curator lastname' => $collection->curator_lname,
            'Curator Email' => $collection->curator_email,
            'Curator Phone' => $collection->curator_phone,
        ];
    }

    public function includeLinks(Collection $collection)
    {
        return $this->collection($collection->links, new CollectionLinksTransformer);
    }
    public function includeStats(Collection $collection)
    {
        return $this->collection($collection->stats, new CollectionStatsTransformer);
    }
}
