<?php

$fileName = "";
if (empty($_SESSION['userlogin'])) {
    echo '<meta http-equiv="refresh" content="0.1;url=index.php">';
}

if(sizeof($_REQUEST)>0) {
    if (empty($_REQUEST['pid']) || empty($_REQUEST['coid'])) {
        echo '<meta http-equiv="refresh" content="0.1;url=index.php">';
    }
    if (!empty($_REQUEST['pid'])) {
        $pid = $_REQUEST['pid'];
    }

    if (!empty($_REQUEST['coid'])) {
        $courseId = $_REQUEST['coid'];
    }

    $userId = $_SESSION['userid'];

    $fetchData = checkCertificateIsGenerated($mysqli, $courseId, $userId);
    $row =  mysqli_num_rows($fetchData);

    if($row==0){

        $milliseconds = floor(microtime(true) * 1000);
        $uniqid = uniqid(time(), true);
        $fetchData = generateCertificate($mysqli, $courseId, $userId, $milliseconds, $uniqid);
        $row =  mysqli_num_rows($fetchData);
    }

    $updatedData = mysqli_fetch_all ($fetchData, MYSQLI_ASSOC);
    $dummyPrintData = certificateFinalDetails($mysqli, $updatedData[0]['co_id'], $updatedData[0]['stu_id']);
    $printData = mysqli_fetch_all($dummyPrintData, MYSQLI_ASSOC);
//    var_dump($printData[0]);

    $fileName = $printData[0]['unique1'];


}else{
    echo '<meta http-equiv="refresh" content="0.1;url=index.php">';
}

$courseDetails = allCourses($mysqli);
$lenOf = sizeof($courseDetails);
?>
<!-- Courses Start -->
<div class="container-fluid pt-6 px-5" id="courses">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h1 class="display-5 mb-0">CERTIFICATE</h1>
        <hr class="w-25 mx-auto bg-primary">
        <input type="hidden" id="filename" name="filename" value="<?php echo $fileName;?>"/>
        <input type="hidden" id="crtno" name="crtno" value="<?php echo $printData[0]['unique1'];?>"/>
        <input type="hidden" id="stname" name="stname" value="<?php echo $printData[0]['stu_name'];?>"/>
        <input type="hidden" id="coname" name="coname" value="<?php echo $printData[0]['co_name'];?>"/>
        <input type="hidden" id="crtdate" name="crtdate" value="<?php echo date("d-M-Y", strtotime($printData[0]['crt_issue_date']));?>"/>
        <input type="hidden" id="crtid" name="crtid" value="<?php echo $printData[0]['crt_id'];?>"/>

        <?php
        $cidFind =$printData[0]['crt_id'];
       $querys ="SELECT * FROM `certificate` WHERE `crt_id` = $cidFind";
        $results = $mysqli->query($querys);
        $allData =  mysqli_fetch_all ($results, MYSQLI_ASSOC);
        if(empty($allData[0]['mdcode'])){
            ?>
            <button class="btn btn-primary btn-block Codescratcher_btn" type="button" id="download" value="DOWNLOAD" data-no="">SAVE</button>
            <?php
        }else{
            ?>
            <a href="<?php echo $printData[0]['unique1'];?>.pdf" class="btn btn-primary btn-block Codescratcher_btn" id="aclick" target="_blank">DOWNLOAD</a>
            <?php
        }
        ?>

    </div>

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
        <div class="text13">Date : <?php echo  date("d-M-Y", strtotime($printData[0]['crt_issue_date'])); ?></div>
        <div class="text14">Certificate No. : <?php echo  $printData[0]['unique1']; ?></div>

    </div>

</div>
<!-- Courses End -->

<script>

    $(document).ready(function() {
//        $('.Codescratcher_btn').click(function() {
//            var id = "pdfportion"; //$(this).attr("data-no");
//            var pdfName_1 = id.split("_");
//            pdfName_1.pop();
//            pdfName_1 = pdfName_1.join("_");
//
//            pdfName_1 = $("#filename").val();
//            var pdfname = pdfName_1 + '.pdf';
//            var options = {
//            };
//            var pdf = new jsPDF('l', 'pt', 'a4');
//            pdf.addHTML($("#"+id), 0, 0, options, function() {
//                pdf.save(pdfname);
//            });
//        });


        $('.Codescratcher_btn').click(function() {
            var crtno = $("#crtno").val();
            var name = $("#stname").val();
            var courseName = $("#coname").val();
            var crtdate = $("#crtdate").val();
            var crtid = $("#crtid").val();
            var u = "generatecertificate.php?crtno="+crtno+"&name="+name+"&co="+courseName+"&crtdate="+crtdate+"&crtid="+crtid;
            $.ajax({
                url: u,
                success: function( data ) {
                    $("#aclick").show();
                    $("#download").hide();
                }
            });
        });



    });
</script>