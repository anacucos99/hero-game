<?php

use src\Game\Gameplay;
use src\Game\Output;

require('vendor/autoload.php');

$output = new Output();
$gameplay = new Gameplay($output);

$gameplay->play();
