<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "managers".
 *
 * @property int $id
 * @property string $first_name
 * @property string $second_name
 * @property string $salary
 *
 * @property ManagersCall[] $managersCalls
 * @property ManagersCallArxive[] $managersCallArxives
 */
class Managers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'managers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'second_name', 'salary'], 'required'],
            [['salary'], 'number'],
            [['first_name', 'second_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'second_name' => 'Second Name',
            'salary' => 'Salary',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManagersCalls()
    {
        return $this->hasMany(ManagersCall::className(), ['manager_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManagersCallArxives()
    {
        return $this->hasMany(ManagersCallArxive::className(), ['manager_id' => 'id']);
    }
}
