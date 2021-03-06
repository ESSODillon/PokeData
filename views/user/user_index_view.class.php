<?php
/**
 * Author: Kameron Someson
 * Date: 4/30/2021
 * File: user_index_view.class.php
 * Description:
 */

class UserIndexView extends IndexView{
    public static function displayHeader($page_title)
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }





//if the user has logged in, retrieve login, name, and role.
        if (isset($_SESSION['login']) AND isset($_SESSION['name']) AND isset($_SESSION['role'])) {
            $login = $_SESSION['login'];
            $name = $_SESSION['name'];
            $role = $_SESSION['role'];


        }

        parent::displayHeader($page_title); // TODO: Change the autogenerated stub
        ?>
        <div id="displayName">
            <?= "Welcome " , $name, "!"; ?>
        </div>
        <?php

    }




    public static function displayFooter()
    {
        parent::displayFooter(); // TODO: Change the autogenerated stub
    }




}