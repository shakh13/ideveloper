<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_notification".
 *
 * @property int $id
 * @property int $project_id
 * @property int $freelancer_id
 * @property string $created_at
 *
 * @property Project $project
 * @property User $freelancer
 */
class ProjectNotification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'freelancer_id'], 'required'],
            [['project_id', 'freelancer_id'], 'integer'],
            [['created_at'], 'safe'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['freelancer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['freelancer_id' => 'id']],
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
            'freelancer_id' => 'Freelancer ID',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFreelancer()
    {
        return $this->hasOne(User::className(), ['id' => 'freelancer_id']);
    }
}
