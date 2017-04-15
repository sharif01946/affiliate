<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharityGroup extends Model
{
    protected $fillable = [ 'name','description', 'slug', 'created_at', 'updated_at' ];
}
