<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="?" class="navbar-brand p-0">
            <h1 class="m-0 text-uppercase1 text-primary">
                Ed-Tech
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 me-n3">
                <a class="nav-item nav-link active" href="?pid=hom">Home</a>
                <?php
                if(empty($_SESSION['userlogin'])){
                 ?>
                    <a href="?pid=signup" class="nav-item nav-link">Sign Up</a>
                    <a href="?pid=signin" class="nav-item nav-link">Sign In</a>
                <?php
                }
                ?>

<!--                <div class="nav-item dropdown">-->
<!--                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">User</a>-->
<!--                    <div class="dropdown-menu m-0">-->
<!--                        <a href="?pid=ctuser" class="dropdown-item">Create User</a>-->
<!--                        <a href="?pid=upuser" class="dropdown-item">Update User</a>-->
<!--                        <a href="?pid=user" class="dropdown-item">All User</a>-->
<!--                    </div>-->
<!--                </div>-->

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Verfication</a>
                    <div class="dropdown-menu m-0">
                        <a href="?pid=crupload" class="dropdown-item">By Upload</a>
                        <a href="?pid=crsearch" class="dropdown-item">By Certificate No.</a>
                    </div>
                </div>
                <?php
                if(!empty($_SESSION['userlogin'])){
                ?>
                    <a href="?pid=logout" class="nav-item nav-link">Logout</a>
            <?php
            }
            ?>

            </div>
        </div>
    </nav>