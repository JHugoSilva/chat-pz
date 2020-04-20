<?php
namespace Controllers;

use \Core\Controller;
use \Models\Groups;
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

}