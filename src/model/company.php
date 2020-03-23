<?php

namespace gamepedia\model;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'id';
    protected $fillable = [ 'name', 'alias', 'abbreviation',  'deck',
        'description', 'date_founded', 'location_address', 'location_city',
        'location_country', 'location_state', 'phone', 'website', 'created_at',
        'updated_at'];
    public $timestamps = false;

    public function gamesDeveloped() {

        return $this->belongsToMany('\gamepedia\model\game', 'game_developers', 'comp_id', 'game_id');
    }


}