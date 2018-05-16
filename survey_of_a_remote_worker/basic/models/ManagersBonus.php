<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "managers_bonus".
 *
 * @property int $id
 * @property string $name
 * @property int $max
 */
class ManagersBonus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'managers_bonus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['max'], 'required'],
            [['max'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'max' => 'Max',
        ];
    }
}
