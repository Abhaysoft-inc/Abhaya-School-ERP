<?php

include('includes/header.php');
include('config.php');

$sql = "SELECT * FROM classes";
$result = mysqli_query($conn, $sql);

?>

<h1 class="text-center my-5">Fee Management</h1>

<div class="container my-2">
    <a class="btn btn-primary">Add New Class</a>

    <table class="table caption-top my-5">
        <caption>List of Students</caption>
        <thead class="table-dark">
            <tr>
                <th scope="col">Class ID</th>
                <th scope="col">Class</th>
                <th scope="col">Admission Fee</th>
                <th scope="col">Exam Fee</th>
                <th scope="col">Composite Fee</th>
                <th scope="col">Monthly Fee</th>
                <th scope="col">Computer Fee</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php

            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $class = $row['class_name'];
                $adm = $row['admission_fee'];
                $idfee = $row['id_fee'];
                $exam = $row['exam_fee'];
                $composite = $row['composite_fee'];
                $monthly = $row['monthly_fee'];                
                $computer = $row['computer_fee'];



                echo '<tr><th scope="row">'.$id.'</th><td>'.$class.'</td><th scope="row">'.$adm.'</th><th scope="row">'.$idfee.'</th><th scope="row">'.$exam.'</th><th scope="row">'.$composite.'</th><th scope="row">'.$computer.'</th><td><button class="btn btn-success mx-2">Edit</button></td></tr>';
                
            }

            


            ?>



            <tr>
                <th scope="row">'.$id.'</th>
                <td>'.$class.'</td>
                <th scope="row">'.$adm.'</th>
                <th scope="row">'.$idfee.'</th>
                <th scope="row">'.$exam.'</th>
                <th scope="row">'.$composite.'</th>
                <th scope="row">'.$computer.'</th>
                <td><button class="btn btn-success mx-2">Edit</button></td>
            </tr>

        </tbody>
    </table>
</div>