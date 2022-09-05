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
$url = "http://localhost/testlogin/";
// http://localhost/testlogin/admin/
// http://localhost/testlogin/img/
if (isset($_GET['delete'])) {

    $id = $_GET['id'];
    // echo "$id";

    $query = "DELETE FROM bform WHERE `id`='$id'";
    $query_run = mysqli_query($conn, $query);
}
?>
<div class="container" style="margin-top: 100px;">
    <div class="card container rounded-3" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
        <div class="card-body">
            <div class="container-sm ">
                <form action="">
                    <div class="row ">
                        <div class="col-lg-12 ">
                            <div class="table">
                                <h3 class="text-center rounded-3 bg-danger p-2 text-white" style="margin-top: -40px;width: 65%;margin-left: 200px;">Buyer Form</h3>
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
                                <table class="text-center mt-4" style="margin-left: -25 px;" id="usertable">
                                    <tr>
                                        <th class="bg-primary text-light">Sr No.</th>
                                        <th class="bg-primary text-light">Product Name</th>
                                        <th class="bg-primary text-light">Products Descriptions</th>
                                        <th class="bg-primary text-light">Mobile Number</th>
                                        <th class="bg-primary text-light">Product Image</th>
                                        <th class="bg-primary text-light">Product Brand</th>
                                        <th class="bg-primary text-light">Automaction Grade</th>

                                        <!-- <th>Banner2</th> -->
                                        <!-- <th>Banner3</th> -->
                                        <th class="bg-primary text-light">Action</th>
                                    </tr>
                                    <tr>
                                        <?php
                                        include 'connection.php';
                                        $sql = "SELECT * FROM `bform`";
                                        $count = 1;
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row['pname'] ?></td>
                                        <td><?php echo $row['pdesc'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>


                                        <td> <img src="<?php echo $url . $row['image']; ?>" height="50px" width="150px"></td>
                                        <td><?php echo $row['brand'] ?></td>
                                        <td><?php echo $row['agrade'] ?></td>
                                        <td>
                                            <!-- <input type="view" name="view" class="btn btn-info" value="view"> -->

                                            <input type="submit" name="delete" class="btn btn-danger fa-solid fa-trash-can" value="DELETE">
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
                                </table>
                            </div>
                        </div>
                </form>
            </div>
            <nav aria-label="Page navigation example" class="mt-3">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
</div>




<?php ?>

<!-- <script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#usertable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script> -->


<?php include('includes/footer1.php'); ?>












<!-- <script>

    $(document).ready(function(){

        $('.deletebtn').on('click', function(){

            $('#deletemodal').modal('show');

        });

    })


</script> -->