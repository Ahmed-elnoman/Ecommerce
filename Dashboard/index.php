<?php 

        session_start();
        $onNavbars = '';    

        $TitlePags = 'Login';
    include 'ins.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usernames      = $_POST['user'];
        $passwrods      = $_POST['pass'];
        $hsahedPassword = sha1($passwrods);

        

        if(isset($usernames) && isset($passwrods)){
            $stmt = $connect->prepare('SELECT id , usename , pass FROM users WHERE usename = ? AND pass = ?  AND group_id = 1 LIMIT 1');
            $stmt->execute(array($usernames , $passwrods));
            $Fonc = $stmt->fetch();
            $count = $stmt->rowCount();
    
            if($count > 0) {

                    $_SESSION['Username'] = $usernames;
                    $_SESSION['ID']       = $Fonc['id'];
                    header('Location:home.php');
                    exit();
            }else{?>
                <div class='alert container Error' >Sorry You dont have ane account</div>
<?php
            }
        }


    }

?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="from-log">
    <h3 class="Admin">Admin Login</h3>
    <input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off" required="required">
    <input class="form-control" type="password" name="pass" placeholder="password" autocomplete="new-password" required="required">
    <input class="btn btn-dark" type="submit" value="Log">
</form>

<?php include $Templates . 'footer.php'; ?>