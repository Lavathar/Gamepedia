<?php

namespace gamepedia;

require_once '../src/vendor/autoload.php';

use gamepedia\model\game;
use gamepedia\model\platform;
use gamepedia\model\company;
use gamepedia\bd\Eloquent;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

session_start();

Eloquent::start('../src/conf/conf.ini');

$c = new \Slim\Container(['settings'=>['displayErrorDetails' => true]]);
$app = new \Slim\App($c);

function getMario()
{
    $games = game::select('name', 'description')
        -> where('name','LIKE', '%Mario%')
        ->orderBy('name', 'asc')
        -> get();
    foreach ($games as $game){
        echo "<div style='border : 1px solid; margin : 5px'><h1>$game->name</h1> $game->description</div>";
    }
}

function getJapon()
{
    $companies = company::select('name', 'description')
        -> where('location_country','=','Japan')
        ->orderBy('name', 'asc')
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
    $games = game::select('name', 'deck')
        ->get();
}

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
  <a href="$path/mario">Liste des jeux Mario</a></br>
  <a href="$path/japon">Liste des compagnies situées au pays du soleil levant</a></br>
  <a href="$path/plateforme">Liste des plateformes avec plus 10 000 000 de ventes</a></br>
  <a href="$path/jeux">Liste de 442 jeux à partir du 21173 de la base de donéees</a>
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


$app->run();
