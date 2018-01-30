<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ort".
 *
 * @property integer $ort_id
 * @property integer $user_id
 * @property string $name
 *
 * @property Buecher[] $buechers
 * @property User $user
 */
class Ort extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ort';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['ort_id', 'user_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ort_id' => Yii::t('app', 'Ort ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuechers()
    {
        return $this->hasMany(Buecher::className(), ['ort_id' => 'ort_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
