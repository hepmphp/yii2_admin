<?php

namespace app_templdate;

use Yii;

class Model extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%[table]}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [rule]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           [field_comment]
        ];
    }

    //config_str
}
