<?php

class Database{
    private $db_host="localhost";
    private $db_user="root";
    private $db_pass="";
    private $db_table="newTest";

    private $conn=false;
    private $mysqli="";
    private $result=array();

    public function __construct(){
        if(!$this->conn){
            $this->mysqli=new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_table);
            if($this->mysqli->connect_error){
                array_push($this->result,$this->mysqli->connect_error);
                return false;
            }
        }
        else{
            return true;
        }
    }

    public function select($table,$row='*',$join=null,$where=null,$orderby=null,$limit=null){
        if($this->tableExist($table)){
            $sql="SELECT $row FROM $table";

            if($join != null){
                $sql .= " JOIN $join";
            }
            if($where != null){
                $sql .= " WHERE $where";
            }
            if($orderby != null){
                $sql .= " ORDER BY $orderby";
            }
            if($limit != null){
                $sql .= " LIMIT $limit";
            }
            $query=$this->mysqli->query($sql);

            if($query){
                $this->result=$query->fetch_all(MYSQLI_ASSOC);
                return true;
            }
            else{
                array_push($this->result,$this->mysqli->error);
                return false;
            }
        }
        else{
            return false;
        }
    }

    public function tableExist($table){
        $sql="SHOW TABLES FROM $this->db_table LIKE '$table'";
        $tableInDb=$this->mysqli->query($sql);
        if($tableInDb){
            if($tableInDb->num_rows==1){
                return true;
            }
            else{
                array_push($this->result,$table . "not exist");
                return false;
            }
        }
    }

    public function getResult(){
        $val=$this->result;
        $this->result=array();
        return $val;
    }

    public function __destruct(){
        if($this->conn){
            if($this->mysqli->close()){
                $this->conn=false;
                return false;
            }
        }
        else{
            return true;
        }
    }
}



?>