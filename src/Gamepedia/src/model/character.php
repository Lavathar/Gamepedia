<?php

namespace gamepedia\model;

use Illuminate\Database\Eloquent\Model;

class character extends Model
{

    protected $table = 'character';
    protected $primaryKey = 'id';
    protected $fillable = [ 'name', 'real_name', 'last_name','alias',
        'deck', 'description',
        'birthday', 'gender', 'first_appeared_in_game_id'
    ];
    public $timestamps = false;

    public function first_appeared_in_game() {

        return $this->belongsTo('\gamepedia\model\game', 'first_appeared_in_game_id');
    }

    public function games() {
        return $this->belongsToMany('\gamepedia\model\game', 'game2character', 'character_id', 'game_id');
    }

    public function friends() {
        return $this->belongsToMany('\gamepedia\model\character', 'friends', 'char1_id', 'char2_id');
    }

    public function enemies() {
        return $this->belongsToMany('\gamepedia\model\character', 'enemies', 'char1_id', 'char2_id');
    }

}