
<?php include("includes/header.php"); ?>
<?php require_once("includes/photo_modal.php"); ?>
<?php if (!$session->is_signed_in()){ redirect("login.php");}?>

<?php
if (empty($_GET['id'])){
    redirect('users.php');
}
    $user=User::find_by_id($_GET['id']);

    if (isset($_POST['update'])){
 
        if ($user) {
                  $user->username=$_POST['username'];
                  $user->first_name=$_POST['first_name'];
                  $user->last_name=$_POST['last_name'];
                  $user->password=$_POST['password'];
      
      if(empty($_FILES['user_image'])){
        $user->save();
        redirect("users.php");
        $session->message("The user has been updated");

      }else {
        $user->set_file($_FILES['user_image']);
        $user->save_user_and_image();
        $user->save();
        $session->message("The user has been updated");
        // redirect("edit_user.php?id={$user->id}");
        redirect("users.php");

      
      }              
    }
      
}

if (isset($_POST['delete'])){
    if ($user->delete_user()){
        redirect("users.php");
    }
    
}

?>








<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

<!-- Top Menu Items -->
<?php include ("includes/top_nav.php");?>

    
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include ("includes/side_nav.php");?>




    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit user
                            <small>Subheading</small>
                        </h1>
                        <div class="col-md-6 user-image-box">
                            <a href="#" data-toggle="modal" data-target="#photo-library"><img class="img-responsive" src="<?php echo $user->image_path_and_placeholder(); ?>" alt=""></a>
                        </div>
                    
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 ">
                        <div class="form-group">
                                <label for="username">Image</label>
                              <input type="file" name="user_image" class="">  
                            </div>
                        <div class="form-group">
                                <label for="username">Username</label>
                              <input type="text" name="username" class="form-control" value= <?php echo $user->username ?>>  
                            </div>                          
                            <div class="form-group">
                                <label for="first_name">First name</label>
                              <input id="first_name" type="text" name="first_name" class="form-control" value= <?php echo $user->first_name ?>>  
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                              <input id="last_name" type="text"  name="last_name" class="form-control" value= <?php echo $user->last_name ?>>  
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                              <input id="password" type="password"  name="password" class="form-control" value =<?php echo $user->password ?>>  
                            </div>
                            <div class="form-group">                          
                              <input id="" type="submit"  name="update" class="btn btn-primary pull-right" value = "Update">  
                            </div>
                            <div class="form-group">                          
                              <a id="user-id" type="submit"  name="delete" class="btn btn-danger pull-left" href="delete_user.php?id=<?php echo $user->id ?>">Delete</a>
                            </div>
                        
                        
                    </div>
                    </form>





                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>