<?php
$courseDetails = allCourses($mysqli);
$lenOf = sizeof($courseDetails);


?>
<!-- Courses Start -->
<div class="container-fluid pt-6 px-5" id="courses">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h1 class="display-5 mb-0">Courses</h1>
        <hr class="w-25 mx-auto bg-primary">
    </div>
    <div class="row g-5">
        <?php
        for($x=0; $x<$lenOf; $x++) {
        ?>
            <div class="col-lg-4 col-md-6">
                <div class="service-item bg-secondary text-center px-5">
                    <div class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                        <i class="fa fa-book-open fa-2x"></i>
                    </div>
                    <h3 class="mb-3"><?php echo $courseDetails[$x]["co_name"];?></h3>
                    <p class="mb-0">Dummy text</p>
                    <a href="?pid=chp&coid=<?php echo $courseDetails[$x]["co_id"];?>" class="btn btn-primary btn-block startReading">Start Reading</a>
                    <br/>
                    <?php
                    if(!empty($_SESSION['userlogin'])) {
                        ?>
                        <a href="?pid=chp&coid=<?php echo $courseDetails[$x]["co_id"]; ?>"
                           class="btn btn-primary btn-block startReading">Complete Your Course</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<!-- Courses End -->

