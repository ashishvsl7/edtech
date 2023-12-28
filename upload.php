<?php
$msgText = ""; // show the message
$msgTextCss = "";
if(sizeof($_POST)>0){
        if (isset($_FILES["pdffile"])) {
            $file = $_FILES["pdffile"];
            if ($file["error"] == 0) {
                $uploadDir = "uploads/";
                $uniqueFilename = uniqid() . '_' . basename($file["name"]);
                $uploadPath = $uploadDir . $uniqueFilename;
                move_uploaded_file($file["tmp_name"], $uploadPath);
                $md = md5_file($uploadPath, false);
                $fetchData = validateMD5($mysqli, $md);
                $row =  mysqli_num_rows($fetchData);
                if($row==0){
                    $msgText = "Uploaded file is invalid certificate.";
                    $msgTextCss = "redMsg";
                }else{
                    $msgText = "Uploaded file is valid certificate.";
                    $msgTextCss = "green-msg";
                }
            } else {
                $msgTextCss = "redMsg";
                $msgText =  "No file selected.";
            }
        } else {
            $msgTextCss = "redMsg";
            $msgText =  "No file selected.";
        }
}
?>
    <!-- ======= Upload Section ======= -->
    <section>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Upload a pdf file</h4>
                            <div class="<?php echo $msgTextCss; ?>"><?php echo $msgText; ?></div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group py-3">
                                    <label for="pdffile">Choose a PDF file:</label>
                                    <input type="file" name="pdffile" id="pdffile">
                                </div>
                                <div class="form-group py-3" >
                                    <button type="submit"  name="submit" class="btn btn-primary btn-block">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
