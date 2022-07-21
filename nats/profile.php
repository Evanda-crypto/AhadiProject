<?php
include("includes.php");
include("session.php");
include("../config/config.php");
?>
<?php
$id=$_SESSION['ID'];
if (isset($_POST["submit"])) {
    $Password = trim($_POST["password"]);
    $FirstName = trim($_POST['FName']);
    $LastName = trim($_POST['LName']);
    $Email = trim($_POST['email']);
    $newpass = trim($_POST['newpass']);

    $hashpass= password_hash($newpass,PASSWORD_DEFAULT);

    if (!$connection) {
        echo "<script>alert('There is no connection at this time.Please try again later.');</script>";
        echo '<script>window.location.href="login.php";</script>';
    }
    else{
        $stmt = $connection->prepare("SELECT * from Users where ID= ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if (password_verify($Password, $data["Password"])) {
                $sql="update Users set FirstName='$FirstName',LastName='$LastName',Email='$Email',Password='$hashpass' where ID=$id";
                $result=mysqli_query($connection,$sql);
                if ($result) {
                  echo '<script>alert("Password reset Succesfull")</script>';
                    echo '<script>window.location.href="../config/logout.php";</script>';
                } else {
                  echo '<script>alert("An Error occured please retry again!")</script>';
                    echo '<script>window.location.href="profile.php";</script>';
                }
            }
            else{
                echo "<script>alert('Current password is wrong');</script>";
                echo '<script>window.location.href="profile.php";</script>';
            }
        }
    }
    
}


?>

    <title>Profile</title>
        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="round-img">
                                                    <a href="#"><center><img class="rounded-circle" src="../images/avatar/profile.png" alt=""></center></a>
                                                </div>
                        <div class="card-body card-block">
                            <form action="" method="post" class="" autocomplete="off">
                            <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="text" id="email" name="id" value="<?php echo $_SESSION['ID']?>" placeholder="ID" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="username" name="FName" value="<?php echo $_SESSION['FName']?>" placeholder="First Name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="username" name="LName" placeholder="Last Name" value="<?php echo $_SESSION['LName']?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $_SESSION['nats']?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input type="password" id="password" name="password" placeholder="Current Password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input type="password" id="password" name="newpass" placeholder="New Password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-actions form-group"><button type="submit" name="submit" class="btn btn-warning btn-sm">Change Pass</button></div>
                            </form>
                        </div>
                    </div>
                </div>
</div>
            </div>


        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

</div><!-- /#right-panel -->
