<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_files".
 *
 * @property int $id
 * @property int $project_id
 * @property string $title
 * @property string $file
 * @property string $created_at
 *
 * @property Project $project
 */
class ProjectFiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'title', 'file'], 'required'],
            [['project_id'], 'integer'],
            [['created_at'], 'safe'],
            [['title', 'file'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'file' => 'File',
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
