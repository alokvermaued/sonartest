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


if (isset($_GET['delete'])) {

    $id = $_GET['id'];
    $query = "DELETE FROM banner WHERE `id`='$id'";
    $query_run = mysqli_query($conn, $query);

    // if($query_run){

    //     echo "<script> alert ('Record Deleted from database')</script>";
    //     header ("location : banner.php");
    // }
    // else{
    //     echo "";
    // }
}
?>
<section id="home_top" style="margin-top: 120px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body rounded-3" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                    <div class="container">
                        <h3 class="text-center rounded-3 bg-success p-2 text-white" style="margin-top: -45px;width: 65%;margin-left: 200px;">Upload Banner</h3>
                        <form action="" method="post" enctype="multipart/form-data" class="p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="from-group">
                                        <label for="file" class="mb-1"><b>Banner pic</b> <span style="color: #ff0000;">*</span></label>
                                        <input type="file" id="file" name="file" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <input type="submit" name="submit" value="Upload" class="btn btn-primary my-4">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    // session_start();
    $showAlert = false;
    $showError = false;
    if (isset($_POST["submit"])) {
        $showAlert = 'error';
        if (!empty($_FILES["file"]["name"])) {
            // Get file info 
            $fileName = basename($_FILES["file"]["name"]);
            // $title = $_FILES['title']['name'];
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            // Allow certain file formats 
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                $image = $_FILES['file']['tmp_name'];

                $imgContent = addslashes(file_get_contents($image));
                $destinationfile = 'img/' . $fileName;
                if (move_uploaded_file($image, $destinationfile)) {
                    // Insert image content into database

                    $insert = "INSERT INTO `banner`( `image`) VALUES ('$destinationfile')";
                    $smt = $conn->prepare($insert);
                    $smt->execute();
                    if ($insert) {
                        // $showAlert = true;
                        header("location: banner.php");
                        // exit();
                    } else {
                        $showError = "File upload failed, please try again.";
                    }
                } else {
                    $showError = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                }
            } else {
                $showError = 'Please select an image file to upload.';
            }
        }
    }
    ?>

    <div class="banner_top" style="margin-top:100px ;">
        <div class="container">
            <form action="">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body rounded-3" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                            <div class="container">
                            <h3 class="text-center rounded-3 bg-danger p-2 text-white" style="margin-top: -40px;width: 65%;margin-left: 200px;">Banner</h3>
                                    <table style="width: 100%; " class="text-center mt-4">
                                        <tr>
                                            <th class="bg-primary text-light ">Sr No.</th>
                                            <th class="bg-primary text-light">Banner</th>
                                            <th class="bg-primary text-light">Action</th>
                                        </tr>
                                        <tr>
                                            <?php
                                            include 'connection.php';
                                            $sql = "SELECT * FROM banner";
                                            $count = 1;
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>

                                            <td> <img src="<?php echo $row['image']; ?>" height="50px" width="150px"></td>
                                            <td>
                                                <a href="editbanner.php?id=<?php echo ($row['id']); ?>" class="btn " title="Edit" type="button" name="edit" data-toggle="tooltip">
                                                    <button type="button" class="btn btn-primary fas fa-edit">EDIT</button>
                                                </a>
                                                <input type="submit" name="delete" class="btn btn-danger fa-solid fa-trash-can" value="DELETE" onclick="return checkdelete()">
                                            </td>
                                            <form action="" method="get">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                            </form>


                                        </tr>
                                        <?php  ?>
                                </div>
                            </div>
                            </div>
                        <?php
                                                    $count = $count + 1;
                                                }
                                            } else { ?>
                        <tr>
                            <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                        </tr>
                    <?php } ?>





                    </tr>
                    </table>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>

    </div>
    </div>
</section>
<!-- Button trigger modal
<button type="button" class="btn btn-primary">
    Launch demo modal
</button>

 Modal 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Banner Items</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do Yoy Want to Delete This Dtat ??
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger">Yes!! Delete It</button>
            </div>
        </div>
    </div>
</div> -->


</div>
</div>
<!-- <Script>
    function checkdelete(){

        return confirm('Are You Sure You Want To Delete This Record');

    }
    

</Script> -->
<!-- <script>

    function checkdate(){

        return Confirm('Are You Sure You Want To Delete This Record');
    }
</script> -->








<?php include('includes/footer1.php'); ?>