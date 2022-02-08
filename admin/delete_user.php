<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()){ redirect("login.php");}?>
<?php 

if (empty($_GET['id'])){
    redirect("users.php");

}

$user = User::find_by_id($_GET['id']);

if($user) {
    if (empty($user->user_image)){
        $user->delete_user();
        redirect("users.php");
    }else {
        $user->delete();
    }
}else {
    redirect('users.php');
}




?>
