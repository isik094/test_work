<?php

namespace frontend\controllers;

use frontend\models\AddBalance;
use frontend\models\DecreaseBalance;
use Yii;
use app\models\Organization;
use yii\web\NotFoundHttpException;
use yii\web\Controller;

class BalanceController extends Controller
{
    public function actionIndex($id)
    {
        $organization = Organization::findOne($id);
        return $this->render('index', [
            'organization' => $organization,
        ]);
    }

    /**
     * @brief Добавлять баланс организации
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionAdd($id)
    {
        $model = new AddBalance();
        $model->organization = $this->findOrganization($id);

        if ($model->load($this->request->post()) && $model->addBalance()) {
            Yii::$app->session->setFlash('success', 'Успешно увеличен баланс.');
            return $this->redirect(['balance/index', 'id' => $id]);
        }

        return $this->render('add', [
            'model' => $model
        ]);
    }

    /**
     * @brief Убавлять баланс организации
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionDecrease($id)
    {
        $model = new DecreaseBalance();
        $model->organization = $this->findOrganization($id);

        if ($model->load($this->request->post()) && $model->decreaseBalance()) {
            Yii::$app->session->setFlash('success', 'Успешно уменьшин баланс.');
            return $this->redirect(['balance/index', 'id' => $id]);
        }

        return $this->render('decrease', [
            'model' => $model
        ]);
    }

    /**
     * Finds the Organization model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Organization the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findOrganization($id)
    {
        if (($model = Organization::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
