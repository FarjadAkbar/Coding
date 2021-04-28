<?php

class Database{

    private $db_host="localhost";
    private $db_user="root";
    private $db_password="";
    private $db_name="test";

    private $conn=false;
    private $mysqli="";
    private $result=array(); //use as an array

    public function __construct(){
        if(!$this->conn){
            $this->mysqli=new mysqli($this->db_host,$this->db_user,$this->db_password,$this->db_name);
            if($this->mysqli->connect_error){
                array_push($this->result, $this->mysqli->connect_error);
                return false;
            }   
        }
        else{
            return true;
        }
    }

    public function insert($table, $param=array()){//user table name dega jo array form m aye gi (database wala table name)
        if($this->tableExist($table)){
            // print_r($param);
            $table_columns=implode(',',array_keys($param));
            $table_value=implode("' , '",$param);
            
            // print_r($table_columns);
            // print_r($table_value);

            $sql="INSERT INTO $table ($table_columns) VALUES('$table_value')";

            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->insert_id);
                return true;
            }
            else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
        else{
           return false;
        }
    }

    public function update($table,$param=array(),$where=null){
        if($this->tableExist($table)){
            // print_r($param);
            $args=array();
            foreach($param as $key=>$val){
                $args[]="$key = '$val'";
            }
            // print_r($args);
            $sql="UPDATE $table SET " . implode(',',$args); //implode use to convert array into string
            if($where != null){
                $sql .= " WHERE $where";
            }
            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            }
            else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
        else{
            return false;
        }
    }
    
    public function delete($table,$where=null){
        if($this->tableExist($table)){
            $sql="DELETE FROM $table";
            
            if($where != null){
                $sql .= " WHERE $where";
            }
            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            }
            else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
        else{
            return false;
        }
    }
    
    public function select($table, $rows="*", $join=null, $where=null, $orderby=null, $limit=null){
        if($this->tableExist($table)){
            $sql="SELECT $rows FROM $table";
            if($join != null){
                $sql .=" JOIN $join";
            }
            if($where != null){
                $sql .=" WHERE $where";
            }
            if($orderby != null){
                $sql .=" ORDER BY $orderby";
            }
            if($limit != null){
                if(isset($_GET['page'])){
                    $page=$_GET['page'];
                }
                else{
                    $page=1;
                }
                $start=($page-1) * $limit;

                $sql .=" LIMIT $start, $limit";
            }
            // echo $sql;
            $query=$this->mysqli->query($sql);

            if($query){
                $this->result=$query->fetch_all(MYSQLI_ASSOC);
                return true;
            }
            else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
        else{
            return false;
        }
    }

    public function pagination($table,$join=null, $where=null, $orderby=null, $limit=null){
        if($this->tableExist($table)){
            if($limit != null){
                $sql="SELECT COUNT(*) FROM $table";
                if($join != null){
                    $sql .=" JOIN $join";
                }
                if($where != null){
                    $sql .=" WHERE $where";
                }
                if($orderby != null){
                    $sql .=" ORDER BY $orderby";
                }
                $query=$this->mysqli->query($sql);
                $total_record=$query->fetch_array();
                $total_record=$total_record[0];
                $total_page=ceil($total_record/$limit);
                $url=basename($_SERVER['PHP_SELF']);
                
                if(isset($_GET['page'])){
                    $page=$_GET['page'];
                }
                else{
                    $page=1;
                }

                $output = "<ul class'pagination'>";
                    if($page>1){
                        $output .= "<li><a href='$url?page=".($page-1)."'>Prev</a></li>";
                    }
                    if($total_record > $limit){
                        for($i=1; $i<=$total_page;$i++){
                            if($i==$page){
                                $cls="'class=active'";
                            }
                            else{
                                $cls="";
                            }
                            $output .= "<li><a $cls href='$url?page=$i'>$i</a></li>";
                        }
                    } 
                    if($total_page>$page){
                        $output .= "<li><a href='$url?page=".($page+1)."'>Next</a></li>";
                    }
                $output .= "</ul>";
                echo $output;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
    public function selectall($sql){
        $query=$this->mysqli->query($sql);

        if($query){
            $this->result=$query->fetch_all(MYSQLI_ASSOC);
            return true;
        }
        else{
            array_push($this->result, $this->mysqli->error);
            return false;
        }
    }

    private function tableExist($table){ //check table exist or not
        $sql="SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tableInDb=$this->mysqli->query($sql);
        if($tableInDb){
            if($tableInDb->num_rows == 1 ){
                return true;
            }            
            else{
                array_push($this->result, $table." table not exist");
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
                return true;
            }
        }
        else{
            return false;
        }
    }
}
?>