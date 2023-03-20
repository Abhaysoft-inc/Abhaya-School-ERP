<?php
// Get the POST data
$admissionfee = $_POST['admissionfee'];
$postid = $_POST['postid'];
$postexamfee = $_POST['postexamfee'];
$postcompositefee = $_POST['postcompositefee'];

// Do something with the POST data
echo "Admission Fee: " . $admissionfee . "<br>";
echo "Post ID: " . $postid . "<br>";
echo "Post Exam Fee: " . $postexamfee . "<br>";
echo "Post Composite Fee: " . $postcompositefee . "<br>";
?>
