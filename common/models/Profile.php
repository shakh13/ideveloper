<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $address
 * @property int $city_id
 * @property int $postcode
 * @property string $alias
 * @property int $role
 * @property int $phone
 * @property int $category_id
 * @property string $about
 *
 * @property User $user
 * @property City $city
 * @property Category $category
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'firstname', 'lastname', 'address', 'postcode', 'alias', 'phone'], 'required'],
            [['user_id', 'city_id', 'postcode', 'role', 'phone', 'category_id'], 'integer'],
            [['about'], 'string'],
            [['firstname', 'lastname'], 'string', 'max' => 15],
            [['address'], 'string', 'max' => 128],
            [['alias'], 'string', 'max' => 13],
            [['alias'], 'unique'],
            [['phone'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'address' => 'Address',
            'city_id' => 'City ID',
            'postcode' => 'Postcode',
            'alias' => 'Alias',
            'role' => 'Role', // 0->admin, 1->freelancer, 2->user
            'phone' => 'Phone',
            'category_id' => 'Category ID',
            'about' => 'About',
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
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
