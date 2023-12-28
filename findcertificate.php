<?php
include_once "dbconnect.php";
if(sizeof($_REQUEST)>0 && !empty($_REQUEST['crtno'])) {



    $crtno = $_REQUEST['crtno'];
    $dummyPrintData = findCertficate($mysqli, $crtno);
    $printData = mysqli_fetch_all($dummyPrintData, MYSQLI_ASSOC);
    $row =  mysqli_num_rows($dummyPrintData);
    if($row==0){
        ?>
        <h1>Certificate no found.</h1>
        <?php
    }else{

    ?>
    <div class="row g-5" id="pdfportion" data-no="<?php echo $printData[0]['stu_name'];?>_0">
        <div class="cert_img_1"></div>
        <div class="img18"></div>
        <div class="img29"></div>
        <div class="img29_1"></div>
        <div class="img30"></div>
        <div class="text1">CERTIFICATE OF ACHIEVEMENT</div>
        <div class="text2">Congratulations!</div>
        <div class="text3"><?php echo $printData[0]['stu_name'];?></div>
        <div class="text4">for successfully completing an online course on!</div>
        <div class="text5"><?php echo $printData[0]['co_name'];?></div>
        <div class="text10"></div>
        <div class="text11">Mr. ABC </div>
        <div class="text12">President - Ed-Tech Courses</div>
        <div class="bagelogo"></div>
        <div class="text13">Date : <?php echo  date("d-M-Y", strtotime($printData[0]['crt_issue_date'])); ;?></div>
        <div class="text14">Certificate No. : <?php echo  $printData[0]['unique1']; ?></div>

    </div>
<?php
    }
}else{
    ?>
    <h1>Certificate no found.</h1>

<?php
}
?>


