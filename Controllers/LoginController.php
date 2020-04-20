<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;

class LoginController extends Controller {

    public function index()
    {
        $data = [
            'msg' => ''
        ];

        if(!empty($_GET['error'])) {
            if($_GET['error'] == '1'){
                $data['msg'] = ' Usuário e/ou senha inválidos!';
            }
        }

        $this->loadView('login', $data);
    }

    public function signin() {
        if(!empty($_POST['username'])){
            $username = \strtolower($_POST['username']);
            $pass = $_POST['pass'];

            $user = new Users;
            if ($user->validateUser($username, $pass)) {
                header('Location:'.BASE_URL);
                exit;
            } else {
                header('Location:'.BASE_URL.'login?error=1');
                exit;
            }
            
        }else{
            \header("Location:".BASE_URL."login");
            exit;
        }
    }

    public function signup() {
        $data = [
            'msg'=>''
        ];

        if(!empty($_POST['username'])) {
            $username = \strtolower($_POST['username']);
            $pass = $_POST['pass'];

            $user = new Users;

            
            if ($user->validateUsername($username)) {
                if(!$user->userExists($username)){
                    $user->userRegister($username, $pass);
                    \header("Location:".BASE_URL."login");
                }else{
                    $data['msg']='Usuário já existente!';
                }
            } else {
                $data['msg'] = 'Usuário não válido (Digite apenas letras e números).';
            }
        }else{
            $data['msg'] = 'Usuário campo obrigátorio!';
        }
        $this->loadView('signup', $data);
    }
}