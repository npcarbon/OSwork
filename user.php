<?php
$menu = "";
$title = 'View Users';
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
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Customer</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example2" class="table table-bordered table-hover ">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Registered Date</th>
                                <th>Button</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php getUser();?>
                            </tbody>
                            <tfoot>
                              <tr>
                              <th>Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Registered Date</th>
                                <th>Button</th>
                              </tr>
                            </tfoot>
                          </table>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div><!-- /.container-fluid -->
            </section> <!-- /.content -->
        </div> <!-- /.content-wrapper -->
    </section> <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
require_once 'assets/layouts/footer.php';
?>