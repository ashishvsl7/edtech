<?php
if(sizeof($_REQUEST)>0) {
    if (!empty($_REQUEST['pid'])) {
        $pid = $_REQUEST['pid'];
    }
}else{
    echo '<meta http-equiv="refresh" content="0.1;url=index.php">';
}
?>
<!-- Courses Start -->
<div class="container-fluid pt-6 px-5" id="courses">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Find Certificate</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" role="form" class="email-form1">
                            <div class="form-group">
                                <input type="text" class="form-control" id="crtno" name="crtno" placeholder="Enter your Certificate No." required minlength="10" >
                            </div>
                            <div class="form-group py-3" >
                                <button id="findCertificateNo" type="button"  class="btn btn-primary btn-block">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="result1">
        </div>
    <div id="result" style="display: none;">
        <div class="row g-5" id="pdfportion" data-no="_0">
            <div class="cert_img_1"></div>
            <div class="img18"></div>
            <div class="img29"></div>
            <div class="img29_1"></div>
            <div class="img30"></div>
            <div class="text1">CERTIFICATE OF ACHIEVEMENT</div>
            <div class="text2">Congratulations!</div>
            <div class="text3"></div>
            <div class="text4">for successfully completing an online course on!</div>
            <div class="text5"></div>
            <div class="text10"></div>
            <div class="text11">Mr. ABC </div>
            <div class="text12">President - Ed-Tech Courses</div>
            <div class="bagelogo"></div>
            <div class="text13">Date : </div>
            <div class="text14">Certificate No. : </div>

        </div>
    </div>

</div>
<!-- Courses End -->

<script>
    $(document).ready(function() {
        $("#findCertificateNo").click(function(){
            var crtno = $("#crtno").val();
            $("#result1").html("");
            var u = "findcertificate.php?crtno="+crtno;
            $.ajax({
                url: u,
                success: function( data ) {
                    $("#result1").html(data);
                }
            });
        });
    });
</script>