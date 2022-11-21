<?php

namespace Responder\Tests\Database\Model;

use Responder\Database\Driver\DatabaseDriver;

class CreateModelTest extends ModelTestCase
{
    protected DatabaseDriver $driver;
    
    public function test_create_model()
    {
        TestModel::create(['name' => 'original-name-1', 'surname' => 'original-surname-1']);
        $model = TestModel::first();
        
        $this->assertEquals('original-name-1', $model->name);
        $this->assertEquals('original-surname-1', $model->surname);
        $this->assertNotEquals(null, $model->created_at);
    }
}
