<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "managers_call_arxive".
 *
 * @property int $id
 * @property int $manager_id
 * @property int $count
 * @property int $date
 *
 * @property Managers $manager
 */
class ManagersCallArxive extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'managers_call_arxive';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manager_id', 'count', 'date'], 'integer'],
            [['count'], 'required'],
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
            'manager_id' => 'Manager ID',
            'count' => 'Count',
            'date' => 'Date',
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
