
<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()){ redirect("login.php");}?>

<?php
$message="";
if(isset($_POST['submit'])){
    
    $photo = new Photo();
    $photo ->title = $_POST["title"];
    $photo->set_file($_FILES['file_upload']);
    var_dump($photo->errors);
    
    //check if photo was saved
    if($photo->save()){
        $message = "Photo uploaded Successfully";
    }else{
        if (is_array($photo->errors)){
            $message = implode('<br>', $photo->errors);
        } else $message=$photo->errors;
       
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
                            Uploads
                            <small>Subheading</small>
                        </h1>
                    <div class="" name="message"><?php echo $message ?></div>
                    <div class = "col-md-6">
                        <form action="uploads.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="file" name="file_upload">
                            </div>

                            <input type="submit" name="submit">

                        </form>

                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>