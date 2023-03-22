<?php

include("../config.php");

error_reporting(0);

(int)$postadm = $_POST['admissionfee'];
(int)$postid = $_POST['postid'];
(int)$postexamfee = $_POST['postexamfee'];
(int)$postcompositefee = $_POST['postcompositefee'];
(int)$postcomputerfee = $_POST['postcomputerfee'];
$jan = $_POST['jan'];
$feb = $_POST['feb'];
$march = $_POST['march'];
$april = $_POST['april'];
$may = $_POST['may'];
$june = $_POST['june'];
$july = $_POST['july'];
$aug = $_POST['august'];
$sept = $_POST['september'];
$oct = $_POST['october'];
$nov = $_POST['november'];
$dec = $_POST['december'];
//van

$janvan = $_POST['janvan'];
$febvan = $_POST['febvan'];
$marchvan = $_POST['marchvan'];
$aprilvan = $_POST['aprilvan'];
$mayvan = $_POST['mayvan'];
$junevan = $_POST['junevan'];
$julyvan = $_POST['julyvan'];
$augvan = $_POST['augustvan'];
$septvan = $_POST['septembervan'];
$octvan = $_POST['octobervan'];
$novvan = $_POST['novembervan'];
$decvan = $_POST['decembervan'];
$id = $_POST['stdid'];

(int)$total = (int)$postadm+(int)$postid+(int)$postexamfee+(int)$postcompositefee+(int)$postcomputerfee+(int)$jan+(int)$feb+(int)$march+(int)$april+(int)$may+(int)$june+(int)$july+(int)$aug+(int)$sept+(int)$oct+(int)$nov+(int)$dec+(int)$janvan+(int)$febvan+(int)$marchvan+(int)$aprilvan+(int)$mayvan+(int)$junevan+(int)$julyvan+(int)$augvan+(int)$septvan+(int)$octvan+(int)$novvan+(int)$decvan;

$name = $_POST['name'];
$class = $_POST['class'];
$address = $_POST['address'];
$father = $_POST['father'];



$sql = "INSERT INTO `receipt` (`id`, `student_id`, `date`, `Admission_fee`, `composite_fee`, `idcard_fee`, `computer_fee`, `exam`, `jan`, `feb`, `march`, `april`, `may`, `june`, `july`, `aug`, `sept`, `oct`, `nov`, `december`,`total`) VALUES (NULL, '$id', CURRENT_DATE(), '$postadm', '$postcompositefee', '$postid', '$postcomputerfee', '$postexamfee', '$jan', '$feb', '$march', '$april', '$may', '$june', '$july', '$aug', '$sept', '$oct', '$nov', '$dec','$total');";

$result = mysqli_query($conn, $sql);





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
            <h2 style="margin-top: 1px;margin-bottom: 2px;">Abhay Cyebr </h2>
            <p>Indupur, Deoria - 274202</p>
            <h3 style="margin-top: 4px;">Fee Receipt</h3>
            <hr>
        </div>
        <div class="receipt">

            <div class="row">
                <p><strong>Name:</strong> <?php echo $name; ?></p>
                <p><strong>Father's Name: </strong> <?php echo $father; ?></p>
                <p><strong>Route:</strong> <?php echo $address; ?></p>
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
                <?php if ($postadm > 0) { ?>
                <tr>
                    <td>Admission Fee</td>
                    <td>&#8377;<?php echo $postadm; ?> </td>
                </tr>
                <?php } ?>
                <!-- id card -->
                <?php if ($postid > 0) { ?>
                <tr>
                    <td>Digital ID Card Fee</td>
                    <td>&#8377;<?php echo $postid; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($postexamfee > 0) { ?>
                <tr>
                    <td>Examination Fee</td>
                    <td>&#8377;<?php echo $postexamfee; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($postcompositefee > 0) { ?>
                <tr>
                    <td>Composite Fee</td>
                    <td>&#8377;<?php echo $postcompositefee; ?> </td>
                </tr>
                <?php } ?>
                <?php if ($postcomputerfee > 0) { ?>
                <tr>
                    <td>Computer Fee</td>
                    <td>&#8377;<?php echo $postcomputerfee; ?> </td>
                </tr>
                <?php } ?>
                <!-- monthly -->


                <?php if ($jan > 0) { ?>
                <tr>
                    <td>January Fee</td>
                    <td>&#8377;<?php echo $jan; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($feb > 0) { ?>
                <tr>
                    <td>February Fee</td>
                    <td>&#8377;<?php echo $feb; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($march > 0) { ?>
                <tr>
                    <td>March Fee</td>
                    <td>&#8377;<?php echo $march; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($april > 0) { ?>
                <tr>
                    <td>April Fee</td>
                    <td>&#8377;<?php echo $april; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($may > 0) { ?>
                <tr>
                    <td>May Fee</td>
                    <td>&#8377;<?php echo $may; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($june > 0) { ?>
                <tr>
                    <td>June Fee</td>
                    <td>&#8377;<?php echo $june; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($july > 0) { ?>
                <tr>
                    <td>July Fee</td>
                    <td>&#8377;<?php echo $july; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($aug > 0) { ?>
                <tr>
                    <td>August Fee</td>
                    <td>&#8377;<?php echo $aug; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($sept > 0) { ?>
                <tr>
                    <td>September Fee</td>
                    <td>&#8377;<?php echo $sept; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($oct > 0) { ?>
                <tr>
                    <td>October Fee</td>
                    <td>&#8377;<?php echo $oct; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($nov > 0) { ?>
                <tr>
                    <td>November Fee</td>
                    <td>&#8377;<?php echo $nov; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($dec > 0) { ?>
                <tr>
                    <td>December Fee</td>
                    <td>&#8377;<?php echo $dec; ?> </td>
                </tr>
                <?php } ?>


                <!-- vannnnnnnnnnnnnnnn -->


                <?php if ($janvan > 0) { ?>
                <tr>
                    <td>January Van Fee</td>
                    <td>&#8377;<?php echo $janvan; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($febvan > 0) { ?>
                <tr>
                    <td>February van Fee</td>
                    <td>&#8377;<?php echo $febvan; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($marchvan > 0) { ?>
                <tr>
                    <td>March van Fee</td>
                    <td>&#8377;<?php echo $marchvan; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($aprilvan > 0) { ?>
                <tr>
                    <td>April van Fee</td>
                    <td>&#8377;<?php echo $aprilvan; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($mayvan > 0) { ?>
                <tr>
                    <td>May van Fee</td>
                    <td>&#8377;<?php echo $mayvan; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($junevan > 0) { ?>
                <tr>
                    <td>June van Fee</td>
                    <td>&#8377;<?php echo $junevan; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($julyvan > 0) { ?>
                <tr>
                    <td>July van Fee</td>
                    <td>&#8377;<?php echo $julyvan; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($augvan > 0) { ?>
                <tr>
                    <td>August van Fee</td>
                    <td>&#8377;<?php echo $augvan; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($septvan > 0) { ?>
                <tr>
                    <td>September van Fee</td>
                    <td>&#8377;<?php echo $septvan; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($octvan > 0) { ?>
                <tr>
                    <td>October van Fee</td>
                    <td>&#8377;<?php echo $octvan; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($novvan > 0) { ?>
                <tr>
                    <td>November van Fee</td>
                    <td>&#8377;<?php echo $novvan; ?> </td>
                </tr>
                <?php } ?>

                <?php if ($decvan > 0) { ?>
                <tr>
                    <td>December van Fee</td>
                    <td>&#8377;<?php echo $decvan; ?> </td>
                </tr>
                <?php } ?>




                <!-- total -->
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
</body></html>