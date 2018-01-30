<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profilbilder".
 *
 * @property integer $profilbilder_id
 * @property integer $user_id
 * @property string $dateiname
 *
 * @property User $user
 */
class Profilbilder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profilbilder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'dateiname'], 'required'],
            [['user_id'], 'integer'],
            [['dateiname'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'profilbilder_id' => Yii::t('app', 'Profilbilder ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'dateiname' => Yii::t('app', 'Dateiname'),
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
