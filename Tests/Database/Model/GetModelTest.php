<?php

namespace Responder\Tests\Database\Model;

class GetModelTest extends ModelTestCase
{
    public function test_get_model()
    {
        TestModel::create(['name' => 'original-name-1', 'surname' => 'original-surname-1']);
        $model = TestModel::first();
        $model = TestModel::wherePrimaryKey($model->id);
        
        $this->assertEquals('original-name-1', $model->name);
        $this->assertEquals('original-surname-1', $model->surname);
        $this->assertEquals(null, $model->updated_at);
    }
}
