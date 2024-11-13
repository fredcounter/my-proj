<?php
require "database.php";
class Asignatura {

public $asignatura_code;   
public $asignatura_name;
public $asignatura_type;
public $id;

protected $db;


function __construct()
{
    $this->db = new Database();
}

function showAll(){
 
    $sql ="SELECT * FROM asignatura ORDER by asignatura_code ASC"; 
    $q = $this->db->connect()->prepare($sql);
    $data = null;

    if($q->execute()){
        $data = $q->fetchAll();
    }
    
    return $data;

}
}
?>