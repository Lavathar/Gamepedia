<?php

namespace gamepedia\model;

use Illuminate\Database\Eloquent\Model;

class user2com extends Model
{

    protected $table = 'user2com';
    protected $primaryKey = 'idCOm';
    protected $filltable = ['email', 'idCom'];

    public $timestamps = false;


}
