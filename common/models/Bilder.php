<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bilder".
 *
 * @property integer $bilder_id
 * @property integer $user_id
 * @property integer $buecher_buecher_id
 * @property string $Dateiname
 *
 * @property Buecher $buecherBuecher
 * @property User $user
 */
class Bilder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bilder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'buecher_buecher_id', 'Dateiname'], 'required'],
            [['user_id', 'buecher_buecher_id'], 'integer'],
            [['Dateiname'], 'string', 'max' => 45],
            [['buecher_buecher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Buecher::className(), 'targetAttribute' => ['buecher_buecher_id' => 'buecher_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bilder_id' => Yii::t('app', 'Bilder ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'buecher_buecher_id' => Yii::t('app', 'Buecher Buecher ID'),
            'Dateiname' => Yii::t('app', 'Dateiname'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuecherBuecher()
    {
        return $this->hasOne(Buecher::className(), ['buecher_id' => 'buecher_buecher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
