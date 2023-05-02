<?php
    class DB{
    private $servername='localhost:3307';
    private $username='root';
    private  $password='';
    private  $dbname = "kakeibo";
    //public  $conn=mysqli_connect($servername,$username,$password,"$dbname");

      public function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
      
      function insert_payment_details($arr_data = array()) {
        $isPaymentExist = $this->db->query("SELECT * FROM transactions WHERE transaction_id = '".$arr_data['id']."'");

        if($isPaymentExist->num_rows == 0) {
            $i = 0;
            $values = '';
            foreach($arr_data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $values .= $pre."'".$this->db->real_escape_string($val)."'";
                $i++;
            }

            $insert = $this->db->query("INSERT INTO transactions(".implode(",", array_keys($arr_data)).") VALUES(".$values.")");
        }
    }
}
?>