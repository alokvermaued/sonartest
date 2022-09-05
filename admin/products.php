<?php
session_start();
include('includes/head1.php');
include('includes/header1.php');
?>
<?php
// session_start();
include('connection.php');
// echo "welcom ".$_SESSION['user_name'];
// $url = "http://localhost/testlogin/admin/img/";
$uname = $_SESSION['user_name'];

if ($uname == true) {
} else {
    header('location:index.php');
}
if ('header') {
    // echo 'data insert';
    header('location:index.php');
}
if (isset($_POST['submit'])) {
    $pname = $_POST['pname'];
    $pdse = $_POST['pdse'];
    $fname = $_FILES['file']["name"];
    $tempname = $_FILES['file']["tmp_name"];
    $folder = 'img/' . $fname;



    move_uploaded_file($tempname, $folder);

    $query = mysqli_query($conn, "insert into product( `pname`, `pro` , `pdse`) values ('$pname','$folder','$pdse')");
    // INSERT INTO `product`(`id`, `pro`) VALUES ('[value-1]','[value-2]')
}
?>
<?php
if (isset($_GET['delete'])) {

    $id = $_GET['id'];
    echo "$id";

    $query = "DELETE FROM product WHERE `id`='$id'";
    $query_run = mysqli_query($conn, $query);
}
?>
<div class="container" style="margin-top: 100px ;">
    <div class="card">
        <div class="card-body">
            
                <a href="">Home</a>
            
        </div>
    </div>
</div>
<div class="container-fluid" style="margin-top: 100px;">
    <div class="container rounded-3" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
        <div class="card-body">
            <h3 class="text-center rounded-3 bg-success p-2 text-white" style="margin-top: -40px;width: 65%;margin-left: 200px;"> Upload Products</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="from-group">
                            <label for="file" class="mb-1"><b>Products pic</b> <span style="color: #ff0000;">*</span></label>
                            <input type="file" id="file" name="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="from-group">
                            <label for="file" class="mb-1"><b>Products Name</b> <span style="color: #ff0000;">*</span></label>
                            <input type="text" id="pname" name="pname" class="form-control" required>
                        </div>
                    </div>
                    <div class="from-group mt-2 ">
                        <label for="file" class="mb-1"><b>Products Descriptions</b> <span style="color: #ff0000;">*</span></label>
                        <br>
                        <!-- <input type="text/area" id="pdes" name="pdes" class="form-control"> -->
                        <textarea id="pdse" name="pdse" rows="4" cols="80" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <input type="submit" name="submit" value="Upload" class="btn btn-primary my-3">
                    </div>
                </div>
        </div>

        </form>
    </div>
</div>
<div class="card container" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; margin-top: 120px;">
    <div class="card-body">
        <div class="">
            <form action="">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="text-center rounded-3 bg-danger p-2 text-white" style="margin-top: -40px;width: 65%;margin-left: 200px;"> Products</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="mt-4">Show Enties</label>
                            <select id="">
                                <option value="">3</option>
                                <option value="">10</option>
                                <option value="">25</option>
                                <option value="">50</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-4" style=" width: 100%; display: flex; justify-content: end;">
                                <form id="form">
                                    <input type="search" id="query" name="q" placeholder="Search...">
                                    <button class="btn btn-secondary fas fa-search">Search</button>
                                </form>
                            </div>
                        </div>
                        <!-- <div style=" width: 100%; display: flex; justify-content: end;">
                                    <form id="form">
                                        <input type="search" id="query" name="q" placeholder="Search...">
                                        <button>Search</button>
                                    </form>
                                </div> -->
                        <table class="text-center mt-4">
                            <!-- <label for="">Show Enties</label>
                                         <select id="">
                                            <option value="">3</option>
                                            <option value="">10</option>
                                            <option value="">25</option>
                                            <option value="">50</option>
                                        </select> -->

                            <tr>
                                <th class="bg-primary text-light">Sr No.</th>
                                <th class="bg-primary text-light">Product name</th>
                                <th class="bg-primary text-light">Product Image</th>
                                <th class="bg-primary text-light">Products Descriptions</th>
                                <!-- <th>Banner2</th> -->
                                <!-- <th>Banner3</th> -->
                                <th class="bg-primary text-light">Action</th>
                            </tr>
                            <tr class="com_color">
                                <?php
                                include 'connection.php';
                                $sql = "SELECT * FROM `product` ";
                                $count = 1;
                                $result = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                $numberpages = 3;
                                $totalpages = ceil($num / $numberpages);
                                // echo $totalpages;
                                // echo $unm;

                                // for ($btn = 1; $btn <= $totalpages; $btn++) {
                                //     echo '<button class="btn btn-dark mx-1"><a herf="product.php?page=' . $btn . '"class="text-light">' . $btn . '</a></button>';
                                // }
                                // if (isset($_GET['page'])) {
                                //     $page = $GET['page'];
                                // echo $page;
                                // }
                                // if (isset($_GET['page'])) {

                                //     $page = $_GET['page'];
                                // echo $page;

                                // } else {
                                //     $pag = 1;
                                // }
                                // $startinglimit=($page-1)*$numberpages;
                                // $sql = "SELECT * FROM `product` limit".$startinglimit.','.$numberpages;
                                // $result = mysqli_query($conn, $sql);



                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                            <tr>
                                <td style="width:5%;"><?php echo $count; ?></td>
                                <td style="width: 22%;"><?php echo $row['pname'] ?></td>


                                <td style="width: 15%;"> <img src="<?php echo $row['pro']; ?>" height="50px" width="150px"></td>
                                <td><?php echo $row['pdse'] ?></td>
                                <td style="width:15%;">
                                    <a href="editproducts.php?id=<?php echo ($row['id']); ?>" class="btn " title="Edit" type="button" name="edit" data-toggle="tooltip">
                                        <button type="button" class="btn btn-primary fas fa-edit">EDIT</button>
                                    </a>


                                    <input type="button" name="delete" class="btn btn-danger fa-solid fa-trash-can" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="deletedata(this.id)" id="<?php echo $row["id"]; ?>" value="DELETE">
                                </td>

                                <form action="" method="GET" class="text-center " style="width: 100%;">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                </form>
                                </td>
                            </tr>
                        <?php

                                        $count = $count + 1;
                                    }
                                } else { ?>
                        <tr>
                            <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                        </tr>
                    <?php } ?>

                    </tr>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Button trigger modal
<button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <h4 class='text-center'>Are You Soure </h4>
            </div>
            <div class="modal-footer  align-item-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Ok</button> -->
                <a href="#" class="btn btn-danger" id="deletebutton" title="Delete" data-toggle="tooltip">Ok</a>
            </div>
        </div>
    </div>
</div>
<!-- End Delete Modal -->


</div>
</div>


<!-- <h3 class="text-center bg-danger p-2 mb-3 text-white">Product</h3> -->

<?php ?>
<script>
    function deletedata(id) {
        var href = 'products.php?id=' + id;
        console.log('href', href);
        $('#deletebutton').attr('href', href);
        $('#exampleModal').modal('show');
    }
</script>

<?php include('includes/footer1.php'); ?>