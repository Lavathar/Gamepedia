<?php

namespace gamepedia\model;

use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    protected $table = 'game';
    protected $primaryKey = 'id';
    protected $fillable = [ 'name', 'alias', 'deck', 'description',
        'expected_release_day', 'expected_release_month',
        'expected_release_quarter', 'expected_release_year',
        'original_release_date'];
    public $timestamps = false;

    public function platforms() {

        return $this->belongsToMany('\gamepedia\model\platform', 'game2platform', 'game_id', 'platform_id');
    }

    public function original_game_ratings() {

        return $this->belongsToMany('\gamepedia\model\gameRating', 'game2rating', 'game_id', 'rating_id');
    }

    public function publishers() {
        return $this->belongsToMany('\gamepedia\model\company', 'game_publishers', 'game_id', 'comp_id');
    }

    public function developers() {
        return $this->belongsToMany('\gamepedia\model\company', 'game_developers', 'game_id', 'comp_id');
    }

    public function themes() {
        return $this->belongsToMany('\gamepedia\model\theme', 'game2theme', 'game_id','theme_id');
    }

    public function genres() {
        return $this->belongsToMany('\gamepedia\model\genre', 'game2genre', 'game_id','genre_id');
    }

    public function similar_games() {
        return $this->belongsToMany('\gamepedia\model\game', 'similar_games', 'game1_id', 'game2_id');
    }

    public function characters() {
        return $this->belongsToMany('\gamepedia\model\character', 'game2character', 'game_id', 'character_id');
    }

    public function first_appearance_characters() {
        return $this->hasMany('\gamepedia\model\character', 'first_appeared_in_game_id');
    }

    public function comments() {
        return $this->hasMany('\gamepedia\model\commentaire','idJeu');
    }

}