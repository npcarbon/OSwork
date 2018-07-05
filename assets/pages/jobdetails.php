<?php

require '../../function/database.php';
$conn = condb();
$id = $_GET['id'];
$sql = "SELECT pd_svid,`svid`,`co_name`, `contact_name`, `tel`, `email`, `IMEI_SN`, `Model`, `symptom`, `job_status`.stname,
product_service.DateCreate ,product_service.DateUpdate,product_service.`status`
FROM  `customer`, product_service
INNER JOIN `job_status` on `job_status`.stid = product_service.status
WHERE pd_svid = '$id'";
$query = $conn->query($sql);
$job = $query->fetch_assoc();
?>

        <div class="modal-header">
                <h4 class="modal-title" id="memberModalLabel">Job Details <strong>[<?="JOB ID :  " . $job['pd_svid']?>]</strong></h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
        <div class="modal-body">
        <?="<p><strong>บริษัท</strong> " . $job['co_name'] . "<br><strong>ชื่อผู้ติดต่อ</strong> " . $job['contact_name'] . "<br><strong>โทรศัพท์</strong> " . $job['tel'] . "</p><hr>";?>

        <div class="row">
            <div class="col-md-6"><?="<strong>IMEI/SN</strong> :  " . $job['IMEI_SN']?></div>
            <div class="col-md-6"><?="<strong>Model</strong> :  " . $job['Model']?></div>
            <div class="col-md-6"><?="<strong>Status</strong> :  " . $job['stname']?></div>
            <div class="col-md-6"><?="<strong>Technician</strong> :  "?></div>
            <div class="col-md-6"><?="<strong>Create</strong> :  " . $job['DateCreate']?></div>
            <div class="col-md-6"><?="<strong>Update</strong> :  " . $job['DateUpdate']?></div>
        </div>
      </div>
