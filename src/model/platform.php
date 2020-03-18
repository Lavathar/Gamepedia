<?php

namespace gamepedia\model;

use Illuminate\Database\Eloquent\Model;

class platform extends Model
{
    protected $table = 'platform';
    protected $primaryKey = 'id';
    public $timestamps = false;

}