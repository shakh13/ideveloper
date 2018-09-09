<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hire_freelancer".
 *
 * @property int $id
 * @property int $project_id
 * @property int $freelancer_id
 * @property string $content
 * @property string $created_at
 *
 * @property Project $project
 * @property User $freelancer
 */
class HireFreelancer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hire_freelancer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'freelancer_id', 'content'], 'required'],
            [['project_id', 'freelancer_id'], 'integer'],
            [['content'], 'string'],
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
            'content' => 'Content',
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
