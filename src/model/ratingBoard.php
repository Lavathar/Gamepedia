<?php

namespace gamepedia\model ;

use Illuminate\Database\Eloquent\Model;

class ratingBoard extends Model
{

    protected $table = 'rating_board';
    protected $primaryKey = 'id';
    public $timestamps = false;

}