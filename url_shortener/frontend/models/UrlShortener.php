<?php
/**
 *  Class UrlShortenerController
 *  @author: Lezhnev (lezhnevod@gmail.com)
 *
 */
namespace frontend\models;

use Yii;
use common\models\User;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "url_shortener".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $long_url
 * @property string $short_url
 * @property string $publish_date
 *
 * @property User $user
 */
class UrlShortener extends ActiveRecord
{


    public function behaviors() {
        return [
            // TimestampBehavior
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['publish_date']
                ],
                'value' => function () { return date('Y-m-d'); },
            ],
            // TimestampBehavior
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['user_id']
                ],
                'value' => function () { return yii::$app->user->id; },
            ],

        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'url_shortener';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['long_url'], 'url'],
            [['long_url','short_url'], 'unique'],
            [['long_url'], 'required'],
            ['short_url', 'match', 'pattern' => '/^['.Yii::$app->params['urlShortener']['allowed_chars'].']\w*$/i'],
            [[ 'short_url'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'long_url' => 'Long Url',
            'short_url' => 'Short Url',
            'count_activations' => 'Activations',
            'publish_date' => 'Publish Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return boolean
     *
     * delete Old Url
     */
    public function deleteOldUrl()
    {
        $expireDate = Yii::$app->params['urlShortener']['expireDate'];
        $customer = UrlShortener::deleteAll('publish_date < DATE_SUB(NOW(), INTERVAL :expireTime DAY)', [':expireTime' => $expireDate]);
        return $customer;

    }
}
