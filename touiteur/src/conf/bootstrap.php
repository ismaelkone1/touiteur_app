<?php

use Slim\Factory\AppFactory;
use touiteur\app\services\utils\Eloquent;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, false);

//Eloquent::init(__DIR__ . '/db.ini');

$twig = Twig::create(__DIR__ . '/../templates/');
$app->add(TwigMiddleware::create($app, $twig));
$twig->getEnvironment()->addGlobal('basePath', $app->getBasePath());

return $app;