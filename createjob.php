<?php
$menu = "menu-open";

$title = 'Create New Job';
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
        <form action="function/database.php" method="post"  name="mainfrm">
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Co. Name</label>
                                                <input id="coname" name="coname" type="text" class="form-control" placeholder="Company Name">
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Name</label>
                                                <input id="cusname" name="cusname" type="text" class="form-control" placeholder="Contact Name">
                                            </div><!-- /.form group -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Telephone nr.</label>
                                                <input id="tel" name="tel" type="text" class="form-control" placeholder="Telphone nr.">
                                            </div> <!-- /.form group -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input id="email" name="email" type="text" class="form-control" placeholder="E-mail Address">
                                            </div><!-- /.form group -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Remark</label>
                                                <textarea  name="Remark[]" class="form-control" rows="3" placeholder="Symptom"></textarea>
                                            </div><!-- /.form group -->
                                        </div>
                                    </div>
                                </div> <!-- /.col -->
                            </div>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Product</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div> <!-- /.card-header -->

                    <div class="card-body">

                        <DIV id="product">
                        <?php require_once "assets/layouts/product.php";?>
                        </DIV>
                        <DIV class="btn-action float-clear">
                            <div class="btn-group btn-sm" role="group" aria-label="Basic example" style="width: 100%">
                                <input type="button" class="btn btn-primary btn-sm" name="add_item" value="Add More" onClick="addMore();"/>
                                <input type="button" class="btn btn-danger btn-sm" name="del_item" value="Delete" onClick="deleteRow();"/>
                            </div>

                        </DIV>
                    </div>



                        <div class="card-footer">
                            <center>
                                <div class="btn-group btn-lg" role="group" aria-label="Basic example" style="width: 100%">
                                    <button type="submit" name="save" class="btn btn-success btn-block" style="width: 50%"> Save</button>
                                    <button type="submit" class="btn btn-danger" style="width: 50%">BACK</button>
                                </div>
                            </center>
                        </div>
                    </div><!-- /.card -->
                </div><!-- /.container-fluid -->
            </section><!-- /.content -->

        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
require_once 'assets/layouts/footer.php';
?>