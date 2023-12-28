<?php
if(session_id() == '') {
    session_start();
}
$nameValue = "";
$mobileValue = "";
$emailValue = "";
$passValue = "";
$addressValue = "";

$findError = false;
$msgClass = "";
$errorMsg = '';
$successMsg = '';
$msgText = '';
$hideForm = '';

if (!empty($_SESSION['userlogin'])) {
    echo '<meta http-equiv="refresh" content="0.1;url=index.php">';
}

if(sizeof($_POST)>0){
    $nameValue = $_POST['name'];
    $mobileValue = $_POST['mobile'];
    $emailValue = $_POST['email'];
    $passValue = $_POST['password'];
    $addressValue = $_POST['address'];
    $findMobileNo = checkMobileNumber($mobileValue, $mysqli);
    $findEmailId = checkEmailId($emailValue, $mysqli);
    if($findMobileNo>0 && $findEmailId>0){
        $findError = true;
        $msgText = "Email id and Mobile no are already exist.";
    }else if($findMobileNo>0 && $findEmailId==0){
        $findError = true;
        $msgText = "Mobile no is already exist.";
    }else if($findMobileNo==0 && $findEmailId>0){
        $findError = true;
        $msgText = "Email id is already exist.";
    }
    if($findError){
        $msgClass = "red-msg";
    }else{
        $lastId = createStudent($mysqli, $nameValue, $mobileValue, $emailValue, $addressValue, $passValue);
        $_SESSION['userlogin'] = true;
        $_SESSION['userid'] = $lastId;
        $msgClass = "green-msg";
        $msgText = "Successfully Created.";
        ?>
        <script>
            $( document ).ready(function() {
                window.setTimeout(location.href = "",3000);
            });
        </script>
    <?php
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
                            <h4>Sign Up</h4>
                            <span class="<?php echo $msgClass; ?>"><?php echo $msgText; ?></span>
                        </div>
                        <div class="card-body">
                            <form class="email-form1" onsubmit="return checkSignUpForm();" action="" method="post" role="form" >
                                <div class="form-group">
                                    <label for="name">Name:</label><span id="errorname" class="error-span"></span>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required minlength="3" value="<?php echo $nameValue; ?>"  >
                                </div>
                                <div class="form-group py-3">
                                    <label for="mobile">Mobile No.:</label><span id="errormobile" class="error-span"></span>
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile no"  required minlength="10" value="<?php echo $mobileValue; ?>">
                                </div>
                                <div class="form-group py-1">
                                    <label for="email">Email Id.:</label><span id="erroremail" class="error-span"></span>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email id" minlength="5" value="<?php echo $emailValue; ?>">
                                </div>
                                <div class="form-group py-3">
                                    <label for="password">Password:</label><span id="errorpassword" class="error-span"></span>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required minlength="3" value="<?php echo $passValue; ?>">
                                </div>
                                <div class="form-group py-1">
                                    <label for="address">Address:</label><span id="erroraddress" class="error-span"></span>
                                    <input type="textarea" class="form-control" id="address" name="address" placeholder="Enter your address" required  minlength="5" value="<?php echo $addressValue; ?>">
                                </div>
                                <div class="form-group py-3" >
                                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br /><br /><br /><br /><br /><br /><br /><br />
    </section><!-- End Contact Section -->
<script>
    function checkSignUpForm(){
      var isFormValid = true;
      var mobile = ($("#mobile").val()).trim();

      if(isNaN(mobile)){
          isFormValid = false;
          $("#errormobile").html("Mobile no should be number");
      }

      return isFormValid;
    }

    $( document ).ready(function() {

        $("input").on( "keypress", function(e) {
            $(this).removeClass("add-error");
            var removeErrorName = e.target.id;
            $("#error"+removeErrorName).html("");
        });

        $("input").on( "keyup", function(e) {
            $(this).removeClass("add-error");
            var removeErrorName = e.target.id;
            $("#error"+removeErrorName).html("");
        });

    });


</script>