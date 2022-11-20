<?php

namespace Responder\Tests\Database\Model;

use PHPUnit\Framework\TestCase;
use Responder\Database\Driver\DatabaseDriver;
use Responder\Database\Driver\PdoDriver;
use Responder\Database\Model;

class CreateModelTest extends TestCase
{
    protected DatabaseDriver $driver;
    
    public function test_create_model()
    {
        $this->setUpDB();
        
        $model = new TestModel();
        $model->name = 'test-name-1';
        $model->surname = 'test-surname-1';
        $model->save();
        
        $result = $this->driver->statement('SELECT * FROM models;');
        $expected = [
            'name' => 'test-name-1',
            'surname' => 'test-surname-1'
        ];
        
        $this->assertEquals($expected, $result[0]);
    }
    
    protected function setUpDB()
    {
        $this->driver = singleton(DatabaseDriver::class, PdoDriver::class);
        
        $this->driver->connect(
            'mysql',
            '127.0.0.1',
            33060,
            'testing',
            'weimil',
            'Aa1.1234',
        );
        
        $this->driver->statement('DROP TABLE IF EXISTS models');
        $this->driver->statement('CREATE TABLE models(name VARCHAR(256), surname VARCHAR(256))');
    }
}
