<?php
include('../includes/header.php');
include('../config.php');
$id = $_GET['id'];
$getid = $_GET['id'];
$sql = "SELECT id, name, father, mother, class, address, dob, route FROM students WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if(!mysqli_num_rows($result)==1){
    echo '<h3 class="text-center my-5">Data Not Found!</h3>';

}
while($row = mysqli_fetch_assoc($result)){
    $feeclass = $row['class'];
    $routename = $row['route'];
    echo '<h1 class="text-center my-4">'.$row['name'].'</h1><h5 class="text-center">ID: '.$row['id'].'</h5><h5 class="text-center">Class: '.$row['class'].'</h5><h5 class="text-center">Fathers Name: '.$row['father'].'</h5><h5 class="text-center">Address: '.$row['address'].' </h5>';

    echo $routename;


    //echo " '".$feeclass."' ";

    $feesql = "SELECT * from classes WHERE class_name = '$feeclass'";
    $monthlyfee = mysqli_query($conn,$feesql);

    $routesql = "select * from routes where route_name = '$routename'";
    $vanfee = mysqli_query($conn, $routesql);

}

while($row = mysqli_fetch_assoc($vanfee) ){
    $vanmonthly = $row['fee'];
}


//get the paid status of van fee

$vanstatussql = "select * from van_fee where student_id = $id";
$vanstatus = mysqli_query($conn,$vanstatussql);

while($vanrow = mysqli_fetch_assoc($vanstatus)){
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

    echo $janvan;
}




?>



<?php

$getid = $_GET['id'];

$sql = "SELECT * from fee_status WHERE student_id = $getid";
$otherfee = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($otherfee)){
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




while($row = mysqli_fetch_assoc($monthlyfee)){
    $monthly = $row['monthly_fee'] ;
    $examfee = $row['exam_fee'];
    $compositefee = $row['composite_fee'];
    $computerfee = $row['computer_fee'];
    $idfee = $row['id_fee'];
    $admfee = $row['admission_fee'];

    //monthly fee amount




}

//agar route none hai to vanmonthly ko 0 set krdp na 

$maxfee = (int)$monthly*12+(int)$vanmonthly*12+(int)$admfee+(int)$compositefee+(int)$idfee+(int)$examfee+(int)$computerfee;

//$remaining = (int)$monthly+(int)$vanmonthly;

//echo $remaining;
$remainingsql = "SELECT SUM(total) FROM receipt WHERE student_id = '$id';";

$remainingresult = mysqli_query($conn, $remainingsql);
while($row = mysqli_fetch_array($remainingresult)){
    $totalremain = $row[0];
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
<a href="collect.php?id=<?php echo $id; ?>" class="text-center btn btn-lg btn-success">Pay Fees</a>
</div>


<!-- other fees -->
<div class="container my-5">

    <!-- Other fees tble -->
    <table class="table table-bordered border-primary my-2 caption-top">
        <caption># Other Fees</caption>



        <tr>
            
            <th scope="col">Fee Type</th>
            <th scope="col">Amount</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                
                <td>Admission Fee</td>
                <td><?php echo $admfee;?></td>
                <td><?php echo $adm;?></td>
            </tr>
            <tr>
                
                <td>Digital ID Card Fee</td>
                <td><?php echo $idfee;?></td>
                <td><?php echo $idstatus;?></td>
               
            </tr>
            <tr>
                <td>Exam Fee</td>
                <td><?php echo $examfee;?></td>
                <td><?php echo $exam;?></td>
                </tr>
            <tr>
                <td>Composite Fee</td>
                <td><?php echo $compositefee;?></td>
                <td><?php echo $composite;?></td>
                 </tr>
            <tr>
                <td>Computer Fee</td>
                <td><?php echo $computerfee;?></td>
                <td><?php echo $computer;?></td>
                 </tr>
           
        </tbody>
    </table>

</div>


<!-- monthly fee -->
<div class="container my-5">
    <table class="table table-bordered border-primary my-2 caption-top">
        <caption># Monthly Fees</caption>



        <tr>
            
            <th scope="col">Month</th>
            <th scope="col">Amount</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                
                <td>January</td>
                <td><?php echo $monthly;?></td>
                <td><?php echo $janfee; ?></td>
                 </tr>

            <tr>
                
                <td>Febuary</td>
                <td><?php echo $monthly;?></td>
                <td><?php echo $febfee; ?></td>
                </tr>
            <tr>
                
                <td>March</td>
                <td><?php echo $monthly;?></td>
                <td><?php echo $marchfee; ?></td>
                </tr>
            <tr>
                <td>April</td>
                <td><?php echo $monthly;?></td>
                <td><?php echo $aprilfee; ?></td>
                </tr>
            <tr>
                <td>May</td>
                <td><?php echo $monthly;?></td>
                <td><?php echo $mayfee; ?></td>
                </tr>
            <tr>
                <td>June</td>
                <td><?php echo $monthly;?></td>
                <td><?php echo $junefee; ?></td>
                </tr>
            <tr>
                <td>July</td>
                <td><?php echo $monthly;?></td>
                <td><?php echo $julyfee; ?></td>
                </tr>
            <tr>
                <td>August</td>
                <td><?php echo $monthly;?></td>
                <td><?php echo $augustfee; ?></td>
                </tr>
            <tr>
                <td>September</td>
                <td><?php echo $monthly;?></td>
                <td><?php echo $septemberfee; ?></td>
               
            </tr>

            <tr>
                <td>October</td>
                <td><?php echo $monthly;?></td>
                <td><?php echo $octoberfee; ?></td>
                </tr>
            <tr>
                <td>November</td>
                <td><?php echo $monthly;?></td>
                <td><?php echo $novermberfee; ?></td>
                
            </tr>
            <tr>
                <td>December</td>
                <td><?php echo $monthly;?></td>
                <td><?php echo $decemberfee; ?></td>
                
            </tr>
            
            

        </tbody>
    </table>

</div>

<!-- Van Fee -->
<div class="container my-5">
    <table class="table table-bordered border-primary my-2 caption-top">
        <caption># Monthly Fees</caption>



        <tr>
            
            <th scope="col">Month</th>
            <th scope="col">Amount</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                
                <td>January</td>
                <td><?php echo $vanmonthly;?></td>
                <td><?php echo $janvan; ?></td>
                 </tr>

            <tr>
                
                <td>Febuary</td>
                <td><?php echo $vanmonthly;?></td>
                <td><?php echo $febvan; ?></td>
                </tr>
            <tr>
                
                <td>March</td>
                <td><?php echo $vanmonthly;?></td>
                <td><?php echo $marchvan; ?></td>
                </tr>
            <tr>
                <td>April</td>
                <td><?php echo $vanmonthly;?></td>
                <td><?php echo $aprilvan; ?></td>
                </tr>
            <tr>
                <td>May</td>
                <td><?php echo $vanmonthly;?></td>
                <td><?php echo $mayvan; ?></td>
                </tr>
            <tr>
                <td>June</td>
                <td><?php echo $vanmonthly;?></td>
                <td><?php echo $junevan; ?></td>
                </tr>
            <tr>
                <td>July</td>
                <td><?php echo $vanmonthly;?></td>
                <td><?php echo $julyvan; ?></td>
                </tr>
            <tr>
                <td>August</td>
                <td><?php echo $vanmonthly;?></td>
                <td><?php echo $augustvan; ?></td>
                </tr>
            <tr>
                <td>September</td>
                <td><?php echo $vanmonthly;?></td>
                <td><?php echo $septvan; ?></td>
               
            </tr>

            <tr>
                <td>October</td>
                <td><?php echo $vanmonthly;?></td>
                <td><?php echo $octvan; ?></td>
                </tr>
            <tr>
                <td>November</td>
                <td><?php echo $vanmonthly;?></td>
                <td><?php echo $novemvan; ?></td>
                
            </tr>
            <tr>
                <td>December</td>
                <td><?php echo $vanmonthly;?></td>
                <td><?php echo $decemvan; ?></td>
                
            </tr>
            
            

        </tbody>
    </table>

</div>