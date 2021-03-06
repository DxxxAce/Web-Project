<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\RecoverForm;
use app\models\User;

class AuthController extends Controller
{
    public function login(Request $request,Response $response)
    {
        $loginForm = new LoginForm();
        if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login())
            {
                $response->redirect("/Web-Project/Web/php/public/index.php");

                return;
            }
        }
        $this->setLayout('auth');

        return $this->render('login',[
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        if($request->isPost()){
            $user->loadData($request->getBody());

            if($user->validate() && $user->save()){
                Application::$app->session->setFlash("success","Thanks for registering");
               Application::$app->response->redirect('/Web-Project/Web/php/public/index.php');
               exit;
            }

           return $this->render('register',[
               'model' => $user
           ]);
        }
        $this->setLayout('auth');
        return $this->render('register',[
            'model' => $user
        ]);
    }
    public function recover(Request $request,Response $response){
        $recover = new RecoverForm();
        if($request->isPost()){
            $recover->loadData($request->getBody());
            if($recover->validate()){
                Application::$app->recover();
                $response->redirect("/Web-Project/Web/php/public/index.php");
                return;
            }


            return $this->render('recover',[
                'model' => $recover
            ]);
        }
    }
    public function logout(Request $request,Response $response)
    {
        Application::$app->logout();
        $response->redirect("/Web-Project/Web/php/public/index.php");
    }
}
