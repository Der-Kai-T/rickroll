<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait HasWeightedSelection
{
    /**
     * Wählt ein zufälliges Element aus einer gewichteten Collection aus.
     *
     * @param Collection $items
     * @param string $weightKey
     * @return mixed|null
     */
    public function selectWeightedRandom(Collection $items, string $weightKey = 'weight')
    {
        $totalWeight = $items->sum($weightKey);
        if ($totalWeight <= 0) {
            return null;
        }

        $rand = mt_rand(1, $totalWeight);
        $current = 0;

        foreach ($items as $item) {
            $current += $item->$weightKey;
            if ($rand <= $current) {
                return $item;
            }
        }

        return null;
    }
}
