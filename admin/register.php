<?php require_once ("includes/header.php"); ?>
<?php


if (isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    

    //Method to check if the user =name is already taken

    $user_found=User::verify_username($username);

    if(!$user_found) {
        // $session->login($user_found);

        $new_user=new User();
        $new_user->username=$username;
        $new_user->password=$password;
        $new_user->first_name=$first_name;
        $new_user->last_name=$last_name;

        $new_user->create();
        redirect('login.php');

    } else {
        $the_message="The username is taken.";
        
    }
 
}else {
    $username="";
    $password="";
    $first_name="";
    $last_name="";
    $the_message="";
}

?>


<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php echo $the_message; ?></h4>
	
<form id="register-id" action="" method="post">
	
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
</div>

<div class="form-group">
	<label for="first_name">First Name</label>
	<input type="text" class="form-control" name="first_name" value="<?php echo htmlentities($first_name); ?>" >
</div>

<div class="form-group">
	<label for="last_name">Last Name</label>
	<input type="text" class="form-control" name="last_name" value="<?php echo htmlentities($last_name); ?>" >
</div>

<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>


</form>


</div>


