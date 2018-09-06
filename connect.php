<?php
class Sql extends mysqli {
    protected $connection;

    public function __construct($n ,$h ,$p ,$d)
    {
        $this->connection = new mysqli($h,$n,$p,$d);
        $this->valid_conn($n,$h,$p,$d);
    }
    protected function reconnect($n ,$h ,$p ,$d){
        $this->connect($h,$n,$p,$d);
        $this->valid_conn($n,$h,$p,$d);
    }
    private function valid_conn($name,$host,$pass,$data){
        try{
            if($this->connect_error) {
                throw new Exception("The Connection is not valid");

            }
        }catch (Exception $e){
            echo $e->getMessage();
            die();
        }finally{

            echo "This is name = ".$name."This is host = ".$host."This is password = ".$pass."This is name = ".$data ;
        }

    }

}

class Elements extends Sql{
    private $host;
    private $name;
    private $pass;
    private $data_base;
    private $elements = array();
    public function __construct()
    {
        $this->host = $_POST['localhost'];
        $this->name = $_POST['name'];
        $this->pass = $_POST['password'];
        $this->data_base = $_POST['data_base'];
        $this->elements = array($this->host,$this->name,$this->data_base );
    }


    public function valid_test($name,$host,$password,$data_base){

        echo $name;
        try{

            for($i = 0; $i < count($this->elements);$i++){
                if(empty($this->elements[$i])){
                    throw new Exception("Re-enter the connection");
                }elseif ($i == count($this->elements)-1){
                    $this->reconnect($name,$host,$password,$data_base);
                }
            }
        }catch (Exception $e){
            echo $e->getMessage();
        }

    }

}
?>