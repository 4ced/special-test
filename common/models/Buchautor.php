<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "buchautor".
 *
 * @property integer $buchautor_id
 * @property integer $user_id
 * @property integer $autor_id
 * @property integer $buecher_id
 *
 * @property Autor $autor
 * @property Buecher $buecher
 * @property User $user
 */
class Buchautor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buchautor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'autor_id', 'buecher_id'], 'required'],
            [['user_id', 'autor_id', 'buecher_id'], 'integer'],
            [['autor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::className(), 'targetAttribute' => ['autor_id' => 'autor_id']],
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
            'buchautor_id' => Yii::t('app', 'Buchautor ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'autor_id' => Yii::t('app', 'Autor ID'),
            'buecher_id' => Yii::t('app', 'Buecher ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutor()
    {
        return $this->hasOne(Autor::className(), ['autor_id' => 'autor_id']);
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
