<?php
$postadm = $_POST['admissionfee'];
$postid = $_POST['postid'];
$postexamfee = $_POST['postexamfee'];
$postcompositefee = $_POST['postcompositefee'];
$postcomputerfee = $_POST['postcomputerfee'];

echo $postadm;
echo $postid;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Fee Receipt</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <button onclick="window.print();">Print</button>
    <div class="container" style="margin-top: 34px;">
        <div class="header">
            <h2 style="margin-top: 1px;margin-bottom: 2px;">S.R. Memorial Intermediate College</h2>
            <p>Indupur, Deoria - 274202</p>
            <h3 style="margin-top: 4px;">Fee Receipt</h3>
            <hr>
        </div>
        <div class="receipt">

            <div class="row">
                <p><strong>Name:</strong> <?php echo $name; ?></p>
                <p><strong>Mobile No:</strong> <?php echo $mobile; ?></p>
                <p><strong>Route:</strong> <?php echo $route; ?></p>
            </div>
            <div class="row">
                <p><strong>Class:</strong> <?php echo $class ?>th</p>
                <p><strong>Date:</strong> <span id="date"></span></p>
            </div>

            <hr>
            <table>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
                <?php if ($adm_fee > 0) { ?>
                <tr>
                    <td>Admission Fee</td>
                    <td>&#8377;<?php echo $postadm; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($id_fee > 0) { ?>
                <tr>
                    <td>Digital ID Card Fee</td>
                    <td>&#8377;<?php echo $postid; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($exam > 0) { ?>
                <tr>
                    <td>Examination Fee</td>
                    <td>&#8377;<?php echo $postexamfee; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($composite > 0) { ?>
                <tr>
                    <td>Composite Fee</td>
                    <td>&#8377;<?php echo $composite; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($postcomputerfee > 0) { ?>
                <tr>
                    <td>Computer Fee</td>
                    <td>&#8377;<?php echo $postcomputerfee; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($van > 0) { ?>
                <tr>
                    <td>Van Fee</td>
                    <td>&#8377;<?php echo $van; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($old > 0) { ?>
                <tr>
                    <td>Old Dues</td>
                    <td>&#8377;<?php echo $old; ?> </td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Total</td>
                    <td>&#8377;<?php echo $total; ?></td>
                </tr>
            </table>
            <hr>
            <p><strong>Received:</strong> &#8377;<?php echo $total; ?></p>
            <p><strong>Received By:</strong> Aditya Verma</p>
            <hr>
        </div>
    </div>

    <div class="container" style="margin-top: 34px;">
        <div class="header">
            <h2 style="margin-top: 1px;margin-bottom: 2px;">S.R. Memorial Intermediate College</h2>
            <p>Indupur, Deoria - 274202</p>
            <h3 style="margin-top: 4px;">Fee Receipt</h3>
            <hr>
        </div>
        <div class="receipt">

            <div class="row">
                <p><strong>Name:</strong> <?php echo $name; ?></p>
                <p><strong>Mobile No:</strong> <?php echo $mobile; ?></p>
                <p><strong>Route:</strong> <?php echo $route; ?></p>
            </div>
            <div class="row">
                <p><strong>Class:</strong> <?php echo $class ?>th</p>
                <p><strong>Date:</strong> <span id="date2"></span></p>
            </div>

            <hr>
            <table>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
                <?php if ($adm_fee > 0) { ?>
                <tr>
                    <td>Admission Fee</td>
                    <td>&#8377;<?php echo $adm_fee; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($id_fee > 0) { ?>
                <tr>
                    <td>Digital ID Card Fee</td>
                    <td>&#8377;<?php echo $id_fee; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($diary_fee > 0) { ?>
                <tr>
                    <td>Dairy Fee</td>
                    <td>&#8377;<?php echo $diary_fee; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($exam > 0) { ?>
                <tr>
                    <td>Examination Fee</td>
                    <td>&#8377;<?php echo $exam; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($composite > 0) { ?>
                <tr>
                    <td>Composite Fee</td>
                    <td>&#8377;<?php echo $composite; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($computer > 0) { ?>
                <tr>
                    <td>Computer Fee</td>
                    <td>&#8377;<?php echo $computer; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($van > 0) { ?>
                <tr>
                    <td>Van Fee</td>
                    <td>&#8377;<?php echo $van; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($old > 0) { ?>
                <tr>
                    <td>Old Dues</td>
                    <td>&#8377;<?php echo $old; ?> </td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Total</td>
                    <td>&#8377;<?php echo $total; ?></td>
                </tr>
            </table>
            <hr>
            <p><strong>Received:</strong> &#8377;<?php echo $total; ?></p>
            <p><strong>Received By:</strong> Aditya Verma</p>
            <hr>
        </div>
    </div>
   
    <script>
        var today = new Date();
        var date = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
        document.getElementById("date").innerHTML = date;
        document.getElementById("date2").innerHTML = date;
    </script>
</body>

</html>