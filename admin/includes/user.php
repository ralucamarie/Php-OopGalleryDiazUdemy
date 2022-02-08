<?php

class User extends Db_object{
    protected static $db_table = "users";

    protected static $db_table_fields = array('user_image','username','password','first_name','last_name');

    public $id;
    
    public $user_image;
    public $username;
    public $first_name;
    public $last_name;
    public $password;


    
    public static function verify_user($username, $password){
        global $database;

        $username=$database->escape_string($username);
        $password=$database->escape_string($password);
   
        $sql="SELECT * from " . self::$db_table ." WHERE ";
        $sql.="username = '{$username}' ";
        $sql.="AND password = '{$password}' ";
        $sql.="LIMIT 1";
        
        $the_result_array= self::find_by_query($sql);
        //if the array is empty, return false
         return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
    }

    public static function verify_username($username){
        global $database;

        $username=$database->escape_string($username);
   
        $sql="SELECT * from users WHERE ";
        $sql.="username = '{$username}' ";
        $sql.="LIMIT 1";
        
        $the_result_array= self::find_by_query($sql);
        //if the array is empty, return false
         return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    













}//End of the user class