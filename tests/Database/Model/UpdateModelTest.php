<?php

namespace Responder\Tests\Database\Model;

use Responder\Database\Driver\DatabaseDriver;

class UpdateModelTest extends ModelTestCase
{
    protected DatabaseDriver $driver;
    
    public function test_update_model()
    {
        TestModel::create(['name' => 'original-name-1', 'surname' => 'original-surname-1']);
        $model = TestModel::first();
    
        $this->assertEquals('original-name-1', $model->name);
        $this->assertEquals('original-surname-1', $model->surname);
        $this->assertEquals(null, $model->updated_at);
    
        $model->name = 'updated-name-1';
        $model->surname = 'updated-surname-1';
        
        $model->update();
        
        $model = TestModel::first();
    
        $this->assertEquals('updated-name-1', $model->name);
        $this->assertEquals('updated-surname-1', $model->surname);
        $this->assertNotEquals(null, $model->updated_at);
    }
}