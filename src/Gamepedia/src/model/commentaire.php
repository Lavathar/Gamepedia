<?php


namespace gamepedia\model;

use Illuminate\Database\Eloquent\Model;

class commentaire extends Model
{
    protected $table = 'commentaire';
    protected $primaryKey = 'idCom';
    protected $fillable = ['idCom', 'titre', 'contenu', 'created_at', 'updated_at', 'dateCrea', 'email'];
    public $timestamps = true;
}
