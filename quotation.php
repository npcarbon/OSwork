<?php
$menu = "menu-open";
$status = '3';
$title = 'View Job : Quotation';
require_once 'assets/layouts/header.php';
require_once 'assets/layouts/sidebar.php';
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
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                      <div class="row">
                        <h3 class="card-title">Job Orders</h3>
                        <div class="float-sm-right">
                          <!-- <select name="status" onchange="showUser(this.value)">
                            <option value=""></option>
                            <?php //getStatus();?>
                          </select> -->
                        </div>
                      </div>
                      </div><!-- /.card-header -->
                      <div id="txtHint">
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
                              <?php getJob($status);?>
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
                        </div> <!-- /.card-body -->
                      </div>
                    </div> <!-- /.card -->
                  </div>
                </div> <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section> <!-- /.content -->
        </div> <!-- /.content-wrapper -->
    </section> <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
require_once 'assets/layouts/footer.php';
?>