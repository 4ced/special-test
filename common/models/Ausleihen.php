<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ausleihen".
 *
 * @property integer $ausleihen_id
 * @property integer $user_id
 * @property integer $ausleiher
 *
 * @property AusleiheBuch[] $ausleiheBuches
 * @property User $user
 * @property User $ausleiher0
 */
class Ausleihen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ausleihen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ausleiher'], 'required'],
            // [['user_id', 'ausleiher'], 'required'],
            [['user_id', 'ausleiher', 'status'], 'integer'],
            [['leihbeginn', 'leihende'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['ausleiher'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['ausleiher' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ausleihen_id' => Yii::t('app', 'Ausleihen ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'buch_id' => Yii::t('app', 'Buch ID'),
            'ausleiher' => Yii::t('app', 'Ausleiher'),
            'leihbeginn' => Yii::t('app', 'Leihbeginn'),
            'leihende' => Yii::t('app', 'Leihende'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAusleiheBuches()
    {
        return $this->hasMany(AusleiheBuch::className(), ['ausleihen_ausleihen_id' => 'ausleihen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAusleiher0()
    {
        return $this->hasOne(User::className(), ['id' => 'ausleiher']);
    }
}
