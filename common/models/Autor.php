<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "autor".
 *
 * @property integer $autor_id
 * @property string $vorname
 * @property string $nachname
 * @property integer $user_id
 *
 * @property User $user
 * @property Buchautor[] $buchautors
 */
class Autor extends \yii\db\ActiveRecord
{
    // public $user_id = 3;
    // public function init() {
    //     $this->user_id = Yii::app()->user->getId();
    // }

    public function init()
    {
        parent::init();
        // ... initialization after configuration is applied
        $this->user_id = \Yii::$app->user->identity->id;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'autor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vorname', 'nachname'], 'required'],
            [['user_id'], 'integer'],
            [['vorname', 'nachname'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'autor_id' => Yii::t('app', 'Autor ID'),
            'vorname' => Yii::t('app', 'Vorname'),
            'nachname' => Yii::t('app', 'Nachname'),
            'user_id' => Yii::t('app', 'User ID'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getBuchautors()
    {
        return $this->hasMany(Buchautor::className(), ['autor_id' => 'autor_id']);
    }
}
