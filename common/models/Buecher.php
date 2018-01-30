<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "buecher".
 *
 * @property integer $buecher_id
 * @property integer $ort_id
 * @property integer $user_id
 * @property integer $isbn
 * @property string $titel
 * @property string $beschreibung
 *
 * @property AusleiheBuch[] $ausleiheBuches
 * @property Bilder[] $bilders
 * @property Buchautor[] $buchautors
 * @property Ort $ort
 * @property User $user
 */
class Buecher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buecher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titel', 'isbn'], 'required'],
            // [['ort_id', 'user_id', 'isbn'], 'required'],
            [['ort_id', 'user_id', 'isbn', 'ausleihe_id', 'seitenzahl'], 'integer'],
            [['titel'], 'string', 'max' => 45],
            [['kategorie'], 'string', 'max' => 90],
            [['beschreibung'], 'string', 'max' => 255],
            [['imageFile'], 'string', 'max' => 255],
            [['autor'], 'string', 'max' => 255],
            [['ort_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ort::className(), 'targetAttribute' => ['ort_id' => 'ort_id']],
            // [['ausleihe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ausleihen::className(), 'targetAttribute' => ['ausleihe_id' => 'ausleihen_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'buecher_id' => Yii::t('app', 'Buecher ID'),
            'ort_id' => Yii::t('app', 'Ort ID'),
            'ausleihe_id' => Yii::t('app', 'Ausleihe ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'isbn' => Yii::t('app', 'Isbn'),
            'titel' => Yii::t('app', 'Titel'),
            'beschreibung' => Yii::t('app', 'Beschreibung'),
            'autor' => Yii::t('app', 'Autor'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAusleiheBuches()
    {
        return $this->hasMany(AusleiheBuch::className(), ['buecher_id' => 'buecher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBilders()
    {
        return $this->hasMany(Bilder::className(), ['buecher_id' => 'buecher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuchautors()
    {
        return $this->hasMany(Buchautor::className(), ['buecher_id' => 'buecher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrt()
    {
        return $this->hasOne(Ort::className(), ['ort_id' => 'ort_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
