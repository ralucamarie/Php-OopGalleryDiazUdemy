<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>

                        <?php 
                        
                        //find all users
                        // $result_set= User::find_all_users();
                        
                        // while($row=mysqli_fetch_array($result_set)){
                        //     echo $row['username']."<br>";
                        // }
                        // $users= User::find_all_users();    
                        
                        // foreach($users as $user){
                        //     echo $user->username."<br>";
                        // }
                                  
                        // $found_user=User::find_user_by_id(2);
                        // echo $found_user->username;
                        // ?>
                        
                        <?php
                        // //test the update method
                        //     $user=User::find_user_by_id(5);
                        //     $user->last_name="WILLIAMS";

                        //     $user->update();

                        //test the delete method
                        $user=User::find_user_by_id(4);
                        $user->delete();

                        ?>

                        <br>

                        

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->