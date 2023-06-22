<?php

namespace Responder\Tests\Database\Model;

class DeleteModelTest extends ModelTestCase
{
    public function test_delete_model()
    {
        TestModel::create(['name' => 'original-name-1', 'surname' => 'original-surname-1']);
        $model = TestModel::first();
    
        $this->assertNotEquals(null, $model);
    
        $model->delete();
    
        $model = TestModel::first();
        
        $this->assertEquals(null, $model);
    }
}
