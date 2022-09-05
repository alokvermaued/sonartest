<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php');
include('admin/connection.php');

?>

<body>
    <div class="wrapper">
        <!-- Top Bar Start -->
        <?php include('include/header.php') ?>


        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Saller Page</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Saller Page</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- formsDeatails -->
        <div class="portfolio">
            <div class="container">
                <div class="form-contant">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="img-forms">
                                <img src="./img/automatic-vertical-form-fill1111.jpg" alt="">
                                <!-- C:\xampp\htdocs\testlogin\img -->
                            </div>
                        </div>
                        <?php
                        $login = false;
                        $showError = false;
                        if (isset($_POST['submit'])) {
                            $pname = $_POST['pname'];
                            $pdesc = $_POST['pdesc'];
                            $phone = $_POST['phone'];
                            $image = $_FILES['image'];
                            $brand = $_POST['brand'];
                            $agrade = $_POST['agrade'];
                            $image = $_FILES['image']["name"];
                            $tempname = $_FILES['image']["tmp_name"];
                            $folder = 'img/' . $image;



                            move_uploaded_file($tempname, $folder);

                            $query = mysqli_query($conn, "insert into bform ( `pname`, `pdesc`, `phone`, `image`, `brand`, `agrade`) values
                            ('$pname','$pdesc','$phone','$folder','$brand','$agrade')");
                            if($query){
                                $login = true;
                                header("location: saller.php");
                            }
                            else {
                                $showError = "something wrong";
                            }
                        }
                        ?>
                        <div class="col-lg-6">
                            <div class="forms">
                                <form action=""id="form1" method="POST" enctype="multipart/form-data" onsubmit="return myfun()">
                                <?php
                                    if ($login) {
                                    
                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Form submited Successfully.....</strong>
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
                                    <label for="">Product Name: </label>
                                    <input type="text" required id="name"name="pname" placeholder="Enter Your Name">
                                    <label for=""> Product Decrbication: </label>
                                    <textarea id="pdesc" name="pdesc" placeholder="Enter About Product Decrbication" value=""></textarea>
                                    <label for="">Mobile Number: </label>
                                    <span id="messages"></span>
                                    <input type="text" required id="mobi" name="phone" min="1" max="10" placeholder="Enter Your Mobile Number">
                                    <label for="">Product Image </label>
                                    <input type="file" required value="" id="img" name="image" placeholder="Upload Product Image">
                                    <label for="">Product Brand </label>
                                    <input type="text" required name="brand" id="ab" placeholder="Enter Product Brand">
                                    <label for="">Automaction Grade </label>
                                    <input type="text" required name="agrade" id="ag"placeholder="Enter Product Automaction Grade">
                                    <!-- <input type="button" name="submit"value='Submit' class="btn btn-success" id="form-submit-btn"> -->
                                    <button type="submit" onClick="clickme()" name="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="forms">
                </div>
            </div>
        </div>
        <!-- formsDetails  -->
        


        <!-- Footer Start -->
        <?php include('include/footer.php') ?>
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>
    <!-- <script src="js/sweetalert.js"></script> -->
    <!-- <script>
        // swal("Good job!", "You clicked the button!", "success");
    </script> -->

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        function myfun() {

            var a = document.getElementById("mobi").value;
            if (a == "") {
                document.getElementById("messages").innerHTML = "**pleace fill mobilr number"
                return false;
            }
            if (isNaN(a)) {
                document.getElementById("messages").innerHTML = "**only number allowed"
                return false;

            }
            if (a.length < 10) {

                document.getElementById("messages").innerHTML = "**Mobile number must be 10 digit only "
                return false;
            }
            if (a.length > 10) {

                document.getElementById("messages").innerHTML = "**Mobile number must be 10 digit only "
                return false;
            }
        
        }

       
        
       
    </script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
   <!-- <script>
    $('#submit').clickme(function(){
    $('#form1').submit();
});
   </script> -->
</body>

</html>
<!-- <?php 
        // echo '<script language="javascript">';
        // echo 'alert("message successfully sent")';
        // echo '</script>';
        ?> -->