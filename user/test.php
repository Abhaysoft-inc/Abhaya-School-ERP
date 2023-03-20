<?php
include('../includes/header.php');
include('../config.php');
$id = $_GET['id'];
$sql = "SELECT id, name, father, mother, class, address, dob, route FROM students WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (!mysqli_num_rows($result) == 1) {
    echo '<h3 class="text-center my-5">Data Not Found!</h3>';
}
while ($row = mysqli_fetch_assoc($result)) {
    $feeclass = $row['class'];
    $namemm = $row['name'];
    //echo '<h1 class="text-center my-4">'.$row['name'].'</h1><h5 class="text-center">ID: '.$row['id'].'</h5><h5 class="text-center">Class: '.$row['class'].'</h5><h5 class="text-center">Fathers Name: '.$row['father'].'</h5><h5 class="text-center">Address: '.$row['address'].' </h5>';

    //echo " '".$feeclass."' ";

    $feesql = "SELECT * from classes WHERE class_name = '$feeclass'";
    $monthlyfee = mysqli_query($conn, $feesql);
}



?>

<div class="container my-5">
    <h6 class="text-center">Total Fee: <div class="badge bg-primary text-wrap" style="width: 6rem;">
            $5000
        </div>
    </h6>
    <h6 class="text-center">Remaining Fee: <div class="badge bg-primary text-wrap" style="width: 6rem;">
            $5000
        </div>
    </h6>
</div>

<?php

$getid = $_GET['id'];

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




while ($row = mysqli_fetch_assoc($monthlyfee)) {
    $monthly = $row['monthly_fee'];
    $examfee = $row['exam_fee'];
    $compositefee = $row['composite_fee'];
    $computerfee = $row['computer_fee'];
    $idfee = $row['id_fee'];
    $admfee = $row['admission_fee'];

    //monthly fee amount




}

?>

<div class="container">
    <h1 class="text-center">Collect Fee of <?php echo $namemm;  ?></h1>
</div>

<form action="check.php" method="post">
    <div class="container">
        <button type="submit" class="btn btn-lg btn-success">Pay Selected Fees</button>

    </div>

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
                    <?php }else{?> <td></td><?php } ?>
                    <td>Admission Fee</td>
                    <td><?php echo $admfee; ?></td>
                    <input type="hidden" name="admissionfee" value="$admfee">
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
                    <?php }else{?> <td></td><?php } ?>
                    <td>Digital ID Card Fee</td>
                    <td><?php echo $idfee; ?></td>
                    <td><?php echo $idstatus; ?></td>
                    <td><?php if ($idfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                <?php if ($exam !== "Paid") { ?>
                    <td><input type="checkbox" name="exam_cb" value="1"></td>
                    <?php }else{?> <td></td><?php } ?>
                    <td>Exam Fee</td>
                    <td><?php echo $examfee; ?></td>
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
                    <?php }else{?> <td></td><?php } ?>
                    <td>Composite Fee</td>
                    <td><?php echo $compositefee; ?></td>
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
                    <?php }else{?> <td></td><?php } ?>
                    <td>Computer Fee</td>
                    <td><?php echo $computerfee; ?></td>
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
                    <?php }else{?> <td></td><?php } ?>
                    <td>January</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $janfee; ?></td>
                    <td><?php if ($janfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>

                <tr>
                <?php if ($febfee !== "Paid") { ?>
                    <td><input type="checkbox" name="feb_cb" value="1"></td>
                    <?php }else{?> <td></td><?php } ?>
                    <td>Febuary</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $febfee; ?></td>
                    <td><?php if ($febfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                <?php if ($marchfee !== "Paid") { ?>
                    <td><input type="checkbox" name="march_cb" value="1"></td>
                    <?php }else{?> <td></td><?php } ?>
                    <td>March</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $marchfee; ?></td>
                    <td><?php if ($marchfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                <?php if ($aprilfee !== "Paid") { ?>
                    <td><input type="checkbox" name="april_cb" value="1"></td>
                    <?php }else{?> <td></td><?php } ?>
                    <td>April</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $aprilfee; ?></td>
                    <td><?php if ($aprilfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                <?php if ($mayfee !== "Paid") { ?>
                    <td><input type="checkbox" name="may_cb" value="1"></td>
                    <?php }else{?> <td></td><?php } ?>
                    <td>May</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $mayfee; ?></td>
                    <td><?php if ($mayfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                <?php if ($junefee !== "Paid") { ?>
                    <td><input type="checkbox" name="june_cb" value="1"></td>
                    <?php }else{?> <td></td><?php } ?>
                    <td>June</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $junefee; ?></td>
                    <td><?php if ($junefee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                <?php if ($julyfee !== "Paid") { ?>
                    <td><input type="checkbox" name="july_cb" value="1"></td>
                    <?php }else{?> <td></td><?php } ?>
                    <td>July</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $julyfee; ?></td>
                    <td><?php if ($julyfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                <?php if ($augustfee !== "Paid") { ?>
                    <td><input type="checkbox" name="aug_cb" value="1"><input type="hidden" name="august" value="<?php echo $monthly;?>"></td>
                    <?php }else{?> <td></td><?php } ?>
                    <td>August</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $augustfee; ?></td>
                    <td><?php if ($augustfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                <?php if ($septemberfee !== "Paid") { ?>
                    <td><input type="checkbox" name="sept_cb" value="1"></td>
                    <?php }else{?> <td></td><?php } ?>
                    <td>September</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $septemberfee; ?></td>
                    <td><?php if ($septemberfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>

                <tr>
                <?php if ($octoberfee !== "Paid") { ?>
                    <td><input type="checkbox" name="october_cb" value="1"></td>
                    <?php }else{?> <td></td><?php } ?>
                    <td>October</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $octoberfee; ?></td>
                    <td><?php if ($octoberfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                <?php if ($novermberfee !== "Paid") { ?>
                    <td><input type="checkbox" name="november_cb" value="1"></td>
                    <?php }else{?> <td></td><?php } ?>
                    <td>November</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $novermberfee; ?></td>
                    <td><?php if ($novermberfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                <?php if ($decemberfee !== "Paid") { ?>
                    <td><input type="checkbox" name="december_cb" value="1"></td>
                    <?php }else{?> <td></td><?php } ?>
                    <td>December</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $decemberfee; ?></td>
                    <td><?php if ($decemberfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>



            </tbody>
        </table>

    </div>
    <button type="submit">payfee</button>

    </form>

    <!-- Van Fee -->
    <div class="container my-5">
        <h5 class="text-center">Data for filled, to be fetched from routesfee table</h5>
        <table class="table table-bordered border-primary my-2 caption-top">
            <caption># Van Fees</caption>



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
                    <td><input type="checkbox" name="january" id=""></td>
                    <td>January</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $janfee; ?></td>
                    <td><?php if ($janfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="feb" id=""></td>
                    <td>Febuary</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $febfee; ?></td>
                    <td><?php if ($febfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="january" id=""></td>
                    <td>March</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $marchfee; ?></td>
                    <td><?php if ($marchfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="january" id=""></td>
                    <td>April</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $aprilfee; ?></td>
                    <td><?php if ($aprilfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="january" id=""></td>
                    <td>May</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $mayfee; ?></td>
                    <td><?php if ($mayfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="january" id=""></td>
                    <td>June</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $junefee; ?></td>
                    <td><?php if ($junefee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="january" id=""></td>
                    <td>July</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $julyfee; ?></td>
                    <td><?php if ($julyfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="january" id=""></td>
                    <td>August</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $augustfee; ?></td>
                    <td><?php if ($augustfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="january" id=""></td>
                    <td>September</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $septemberfee; ?></td>
                    <td><?php if ($septemberfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>

                <tr>
                    <td><input type="checkbox" name="january" id=""></td>
                    <td>October</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $octoberfee; ?></td>
                    <td><?php if ($octoberfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="january" id=""></td>
                    <td>November</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $novermberfee; ?></td>
                    <td><?php if ($novermberfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="january" id=""></td>
                    <td>December</td>
                    <td><?php echo $monthly; ?></td>
                    <td><?php echo $decemberfee; ?></td>
                    <td><?php if ($decemberfee == 'Unpaid') {
                            echo 'Fee Not Paid';
                        } else {
                            echo 'Paid_On';
                        }  ?></td>
                </tr>


            </tbody>
        </table>


</div>