<?php

namespace gamepedia\model;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'id';
    public $timestamps = false;

}