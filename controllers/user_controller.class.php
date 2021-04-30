<?php
/**
 * Author: Kameron Someson
 * Date: 4/30/2021
 * File: user_controller.class.php
 * Description:
 */

class UserController
{


    private $user_model;

    public function __construct()
    {
        $this->user_model = UserModel::getUserModel();

    }

    public function registerForm(){

        $view = new RegisterUser();
        $view->display();


    }

    public function add(){
        $user = $this->user_model->register_user();

        $added = new ConfirmUserRegister();
        $added->display($user);



    }
    public function login(){

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);



        $user = $this->user_model->login_customer($username, $password);



        $login = new ConfirmUserLogin();
        $login->display($user);


    }
    public function logout(){

        $user = $this->user_model->logout_user();
        $logout = new ConfirmUserLogout();
        $logout->display($user);


    }




}