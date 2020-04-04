<?php

namespace gamepedia\model ;

use Illuminate\Database\Eloquent\Model;

class gameRating extends Model {

    protected $table = 'game_rating';
    protected $primaryKey = 'id';
    protected $fillable = [ 'name', 'rating_board_id'];
    public $timestamps = false ;


    public function games() {

        return $this->belongsToMany('\gamepedia\model\game', 'game2rating', 'rating_id', 'game_id');
    }

    public function rating_board() {
        return $this->belongsTo('\gamepedia\model\ratingBoard', 'rating_board_id');
    }

}