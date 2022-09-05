<?php
session_start();
include('includes/head1.php');
include('includes/header1.php');
include('connection.php');
?>
<?php
$uname = $_SESSION['user_name'];

if ($uname == true) {
} else {
    header('location:index.php');
}
if ('header') {

    echo 'data insert';
    header('location:index.php');
}

?>


<?php

if ($showAlert) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hurry !!!!</strong> Your data is insert successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}

if ($showError) {

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
}
?>
<div class="container">
    <div class="adminForm card m-3 p-5">
        <h3 class="text-center bg-success p-2 text-white rounded-2 mb-2" style="margin-top: -72px;">Update Banner</h3>
        <div style="text-align:center;" class="product-contant-update">
            <div class="from-group">
                <div class="img-img-update">
                    <img src="img/slider-3.jpg" height="200px" width="300px">
                </div>
            </div>
            <div class="update-product">
                <input type="file" class="form-control mb-2" name="file" value="img/slider-3.jpg"><br>
                <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
            </div>
        </div>
        <div class="table-div">
            <h3 class="text-center bg-success p-2 mb-3 my-4 text-white"> Upload Banner</h3>>

            <!-- <form action="" method="POST"> -->
            <form class="container" action="banner.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-8">
                        <div class="from-group">
                            <label for="file">Banner pic:</label>
                            <input type="file" id="file" name="file" class="form-control">
                        </div>
                        <input type="submit" name="submit" value="Upload" class="btn btn-success my-3">
                    </div>
                </div>





            </form>
        </div>
    </div>

    <?php include('includes/footer1.php'); ?>