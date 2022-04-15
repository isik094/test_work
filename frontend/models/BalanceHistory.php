<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "balance_history".
 *
 * @property int $id
 * @property int $organization_id
 * @property float $amount
 * @property int $created_at
 * @property string $description
 *
 * @property Organization $organization
 */
class BalanceHistory extends \yii\db\ActiveRecord
{
    /**
     * @var mixed|null
     */
    private $description;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'balance_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['organization_id', 'amount', 'created_at', 'description'], 'required'],
            [['organization_id', 'created_at'], 'integer'],
            [['amount'], 'number'],
            [['description'], 'string'],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organization_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'organization_id' => 'Organization ID',
            'amount' => 'Amount',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Organization]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organization_id']);
    }
}
