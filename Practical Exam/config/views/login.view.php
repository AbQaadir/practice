<?php

declare(strict_types=1);

function displayError($errors) {
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
}

function checkErrors() {
    if(isset($_SESSION["errorsLogin"])){
        $errors = $_SESSION["errorsLogin"];
        displayError($errors);
    }
}