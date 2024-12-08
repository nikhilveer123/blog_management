<?php
require_once '../config/db.php';  
require_once '../models/UserModel.php'; 

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

 
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            $email = $_POST['email'];
            $password = $_POST['password'];

   
            if (empty($email) || empty($password)) {
                echo "Both fields are required!";
                return;
            }

         
            $user = $this->userModel->getUserByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
               
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                header('Location: ../admin/index.php'); 
                exit;
            } else {
                echo "Invalid email or password!";
            }
        }

     
        include '../views/login.php';
    }

 
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            $username = $_POST['username'];
            $email = $_POST['email'];

            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if ( empty($username) ||  empty($email) || empty($password) || empty($confirmPassword)) {
                echo "All fields are required!";
                return;
            }

         
            if ($password !== $confirmPassword) {
                echo "Passwords do not match!";
                return;
            }

           
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            if ($this->userModel->getUserByEmail($email)) {
                echo "Email already registered!";
                return;
            }

            $this->userModel->createUser($username,$email, $hashedPassword);

            echo "Registration successful!";
            header('Location: login.php'); 
            exit;
        }

       
        include '../views/register.php';
    }
}
?>
