<?php

namespace App\controllers;

use \App\models\User as User;


class Users extends \App\libraries\Controller
{
    protected $users;
    protected $currentUser;

    public function __construct()
    {
        //$this->users = \App\models\User::All()->toArray();
        $this->users = User::All()->toArray();
    }


    public function register()
    {
        $this->data = ['message' => DEFAULT_LOG_MESSAGE];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $this->data['email'] = trim($_POST['email']);
            $this->data['password'] = trim($_POST['password']);
            $this->data['password-check'] = trim($_POST['password-check']);
            $this->data['message'] = '';

            // Check for email
            if (empty($this->data['email'])) {
                $this->data['message'] = $this->data['message'] . 'Введите email. ';
            }

            // Check for password
            if (empty($this->data['password'])) {
                $this->data['message'] = $this->data['message'] . 'Введите пароль.';
            }

            // Check for  password check
            if (empty($this->data['password-check'])) {
                $this->data['message'] = $this->data['message'] . 'Введите повторный пароль.';
            }

            // Check for  concurrences
            if ($this->data['password-check'] !== $this->data['password']) {
                $this->data['message'] = $this->data['message'] . 'Пароли не совпадеют';
            }

            if ($this->data['message'] == '') {

                // Check for user
                if ($this->userFound($this->data['email'], $this->data['password'])) {
                    $this->data['message'] = 'Этот email уже зарегестрирован';

                } else {
                    // No User
                    //$this->data['message'] = 'Регистрируемся';

                    $user = new User;

                    $user->email = $this->data['email'];
                    $user->user_name = $this->data['email'];
                    $user->age = 1;
                    $user->description = ' ';
                    $user->url = 'default.png';
                    $user->password = $this->data['password'];
                    $user->save();
                    $this->data['message'] = 'Вы зарегестрированы';
                }


            }
        }

        $this->view('registration');
    }

    public function logIn()
    {
        $this->data = ['message' => DEFAULT_REG_MESSAGE];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $this->data['email'] = trim($_POST['email']);
            $this->data['password'] = trim($_POST['password']);

            $this->data['message'] = '';

            // Check for email
            if (empty($this->data['email'])) {
                $this->data['message'] = $this->data['message'] . 'Введите email. ';
            }

            // Check for password
            if (empty($this->data['password'])) {
                $this->data['message'] = $this->data['message'] . 'Введите пароль.';
            }

            if ($this->data['message'] == '') {

                // Check for user
                if ($this->userFound($this->data['email'], $this->data['password'])) {
                    //$this->data['message'] = 'Этот email уже зарегестрирован';
                    $this->createUserSession();
//                    echo '<pre>';
//                    print_r( $this->data);
//                    $comma_separated = implode(",", $_SESSION);
//                    $this->data['message'] = $comma_separated;

                } else {
                    // No User
                    $this->data['message'] = 'Неправильный пароль или email';

                }


            }
        }
        $this->view('index');
    }

    protected function userFound($email, $password)
    {

        foreach ($this->users as $user) {

            if (trim($user['email']) === $email && trim($user['password'] === $password)) {
                $this->currentUser = $user;
                return true;
            }
        }

        return false;
    }


    public function listPage()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        if (!isset($_GET['sort'])) {
            $order='DESC';
        }else{
            $order=$_GET['sort'];
        }

        $user = User::find($_SESSION['user_id'])->toArray();
        $this->data['name'] = $user['user_name'];
        $this->data['age'] = $user['age'];
        $this->data['description'] = $user['description'];
        $this->data['get'] = $_GET['sort'];

        $users = User::orderBy('age', $order)->get()->toArray();

        //$this->post->orderBy('id', 'DESC')->get();

        $this->data['users'] = $users;

        $this->view('list');


    }

    public function fileListPage()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }

        $user = User::find($_SESSION['user_id'])->toArray();
        $this->data['name'] = $user['user_name'];
        $this->data['age'] = $user['age'];
        $this->data['description'] = $user['description'];


        $this->view('filelist');
    }

    public function adminPage()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usr = User::find($_SESSION['user_id']);
            // Sanitize POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $usr->user_name = trim($_POST['name']);
            $usr->age = trim($_POST['age']);
            $usr->description = trim($_POST['comment']);
            $usr->save();
        }

        $user = User::find($_SESSION['user_id'])->toArray();
        $this->data['name'] = $user['user_name'];
        $this->data['age'] = $user['age'];
        $this->data['description'] = $user['description'];

//
//
//        $this->data['name'] = $_SESSION['user_name'];

        $this->view('admin');
    }

    // Create Session With User Info
    public function createUserSession()
    {
        $_SESSION['user_id'] = $this->currentUser['id'];
        $_SESSION['user_email'] = $this->currentUser['email'];
        $_SESSION['user_name'] = $this->currentUser['user_name'];
        //$this->data = ['name'=>$this->currentUser['user_name']];
        $this->data['name'] = $this->currentUser['user_name'];
        //$this->view('list');
        redirect('users/adminPage');
//        echo '<pre>';
//        print_r( $this->data);
    }

    // Logout & Destroy Session
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('/');
    }

    // Check Logged In

    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

}
