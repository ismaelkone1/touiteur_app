<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/../src/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule;

// Add the database connection to the Capsule
$capsule->addConnection(require __DIR__ . '/../src/conf/db.php');

// Make the Capsule instance available globally
$capsule->setAsGlobal();

// Set up the Eloquent ORM
$capsule->bootEloquent();

/* application boostrap */
$app = (require_once __DIR__ . '/../src/conf/bootstrap.php');

/* routes loading */
(require_once __DIR__ . '/../src/conf/routes.php')($app);


$app->run();