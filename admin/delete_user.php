<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()){ redirect("login.php");}?>
<?php 

if (empty($_GET['id'])){
    redirect("users.php");

}

$user = User::find_by_id($_GET['id']);

if($user) {
    $session->message("The user has been deleted");

    if (empty($user->user_image)){
        $user->delete_user();
        $user->delete_photo();
        redirect("users.php");
    }else {
        $user->delete();
        $user->delete_photo();
        redirect("users.php");
    }
}else {
    redirect('users.php');
}




?>
