<?php

namespace App\Models;

use App\Traits\HasWeightedSelection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasUuids;
    use HasWeightedSelection;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected function casts()
    {
        return [
            'start' => 'datetime',
            'end' => 'datetime',
        ];
    }
}
