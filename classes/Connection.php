<?php

class Connection
{
    public function getConn(){
        $db_host = "localhost";
        $db_user = "raffi";
        $db_pass = "2JhmqJNf4exXJP]P";
        $db_name = "blog";

        $dsn='mysql:host='.$db_host.';dbname='.$db_name;

        try{
            return new PDO($dsn,$db_user,$db_pass);
        }catch(PDOException $e){
            echo $e ="Database not Found";
            exit;
        }
        
    }
}