<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 'on');

// Include the autoloader
require_once './autoloader.php';


// Use necessary classes and traits
use Models\CharacterModel;
use Models\DevilFruitModel;
use Controllers\CharacterController;
use Controllers\DevilFruitController;

// Instantiate CharacterController with CharacterModel
$characterModel = new CharacterModel($db); // $db should be your database connection
$devilFruitModel = new DevilFruitModel($db);
$characterController = new CharacterController($characterModel);
$devilFruitController = new DevilFruitController($devilFruitModel);

// Routes Handler
require_once './config/routes.php';
