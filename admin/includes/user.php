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

    public $upload_directory= "images";
    public $image_placeholder="http://placehold.it/400x400&text=image";



    public function set_file($file){
        if (empty($file)||!$file || !is_array($file)){
            $this->errors[]="There was no file uploaded here.";
            return false;
        }elseif ($file['error']!=0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else {
            $this ->user_image = str_replace( " ", "-", basename($file['name']));
            $this ->tmp_path = $file['tmp_name'];
            $this ->type = $file['type'];
            $this ->size = $file['size'];
        }

    }    

    public function save_user_and_image() {
        if ($this ->id){
            $this->update();
        }else {
            if(!empty($this->errors)) {
                return false;
            }else if(empty($this->user_image) || empty ($this->tmp_path)){
                $this->errors[]="The file was not available";
                return false;
            }
    
            $target_path=SITE_ROOT .DS. 'admin' .DS. $this->upload_directory .DS. $this->user_image;
    
            if (file_exists($target_path)){
                $this->errors="The file {$this->user_image} already exists";
                return false;
            }
    
           if (move_uploaded_file($this->tmp_path,$target_path)){
               if ($this ->create()){
                   unset($this->tmp_path);
                   return true;
               }
    
    
           }else {$this->errors[]="The file directory probably does not have permissions;";
            return false;
             }
    
        }
    }

public function image_path_and_placeholder(){
    return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
}
    
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

    public function delete_user(){
        if($this->delete()) {
            
            $target_path = SITE_ROOT.DS. 'admin'.DS.$this->image_path_and_placeholder();
            
            return unlink($target_path) ? true : false;  
    
        } else {
            return false;
        }

        
    }

public function ajax_save_user_image($user_image, $user_id) {
    global $database;

    $user_image=$database->escape_string($user_image);
    $user_id=$database->escape_string($user_id);

    $this->user_image=$user_image;
    $this->id=$user_id;

    $sql= "UPDATE " . self::$db_table . " SET user_image = '{$this->user_image}'";
    $sql.=" WHERE id= '{$this->id}' ";
    $update_image = $database->query($sql);

    echo $this->image_path_and_placeholder();

}

public function delete_photo(){
    if($this->delete()) {
        
        $target_path = SITE_ROOT.DS. 'admin'.DS.$this->upload_directory .DS. $this->user_image;
        
        return unlink($target_path) ? true : false;  

    } else {
        return false;
    }
}











}//End of the user class