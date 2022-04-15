<?php

namespace frontend\models;

use app\models\BalanceHistory;
use app\models\Organization;
use yii\base\Model;

class DecreaseBalance extends Model
{
    /**
     * @var Organization
     */
    public $organization;
    /**
     * @var $amount;
     */
    public $amount;
    /**
     * @var $descrtiption
     */
    public $description;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['amount', 'description'], 'required'],
            [['amount'], 'number', 'min' => 0.01],
            [['description'], 'string'],
        ];
    }

    /**
     * @brief Decrease balance
     * @return bool
     */
    public function decreaseBalance()
    {
        if ($this->validate()) {

            if ($this->checkSum($this->organization->id)){
                $history = new BalanceHistory();
                $history->organization_id = $this->organization->id;
                $history->amount = $this->amount * -1;
                $history->description = $this->description;
                $history->created_at = time();
                $history->save();

                return $history->save();
            }

        }

        return false;
    }

    /**
     * @brief Сумма баланса организации до уменьшения
     * @return bool
     */
    public function checkSum($id)
    {
        $amount_sum_organization = BalanceHistory::find()
            ->select(['amount' => 'SUM(amount)'])
            ->where(['organization_id' => $id])
            ->all();

        $general = $amount_sum_organization[0]->amount - $this->amount;

        if ($general < 0) {
            return false;
        }

        return true;
    }
}