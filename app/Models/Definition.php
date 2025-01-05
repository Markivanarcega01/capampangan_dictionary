<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{
    //
    public function dictionaryKey(){
        return $this->belongsTo(Dictionary::class);
    }
}
