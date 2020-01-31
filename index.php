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
$fff = Base::instance();
$fff->route("GET /", function () {
    /*$view = new Template();
    echo $view->render("views/home.html");*/

    echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>Document</title>
</head>
<body>
<h1>My Pets</h1>
<a href=\"order\">Order a Pet</a>
</body>
</html>";
});

$fff->route("GET /order", function () {
    $view = new Template();
    echo $view->render("views/form1.html");
});

$fff->route("POST /order2", function () {
    $_SESSION["animal"] = $_POST["animal"];
    $view = new Template();
    echo $view->render("views/form2.html");
});

$fff->route("POST /results", function () {
    $_SESSION["color"] = $_POST["color"];
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



