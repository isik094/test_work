<?php

namespace frontend\models;

use app\models\BalanceHistory;
use app\models\Organization;
use yii\base\Model;

class AddBalance extends Model
{
    /**
     * @var Organization
     */
    public $organization;
    /**
     * @var float
     */
    public $amount;
    /**
     * @var string
     */
    public $description;

    /**
     * @inheritDoc
     * @return array
     */
    public function rules()
    {
        return [
            [['amount', 'description'], 'required'],
//            [['amount'], 'number', 'min' => 0.01],
            [['description'], 'string'],
            [['amount'], 'myTestValidator'],
        ];
    }

    /**
     * @param string $attribute
     * @return void
     */
    public function myTestValidator($attribute)
    {
        if ($this->amount < 0) {
            $this->addError($attribute, 'Сумма не может быть меньше нуля');
        }
    }

    /**
     * @brief Add balance
     * @return bool
     */
    public function addBalance()
    {
        if ($this->validate()) {
            $history = new BalanceHistory();
            $history->organization_id = $this->organization->id;
            $history->amount = $this->amount;
            $history->description = $this->description;
            $history->created_at = time();
            $history->save();

            return $history->save();
        }

        return false;
    }
}