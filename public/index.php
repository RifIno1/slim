<?php
require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

// Create Slim App
$app = AppFactory::create();

// Set up Twig
$twig = Twig::create(__DIR__ . '/../templates', ['cache' => false]);

// Add Twig Middleware
$twigMiddleware = TwigMiddleware::create($app, $twig);
$app->add($twigMiddleware);

// Define Route for Home
$app->get('/', function ($request, $response, $args) use ($twig) {
    // Render Twig template
    return $twig->render($response, 'home.twig', [
        'title' => 'Home Page',
        'message' => 'Welcome to Slim Framework with Twig and Bootstrap!'
    ]);
});

// Run the app
$app->run();
