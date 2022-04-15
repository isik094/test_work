<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $country
 * @property string $city
 * @property string $ogrn
 * @property string $inn
 * @property int $status
 * @property int $created_at
 *
 * @property BalanceHistory $balanceHistory
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @var float
     */
    public $balance;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'country', 'city', 'ogrn', 'inn', 'created_at'], 'required'],
            [['status', 'created_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 60],
            [['country', 'city', 'ogrn', 'inn'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['ogrn'], 'unique'],
            [['inn'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'country' => 'Country',
            'city' => 'City',
            'ogrn' => 'Ogrn',
            'inn' => 'Inn',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[BalanceHistory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBalanceHistory()
    {
        return $this->hasOne(BalanceHistory::className(), ['organization_id' => 'id']);
    }
}
