<?php
include('includes/head1.php');
include('includes/header1.php');
?>



<div class="table-div">
  <h3 class="text-center bg-success p-2 mb-3 my-5 text-white"> Upload Products</h3>
  <form class="container" action="products.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-8">
        <div class="from-group">
          <label for="file">Products pic:</label>
          
          <input type="file" id="file" name="file" class="form-control">
        </div>
        <div class="from-group">
          <label for="file">Products Name:</label>
          <input type="text" id="pname" name="pname" class="form-control">
        </div>
        <div class="from-group">
          <label for="file">Products Descriptions:</label>
          <br>
          <!-- <input type="text/area" id="pdes" name="pdes" class="form-control"> -->
          <textarea id="pdse" name="pdse" rows="4" cols="97"></textarea>
        </div>
        <input type="submit" name="submit" value="Upload" class="btn btn-success my-3">
      </div>
    </div>

  </form>
</div>

<?php include('includes/footer1.php'); ?>