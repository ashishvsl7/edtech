<?php
if(session_id() == '') {
    session_start();
}

$errorMsg = '';
$successMsg = '';
$msgText = '';
$hideForm = '';

if (!empty($_SESSION['userlogin'])) {
    echo '<meta http-equiv="refresh" content="0.1;url=index.php">';
}
if(sizeof($_POST)>0){
    $mobileno = $_POST['username'];
    $password = $_POST['password'];
    $loginDetails = checkLoginConfirmation($mysqli, $mobileno, $password);
    $row = $loginDetails->fetch_row();
    if($row[0]==0){
        $msgText = '<b>Login Failed. Please input correct details.</b>';
    }else{
       echo '<meta http-equiv="refresh" content="1;url=index.php">';
        $msgText = '<b>Login Successfully.</b>';
        if($row[0]>0){
            $_SESSION['userid'] = $row[0];
            $_SESSION['username'] = $row[1];
        }
       $_SESSION['userlogin'] = true;
        $hideForm = 'style="display:none;"';
    }
}


?>
    <!-- ======= Login Section ======= -->
    <section >
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Login</h4>
                            <h5><?php echo $msgText; ?></h5>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" role="form" class="email-form1">
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your mobile no." required minlength="10" >
                                </div>
                                <div class="form-group py-3">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required >
                                </div>
                                <div class="form-group py-3" >
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- End Contact Section -->
