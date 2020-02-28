<?php

namespace nextvikas\authenticator\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use nextvikas\authenticator\components\Authenticator;
use common\models\User;
/**
 * Default controller for the `authenticator` module
 */
class DefaultController extends Controller
{


	public $layout = 'authenticator';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
		return $this->render('index');
    }
    public function actionScan()
    {
		$Authenticator = new Authenticator();

		if(Yii::$app->request->isPost) {

			$checkResult = $Authenticator->verifyCode(Yii::$app->session->get('auth_secret'), Yii::$app->request->post('code'), 2);

			if (!$checkResult) {
			    Yii::$app->session->setFlash('error', "Invalid Google Authenticator Code");
			    return $this->redirect(['/authenticator/default/scan']);
			} else {

				$user = User::findOne(Yii::$app->user->identity->id);
				$user->authenticator = Yii::$app->session->get('auth_secret');
				$user->save(false);

				Yii::$app->session->set('varify_next_authenticator',true);
				return $this->redirect(['/']);
			}
		}


		if (!Yii::$app->session->has('auth_secret')) {
		    $secret = $Authenticator->generateRandomSecret();
		    Yii::$app->session->set('auth_secret', $secret);
		}
		$qrCodeUrl = $Authenticator->getQR('Nextvikas ('.Yii::$app->user->identity->email.')', Yii::$app->session->get('auth_secret'));

        return $this->render('scan', ['qrCodeUrl' => $qrCodeUrl]);
    }
    public function actionCheck()
    {
		$Authenticator = new Authenticator();

		if(Yii::$app->request->isPost) {
			$checkResult = $Authenticator->verifyCode(Yii::$app->user->identity->authenticator, Yii::$app->request->post('code'), 2);

			if (!$checkResult) {
			    Yii::$app->session->setFlash('error', "Invalid Google Authenticator Code");
			    return $this->redirect(['/authenticator']);
			} else {
				Yii::$app->session->set('varify_next_authenticator',true);
				return $this->redirect(['/']);
			}
		}
		return $this->redirect(['/authenticator']);
    }
}
