<?php
include('../includes/header.php');
include('../config.php');
$id = $_GET['id'];
$getid = $_GET['id'];

//personal details from according to id;
$sql = "SELECT id, name, father, mother, class, address, dob, route FROM students WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (!mysqli_num_rows($result) == 1) {
    echo '<h3 class="text-center my-5">Data Not Found!</h3>';
}
//personal details nikal rhe hai yaha se
while ($row = mysqli_fetch_assoc($result)) {
    $routename = $row['route'];
    $feeclass = $row['class'];
    $namemm = $row['name'];
    $studentclass = $row['class'];
    $studentadd = $row['address'];
    $studentfather = $row['father'];


    //echo '<h1 class="text-center my-4">'.$row['name'].'</h1><h5 class="text-center">ID: '.$row['id'].'</h5><h5 class="text-center">Class: '.$row['class'].'</h5><h5 class="text-center">Fathers Name: '.$row['father'].'</h5><h5 class="text-center">Address: '.$row['address'].' </h5>';

    //echo " '".$feeclass."' ";


    // claass wise fee fetching
    $feesql = "SELECT * from classes WHERE class_name = '$feeclass'";
    $monthlyfee = mysqli_query($conn, $feesql);

    $routesql = "select * from routes where route_name = '$routename'";
    $vanfee = mysqli_query($conn, $routesql);
}

while ($row = mysqli_fetch_assoc($vanfee)) {
    $vanmonthly = $row['fee'];
}


//fetching the van fee paid status
$vanstatussql = "select * from van_fee where student_id = '$getid'";
$vanstatus = mysqli_query($conn, $vanstatussql);

while ($vanrow = mysqli_fetch_assoc($vanstatus)) {
    $janvan = $vanrow['janaury'];
    $febvan = $vanrow['february'];
    $marchvan = $vanrow['march'];
    $aprilvan = $vanrow['april'];
    $mayvan = $vanrow['may'];
    $junevan = $vanrow['june'];
    $julyvan = $vanrow['july'];
    $augustvan = $vanrow['august'];
    $septvan = $vanrow['september'];
    $octvan = $vanrow['october'];
    $novemvan = $vanrow['november'];
    $decemvan = $vanrow['december'];
}


?>
<?php

$getid = $_GET['id'];

// monthly fee paid status according to id
$sql = "SELECT * from fee_status WHERE student_id = $getid";
$otherfee = mysqli_query($conn, $sql);
//$status = mysqli_fetch_assoc($otherfee);

while ($row = mysqli_fetch_assoc($otherfee)) {

    $adm = $row['adm'];
    $exam = $row['exam'];
    $composite = $row['composite'];
    $computer = $row['computer'];
    $idstatus = $row['id_card'];
    $janfee = $row['jan'];
    $febfee = $row['feb'];
    $marchfee = $row['march'];
    $aprilfee = $row['april'];
    $mayfee = $row['may'];
    $junefee = $row['june'];
    $julyfee = $row['july'];
    $augustfee = $row['aug'];
    $septemberfee = $row['sept'];
    $octoberfee = $row['oct'];
    $novermberfee = $row['nov'];
    $decemberfee = $row['decem'];
    $studentidfee = $row['student_id'];
}



//fe amount 
while ($row = mysqli_fetch_assoc($monthlyfee)) {
    $monthly = $row['monthly_fee'];
    $examfee = $row['exam_fee'];
    $compositefee = $row['composite_fee'];
    $computerfee = $row['computer_fee'];
    $idfee = $row['id_fee'];
    $admfee = $row['admission_fee'];

    //monthly fee amount


    $maxfee = (int)$monthly * 12 + (int)$vanmonthly * 12 + (int)$admfee + (int)$compositefee + (int)$idfee + (int)$examfee + (int)$computerfee;

    //$remaining = (int)$monthly+(int)$vanmonthly;

    //echo $remaining;
    $remainingsql = "SELECT SUM(total) FROM receipt WHERE student_id = '$id';";

    $remainingresult = mysqli_query($conn, $remainingsql);
    while ($row = mysqli_fetch_array($remainingresult)) {
        $totalremain = $row[0];
    }
}

?>

<div class="container my-5">
<h6 class="text-center">Total Fee: <div class="badge bg-primary text-wrap" style="width: 6rem;">
  <?php echo $maxfee;?>
</div></h6>
<h6 class="text-center">Remaining Fee: <div class="badge bg-primary text-wrap" style="width: 6rem;">
  <?php if ($totalremain>0) {echo $maxfee-$totalremain;}else{echo 'Rs. 0';} ?>
</div></h6>
</div>



<div class="container">
    <h1 class="text-center">Collect Fee of <?php echo $namemm;  ?></h1>
</div>

<form action="pay.php?id=<?php echo $id; ?>" method="post">

    <!-- sending the students details to make receipt -->

    <input type="hidden" name="stdname" value="<?php echo $namemm ?>">
    <input type="hidden" name="stdclass" value="<?php echo $studentclass ?>">
    <input type="hidden" name="stdaddress" value="<?php echo $studentadd ?>">
    <input type="hidden" name="stdfather" value="<?php echo $studentfather ?>">
    <input type="hidden" name="stdid" value="<?php echo $id ?>">


    <input type="checkbox" name="hidden_checkbox" value="1" checked hidden>

    <!-- <form action="check.php" method="post"> -->
    

    <!-- other fees -->
    <div class="container my-5">

        <!-- Other fees tble -->
        <table class="table table-bordered border-primary my-2 caption-top">
            <caption># Other Fees</caption>



            <tr>
                <th scope="col">Select</th>
                <th scope="col">Fee Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Paid On</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <?php if ($adm !== "Paid") { ?>
                        <td><input type="checkbox" name="adm_cb" value="1"></td>
                    <?php } else { ?> <td><input type="checkbox" name="adm_cb" value="1" style="display: none;"></td><?php } ?>
                    <td>Admission Fee</td>
                    <td><?php echo $admfee; ?></td>
                    <input type="hidden" name="admissionfee" id="admissionfee" value="">
                    <td><?php echo $adm; ?></td>
                    <td><?php if ($adm == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($idstatus !== "Paid") { ?>
                        <td><input type="checkbox" name="id_cb" value="1"></td>
                    <?php } else { ?> <td><input type="checkbox" name="id_cb" value="1" style="display: none;"></td><?php } ?>
                    <td>ID Card Fee</td>
                    <td><?php echo $idfee; ?></td>
                    <input type="hidden" name="postid" id="postid" value="">
                    <td><?php echo $idstatus; ?></td>
                    <td><?php if ($idstatus == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($exam !== "Paid") { ?>
                        <td><input type="checkbox" name="exam_cb" value="1"></td>
                    <?php } else { ?> <td><input type="checkbox" name="exam_cb" value="1" style="display: none;"></td><?php } ?>
                    <td>Exam Fee</td>
                    <td><?php echo $examfee; ?></td>
                    <input type="hidden" name="postexamfee" id="postexamfee" value="">
                    <td><?php echo $exam; ?></td>
                    <td><?php if ($exam == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($composite !== "Paid") { ?>
                        <td><input type="checkbox" name="composite_cb" value="1"></td>
                    <?php } else { ?> <td><input type="checkbox" name="composite_cb" value="1" style="display: none;"></td><?php } ?>
                    <td>Composite Fee</td>
                    <td><?php echo $compositefee; ?></td>
                    <input type="hidden" name="postcompositefee" id="postcompositefee" value="">
                    <td><?php echo $composite; ?></td>
                    <td><?php if ($composite == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($computer !== "Paid") { ?>
                        <td><input type="checkbox" name="computer_cb" value="1"></td>
                    <?php } else { ?> <td><input type="checkbox" name="computer_cb" value="1" style="display: none;"></td><?php } ?>
                    <td>Computer Fee</td>
                    <td><?php echo $computerfee; ?></td>
                    <input type="hidden" name="postcomputer" id="postcomputer" value="">
                    <td><?php echo $computer; ?></td>
                    <td><?php if ($computer == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>

            </tbody>
        </table>

    </div>


    <!-- monthly fee -->
    <div class="container my-5">
        <table class="table table-bordered border-primary my-2 caption-top">
            <caption># Monthly Fees</caption>



            <tr>
                <th scope="col">Select</th>
                <th scope="col">Month</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Paid on</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <?php if ($janfee !== "Paid") { ?>
                        <td><input type="checkbox" name="jan_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>January</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $janfee; ?></td>
                    <input type="hidden" name="postjan" id="postjan" value="">
                    <td><?php if ($janfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>

                <tr>
                    <?php if ($febfee !== "Paid") { ?>
                        <td><input type="checkbox" name="feb_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>Febuary</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $febfee; ?></td>
                    <input type="hidden" name="postfeb" id="postfeb" value="">
                    <td><?php if ($febfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($marchfee !== "Paid") { ?>
                        <td><input type="checkbox" name="march_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>March</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $marchfee; ?></td>
                    <input type="hidden" name="postmarch" id="postmarch" value="">
                    <td><?php if ($marchfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($aprilfee !== "Paid") { ?>
                        <td><input type="checkbox" name="april_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>April</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $aprilfee; ?></td>
                    <input type="hidden" name="postapril" id="postapril" value="">
                    <td><?php if ($aprilfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($mayfee !== "Paid") { ?>
                        <td><input type="checkbox" name="may_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>May</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $mayfee; ?></td>
                    <input type="hidden" name="postmay" id="postmay" value="">
                    <td><?php if ($mayfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($junefee !== "Paid") { ?>
                        <td><input type="checkbox" name="june_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>June</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $junefee; ?></td>
                    <input type="hidden" name="postjune" id="postjune" value="">
                    <td><?php if ($junefee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($julyfee !== "Paid") { ?>
                        <td><input type="checkbox" name="july_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>July</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $julyfee; ?></td>
                    <input type="hidden" name="postjuly" id="postjuly" value="">
                    <td><?php if ($julyfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($augustfee !== "Paid") { ?>
                        <td><input type="checkbox" name="aug_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>August</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $augustfee; ?></td>
                    <input type="hidden" name="postaug" id="postaug" value="">
                    <td><?php if ($augustfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($septemberfee !== "Paid") { ?>
                        <td><input type="checkbox" name="sept_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>September</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $septemberfee; ?></td>
                    <input type="hidden" name="postsept" id="postsept" value="">
                    <td><?php if ($septemberfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>

                <tr>
                    <?php if ($octoberfee !== "Paid") { ?>
                        <td><input type="checkbox" name="october_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>October</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $octoberfee; ?></td>
                    <input type="hidden" name="postoct" id="postoct" value="">
                    <td><?php if ($octoberfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($novermberfee !== "Paid") { ?>
                        <td><input type="checkbox" name="november_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>November</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $novermberfee; ?></td>
                    <input type="hidden" name="postnov" id="postnov" value="">
                    <td><?php if ($novermberfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($decemberfee !== "Paid") { ?>
                        <td><input type="checkbox" name="december_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>December</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $decemberfee; ?></td>
                    <input type="hidden" name="postdec" id="postdec" value="">
                    <td><?php if ($decemberfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>



            </tbody>
        </table>

    </div>
    <!-- van -->

    <div class="container my-5">
        <table class="table table-bordered border-primary my-2 caption-top">
            <caption># Van Fees</caption>



            <tr>
                <th scope="col">Select</th>
                <th scope="col">Month</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Receipt</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <?php if ($janvan !== "Paid") { ?>
                        <td><input type="checkbox" name="janvan_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>January Van Fee</td>
                    <td><?php echo $vanmonthly; ?></td>
                    <td><?php echo $janvan; ?></td>
                    <input type="hidden" name="postjanvan" id="postjanvan" value="">
                    <td><?php if ($janvan == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>

                <tr>
                    <?php if ($febvan !== "Paid") { ?>
                        <td><input type="checkbox" name="febvan_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>Febuary Van Fee</td>
                    <td><?php echo $vanmonthly; ?></td>
                    <td><?php echo $febvan; ?></td>
                    <input type="hidden" name="postfebvan" id="postfebvan" value="">
                    <td><?php if ($febvan == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($marchvan !== "Paid") { ?>
                        <td><input type="checkbox" name="marchvan_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>March Van Fee</td>
                    <td><?php echo $vanmonthly; ?></td>
                    <td><?php echo $marchvan; ?></td>
                    <input type="hidden" name="postmarchvan" id="postmarchvan" value="">
                    <td><?php if ($marchvan == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($aprilvan !== "Paid") { ?>
                        <td><input type="checkbox" name="aprilvan_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>April</td>
                    <td><?php echo $vanmonthly; ?></td>
                    <td><?php echo $aprilvan; ?></td>
                    <input type="hidden" name="postaprilvan" id="postaprilvan" value="">
                    <td><?php if ($aprilvan == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($mayvan !== "Paid") { ?>
                        <td><input type="checkbox" name="mayvan_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>May</td>
                    <td><?php echo $vanmonthly; ?></td>
                    <td><?php echo $mayvan; ?></td>
                    <input type="hidden" name="postmayvan" id="postmayvan" value="">
                    <td><?php if ($mayvan == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($junevan !== "Paid") { ?>
                        <td><input type="checkbox" name="junevan_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>June</td>
                    <td><?php echo $vanmonthly; ?></td>
                    <td><?php echo $junevan; ?></td>
                    <input type="hidden" name="postjunevan" id="postjunevan" value="">
                    <td><?php if ($junevan == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($julyvan !== "Paid") { ?>
                        <td><input type="checkbox" name="julyvan_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>July</td>
                    <td><?php echo $vanmonthly; ?></td>
                    <td><?php echo $julyvan; ?></td>
                    <input type="hidden" name="postjulyvan" id="postjulyvan" value="">
                    <td><?php if ($julyvan == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>


                <tr>
                    <?php if ($augustvan !== "Paid") { ?>
                        <td><input type="checkbox" name="augvan_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>August Van Fee</td>
                    <td><?php echo $vanmonthly; ?></td>
                    <td><?php echo $augustvan; ?></td>
                    <input type="hidden" name="postaugvan" id="postaugvan" value="">
                    <td><?php if ($augustvan == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($septvan !== "Paid") { ?>
                        <td><input type="checkbox" name="septvan_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>September Van Fee</td>
                    <td><?php echo $vanmonthly; ?></td>
                    <td><?php echo $septvan; ?></td>
                    <input type="hidden" name="postseptvan" id="postseptvan" value="">
                    <td><?php if ($septvan == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>

                <tr>
                    <?php if ($octvan !== "Paid") { ?>
                        <td><input type="checkbox" name="octobervan_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>October</td>
                    <td><?php echo $vanmonthly; ?></td>
                    <td><?php echo $octvan; ?></td>
                    <input type="hidden" name="postoctvan" id="postoctvan" value="">
                    <td><?php if ($octvan == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($novemvan !== "Paid") { ?>
                        <td><input type="checkbox" name="novembervan_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>November Van Fee</td>
                    <td><?php echo $vanmonthly; ?></td>
                    <td><?php echo $novemvan; ?></td>
                    <input type="hidden" name="postnovvan" id="postnovvan" value="">
                    <td><?php if ($novemvan == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <?php if ($decemvan !== "Paid") { ?>
                        <td><input type="checkbox" name="decembervan_cb" value="1"></td>
                    <?php } else { ?> <td></td><?php } ?>
                    <td>December Van Fee</td>
                    <td><?php echo $vanmonthly; ?></td>
                    <td><?php echo $decemvan; ?></td>
                    <input type="hidden" name="postdecvan" id="postdecvan" value="">
                    <td><?php if ($decemvan == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>



            </tbody>
        </table>

    </div>
    <div class="container py-5">
        <button type="submit" class="btn btn-lg btn-success">Pay Selected Fees</button>

    </div>
    <br>
    <br><br><br>
</form>

<!-- Van Fee -->

<script>
    const admissionFeeCheckbox = document.querySelector('input[name="adm_cb"]');
    const admissionFeeInput = document.querySelector('#admissionfee');

    const examFeeCheckbox = document.querySelector('input[name="exam_cb"]');
    const examFeeInput = document.querySelector('#postexamfee');

    const compositeFeeCheckbox = document.querySelector('input[name="composite_cb"]');
    const compositeFeeInput = document.querySelector('#postcompositefee');

    const computerFeeCheckbox = document.querySelector('input[name="computer_cb"]');
    const computerFeeInput = document.querySelector('#postcomputer');

    const idFeeCheckbox = document.querySelector('input[name="id_cb"]');
    const idFeeInput = document.querySelector('#postid');


    // months

    const janFeeCheckbox = document.querySelector('input[name="jan_cb"]');
    const janFeeInput = document.querySelector('#postjan');

    const febFeeCheckbox = document.querySelector('input[name="feb_cb"]');
    const febFeeInput = document.querySelector('#postfeb');

    const marchFeeCheckbox = document.querySelector('input[name="march_cb"]');
    const marchFeeInput = document.querySelector('#postmarch');

    const aprilFeeCheckbox = document.querySelector('input[name="april_cb"]');
    const aprilFeeInput = document.querySelector('#postapril');

    const mayFeeCheckbox = document.querySelector('input[name="may_cb"]');
    const mayFeeInput = document.querySelector('#postmay');

    const juneFeeCheckbox = document.querySelector('input[name="june_cb"]');
    const juneFeeInput = document.querySelector('#postjune');

    const julyFeeCheckbox = document.querySelector('input[name="july_cb"]');
    const julyFeeInput = document.querySelector('#postjuly');

    const augFeeCheckbox = document.querySelector('input[name="aug_cb"]');
    const augFeeInput = document.querySelector('#postaug');

    const septFeeCheckbox = document.querySelector('input[name="sept_cb"]');
    const septFeeInput = document.querySelector('#postsept');

    const octFeeCheckbox = document.querySelector('input[name="october_cb"]');
    const octFeeInput = document.querySelector('#postoct');

    const novFeeCheckbox = document.querySelector('input[name="november_cb"]');
    const novFeeInput = document.querySelector('#postnov');

    const decFeeCheckbox = document.querySelector('input[name="december_cb"]');
    const decFeeInput = document.querySelector('#postdec');


    // vaaaaannnnnnnn


    const janvanFeeCheckbox = document.querySelector('input[name="janvan_cb"]');
    const janvanFeeInput = document.querySelector('#postjanvan');

    const febvanFeeCheckbox = document.querySelector('input[name="febvan_cb"]');
    const febvanFeeInput = document.querySelector('#postfebvan');

    const marchvanFeeCheckbox = document.querySelector('input[name="marchvan_cb"]');
    const marchvanFeeInput = document.querySelector('#postmarchvan');

    const aprilvanFeeCheckbox = document.querySelector('input[name="aprilvan_cb"]');
    const aprilvanFeeInput = document.querySelector('#postaprilvan');

    const mayvanFeeCheckbox = document.querySelector('input[name="mayvan_cb"]');
    const mayvanFeeInput = document.querySelector('#postmayvan');

    const junevanFeeCheckbox = document.querySelector('input[name="junevan_cb"]');
    const junevanFeeInput = document.querySelector('#postjunevan');

    const julyvanFeeCheckbox = document.querySelector('input[name="julyvan_cb"]');
    const julyvanFeeInput = document.querySelector('#postjulyvan');

    const augvanFeeCheckbox = document.querySelector('input[name="augvan_cb"]');
    const augvanFeeInput = document.querySelector('#postaugvan');

    const septvanFeeCheckbox = document.querySelector('input[name="septvan_cb"]');
    const septvanFeeInput = document.querySelector('#postseptvan');

    const octvanFeeCheckbox = document.querySelector('input[name="octobervan_cb"]');
    const octvanFeeInput = document.querySelector('#postoctvan');

    const novvanFeeCheckbox = document.querySelector('input[name="novembervan_cb"]');
    const novvanFeeInput = document.querySelector('#postnovvan');

    const decvanFeeCheckbox = document.querySelector('input[name="decembervan_cb"]');
    const decvanFeeInput = document.querySelector('#postdecvan');




    admissionFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            admissionFeeInput.value = "<?php echo $admfee; ?>";
            console.log(admissionFeeInput.value);
        } else {
            admissionFeeInput.value = "";
        }
    });

    idFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            idFeeInput.value = "<?php echo $idfee; ?>";
            console.log(idFeeInput.value);
        } else {
            idFeeInput.value = "";
        }
    });

    examFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            examFeeInput.value = "<?php echo $examfee; ?>";
            console.log(examFeeInput.value);
        } else {
            examFeeInput.value = "";
        }
    });

    compositeFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            compositeFeeInput.value = "<?php echo $compositefee; ?>";
            console.log(compositeFeeInput.value);
        } else {
            compositeFeeInput.value = "";
        }
    });

    computerFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            computerFeeInput.value = "<?php echo $computerfee; ?>";
            console.log(computerFeeInput.value);
        } else {
            computerFeeInput.value = "";
        }
    });


    // monthly daaaaaaaa

    janFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            janFeeInput.value = "<?php echo $monthly; ?>";
            console.log(janFeeInput.value);
        } else {
            janFeeInput.value = "";
        }
    });


    febFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            febFeeInput.value = "<?php echo $monthly; ?>";
            console.log(febFeeInput.value);
        } else {
            febFeeInput.value = "";
        }
    });
    marchFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            marchFeeInput.value = "<?php echo $monthly; ?>";
            console.log(marchFeeInput.value);
        } else {
            marchFeeInput.value = "";
        }
    });
    aprilFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            aprilFeeInput.value = "<?php echo $monthly; ?>";
            console.log(aprilFeeInput.value);
        } else {
            aprilFeeInput.value = "";
        }
    });
    mayFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            mayFeeInput.value = "<?php echo $monthly; ?>";
            console.log(mayFeeInput.value);
        } else {
            mayFeeInput.value = "";
        }
    });
    juneFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            juneFeeInput.value = "<?php echo $monthly; ?>";
            console.log(juneFeeInput.value);
        } else {
            juneFeeInput.value = "";
        }
    });
    julyFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            julyFeeInput.value = "<?php echo $monthly; ?>";
            console.log(julyFeeInput.value);
        } else {
            julyFeeInput.value = "";
        }
    });
    augFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            augFeeInput.value = "<?php echo $monthly; ?>";
            console.log(augFeeInput.value);
        } else {
            augFeeInput.value = "";
        }
    });
    septFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            septFeeInput.value = "<?php echo $monthly; ?>";
            console.log(septFeeInput.value);
        } else {
            septFeeInput.value = "";
        }
    });
    octFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            octFeeInput.value = "<?php echo $monthly; ?>";
            console.log(octFeeInput.value);
        } else {
            octFeeInput.value = "";
        }
    });
    novFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            novFeeInput.value = "<?php echo $monthly; ?>";
            console.log(novFeeInput.value);
        } else {
            novFeeInput.value = "";
        }
    });

    decFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            decFeeInput.value = "<?php echo $monthly; ?>";
            console.log(decFeeInput.value);
        } else {
            decFeeInput.value = "";
        }
    });



    // vannnnnnnnnnnnnnnnnnnnnnnnnnn


    janvanFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            janvanFeeInput.value = "<?php echo $vanmonthly; ?>";
            console.log(janvanFeeInput.value);
        } else {
            janvanFeeInput.value = "";
        }
    });


    febvanFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            febvanFeeInput.value = "<?php echo $vanmonthly; ?>";
            console.log(febvanFeeInput.value);
        } else {
            febvanFeeInput.value = "";
        }
    });
    marchvanFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            marchvanFeeInput.value = "<?php echo $vanmonthly; ?>";
            console.log(marchvanFeeInput.value);
        } else {
            marchvanFeeInput.value = "";
        }
    });
    aprilvanFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            aprilvanFeeInput.value = "<?php echo $vanmonthly; ?>";
            console.log(aprilvanFeeInput.value);
        } else {
            aprilvanFeeInput.value = "";
        }
    });
    mayvanFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            mayvanFeeInput.value = "<?php echo $vanmonthly; ?>";
            console.log(mayvanFeeInput.value);
        } else {
            mayvanFeeInput.value = "";
        }
    });
    junevanFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            junevanFeeInput.value = "<?php echo $vanmonthly; ?>";
            console.log(junevanFeeInput.value);
        } else {
            junevanFeeInput.value = "";
        }
    });
    julyvanFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            julyvanFeeInput.value = "<?php echo $vanmonthly; ?>";
            console.log(julyvanFeeInput.value);
        } else {
            julyvanFeeInput.value = "";
        }
    });
    augvanFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            augvanFeeInput.value = "<?php echo $vanmonthly; ?>";
            console.log(augvanFeeInput.value);
        } else {
            augvanFeeInput.value = "";
        }
    });
    septvanFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            septvanFeeInput.value = "<?php echo $vanmonthly; ?>";
            console.log(septvanFeeInput.value);
        } else {
            septvanFeeInput.value = "";
        }
    });
    octvanFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            octvanFeeInput.value = "<?php echo $vanmonthly; ?>";
            console.log(octvanFeeInput.value);
        } else {
            octvanFeeInput.value = "";
        }
    });
    novvanFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            novvanFeeInput.value = "<?php echo $vanmonthly; ?>";
            console.log(novvanFeeInput.value);
        } else {
            novvanFeeInput.value = "";
        }
    });

    decvanFeeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            decvanFeeInput.value = "<?php echo $vanmonthly; ?>";
            console.log(decvanFeeInput.value);
        } else {
            decvanFeeInput.value = "";
        }
    });
</script>