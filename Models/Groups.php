<?php

namespace Models;

use Core\Model;
use PDO;

class Groups extends Model
{
    
    public function getList() {
        $array = [];
        $sql = "SELECT * FROM groups ORDER BY name ASC";
        $sql = $this->db->query($sql);
        $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    public function add($name) {
        $sql="INSERT INTO groups(name)VALUES(:name)";
        $sql=$this->db->prepare($sql);
        $sql->bindValue(':name', $name);
        $sql->execute();
    }
}