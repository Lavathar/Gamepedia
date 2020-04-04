<?php

namespace gamepedia;

ini_set('memory_limit', '512M');

require_once '../../../src/Gamepedia/src/vendor/autoload.php';

use gamepedia\model\utilisateur;
use gamepedia\model\commentaire;
use gamepedia\model\user2com;
use gamepedia\model\game;
use gamepedia\model\platform;
use gamepedia\model\company;
use gamepedia\model\character;
use gamepedia\model\gameRating;
use gamepedia\model\fake;
use gamepedia\bd\Eloquent;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Illuminate\Database\Capsule\Manager as DB;

session_start();

Eloquent::start('../../../src/Gamepedia/src/conf/conf.ini');

$c = new \Slim\Container(['settings'=>['displayErrorDetails' => true]]);
$app = new \Slim\App($c);

DB::connection()->enableQueryLog();

 // --- Fonctions ---

 // TD1

function getMario()
{
    $timeStart = microtime(true);
    $games = game::select('name', 'description')
        -> where('name','LIKE', '%Mario%')
        -> orderBy('name', 'asc')
        -> get();
    foreach ($games as $game){
        echo "<div style='border : 1px solid; margin : 5px'><h1>$game->name</h1> $game->description</div>";
    }
    $timeEnd = microtime(true);
    $time = $timeEnd - $timeStart;
    getLog();
    echo "<p>$time</p>";
}

function getJapon()
{
    $companies = company::select('name', 'description')
        -> where('location_country','=','Japan')
        -> orderBy('name', 'asc')
        -> get();
    foreach ($companies as $company){
        echo "<div style='border : 1px solid; margin : 5px'><h1>$company->name</h1> $company->description</div>";
    }
}

function getPlatform()
{
    $plateformes = platform::select('name', "install_base", 'description')
        ->where('install_base','>=','10000000')
        ->orderBy('install_base', 'desc')
        -> get();
    foreach ($plateformes as $plateforme){
        echo "<div style='border : 1px solid; margin : 5px'><h1>$plateforme->name - $plateforme->install_base</h1> $plateforme->description</div>";
    }
}

function getJeux()
{
    $games = game::take(442)->skip(21173)
        ->get();
    forEach ($games as $game) {
        echo "<p>$game->name</p>";
    }
}

function getListeJeux()
{
    $timeStart = microtime(true);
    $games = game::select('name', 'deck')
        ->get();
    forEach ($games as $game) {
        echo "<p>$game->name</p>";
    }
    $timeEnd = microtime(true);
    $time = $timeEnd - $timeStart;
    echo "<p>$time</p>";
}


 // TD2

function getPersoId()
{
    $games = game::where('id', 'like', '12342')
        ->first();
    foreach ($games->characters as $ch) {
        echo "<p>$ch->id - $ch->name - $ch->deck</p>";
    }
    getLog();
}

function getPersoMario()
{
    $timeStart = microtime(true);
    $games = Game::where('name', 'like', 'Mario%')
        ->with('characters')
        ->get();
    foreach ($games as $g) {
        foreach($g->characters as $ch){
            echo "<div style='border : 1px solid; margin : 5px'><h3>$ch->id - $ch->name</h3> $ch->deck</div>";
        }
    }
    $timeEnd = microtime(true);
    $time = $timeEnd - $timeStart;
    echo "<p>$time</p>";
    getLog();
}

function getJeuxSony()
{
    $company = company::where('name', 'like', '%Sony%')
        ->with('gamesDeveloped')
        ->get();
        foreach ($company as $cp) {
            echo "<p>$cp->name</p>";
            foreach ($cp->gamesDeveloped as $gd){
                echo "<p>$gd->id - $gd->name - $gd->deck</p>";
            }
        }
    getLog();
}

function getRatingMario()
{
    foreach (game::where('name', 'like', '%Mario%')
                 ->get() as $game) {
        echo "<p>$game->name : $game->id</p>";
        foreach ($game->original_game_ratings as $rating) {
            echo "<p>$rating->name - $rating->rating_board->name</p>";
        }
    }
}

function getTroisPersoMario()
{
    foreach (game::where('name', 'like', 'Mario%')->has('characters', '>', 3)->get() as $game) {
        echo "<p>$game->name : $game->id</p>";
        foreach ($game->characters as $ch) {
            echo "<p>$ch->id - $ch->name - $ch->deck</p>";
        }
    }
}

function getRatingMarioTroisPlus()
{
    $timeStart = microtime(true);
    foreach (game::where('name', 'like', 'Mario%')
                 ->whereHas('original_game_ratings', function ($q) {
                     $q->where('name', 'like', '%3+%');
                 })
                 ->get() as $game) {
        echo "<p>$game->name : $game->id</p>";
        foreach ($game->original_game_ratings as $rating) {
            echo "<p>$rating->name</p>";
        }
        foreach ($game->publishers as $comp) {
            echo "<p>$comp->name</p>";
        }
    }
    $timeEnd = microtime(true);
    $time = $timeEnd - $timeStart;
    echo "<p>$time</p>";
}

function getRatingMarioIncTroisPlus()
{
    foreach (game::where('name', 'like', 'Mario%')
                 ->whereHas('original_game_ratings', function($q){
                     $q->where('name', 'like', '%3+%');
                 })
                 ->whereHas('publishers', function($q) {
                     $q->where('name', 'like', '%Inc.%');
                 })

                 ->get() as $game) {
        echo "<p>$game->name : $game->id</p>";
        foreach ($game->original_game_ratings as $rating) {
            echo "<p>$rating->name</p>";
        }
        foreach ($game->publishers as $comp) {
            echo "<p>publisher : $comp->name</p>";
        }
    }
}

function getRatingMarioIncTroisPlusCero()
{
    foreach (game::where('name', 'like', 'Mario%')
                 ->whereHas('original_game_ratings', function($q){
                     $q->where('name', 'like', '%3+%');
                 })
                 ->whereHas('original_game_ratings.rating_board', function($q){
                     $q->where('name', '=', 'CERO');
                 })
                 ->whereHas('publishers', function($q) {
                     $q->where('name', 'like', '%Inc.%');
                 })

                 ->get() as $game) {
        echo "<p>$game->name : $game->id</p>";
        foreach ($game->original_game_ratings as $rating) {
            echo "<p>$rating->name</p>";
        }
        foreach ($game->publishers as $comp) {
            echo "<p>publisher : $comp->name</p>";
        }
    }
}

/*function updateGenre()
{

}*/

    // TD3

function getLog(){
    $i = 0;
    foreach( DB::getQueryLog() as $q){
        echo "<p>$q[query]</p>";
        echo "<p>bindings : [</p>";
        $i++;
        foreach ($q['bindings'] as $b ) {
            echo "<p>$b</p>";
        }
    }
    echo "<p>Il y a $i requêtes</p>";
}


// TD4

function listCommUser() {
  $user = utilisateur::where('email', 'like', 'kohler.alicia@hotmail.com')
      ->with('comments')
      ->first();
        echo "<p>Commentaires de l'utilisateur nommé $user->nom $user->prenom (email : $user->email)</p>";
        foreach ($user->comments as $c){
            echo "<p>$c->datCrea</br>$c->titre</br>$c->contenu</br></p>";
        }
  getLog();
}


function listUser5() {
  $user = utilisateur::with('comments')->get();
    foreach($user as $u) {
      $count=count($u->comments);
      if($count>5) {
        echo "<p>$u->prenom $u->nom : nombre de commentaires = $count</p></br></br>";
      }
    }
  getLog();
}



 // --- Affichage ---

$app->get('/accueil[/]',
    function(Request $rq, Response $rs, $args) {
        $path = $rq->getURI()->getBasePath();
        $res = <<<END
<!doctype html>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Gamepedia</title>
</head>
<style>
body {
    margin : 20px;
}
a {
text-decoration: none;
font-size: 1.3em;
}
</style>
<body>
  <h2>Gamepedia : L'encyclopédie des G4M3R5</h2>
  <h3>Séance 1 :</h3>
  <a href="$path/mario">Liste des jeux Mario</a></br>
  <a href="$path/japon">Liste des compagnies situées au pays du soleil levant</a></br>
  <a href="$path/plateforme">Liste des plateformes avec plus 10 000 000 de ventes</a></br>
  <a href="$path/jeux">Liste de 442 jeux à partir du 21173 de la base de donéees</a></br>
  <a href="$path/listeJeux">Liste de tous les jeux</a></br>
  <h3>Séance 2 :</h3>
  <a href="$path/perso">Les personnages du jeu 12342</a></br>
  <a href="$path/persoM">Les personnages des jeux Mario</a></br>
  <a href="$path/devS">Liste des jeux développés par Sony</a></br>
  <a href="$path/ratM">Les ratings des jeux Mario</a></br>
  <a href="$path/persoM3">Listes jeux Mario avec plus de 3 personnages</a></br>
  <a href="$path/ratM33">Listes jeux Mario avec plus de 3 personnages avec un rating de plus 3</a></br>
  <a href="$path/ratM33I">Listes jeux Mario publié par une compagnie contenant Inc avec plus de 3 personnages avec un rating de plus 3</a></br>
  <a href="$path/ratM33IC">Listes jeux Mario publié par une compagnie contenant Inc avec plus de 3 personnages avec un rating de plus 3 par CERO</a>
  <h3>Séance 4 :</h3>
  <a href="$path/listCommentUser">Liste des commentaires postés par un utilisateur donné</a></br>
  <a href="$path/listUser5+">Liste des utilisateurs qui ont posté plus de 5 commentaires</a>
</body>
</html>
END;
    $rs->getBody()->write($res);
    return $rs;
    });

$app->get('/mario[/]',
    function(Request $rq, Response $rs, $args) {
        $res = "<h2>Liste des jeux Mario</h2>";
        getMario();
        $rs->getBody()->write($res);
        return $rs;
    });

$app->get('/japon[/]',
    function(Request $rq, Response $rs, $args) {
        $res = "<h2>Liste des compagnies japonaises</h2>";
        getJapon();
        $rs->getBody()->write($res);
        return $rs;
    });

$app->get('/plateforme[/]',
    function(Request $rq, Response $rs, $args) {
        $res = "<h2>Liste des plateformes qui dépassent les 10.000.000 de ventes</h2>";
        getPlatform();
        $rs->getBody()->write($res);
        return $rs;
    });

$app->get('/jeux[/]',
    function(Request $rq, Response $rs, $args) {
        $res = "<h2>Liste de 442 jeux à partir du 21173ème</h2>";
        getJeux();
        $rs->getBody()->write($res);
        return $rs;
    });

$app->get('/listeJeux[/]',
    function(Request $rq, Response $rs, $args) {
        $res = "<h2>Liste de tous les jeux</h2>";
        getListeJeux();
        $rs->getBody()->write($res);
        return $rs;
    });

$app->get('/perso[/]',
    function(Request $rq, Response $rs, $args) {
        $res = "<h2>Les personnages du jeu 12342</h2>";
        getPersoId();
        $rs->getBody()->write($res);
        return $rs;
    });

$app->get('/persoM[/]',
    function(Request $rq, Response $rs, $args) {
        $res = "<h2>Les personnages des jeux Mario</h2>";
        getPersoMario();
        $rs->getBody()->write($res);
        return $rs;
    });

$app->get('/devS[/]',
    function(Request $rq, Response $rs, $args) {
        $res = "<h2>Liste des jeux développés par Sony</h2>";
        getJeuxSony();
        $rs->getBody()->write($res);
        return $rs;
    });

$app->get('/ratM[/]',
    function(Request $rq, Response $rs, $args) {
        $res = "<h2>Les ratings des jeux Mario</h2>";
        getRatingMario();
        $rs->getBody()->write($res);
        return $rs;
    });

$app->get('/persoM3[/]',
    function(Request $rq, Response $rs, $args) {
        $res = "<h2>Listes jeux Mario avec plus de 3 personnages</h2>";
        getTroisPersoMario();
        $rs->getBody()->write($res);
        return $rs;
    });

$app->get('/ratM33[/]',
    function(Request $rq, Response $rs, $args) {
        $res = "<h2>Listes jeux Mario avec plus de 3 personnages avec un rating de plus 3</h2>";
        getRatingMarioTroisPlus();
        $rs->getBody()->write($res);
        return $rs;
    });

$app->get('/ratM33I[/]',
    function(Request $rq, Response $rs, $args) {
        $res = "<h2>Listes jeux Mario publié par une compagnie contenant Inc avec plus de 3 personnages avec un rating de plus 3</h2>";
        getRatingMarioIncTroisPlus();
        $rs->getBody()->write($res);
        return $rs;
    });

$app->get('/ratM33IC[/]',
    function(Request $rq, Response $rs, $args) {
        $res = "<h2>Listes jeux Mario publié par une compagnie contenant Inc avec plus de 3 personnages avec un rating de plus 3 par CERO</h2>";
        getRatingMarioIncTroisPlusCero();
        $rs->getBody()->write($res);
        return $rs;
    });

//Lance le script qui remplit les table commentaires et utilisateurs - NE PAS LANCER SANS AVOIR VIDE LES TABLES UTILISATEUR ET COMENTAIRES
$app->get('/insertion[/]',
    function(Request $rq, Response $rs, $args) {
      $fake = new fake;
      $res= "<h2>INSERTION</h2>";
      $fake-> user();
      $fake-> comment();
      $rs->getBody()->write($res);
      return $rs;
    });

$app->get('/listCommentUser[/]',
  function(Request $rq, Response $rs, $args) {
    $res= "<h2>liste des commentaires publiés par un utilisateur donné</h2>";
    listCommUser();
    $rs->getBody()->write($res);
    return $rs;
  });

  $app->get('/listUser5+[/]',
    function(Request $rq, Response $rs, $args) {
      $res= "<h2>liste des utilisateurs qui ont posté plus de 5 commentaires</h2>";
      listUser5();
      $rs->getBody()->write($res);
      return $rs;
    });

$app->run();
