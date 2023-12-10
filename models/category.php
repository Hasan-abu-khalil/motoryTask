<?php
namespace app\models;

use yii\db\ActiveRecord;  

class Category extends ActiveRecord  
{
    public function rules()
    {
        return [
            [['title','subtitle'], 'required']
        ];
    }
}
