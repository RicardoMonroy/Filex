<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    protected $fillable = ([
        'icon',
        'description'
    ]);

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
