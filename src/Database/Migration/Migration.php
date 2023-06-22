<?php

namespace Responder\Database\Migration;

abstract class Migration
{
    protected string $connection = 'default';

    public abstract function create(): void;

    public abstract function update(): void;

    public abstract function delete(): void;
}
