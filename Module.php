<?php

namespace nextvikas\authenticator;
use Yii;
/**
 * authenticator module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */

    public $twoStepVerification = false;

    public $controllerNamespace = 'nextvikas\authenticator\controllers';


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        if($this->twoStepVerification && !Yii::$app->user->isGuest && Yii::$app->user->identity->authenticator) {

            $pagename = '';
            $getpage = parse_url($_SERVER['REQUEST_URI']);
            if(isset($getpage['query'])) {
                parse_str($getpage['query'], $array); 
                $pagename = (isset($array['r']))?$array['r']:'';
            }
            if($pagename == "") {
                $narray = explode("/", $_SERVER['REQUEST_URI']);
                $pagename = end($narray);
            }
            
            if(!Yii::$app->session->get('varify_next_authenticator')) {
                if($pagename != 'authenticator')
                    return Yii::$app->response->redirect(['/authenticator']);
            }
        }

    }
}
