<?php

$application = application();

$application->bootstrap(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__ . '/../..')
);

return $application;