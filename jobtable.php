<?php

require 'function/database.php';
require_once 'assets/layouts/header.php';
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="assets/plugins/select2/select2.min.css">
</head>
<body>
<div class="card-body">
<table id="example2" class="table table-bordered table-hover ">
              <thead>
              <tr>
                <th>Name</th>
                <th>Model</th>
                <th>Emei/SN</th>
                <th>Date Receive</th>
                <th>Stasus</th>
                <th>Tachnician</th>
                <th>Update Date</th>
                <th>Button</th>
              </tr>
              </thead>
              <tbody>
<?php
if ($_GET['q']) {
    $q = intval($_GET['q']);
    $conn = condb();
    $sql = "SELECT `svid`,`co_name`, `contact_name`, `tel`, `email`, `IMEI_SN`, `Model`, `symptom`, `job_status`.stname, product_service.DateCreate ,product_service.DateUpdate,product_service.`status`
FROM  `customer`, product_service
INNER JOIN `job_status` on `job_status`.stid = product_service.status
WHERE  product_service.`status` = " . $q;
    $query = $conn->query($sql);
    while ($job = $query->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>";
        echo "<strong>บริษัท</strong> " . $job['co_name'] . "<hr>";
        echo "<strong>ชื่อผู้ติดต่อ</strong> " . $job['contact_name'] . "|| <strong>โทรศัพท์</strong> " . $job['tel'] . "";

        echo "</td>";
        echo "<td>" . $job['IMEI_SN'] . "</td>";
        echo "<td>" . $job['Model'] . "</td>";
        echo "<td>" . $job['DateCreate'] . "</td>";
        echo "<td>" . $job['stname'] . "</td>";
        echo "<td></td>";
        echo "<td>" . $job['DateUpdate'] . "</td>";
        echo '<td >';

        echo '</td>';
        echo '</tr>';
    }
    $conn->close();
}
?>

              </tbody>
              <tfoot>
              <tr>
              <th>Co. Name</th>
              <th>Model</th>
              <th>Emei/SN</th>
              <th>Date Receive</th>
              <th>Stasus</th>
              <th>Tachnician</th>
              <th>Update Date</th>
              <th>Button</th>
            </tr>
              </tfoot>
            </table>
</div>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- SlimScroll -->
<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>


<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap time picker -->
<script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $('#password, #password_confirmation').on('keyup', function () {
    if ($('#password').val() == $('#password_confirmation').val()) {
      $('#message').html('Matching').css('color', 'green');
    } else
      $('#message').html('Not Matching').css('color', 'red');
  });
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#bougthDate').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

  })

</script>

</body>
</html>