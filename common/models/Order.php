<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $freelancer_id
 * @property int $project_id
 * @property int $rating
 * @property string $created_at
 *
 * @property User $freelancer
 * @property Project $project
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['freelancer_id', 'project_id'], 'required'],
            [['freelancer_id', 'project_id'], 'integer'],
            [['created_at'], 'safe'],
            [['rating'], 'string', 'max' => 4],
            [['freelancer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['freelancer_id' => 'id']],
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
            'freelancer_id' => 'Freelancer ID',
            'project_id' => 'Project ID',
            'rating' => 'Rating', // 0..10. Freelancer rating from here
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFreelancer()
    {
        return $this->hasOne(User::className(), ['id' => 'freelancer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }
}
