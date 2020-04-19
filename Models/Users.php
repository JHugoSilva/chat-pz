<?php

namespace Models;

use Core\Model;

class Users extends Model
{

    private $uid;

    public function verifyLogin()
    {
        if (!empty($_SESSION['chathashlogin'])) {
            $s = $_SESSION['chathashlogin'];

            $sql = "SELECT * FROM users WHERE loginhash=:hash";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':hash', $s);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch();
                $this->uid = $data['id'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }

    public function validateUsername($u) {
        if (preg_match('/^[a-z0-9]+$/',$u)) {
            return true;
        } else {
            return false;
        }
    }

    public function userExists($u) {
        $sql="SELECT * FROM users WHERE username=:u";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':u',$u);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function userRegister($username, $pass) {
        $passHash = \password_hash($pass, PASSWORD_DEFAULT);
        $sql="INSERT INTO users(username, pass)VALUES(:user, :pass)";
        $sql=$this->db->prepare($sql);
        $sql->bindValue(':user', $username);
        $sql->bindValue(':pass', $passHash);
        $sql->execute();
    }

    public function validateUser($username, $pass) {
        try {
            $sql="SELECT * FROM users WHERE username = :u";
            $sql=$this->db->prepare($sql);
            $sql->bindValue(':u', $username);
            $sql->execute();
            if($sql->rowCount() > 0){
                $info = $sql->fetch();
                if (password_verify($pass, $info['pass'])) {
                    $loginhash = md5(rand(0,9999).time().$info['id'].$info['username']);
                    $this->setLoginHash($info['id'], $loginhash);
                    $_SESSION['chathashlogin'] = $loginhash;
                    return true;
                } else {
                    return false;
                }
            }else{
                return false;
            }
        } catch (\PDOException $error) {
                throw new Exception($error);
        }
    }

    private function setLoginHash($uid, $hash) { 
        $sql="UPDATE users SET loginhash=:hash WHERE id=:id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':hash', $hash);
        $sql->bindValue(':id', $uid);
        $sql->execute();
    }

    public function getUser()
    {
        return $this->uid;
    }
}