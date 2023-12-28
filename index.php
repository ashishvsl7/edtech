<!-- Header Started Here -->
<?php include 'header.php'; ?>
<!-- Header End Here -->

<!-- Menu Started Here -->
<?php include 'menu.php'; ?>
<!-- Menu End Here -->

<!-- Body Started Here -->
<?php
$pid = '';
if(sizeof($_REQUEST)>0){
    if (!empty($_REQUEST['pid'])) {
        $pid = $_REQUEST['pid'];
    }
    switch ($pid) {
        case "signin":
            include 'login.php';
            break;
        case "signup":
            include 'signup.php';
            break;
        case "chp":
            include 'certificate.php';
            break;
        case "crsearch":
            include 'certificatesearch.php';
            break;
        case "crupload":
            include 'upload.php';
            break;
        case "logout":
            session_destroy();
            echo '<meta http-equiv="refresh" content="0.1;url=index.php">';
            break;
        default:
            include 'courses.php';
            break;
    }

}else{
    include 'courses.php';
}
?>
<!-- Body End Here -->

<!-- Footer Started Here -->
<?php include 'footer.php'; ?>
<!-- Footer End Here -->