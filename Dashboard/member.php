<?php
    // Start The Session
    session_start();

    $TitlePags = "Members";

    if(isset($_SESSION['Username'])){

        include 'ins.php';

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if( $do == 'Manage'){?>

        <div class="container divs">
            <div class="row">
            <div class="col">
                <button class="btn btn-success one">
                    <a href="member.php?do=Add" class="nav-link add">Add Members</a>
                </button>
            </div>
            <div class="col-sm-9 col-md-4 tow">
                <input type="search" class="form-control" placeholder="search">
                <button class="btn btn-success btn-lg search">search</button>
            </div>
            </div>
        </div>
            
    <?php  $link = mysqli_connect("localhost", "root", "", "shop");


            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
             

            $sql = "SELECT * FROM users";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){ ?>
                    <div class="container">
                    <table class='table Tables'>
                        <thead class="table-dark">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        </tr>
                        </thead>

            <?php      while($row = mysqli_fetch_array($result)){?>
                        <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['usename']; ?></td>
                        <td><?php echo $row['fullName']; ?></td>
                        <td><?php echo $row['email'] ?></td>
                        </tr>
                        
                <?php  }
                    echo "</table>";
                    echo "</div>";
                    // Free result set
                    mysqli_free_result($result);
                } else{
                    echo "No records matching your query were found.";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
             
            // Close connection
            mysqli_close($link); 
        }
        elseif ($do == 'Add') { ?>

            <h1 class="text-center">Add New Members</h1>

            <div class="container">
            <form class="form-horizontal" method="POST" action="?do=Insert">
                <!-- Start Username From  -->
                <div class="form-gruop">
                    <label class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10 col-md-7">
                        <input type="text" class="form-control" name="username"   autocomplete="off">
                    </div>
                </div>
                <!-- End Username From  -->
                                    <!-- Start Password From  -->
                                    <div class="form-gruop">
                            <label class="col-sm-2">Password</label>
                            <div class="col-sm-10 col-md-7">
                                <input type="password" name="newpasseord" class="form-control"  autocomplete="new-password">
                                <i class="show-pass fa"></i>
                            </div>
                        </div>
                        <!-- End Password From  -->
                        <!-- Start Email From  -->
                        <div class="form-gruop">
                            <label class="col-sm-2">Email</label>
                            <div class="col-sm-10 col-md-7">
                                <input type="email" class="form-control" name="email"  autocomplete="off">
                            </div>
                        </div>
                        <!-- End Email From  -->
                        <!-- Start Full Name From  -->
                        <div class="form-gruop ">
                            <label class="col-sm-2">Full Name</label>
                            <div class="col-sm-10 col-md-7">
                                <input type="text" class="form-control"  name="full" autocomplete="off">
                            </div>
                        </div>
                        <!-- End Full Name From  -->
                        <!-- Start Sumbit From  -->
                        <div class="form-gruop">
                            <input type="submit" value="Insert" class="btn btn-dark btn-lg">
                        </div>
            </form>
                    </div>
                    
<?php 
                
        }elseif ( $do == 'Insert'){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            
                $username  = $_POST['username'];
                $passeord  = $_POST['newpasseord'];
                $email     = $_POST['email'];
                $full      =$_POST['full'];

                $funAlert = array();
                if(empty($username) > 5){ #USER NAME
                    $funAlert[] = " Username Cont Be > Than 5";
                }
                if(empty($username) > 20 ){ #USER NAME
                    $funAlert[] = "Username Cont Be Lass Than 20";
                }
                if(empty($username)){ #USER NAME
                    $funAlert[] = " Username Cont Be Empty";
                }
                if(empty($email)){ #EMAIL
                    $funAlert[] = "Email Cont Be Empty";
                }
                if(empty($full)){ #FULL NAME
                    $funAlert[] = " Full Name Cont Be Empty";
                }
                if(empty($passeord)) { #PASSWORD
                    $funAlert[] = " Sarry Password Cont Empty";
                }
                if($password > 5) { #PASSWORD
                    $funAlert[] = " Sarry Password Cont Be Less Thab 4";
                }
    
                foreach ($funAlert as $alert) { #FOREACH ERROR

                    echo "<div class='alert alert-danger'> " . $alert . "</div>";
                }
                if(empty($funAlert)){
                    
              // UPDATE DATE FORM UPDATE PAGES
              $stmt = $connect->prepare("UPDATE users SET usename = ? , email =? , pass = ?, fullName = ? WHERE 1");
              $stmt->execute(array($username  , $email , $password , `$full`));
  
              echo $stmt->rowCount() . 'Update Complet';


                }

            }else{
               
                echo '<div class="alert alert-danger">Sarry You cont be her</div>';
            }


        }elseif( $do == 'Edit'){

      $users = isset($_GET['user']) && is_numeric($_GET['user']) ? intval($_GET['user']) :  0;

      $stmt = $connect->prepare("SELECT * FROM users WHERE id = ? ");
      $stmt->execute(array($users));
      $fun = $stmt->fetch();
      $st  = $stmt->rowCount();

      if($stmt->rowCount() > 0){?> 
        <h1 class="text-center">Edit Members</h1>

        <div class="container">
        <form class="form-horizontal" method="POST" action="?do=Update">
            <input type="text" name="ID" hidden value="<?php echo $users;?>">
            <!-- Start Username From  -->
            <div class="form-gruop">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10 col-md-7">
                    <input type="text" class="form-control" name="username"  required='required' value="<?php echo $fun["usename"]?>">
                </div>
            </div>
            <!-- End Username From  -->
            <!-- Start Password From  -->
                    <div class="form-gruop">
                        <label class="col-sm-2">Password</label>
                        <div class="col-sm-10 col-md-7">
                            <input type="password" hidden value="<?php echo $fun['pass']?>" name="oldpasseord">
                            <input type="password" value="<?php echo $fun['pass']?>" name="newpasseord" class="form-control" autocomplete="new-password">
                        </div>
                    </div>
                    <!-- End Password From  -->
                    <!-- Start Email From  -->
                    <div class="form-gruop">
                        <label class="col-sm-2">Email</label>
                        <div class="col-sm-10 col-md-7">
                            <input type="email" class="form-control" name="email" required='required' value="<?php echo $fun['email']?>">
                        </div>
                    </div>
                    <!-- End Email From  -->
                    <!-- Start Full Name From  -->
                    <div class="form-gruop ">
                        <label class="col-sm-2">Full Name</label>
                        <div class="col-sm-10 col-md-7">
                            <input type="text" class="form-control" required='required' name="full" autocomplete="off" value="<?php echo $fun['fullName'] ?>">
                        </div>
                    </div>
                    <!-- End Full Name From  -->
                    <!-- Start Sumbit From  -->
                    <div class="form-gruop">
                        <input type="submit" value="Update" class="btn btn-dark btn-lg">
                    </div>
                </div>




        <?php 
            }
            else{
                echo 'Theres No Such ID';
            }
    }else if($do == 'Update'){

        // UPDATE PAGE
        echo '<h1 class="text-center">Update Member</h1>';
        echo "<div class='container'>";
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $id       = $_POST['ID'];
            $user     = $_POST['username'];
            $email    = $_POST['email'];
            $full     = $_POST['full'];

            $password = '';

            if(empty($_POST['newpasseord'])){

                $password = $_POST['oldpasseord'];
            }
            else{

                $password = $_POST['newpasseord'];

            }

            $Errors = array();  #ERROR ARRAY OF OLL MESSGIN

            if(empty($user)){ #USER NAME
                $Errors[] = "<div class='alert alert-danger'> Username Cont Be Empty</div>";
            }
            if(empty($email)){ #EMAIL
                $Errors[] = "<div class='alert alert-danger'>Email Cont Be Empty </div>";
            }
            if(empty($full)){ #FULL NAME
                $Errors[] = "<div class='alert alert-danger'> Full Name Cont Be Empty</div>";
            }
            if($password < 5) { #PASSWORD
                $Errors[] = "<div class='alert alert-danger'> Sarry Password Cont Be Less Thab 4 </div>";
            }

            foreach ($Errors as $Error) { #FOREACH ERROR
                echo $Error;
            }
            if(empty($Errors)){

              // UPDATE DATE FORM UPDATE PAGES
              $stmt = $connect->prepare("UPDATE users SET usename = ? , email =? , pass = ?, fullName = ? WHERE id = ?");
              $stmt->execute(array($user  , $email , $password , $full , $id ));
  
              echo $stmt->rowCount() . 'Update Complet';
            }


            

        }else{
            echo 'Sarry You cont Update The Date';
        }
        echo "</div>";
    }

        include $Templates . 'footer.php';
    }
    else{
        header('location:index.php');
        exit();
    }