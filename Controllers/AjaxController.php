<?php
namespace Controllers;

use \Core\Controller;
use \Models\Groups;
use \Models\Messages;
use \Models\Users;

class AjaxController extends Controller {

    private $user;

	public function __construct()
	{
		$this->user = new Users();
		if(!$this->user->verifyLogin()) {

			$data = [
                'status' => 0
            ];

            echo json_encode($data);
            exit;
		}
	}
    public function index() {}
    
    public function get_groups() {
        $array = ['status'=>'1'];
        $groups = new Groups;
        $array['list'] = $groups->getList();
        echo json_encode($array);
        exit;
    }

    public function add_group() {
        $array = ['status'=>'1','error'=>'0'];
        $groups = new Groups;

        if (!empty($_POST['name'])) {
            $name = $_POST['name'];
            $groups->add($name);
        } else {
            $array['error'] = '1';
            $array['errorMsg'] = '';
        }
        echo json_encode($array);
        exit;
    }

    public function add_message()
    {
        $array = ['status' => 1, 'error' => '0'];
        
        $messages = new Messages;
        
        if (!empty($_POST['msg']) && !empty($_POST['id_group'])) {
            $msg = $_POST['msg'];
            $id_group = $_POST['id_group'];
            $uid = $this->user->getUser();

            $messages->add($uid, $id_group, $msg);

        } else {
            $array['error'] = '1';
            $array['errorMsg'] = 'Mensagem vazia';
        }
        

        echo json_encode($array);
        exit;
    }

    public function get_messages()
    {
        $array = [
            'status' => '1', 
            'msgs' => [],
            'last_time' => date('Y-m-d H:i:s') 
        ];

        $messages = new Messages;

        set_time_limit(60);

        $url_msg = date('Y-m-d H:i:s');
        if(!empty($_GET['last_time'])) {
            $url_msg = $_GET['last_time'];
        }
        $groups = [];
        if(!empty($_GET['groups']) && is_array($_GET['groups'])) {
            $groups = $_GET['groups'];
        }

        while(true) {
            $msgs = $messages->get($url_msg, $groups);
            if(count($msgs) > 0) {
                $array['msgs'] = $msgs;
                $array['last_time'] = date('Y-m-d H:i:s');
                break;
            } else {
                sleep(2);
                continue;
            }
        }
        echo json_encode($array);
        exit;
    }

}