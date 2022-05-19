<?php include 'connect.php';

    session_start();

    $TitlePags = "Catogery";

    if(isset($_SESSION['Username'])){
        include 'ins.php';

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if( $do == 'Manage'){ # Star do = Manager
        ?>
        <!-- start nav List  -->
        <div class="container bg-dark list">
            <div class="row">
                <div class="col">
                    <h4>List of Catogery</h4>
                </div>
                <div class="col">
                    <button class="btn btn-success">
                        <a href="?do=Add" class="nav-link">Add Catogery</a>
                    </button>
                </div>
            </div>
        </div>
        <!-- End nav List  -->
<?php    $link = mysqli_connect("localhost", "root", "", "shop");


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$sql = "SELECT * FROM catogery";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){ ?>
        <div class="container">
        <table class='table Tables'>
            <thead class="table-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
            </thead>

<?php      while($row = mysqli_fetch_array($result)){?>
            <tr>
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['names']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
                <button class="btn btn-success">
                    <a href="?do=Update" class="btn btn-sm">Update</a>
                </button>
            </td>
            <td>
                <button class="btn btn-danger">
                <a href="?do=Update" class="btn btn-sm">Remove</a>    
                </button>
            </td>
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



        }# End do = Manager
            elseif( $do == 'Add'){ # Add catogery
?>
            <h2 class="text-center h-add">Add New Catogery</h2>
            <form class="form-horizontal add-form" method="POST" action="?do=Insert">
                <div class="form-gruop">
                    <div class="col-sm-10 col-md-5">
                        <input type="text" class="form-control input" hidden name="id">
                    </div>
                    <div class="col-sm-10 col-md-5">
                        <input type="text" class="form-control input" name="username">
                    </div>
                    <div class="col-sm-10 col-md-5">
                        <input type="text" class="form-control input" name="description">
                    </div>
                    <div class="col-sm-10 col-md-5">
                        <input type="submit" value="insert" class="btn btn-danger">
                    </div>
                </div>
            </form>

<?php
        }elseif( $do == 'Insert'){ # Start insert page

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id           = $_POST['id'];
                $name         = $_POST['username'];
                $description  = $_POST['description'];



                $insert = $connect->prepare("INSERT INTO catogery (id, names, description) VALUES ( 0 , ?, ? , ?)");
                $insert->execute(array($id , $username ,$description));
                $insert->rowCount() . 'ds';
            }

        }elseif($do == 'Update'){?>



            <h2 class="text-center h-add">Add New Catogery</h2>
            <form class="form-horizontal add-form" method="POST" action="?do=Update" >
                <div class="form-gruop">
                    <div class="col-sm-10 col-md-5">
                        <input type="text" class="form-control input" name="username" required="required"  autocomplete="off" placeholder="Name">
                    </div>
                </div>
                <div class="form-gruop">
                    <div class="col-sm-10 col-md-5">
                        <input type="text" class="form-control input" name="description"  required="required" autocomplete="off" placeholder="Your Description">
                    </div>
                </div>
                <div class="form-gruop">
                    <input type="submit" value="UPDATE" class="btn btn-dark btn-lg ins">
                </div>
            </form>
<?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
                $name         = $_POST['username'];
                $description  = $_POST['description'];

                $update = $connect->prepare("UPDATE catogery SET  names = ? , description = ? WHERE id = 'id' ");
                $update->execute(array($name , $description));

                echo  "<div class='alret alret-success>'" . $update->rowCount() . "</div>";

            }
        }
    }else{
        header('location:index.php');
        exit();
    }







?>
