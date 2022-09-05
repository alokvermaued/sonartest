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
?>
<!-- UPDATE `banner` SET `id`='[value-1]',`image`='[value-2]' WHERE 1 -->

<?php
if (isset($_POST['submit'])) {
    $id = $_GET['id'];

    $pname = $_POST['pname'];
    $pdse = $_POST['pdse'];
    $file = $_FILES['file']["name"];
    $tempname = $_FILES['file']["tmp_name"];
    $folder = 'img/' . $file;
    move_uploaded_file($tempname, $folder);
    // UPDATE `product` SET `id`='[value-1]',`pname`='[value-2]',`pro`='[value-3]',`pdse`='[value-4]' WHERE 1

    $query = mysqli_query($conn, "UPDATE product set pname='$pname', pro='$folder', pdse='$pdse'   WHERE id='$id'");

    if ($query) {
        echo "<script>alert('You have successfully update the data');</script>";
        echo "<script type='text/javascript'> document.location ='products.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>



<section id="home_top" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; border-left: solid;border-right: solid;">
                    <div class="container">

                        <div class="table-div">
                            <form action="" method="POST" enctype="multipart/form-data" class="table-padding">
                                <h2 style="text-align:center;" class="update-pro">Update Product</h2>

                                <!-- <tr>Banner</tr> -->

                                <?php
                                $id = $_GET['id'];
                                $sql = mysqli_query($conn, "SELECT * FROM  product where id='$id'");
                                while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                   
                                            <div style="text-align:center;" class="product-contant-update">
                                                <div class="from-group">
                                                    <div class="img-img-update">
                                                        <img src="<?php echo $row['pro']; ?>" height="200px" width="300px">
                                                    </div>
                                                </div>
                                                <div class="update-product">
                                                    <input type="file"  class="form-control" name="file" value="<?php echo $row['pro']; ?>">

                                                    <input type="text" class="" name="pname" value="<?php echo $row['pname']; ?>">

                                                    <textarea type="text" class="" name="pdse"><?php echo $row['pdse']; ?></textarea>
                                                <?php } ?>
                                                <br>
                                                <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include('includes/footer1.php') ?>