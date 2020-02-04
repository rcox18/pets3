<?php
session_start();
/**
 * URL: http://rcox.greenriverdev.com/IT328/pets3
 * Authors: Robert Cox
 * Version: 1.0
 * Date: 1/31/20
 *
 **/
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("vendor/autoload.php");
require_once('model/validation-functions.php');

$fff = Base::instance();

$fff->set('colors', array('pink', 'green', 'blue'));

$fff->route("GET /", function () {
    $view = new Template();
    echo $view->render("views/home.html");
});

$fff->route("GET|POST /order", function ($fff) {
    $_SESSION = array();
    $fff->clear("errors['animal']");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $animal = $_POST['animal'];
        $fff->set("animal", $animal);

        if (validString($animal)) {
            $_SESSION['animal'] = $animal;
            $fff->reroute('/order2');
        } else {
            $fff->set("errors['animal']", "Please enter an animal.");}
    }

    $view = new Template();
    echo $view->render("views/form1.html");
});

$fff->route("GET|POST /order2", function ($fff) {
    $fff->clear("errors['color']");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $color = $_POST['color'];
        $fff->set("color", $color);

        if (validColor($color)) {
            $_SESSION['color'] = $color;
            $fff->reroute('/results');
        } else {
            $fff->set("errors['color']", "Please choose a color.");}
    }
    $view = new Template();
    echo $view->render("views/form2.html");
});

$fff->route("GET|POST /results", function () {
    $view = new Template();
    echo $view->render("views/results.html");
});


$fff->route("GET /@item", function ($fff, $params) {
    $item = $params["item"];
    switch ($item) {
        case "chicken" :
            echo "<h1>Cluck!</h1>";
            break;
        case "dog" :
            echo "<h1>Woof!</h1>";
            break;
        case "horse" :
            echo "<h1>Neigh!</h1>";
            break;
        case "cow" :
            echo "<h1>Moo!</h1>";
            break;
        case "sheep" :
            echo "<h1>Baa!</h1>";
            break;
        default : $fff->error404("animal not found");
    }
});
$fff->run();
?>



