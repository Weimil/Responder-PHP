<?php

require __DIR__ . "/../vendor/autoload.php";

$application = application();

$application->boot(__DIR__ . '/..');

$application->run();

