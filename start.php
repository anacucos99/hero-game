<?php

require('vendor/autoload.php');

$output = new Output();
$gameplay = new Gameplay($output);

$gameplay->play();
