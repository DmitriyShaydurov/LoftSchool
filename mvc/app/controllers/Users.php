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
                    $user->password = password_hash($this->data['password'], PASSWORD_DEFAULT);
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

            if (trim($user['email']) === $email && password_verify($password, $user['password'])) {
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
            $order = 'DESC';
        } else {
            $order = $_GET['sort'];
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

        $users = User::All()->toArray();

        $this->data['users'] = $users;

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

        $this->view('admin');
    }

    public function avatarPage()
    {
        if (!isset($_SESSION['user_id'])) {
            redirect('users/login');
        }
        $this->data['msg']='';

            $usr = User::find($_SESSION['user_id']);
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

            $uploadOk = 1;

            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $target_file = $target_dir . ($_SESSION['user_id']) .'.'. $imageFileType;

            // Check if  file is a actual image or fake image
            if (isset($_POST["submit"]) &&  !empty($_FILES["fileToUpload"]["tmp_name"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $this->data['msg'] = $this->data['msg'] . 'Файл не является картинкой';
                    $uploadOk = 0;
                }

                // Check if file already exists
//                if (file_exists($target_file)) {
//                    $this->data['msg'] = $this->data['msg'] . "Извините файл уже существует ";
//                    $uploadOk = 0;

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    $this->data['msg'] = $this->data['msg'] . "Файл слишком велик";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    $this->data['msg'] = $this->data['msg'] . "Извините, вы можете загрузить только JPG, JPEG, PNG & GIF. ";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $this->data['msg'] = $this->data['msg'] . " Ваш файл не загружен.";
                    // if everything is ok, try to upload file
                } else {
                    //$this->data['msg']=$this->data['msg'].' tmp_name '.$_FILES["fileToUpload"]["tmp_name"];
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $this->data['msg'] = $this->data['msg'] . "Файл загружен";
                        $user = User::find($_SESSION['user_id']);
                        $user->url = ($_SESSION['user_id']) .'.'. $imageFileType;;
                        $user->save();
                    } else {
                        $this->data['msg'] = $this->data['msg'] . "Во вермя загрузки файла произошла ошибка";
                    }
                }
            }

        $this->view('avatar');

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
