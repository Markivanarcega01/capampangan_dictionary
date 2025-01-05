<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    //
    protected $table = 'dictionary_keys';
    //protected $fillable = ['word', 'pronounciation', 'part_of_speech', 'origin', 'synonyms', 'antonyms', 'concept_image'];
    public function definition(){
        return $this->hasMany(Definition::class);
    }
}
