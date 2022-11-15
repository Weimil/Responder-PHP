<?php

function env(string $variable, $default = null)
{
    return $_ENV[$variable] ?? $default;
}
