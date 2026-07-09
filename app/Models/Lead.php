<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'branch',
        'reserve_date',
        'pax',
        'message',
        'source',
    ];

    protected $casts = [
        'reserve_date' => 'date',
        'pax'          => 'integer',
    ];
}
