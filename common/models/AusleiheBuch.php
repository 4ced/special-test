<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ausleihe_buch".
 *
 * @property integer $ausleihebuch_id
 * @property integer $user_id
 * @property integer $ausleihen_ausleihen_id
 * @property integer $buecher_id
 * @property string $AusleiheBuchcol
 *
 * @property Ausleihen $ausleihenAusleihen
 * @property Buecher $buecher
 * @property User $user
 */
class AusleiheBuch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ausleihe_buch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ausleihen_ausleihen_id', 'buecher_id'], 'required'],
            [['user_id', 'ausleihen_ausleihen_id', 'buecher_id'], 'integer'],
            [['AusleiheBuchcol'], 'string', 'max' => 45],
            [['ausleihen_ausleihen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ausleihen::className(), 'targetAttribute' => ['ausleihen_ausleihen_id' => 'ausleihen_id']],
            [['buecher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Buecher::className(), 'targetAttribute' => ['buecher_id' => 'buecher_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ausleihebuch_id' => Yii::t('app', 'Ausleihebuch ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'ausleihen_ausleihen_id' => Yii::t('app', 'Ausleihen Ausleihen ID'),
            'buecher_id' => Yii::t('app', 'Buecher ID'),
            'AusleiheBuchcol' => Yii::t('app', 'Ausleihe Buchcol'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAusleihenAusleihen()
    {
        return $this->hasOne(Ausleihen::className(), ['ausleihen_id' => 'ausleihen_ausleihen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuecher()
    {
        return $this->hasOne(Buecher::className(), ['buecher_id' => 'buecher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
