<?php

namespace gamepedia\model;

//require_once '../vendor/fzaninotto/faker/src/autoload.php';
require_once '../../../src/Gamepedia/src/vendor/fzaninotto/faker/src/autoload.php';

use gamepedia\model\utilisateur;
use gamepedia\model\commentaire;
use gamepedia\model\user2com;
use gamepedia\bd\Eloquent;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Illuminate\Database\Capsule\Manager as DB;
use Faker;

class fake {

  public $tab = array();

  function user()
  {
    $faker = Faker\Factory::create();

    for ($i = 1; $i <= 100; $i++) {
      $user = new utilisateur;
      $users = utilisateur::select('email')->get();
      $var = $faker->email;
      $this->tab[$i]=$var;
      $user-> email = $var;
      $user-> nom = $faker->lastName;
      $user-> prenom = $faker->firstName($gender = null|'male'|'female');
      $user-> adresse = $faker->address;
      $user-> numTel = $faker->e164PhoneNumber;
      $user-> dateNaiss = $faker->date;
      $user-> save();
    }
  }

  function comment()
  {
    $faker = Faker\Factory::create();

    for ($i = 1; $i < 2000; $i++) {
      $commentaire = new commentaire;
      $commentaire-> titre = $faker->sentence($nbWords = 1, $variableNbWords = true);
      $commentaire-> contenu = $faker->sentence($nbWords = 30, $variableNbWords = true);
      $commentaire-> idJeu = rand(1, 47948);
      $commentaire-> datCrea = $faker->dateTime($max='now', $timezone=null);
      $ra = rand(1, count($this->tab));
      $commentaire-> email = $this->tab[$ra];
      $commentaire-> save();
    }
  }
}
