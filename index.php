<?php
/**
 * Neural Network.
 * User: Piotr Budner
 * Date: 22.04.2018
 * Time: 20:51
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use \App\Application;

$app = new Application();
$app->run();

