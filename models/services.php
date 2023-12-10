<?php
namespace app\models;

use yii\db\ActiveRecord;

class Services extends ActiveRecord
{
    public function rules()
    {
        return [
            [['title', 'price', 'security', 'category_id',], 'required']
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}
