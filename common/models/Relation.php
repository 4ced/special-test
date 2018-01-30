<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "relation".
 *
 * @property integer $relation_id
 * @property integer $user_id_big
 * @property integer $user_id
 * @property integer $user_id_action
 * @property integer $status
 *
 * @property User $user
 * @property User $userIdBig
 * @property User $userIdAction
 */
class Relation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id_big', 'user_id', 'user_id_action', 'status'], 'required'],
            [['user_id_big', 'user_id', 'user_id_action', 'status'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['user_id_big'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id_big' => 'id']],
            [['user_id_action'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id_action' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'relation_id' => Yii::t('app', 'Relation ID'),
            'user_id_big' => Yii::t('app', 'User Id Big'),
            'user_id' => Yii::t('app', 'User ID'),
            'user_id_action' => Yii::t('app', 'User Id Action'),
            'status' => Yii::t('app', 'Status'),
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
    public function getUserIdBig()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id_big']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIdAction()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id_action']);
    }
}
