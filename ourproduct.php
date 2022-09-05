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
                        <h2>Our Products</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Products</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Portfolio Start -->
        <div class=".back_about">
        <div class="container">
            <!-- <div class="section-header text-center">
                <p>Our Products</p>
                <h2>See Our Products</h2>
            </div> -->
            <div class="row">
                        <?php
                        include 'connection.php';
                        $url = "http://localhost/testlogin/admin/";
                        $sql = "SELECT * FROM `product`";
                        $count = 1;
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0)
                            while ($row = mysqli_fetch_array($result)) {
                        ?>

                            <div class="col-lg-4 col-md-4">
                                <div class="card product_card" style="width: 18rem;">
                                    <img class="card-img-top" src="<?php echo  $url . $row['pro'] ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo  $row['pname'] ?></h5>
                                        <p class="card-text show_text"><?php echo $row['pdse'] ?></p>
                                        <a href="prodectdetails.php?id=<?php echo $row['id']; ?>" class="img-name btn btn-primary text-light">Read More...</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            ?>
                        <?php } ?>
                    </div>
                </div>
                </div>


            <!-- Portfolio End -->


            <!-- Footer Start -->

            <!-- Footer End -->

            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
       

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