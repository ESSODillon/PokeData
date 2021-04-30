<?php
class UserModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblUsers;

    private function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUsers = $this->db->getUserTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    public static function getUserModel(){
        if(self::$_instance == NULL ){
            self::$_instance = new UserModel();

        }
        return self::$_instance;

    }


    public function register_user(){

        $firstname = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING)));
        $lastname = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING)));
        $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
        $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));

//set user's role
        $role = 2;

//insert statement. The id field is an auto field.
        $sql = "INSERT INTO users_db VALUES (NULL, '$firstname', '$lastname', '$username', '$password', '$role')";


        $query = $this->dbConnection->query($sql);


        if(!$query){
            echo "insert query didnt work for registering the user";
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

//create session variables
        $_SESSION['login'] = $username;
        $_SESSION['name'] = "$firstname $lastname";
        $_SESSION['role'] = 2;
        $_SESSION['login_status'] = 3;  //the user was just registered.


    }

    public function login_user($username, $password){

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }



//create variable login status.
        $_SESSION['login_status'] = 2;
//initialize variables for username and password
        $username = "";
        $password = "";


        if (isset($_POST['username']))
            $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));

        if (isset($_POST['password']))
            $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));




//validate user name and password against a record in the users table in the database
//select statement
        $sql = "SELECT * FROM users_db WHERE userName='$username' AND password='$password'";


//execute the query
        $query = $this->dbConnection->query($sql);



        try{
            if ($query->num_rows == 0){
                throw new InvalidLoginException();
            }
        }catch (InvalidLoginException $e){
            echo $e->loginDetails();
            $view = new InvalidLoginAttempt();
            $view->display();


        }

//fetch results
        if ($query->num_rows) {
            //It is a valid user. Need to store the user in session variables.
            $row = $query->fetch_assoc();
            $_SESSION['login'] = $username;
            $_SESSION['role'] = $row['role'];
            $_SESSION['name'] = $row['firstName'] . " " . $row['lastName'];

            //update the login status
            $_SESSION['login_status'] = 1;

        }

        if(!$query){
            echo "insert query didnt work for registering the user";
        }




    }

    public function logout_customer(){


        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

//unset all the session variables
        $_SESSION = array();

//delete the session cookie
        setcookie(session_name(), "", time() - 3600);

//destroy the session
        session_destroy();




    }


}