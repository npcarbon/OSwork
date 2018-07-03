
<?php
session_start();
$conn = condb();
if (!empty($_POST['txtUsername'])) {
    Login();
}
if (!empty($_POST["IMEI_SN"])) {
    $cusid = chkCus();
    if (isset($cusid)) {
        $jobid = createJob($cusid);
        if ($jobid) {
            $proSVC = addProduct($jobid);
            if ($proSVC) {
                echo '<script>alert("' . date("ymd") . "-" . $jobid . '");window.location.href</script>';
                $conn->close();

            } else {
                echo '<script>alert("Add Product Error!!");</script>';
            }
        } else {
            echo '<script>alert("Create Job Error!!");</script>';
        }

    } else {
        echo '<script>alert("Error!!");window.history.go(-1);</script>';
    }
}

if (!empty($_POST["email_address"])) {
    if (verifyPass()) {

        $conn->close();
    }

}

function condb()
{
    $conn = new mysqli("localhost", "root", "", "dbservice");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function condb2()
{
    $conn = new mysqli("localhost", "root", "", "databar_DB1");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function createJob($cusid)
{
    $conn = condb();
    $sql = "INSERT INTO services (cusid) VALUES ('" . $cusid . "')";
    $conn->query($sql);
    $jobid = $conn->insert_id;
    return $jobid;
}

function chkCus()
{
    $conn = condb();
    if ($_POST["email"] != "") {
        $sql = "SELECT cusid FROM customer WHERE email =  '" . $_POST["email"] . "'";
        $query = $conn->query($sql);
        if (mysqli_num_rows($query) > 0) {
            $cusid = $query->fetch_assoc();
            return $cusid['cusid'];
        } else {
            $sql = "INSERT INTO customer (`co_name`, `contact_name`, `tel`, `email`)"
                . "VALUES ('" . $_POST["coname"] . "',"
                . '"' . $_POST["cusname"] . '",'
                . '"' . $_POST["tel"] . '",'
                . '"' . $_POST["email"] . '")';
            $conn->query($sql);
            $cusid = $conn->insert_id;
            return $cusid;
        }
    }

}

function addProduct($jobid)
{
    $conn = condb();
    $itemCount = count($_POST["IMEI_SN"]);
    if ($itemCount > 0) {
        $query = 'INSERT INTO `product_service`(`svid`, `IMEI_SN`, `Model`,`symptom`, `accs`, `remark`, `CreateBy`)VALUE';
        $queryValue = "";
        for ($i = 0; $i < $itemCount; $i++) {
            if ($_POST["IMEI_SN"][$i] != "" && $_POST["Model"][$i] != "") {
                if ($queryValue != "") {
                    $queryValue .= ",";
                }
                $queryValue .= ' ("' . $jobid . '","' . $_POST["IMEI_SN"][$i] . '","' . $_POST["Model"][$i] . '","'
                    . '"' . $_POST["symptom"][$i] . '","' . $_POST["more"][$i] . '","' . $_POST["more"][$i] . '","' . $_SESSION['UName'] . '")';
            }
        }
        $sql = $query . $queryValue;
        $conn->query($sql) or die("Error in query: $sql " . mysqli_error());
        $proID = $conn->insert_id;
        return $proID;
        // $last_id = $conn->insert_id;
    }
}

function verifyPass()
{
    if ($_POST['password_confirmation'] != $_POST['password']) {
        echo "<script>alert('Passwords are not match!!');</script>";

    } else {
        addUser();
    }
}

function addUser()
{
    $conn = condb();
    $pws = HashPassword($_POST["password"]);
    $select = $conn->query('SELECT * FROM user_login WHERE email = "' . $_POST["email_address"] . '"');
    $result = $select->fetch_assoc();
    $query = 'INSERT INTO `user_login`(`uname`, `psw`, `email`, `posid`) VALUES';
    $queryValue = "";
    if ($_POST["email_address"] != "" && $_POST["email_address"] != $result['email']) {
        if ($queryValue != "") {
            $queryValue .= ",";
        }
        $queryValue .= ' ("' . $_POST["first_name"] . '","' . $pws . '","' . $_POST["email_address"] . '","' . $_POST["position"] . '")';
        $sql = $query . $queryValue;
        $addUser = $conn->query($sql) or die("Error in query: $sql " . mysqli_error());
        if ($addUser) {
            # code...
            echo "<script>alert('User added');</script>";
            header("location:../user.php");
        } else {
            echo '<script>alert("Error!!");window.history.go(-1);</script>';
        }
    } else {
        echo '<script>alert("This Email has taken!!");window.history.go(-1);</script>';
    }

    // $last_id = $conn->insert_id;
}

function getModel()
{
    $conn = condb2();
    $query = $conn->query("SELECT * FROM products ");
    while ($result = $query->fetch_array(MYSQLI_ASSOC)) {
        echo '<option value="' . $result["Pro_ID"] . '">' . $result["Pro_Name"] . '</option>';
    }
    $conn->close();
}

function getJob($status)
{
    $perpage = 20;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $Prev_Page = $page - 1;
    $Next_Page = $page + 1;
    $start = ($page - 1) * $perpage;

    $conn = condb();
    $sql = "SELECT `svid`,`co_name`, `contact_name`, `tel`, `email`, `IMEI_SN`, `Model`, `symptom`, `job_status`.stname, product_service.DateCreate ,product_service.DateUpdate,product_service.`status`
FROM  `customer`, product_service
INNER JOIN `job_status` on `job_status`.stid = product_service.status
WHERE  product_service.`status` LIKE '%" . $status . "%' LIMIT {$start} , {$perpage}";
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
        echo "<td>" . $job['DateUpdate'] . "</td>";
        echo '<td >
        <button type="button" class="btn btn-primary btn-sm" >View</button>
        <button type="button" class="btn btn-danger btn-sm" >Edit</button>
        </td>';
        echo '</tr>';
    }
    $conn->close();
}

function getAlljob()
{
    $perpage = 10;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $Prev_Page = $page - 1;
    $Next_Page = $page + 1;
    $start = ($page - 1) * $perpage;
    $conn = condb();
    $sql = "SELECT `svid`,`co_name`, `contact_name`, `tel`, `email`, `IMEI_SN`, `Model`, `symptom`, `job_status`.stname, product_service.DateCreate ,product_service.DateUpdate,product_service.`status`
FROM  `customer`, product_service
INNER JOIN `job_status` on `job_status`.stid = product_service.status
LIMIT {$start} , {$perpage}";
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
        echo "<td>" . $job['DateUpdate'] . "</td>";
        echo '<td >
        <button type="button" class="btn btn-primary btn-sm" >View</button>
        </td>';
        echo '</tr>';
    }
    $conn->close();
}

function getStatus()
{
    $conn = condb();
    $query = $conn->query("SELECT * FROM job_status");
    while ($result = $query->fetch_array(MYSQLI_ASSOC)) {
        echo '<option value="' . $result["stid"] . '">' . $result["stname"] . '</option>';
    }
    $conn->close();
}

function getPos()
{
    $conn = condb();
    $query = $conn->query("SELECT * FROM positions");
    while ($result = $query->fetch_array(MYSQLI_ASSOC)) {
        echo '<option value="' . $result["posid"] . '">' . $result["posname"] . '</option>';
    }
    $conn->close();
}

function HashPassword($password)
{
    $password = $_POST['txtPassword'];
    $cost = [
        'cost' => 10,
    ];
    return password_hash($password, PASSWORD_BCRYPT, $cost);
}

function passVerify($password, $hash)
{
    if (password_verify($password, $hash)) {
        echo 'Password is valid!';
    } else {
        echo 'Invalid password.';
    }
}

function Login()
{
    session_start();
    $conn = condb();
    $user = $_POST['txtUsername'];
    $pass = $_POST['txtPassword'];
    $query = $conn->query('SELECT * FROM user_login WHERE email = "' . $user . '"');
    $result = $query->fetch_assoc();
    if (!$result["email"]) {
        # code...
        echo "<script type='text/javascript'>alert('Email is Incorrect!');window.history.go(-1);</script>";
    } else {
        # code...
        if (password_verify($pass, $result["psw"])) {
            # code...
            $_SESSION['login'] = "true";
            $_SESSION['UID'] = $result["uid"];
            $_SESSION['UName'] = $result["uname"];
            $_SESSION['Permission'] = $result["posid"];

            session_write_close();

            if ($_SESSION['Permission'] == 1 || $_SESSION['Permission'] == 2) {
                header("location:../index.php");
            } else {
                header("location:../index.php");
            }
        } else {
            echo 'Invalid password.';
        }
    }
    $conn->close();

}

function getUser()
{
    $conn = condb();
    $query = $conn->query('SELECT user_login.*,positions.* FROM user_login INNER JOIN positions on positions.posid = user_login.posid');
    while ($user = $query->fetch_array(MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $user['uname'] . "</td>";
        echo "<td>" . $user['email'] . "</td>";
        echo "<td>" . $user['posname'] . "</td>";
        echo "<td>" . $user['DateCreate'] . "</td>";
        echo '<td >
        <button type="button" class="btn btn-primary btn-sm" >View</button>
        <button type="button" class="btn btn-danger btn-sm" >Edit</button>
        </td>';
        echo '</tr>';
    }
    $conn->close();
}

function getPage()
{
    $conn = condb();
    $sql = "SELECT * FROM product_service";
    $query = $conn->query($sql);
    $total_record = mysqli_num_rows($query);
    $total_page = ceil($total_record / $perpage);
    ?>
<p>Total <?=$total_record;?> Orders</p>
<?php
if ($Prev_Page) {
        echo " <a href='$_SERVER[SCRIPT_NAME]?page=$Prev_Page'><< Back</a> ";
    }

    for ($i = 1; $i <= $total_page; $i++) {
        if ($i != $page) {
            echo "[ <a href='$_SERVER[SCRIPT_NAME]?page=$i'>$i</a> ]";
        } else {
            echo "<b> $i </b>";
        }
    }
    if ($page != $total_page) {
        echo " <a href ='$_SERVER[SCRIPT_NAME]?page=$Next_Page'>Next>></a> ";
    }

    $conn->close();
}

function chkLogin()
{
    if (!empty($_SESSION['login'])) {
        header("Location: login.php");
        exit;
    }
}