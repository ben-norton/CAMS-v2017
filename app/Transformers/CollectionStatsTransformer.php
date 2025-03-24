<?php

namespace App\Transformers;
use App\CollectionStat;
use League\Fractal\TransformerAbstract;
use Carbon\Carbon;
class CollectionStatsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(CollectionStat $stat)
    {
        return [
            'stat_name' => $stat->parameterKey->display_name,
            'variable' => $stat->parameterKey->variable,
            'parameter_id' => $stat->parameter_id,
            'stat_string' => $stat->value_str,
            'stat_decimal' => $stat->value_dec,
            'stat_integer' => $stat->value_int,
            'frequency' => $stat->frequency,
            'day' => $stat->stat_day,
            'month' => $stat->stat_month,
            'year' => $stat->stat_year,
            'created_at' => $stat->created_at,
            'created' => $stat->created_at->format('m/d/Y'),
            'remarks' => $stat->remarks,
            'source' => $stat->source,
            'collection_id' => $stat->collection_id,
            'collection_name' => $stat->collection->collection_name,
        ];
    }
}
