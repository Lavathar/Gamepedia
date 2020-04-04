<?php


namespace gamepedia\model;

use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'email';
    protected $fillable = ['nom', 'prenom', 'adresse', 'numTel', 'dateNaiss'];
    public $timestamps = false;
    public $incrementing = false;

    public function comments(){
        return $this->hasMany('\gamepedia\model\commentaire', 'email');
    }
}
