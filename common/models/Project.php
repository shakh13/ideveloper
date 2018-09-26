<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property int $price
 * @property string $currency
 * @property string $tz
 * @property int $category_id
 * @property int $deadline
 * @property int $status
 * @property int $freelancer_id
 * @property int $done
 * @property string $hired_date
 * @property int $pay
 * @property string $created_at
 *
 * @property Comment[] $comments
 * @property HireFreelancer[] $hireFreelancers
 * @property Order[] $orders
 * @property Paid[] $paids
 * @property Category $category
 * @property User $freelancer
 * @property User $user
 * @property ProjectFiles[] $projectFiles
 * @property ProjectNotification[] $projectNotifications
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'description', 'content', 'tz', 'pay'], 'required'],
            [['user_id', 'price', 'category_id', 'freelancer_id', 'pay'], 'integer'],
            [['content'], 'string'],
            [['hired_date', 'created_at'], 'safe'],
            [['title'], 'string', 'max' => 128],
            [['description', 'tz'], 'string', 'max' => 255],
            [['currency'], 'string', 'max' => 3],
            [['deadline', 'status', 'done'], 'string', 'max' => 4],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['freelancer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['freelancer_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'price' => 'Price',
            'currency' => 'Currency',
            'tz' => 'Tz',
            'category_id' => 'Category ID',
            'deadline' => 'Deadline', // In days
            'status' => 'Status', // 0->waiting, 1->paid, 2->hired, 3->finished, 4->success, 5->aborted
            'freelancer_id' => 'Freelancer ID',
            'done' => 'Done', // Shown in percents
            'hired_date' => 'Hired Date',
            'pay' => 'Pay', // Percent to pay
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHireFreelancers()
    {
        return $this->hasMany(HireFreelancer::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaids()
    {
        return $this->hasMany(Paid::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectFiles()
    {
        return $this->hasMany(ProjectFiles::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectNotifications()
    {
        return $this->hasMany(ProjectNotification::className(), ['project_id' => 'id']);
    }
}