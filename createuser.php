<?php
//include 'header.php';


if($_SESSION['userType']!="superadmin"){
    include 'pagenotfound.php';
    return;
}else{

}

$msgText = '';
$uname = '';
$password = '';
$ustatus = 'A';
$utype = 'user';

$smsg = '';
$successFullMsg = '';
$successFullMsg1 = "display:none;";

if(sizeof($_POST)>0){

  if(!empty($_POST['username'])){
      $uname = $_POST['username'];
  }
  if(!empty($_POST['password'])){
      $password = $_POST['password'];
  }

  if(!empty($_POST['userstatus'])){
      $ustatus = $_POST['userstatus'];
  }

    if(!empty($_POST['usertype'])){
        $utype = $_POST['usertype'];
    }


    $query = "SELECT * FROM `users` WHERE `uemail`='".$uname."'";
    $result = $mysqli->query($query);
    $row = $result->fetch_row();
    $emailFound = $row[0];
    $countE = mysqli_num_rows($result);

    $mobileFound = 0;

    if($row[0]==0){
         $sqlI="INSERT INTO `users` (`uemail`, `upassword`, `utype`, `ustatus`) VALUES ('$uname', '$password', '$utype', '$ustatus ');";
    $resultI = $mysqli->query($sqlI);

        $msgText = '<b>User Created Successfully.</b>';
    }else{
        $msgText = '<b>User already exits.</b>';
    }



}
?>

  <main id="main">

      <!-- ======= Create User Section Start======= -->
      <section >
          <div class="card-body">
              <h5><?php echo $msgText; ?></h5>
          </div>
          <div class="container mt-5">
              <div class="row justify-content-center">
                  <div class="col-md-6">
                      <div class="card">
                          <div class="card-header">
                              <h4>Create User</h4>

                          </div>

                          <div class="card-body">
                              <form action="" method="post" role="form" class="email-form1">
                                  <div class="form-group">
                                      <label for="username">Username:</label>
                                      <input type="email" class="form-control" id="username" name="username" placeholder="Enter email id" required >
                                  </div>
                                  <div class="form-group py-3">
                                      <label for="password">Password:</label>
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required >
                                  </div>
                                  <div class="form-group py-3">
                                      <label for="usertype">User Type:</label>
                                      <select id="usertype" class="form-control" >
                                          <option value="user">User</option>
                                          <option value="admin">Admin</option>
                                          <option value="superadmin">Super Admin</option>
                                      </select>

                                  </div>
                                  <div class="form-group py-3">
                                      <label for="userstatus">User Status:</label>
                                      <select id="userstatus" class="form-control" >
                                          <option value="A">Active</option>
                                          <option value="I">Inactive</option>
                                      </select>
                                  </div>
                                  <div class="form-group py-3" >
                                      <button type="submit" class="btn btn-primary btn-block">Create</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </section>
      <!-- ======= Create User Section End ======= -->
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />



  </main>
  <!-- End #main -->
