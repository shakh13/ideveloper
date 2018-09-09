<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paid".
 *
 * @property int $id
 * @property int $project_id
 * @property int $amount
 * @property int $transaction_id
 * @property string $created_at
 *
 * @property Project $project
 */
class Paid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'amount', 'transaction_id'], 'integer'],
            [['amount', 'transaction_id'], 'required'],
            [['created_at'], 'safe'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'amount' => 'Amount',
            'transaction_id' => 'Transaction ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
}
