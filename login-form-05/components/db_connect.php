 <?php
  /*
    class Database {
        public $hostName = "localhost";
        public $userName = "root";
        public $password = "";
        public $dbName = "zoo"; 
        public $connect;
        function __construct()
        {
            $this->connect = new mysqli($this->hostName, $this->userName,$this->password, $this->dbName);
        }
        function __destruct()
        {
            $this->connect->close();
        }
    }
        function read($table, $columns = "*" ,$join= "", $where = "", $order = ""){
            $sql = "SELECT $columns FROM $table $join $where $order";
            $result = $this->conn->query($sql);
            $fetch_data = $result->fetch_all(MYSQLI_ASSOC);
            return $fetch_data;
        }
         function create($table, $columns, $values){
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $result = $this->conn->query($sql);
        return $result = ($result) ? true : false;
       }

      function delete($table , $where){
        $sql = "DELETE FROM $table $where";
        $result = $this->conn->query($sql);
        return $result = ($result) ? true : false;
    }
     
    function update($table, $arr, $where){
        $columns = "";
        foreach($arr as $key => $value){
            if(!strlen($columns) == 0){
                $columns .= ", ";
            }
            if(is_numeric($value)){
                $columns .= "$key = $value";
            }else {
                $columns .= "$key = '$value'";
            }
        }

    }}

    $obj = new Database(); */





$localhost= "127.0.0.1";
$username="root";
$password= "";
$dbname="zoo";
 $connect =new mysqli($localhost,$username,$password,$dbname);
 