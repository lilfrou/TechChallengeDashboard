<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    //
    protected $guarded=[];
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['comment'])->withTimestamps();
    }
}
