<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ausleihe_einstellungen".
 *
 * @property integer $pk_Ausleihe_einstellungen
 * @property integer $user_id
 * @property integer $ausleiher
 *
 * @property User $user
 */
class AusleiheEinstellungen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ausleihe_einstellungen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pk_Ausleihe_einstellungen', 'user_id'], 'required'],
            [['pk_Ausleihe_einstellungen', 'user_id', 'ausleiher'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pk_Ausleihe_einstellungen' => Yii::t('app', 'Pk  Ausleihe Einstellungen'),
            'user_id' => Yii::t('app', 'User ID'),
            'ausleiher' => Yii::t('app', 'Ausleiher'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
