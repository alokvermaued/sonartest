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
                        <h2>Our Products Details</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Products Details</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- productDeatails -->
        <?php
        $url = "http://localhost/testlogin/admin/";
        $vid = $_GET['id'];
        $ret = mysqli_query($conn, "select * from product where ID =$vid");
        $cnt = 1;
        while ($row = mysqli_fetch_array($ret)) {

        ?>
            <div class="portfolio">
                <div class="container">
                    <div class="product-details">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="img-prd">
                                    <div class="product-det-image">
                                        <img src="<?php echo $url . $row['pro'] ?>" alt="">
                                    </div>
                                </div>
                                <div class="product-button">
                                    <a href="#" class="btn">Connact To Saller</a>
                                    <a href="#" class="btn btn-1">By Now</a>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-info">
                                    <h3 class='p-name'><?php echo $row['pname']; ?></h3>
                                    <!-- <h5>&#8377; <b>20000</b><a href="">Get Latest Prize</a> </h5> -->
                                    <h5>Product Description</h5>
                                    <p><?php echo $row['pdse']; ?></p>
                                    <div class="table-details">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Brand</td>
                                                    <td><b> PMI</b></td>
                                                </tr>
                                                <tr>
                                                    <td>Automation Grade</td>
                                                    <td><b> Automatic</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php
                                    $cnt = $cnt + 1;
                                } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product Details  -->


            <!-- Footer End -->

            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </div>
    <?php include('include/footer.php') ?>

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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>