<?php


namespace gamepedia\model;

use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'email';
    protected $fillable = ['email', 'nom', 'prenom', 'adresse', 'numTel', 'dateNaiss'];
    public $timestamps = false;



}