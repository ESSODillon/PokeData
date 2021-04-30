<?php
/**
 * Author: Kameron Someson
 * Date: 4/30/2021
 * File: register_user.class.php
 * Description:
 */

class RegisterUser extends UserIndexView {

    public function display(){

        parent::displayHeader("Register a User");

        $message = "Please enter your username and password to login.";

//check the login status
        $login_status = '';

        if (isset($_SESSION['login_status'])) {
            $login_status = $_SESSION['login_status'];
        }

        switch ($login_status) {
            case 1:  //the user's last login attempt succeeded
                echo "
<div class='loginMsgBox' style='display: flex; justify-content: center; align-items: center; flex-direction: column; height: 65% '>
<h3>You are logged in as <h3 style='color: #FF0000;'> " . $_SESSION['name'] . ". </h3></h3
</div>";
                ?>
                <a style="text-decoration: none;" href="<?= BASE_URL ?>/index.php/user/logout"> <button style='border-radius: 12px; background-color: #9d5919; padding: 15px 32px; color: wheat; font-size: 16px'>  Click to Logout.</button></a>
                <?php
                parent::displayFooter();
                exit();
            case 3:  //the user has just registered
                echo "<div id='loginMsgBox'> <h3>Thank you for registering with us. Your account has been created.</h3>
                    <a style='border-radius: 12px; background-color: #9d5919; padding: 15px 32px; color: wheat; font-size: 16px; text-decoration: none;' href='logout.php'>Log out</a><br /></div>";
                //echo "<a href='logout.php'>Log out</a><br />";

                exit();
            case 2:  //the user's last login attempt failed
                $message2 = "Username or password invalid. Please try again.";
        }


        ?>

        <div>

            <h2>Login or Register</h2>
            <div class="login-container">
                <!-- display the login form -->
                <div class="login">
                    <form method='post' action='<?= BASE_URL ?>/index.php/user/login'>
                        <table>
                            <tr>
                                <td colspan="2"><?php echo $message; ?></br><br></td>
                            </tr>
                            <tr>
                                <td style="width: 80px">User name: </td>
                                <td><input type='text' name='username' required></td>
                            </tr>
                            <tr>
                                <td>Password: </td>
                                <td><input type='password' name='password' required></td>
                            </tr>
                            <tr>
                                <td colspan='2' class="bookstore-button">
                                    <input type='submit' value='  Login  '>
                                    <input type="button" name="Cancel" value="Cancel" onclick="window.location.href = 'index.php'" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <!-- display the registration form -->
                <div class="registration">
                    <form action="<?= BASE_URL ?>/index.php/user/add" method="post">
                        <table>
                            <tr>
                                <td colspan="2" align="left">If you are new to our site, please create an account.<br><br></td>
                            </tr>
                            <tr>
                                <td style="width: 85px">First Name: </td>
                                <td><input name="firstName" type="text" required></td>
                            </tr>
                            <tr>
                                <td>Last Name: </td>
                                <td><input name="lastName" type="text" required></td>
                            </tr>
                            <tr>
                                <td>User Name: </td>
                                <td><input name="username" type="text" required></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input name="password" type="password" required></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="bookstore-button">
                                    <input type="submit" value="Register" />
                                    <input type="button" value="Cancel" onclick="window.location.href = 'index.php'" />
                                </td>
                            </tr>
                        </table>

                    </form>
                </div>
            </div>
        </div>

        <?php

        parent::displayFooter();



    }


}

?>
