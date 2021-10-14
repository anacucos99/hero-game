<?php

require('Output.php');
require('Gameplay.php');

$output = new Output();
$gameplay = new Gameplay($output);

$gameplay->play();
