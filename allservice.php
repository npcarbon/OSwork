<?php
$menu = "menu-open";
$status = '';
$title = 'View Job : All';
require_once 'assets/layouts/header.php';
require_once 'assets/layouts/sidebar.php';

$perpage = 10;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$Prev_Page = $page - 1;
$Next_Page = $page + 1;
$start = ($page - 1) * $perpage;
?>

<div class="content-wrapper">
<?php
require_once 'assets/layouts/pageheader.php';

?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- <form action="function/database.php" method="post"  name="mainfrm"> -->
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="card card-default">
                  <div class="card-header">
                    <h3 class="card-title">Job Orders</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover ">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Model</th>
                          <th>Emei/SN</th>
                          <th>Date Receive</th>
                          <th>Stasus</th>
                          <th>Update Date</th>
                          <th>Button</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php getAlljob();?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Co. Name</th>
                          <th>Model</th>
                          <th>Emei/SN</th>
                          <th>Date Receive</th>
                          <th>Stasus</th>
                          <th>Update Date</th>
                          <th>Button</th>
                        </tr>
                      </tfoot>
                    </table>
<?php
$conn = condb();
$sql = "SELECT * FROM product_service";
$query = $conn->query($sql);
$total_record = mysqli_num_rows($query);
$total_page = ceil($total_record / $perpage);
?>
<div class="row">
  <div class="col">
    <nav aria-label="Page navigation example" style="padding-left: 10px;">
      <ul class="pagination">
<?php
if ($Prev_Page) {
    echo " <li class='page-link'><a href='$_SERVER[SCRIPT_NAME]?page=$Prev_Page'><< Back</a> </li>";
}

for ($i = 1; $i <= $total_page; $i++) {
    if ($i != $page) {
        echo "<li class='page-link'> <a href='$_SERVER[SCRIPT_NAME]?page=$i'>$i</a> </li>";
    } else {
        echo "<li class='page-link'><b> $i </b></li>";
    }
}
if ($page != $total_page) {
    echo " <li class='page-link'><a href ='$_SERVER[SCRIPT_NAME]?page=$Next_Page'>Next>></a> </li>";
}

$conn->close();?>
      </ul>
    </nav>
  </div>
<div class="col">
<h4 class="text-right">Total <?=$total_record;?> Orders</h4>
  </div>
</div>
                  </div> <!-- /.card-body -->
                </div> <!-- /.card -->
              </div><!-- /.container-fluid -->
            </section> <!-- /.content -->
        </div> <!-- /.content-wrapper -->

    </section> <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

<?php

require_once 'assets/layouts/footer.php';
?>