<?php
$menu = "";

$title = 'Register User';
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
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Register New User</div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                            <div class="col-md-6">
                                                <input id="uname" type="text" class="form-control" name="first_name" placeholder="ex. Adam Gipsons"
                                                 autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Position</label>
                                            <div class="col-md-6">
                                                <select name="position" class="form-control" style="width: 100%;">
                                                    <option value="" >Select Position of User</option>
                                                    <?php getPos();?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email_address" type="email" class="form-control" name="email_address"
                                                 placeholder="ex. exam@exam.com">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password"
                                                placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password2" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                            <div class="col-md-6">
                                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Password confirm">
                                            </div>
                                            <span id='message'></span>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="btn-group btn-lg" role="group" aria-label="Basic example" style="width: 100%">
                                                    <button type="submit" name="save" class="btn btn-success btn-block" style="width: 50%"> Save</button>
                                                    <button type="submit" class="btn btn-danger" style="width: 50%">BACK</button>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                            <!-- </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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