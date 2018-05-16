<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "managers_call".
 *
 * @property int $id
 * @property int $date
 * @property int $manager_id
 *
 * @property Managers $manager
 */
class ManagersCall extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'managers_call';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'required'],
            [['date', 'manager_id'], 'integer'],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => Managers::className(), 'targetAttribute' => ['manager_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'manager_id' => 'Manager ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(Managers::className(), ['id' => 'manager_id']);
    }
}
