<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <?php
                             $user = new User();
                             $user->username = "parrram";
                             $user->password = "aaaa";
                             $user->first_name="mirco";
                             $user->last_name="leTTUce";
                             
                             $user->create();
                        ?> 
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
                            // $user=User::find_user_by_id(10);
                            // $user->last_name="Brahms";
                            // $user->first_name="Brahms";
                            // $user->password="tucii";
                            // $user->update();



                        //with save method:
                        // $user=new User();
                        // $user->username = "WHAT";
                        // $user->save();

                        //test the delete method
                        // $user=User::find_user_by_id(2);
                        // $user->delete();
                           
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