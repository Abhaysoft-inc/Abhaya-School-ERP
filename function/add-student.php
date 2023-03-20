<?php

include('../config.php');

$name = $_POST['name'];
$father = $_POST['father'];
$mother = $_POST['mother'];
$class = $_POST['class'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$route = $_POST['route'];


$sql = "INSERT INTO `students` (`id`, `name`, `father`, `mother`, `class`, `address`, `dob`, `route`) VALUES (NULL, '$name', '$father', '$mother', '$class', '$address', '$dob', '$route');";

$result = mysqli_query($conn,$sql);
$id = mysqli_insert_id($conn);
if (mysqli_affected_rows($conn) > 0) {
    $sql2 = "INSERT INTO `fee_status` (`id`, `adm`, `exam`, `composite`, `computer`, `jan`, `feb`, `march`, `april`, `may`, `june`, `july`, `aug`, `sept`, `oct`, `nov`, `decem`, `student_id`) VALUES (NULL, 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', 'Unpaid', '$id');";
    mysqli_query($conn,$sql2);
    header("Location: ../students.php");
    exit();
    
} else {
    echo "Error: " . mysqli_error($conn);
}

?>

