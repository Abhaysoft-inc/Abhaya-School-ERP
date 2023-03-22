<?php
include("../config.php");
include('../includes/header.php');


//jo jo jma hua hai use e rhe hai



$id = $_GET['id'];
$postadm = $_POST['admissionfee'];
$postid = $_POST['postid'];
$postexamfee = $_POST['postexamfee'];
$postcompositefee = $_POST['postcompositefee'];
$postcomputerfee = $_POST['postcomputer'];

/// months

$janaury = $_POST['postjan'];
$feb = $_POST['postfeb'];
$march = $_POST['postmarch'];
$april = $_POST['postapril'];
$may = $_POST['postmay'];
$june = $_POST['postjune'];
$july = $_POST['postjuly'];
$aug = $_POST['postaug'];
$sept = $_POST['postsept'];
$oct = $_POST['postoct'];
$nov = $_POST['postnov'];
$dec = $_POST['postdec'];

//vannnnnnnnnnnnnnnnnnnnnnnnnn

$janauryvan = $_POST['postjanvan'];
$febvan = $_POST['postfebvan'];
$marchvan = $_POST['postmarchvan'];
$aprilvan = $_POST['postaprilvan'];
$mayvan = $_POST['postmayvan'];
$junevan = $_POST['postjunevan'];
$julyvan = $_POST['postjulyvan'];
$augvan = $_POST['postaugvan'];
$septvan = $_POST['postseptvan'];
$octvan = $_POST['postoctvan'];
$novvan = $_POST['postnovvan'];
$decvan = $_POST['postdecvan'];


$sql = "SELECT id, name, father, mother, class, address, dob, route FROM students WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (!mysqli_num_rows($result) == 1) {
    echo '<h3 class="text-center my-5">Data Not Found!</h3>';
}
while ($row = mysqli_fetch_assoc($result)) {
    $feeclass = $row['class'];
    $namemm = $row['name'];
    $studentadd = $row['address'];
    $studentfather = $row['father'];
}


?>
<form id="myForm" action="checkpay.php" method="POST">
    <input type="hidden" name="admissionfee" value="<?php echo $postadm; ?>">
    <input type="hidden" name="postid" value="<?php echo $postid; ?>">
    <input type="hidden" name="postexamfee" value="<?php echo $postexamfee; ?>">
    <input type="hidden" name="postcompositefee" value="<?php echo $postcompositefee; ?>">
    <input type="hidden" name="postcomputerfee" value="<?php echo $postcomputerfee; ?>">
    <input type="hidden" name="name" value="<?php echo $namemm ?>">
    <input type="hidden" name="class" value="<?php echo $feeclass ?>">
    <input type="hidden" name="address" value="<?php echo $studentadd ?>">
    <input type="hidden" name="father" value="<?php echo $studentfather ?>">
    <input type="hidden" name="stdid" value="<?php echo $id; ?>">

    <!-- monthly fee -->


    <input type="hidden" name="jan" value="<?php echo $janaury ?>">
    <input type="hidden" name="feb" value="<?php echo $feb ?>">
    <input type="hidden" name="march" value="<?php echo $march ?>">
    <input type="hidden" name="april" value="<?php echo $april ?>">
    <input type="hidden" name="may" value="<?php echo $may ?>">
    <input type="hidden" name="june" value="<?php echo $june ?>">
    <input type="hidden" name="july" value="<?php echo $july ?>">
    <input type="hidden" name="august" value="<?php echo $aug ?>">
    <input type="hidden" name="september" value="<?php echo $sept ?>">
    <input type="hidden" name="october" value="<?php echo $oct ?>">
    <input type="hidden" name="november" value="<?php echo $nov ?>">
    <input type="hidden" name="december" value="<?php echo $dec ?>">



    <!-- van feeee -->
    <input type="hidden" name="janvan" value="<?php echo $janauryvan ?>">
    <input type="hidden" name="febvan" value="<?php echo $febvan ?>">
    <input type="hidden" name="marchvan" value="<?php echo $marchvan ?>">
    <input type="hidden" name="aprilvan" value="<?php echo $aprilvan ?>">
    <input type="hidden" name="mayvan" value="<?php echo $mayvan ?>">
    <input type="hidden" name="junevan" value="<?php echo $junevan ?>">
    <input type="hidden" name="julyvan" value="<?php echo $julyvan ?>">
    <input type="hidden" name="augustvan" value="<?php echo $augvan ?>">
    <input type="hidden" name="septembervan" value="<?php echo $septvan ?>">
    <input type="hidden" name="octobervan" value="<?php echo $octvan ?>">
    <input type="hidden" name="novembervan" value="<?php echo $novvan ?>">
    <input type="hidden" name="decembervan" value="<?php echo $decvan ?>">




    <button type="submit">Submit</button>
</form>
<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    //elected checkboxes

    $adm_cb = isset($_POST["adm_cb"]) ? $_POST["adm_cb"] : 0;

    $id_cb = isset($_POST["id_cb"]) ? $_POST["id_cb"] : 0;

    $exam_cb = isset($_POST["exam_cb"]) ? $_POST["exam_cb"] : 0;
    $composite_cb = isset($_POST["composite_cb"]) ? $_POST["composite_cb"] : 0;

    $computer_cb = isset($_POST["computer_cb"]) ? $_POST["computer_cb"] : 0;



    // Get the selected checkboxes

    $jan_cb = isset($_POST["jan_cb"]) ? $_POST["jan_cb"] : 0;

    $feb_cb = isset($_POST["feb_cb"]) ? $_POST["feb_cb"] : 0;

    $march_cb = isset($_POST["march_cb"]) ? $_POST["march_cb"] : 0;

    $april_cb = isset($_POST["april_cb"]) ? $_POST["april_cb"] : 0;

    $may_cb = isset($_POST["may_cb"]) ? $_POST["may_cb"] : 0;

    $june_cb = isset($_POST["june_cb"]) ? $_POST["june_cb"] : 0;

    $julyfee = isset($_POST["july_cb"]) ? $_POST["july_cb"] : 0;

    $aug_cb = isset($_POST["aug_cb"]) ? $_POST["aug_cb"] : 0;

    $sept_cb = isset($_POST["sept_cb"]) ? $_POST["sept_cb"] : 0;

    $october_cb = isset($_POST["october_cb"]) ? $_POST["october_cb"] : 0;

    $november_cb = isset($_POST["november_cb"]) ? $_POST["november_cb"] : 0;

    $december_cb = isset($_POST["december_cb"]) ? $_POST["december_cb"] : 0;
    $def_cb = isset($_POST["hidden_checkbox"]) ? $_POST["hidden_checkbox"] : 0;


    ////// Vannnnnnnnnnnnnnnnnnnnnnn

    
    $janvan_cb = isset($_POST["janvan_cb"]) ? $_POST["janvan_cb"] : 0;

    $febvan_cb = isset($_POST["febvan_cb"]) ? $_POST["febvan_cb"] : 0;

    $marchvan_cb = isset($_POST["marchvan_cb"]) ? $_POST["marchvan_cb"] : 0;

    $aprilvan_cb = isset($_POST["aprilvan_cb"]) ? $_POST["aprilvan_cb"] : 0;

    $mayvan_cb = isset($_POST["mayvan_cb"]) ? $_POST["mayvan_cb"] : 0;

    $junevan_cb = isset($_POST["junevan_cb"]) ? $_POST["junevan_cb"] : 0;

    $julyvanfee_cb = isset($_POST["julyvan_cb"]) ? $_POST["julyvan_cb"] : 0;

    $augvan_cb = isset($_POST["augvan_cb"]) ? $_POST["augvan_cb"] : 0;

    $septvan_cb = isset($_POST["septvan_cb"]) ? $_POST["septvan_cb"] : 0;

    $octobervan_cb = isset($_POST["octobervan_cb"]) ? $_POST["octobervan_cb"] : 0;

    $novembervan_cb = isset($_POST["novembervan_cb"]) ? $_POST["novembervan_cb"] : 0;

    $decembervan_cb = isset($_POST["decembervan_cb"]) ? $_POST["decembervan_cb"] : 0;



    // add more months as necessary

    // Update the status columns in the database for the selected months
    // Replace "table_name" with the name of your table
    $sql = "UPDATE fee_status SET ";
    if ($adm_cb) {
        $sql .= "adm = 'Paid', ";
    }
    if ($id_cb) {
        $sql .= "id_card = 'Paid', ";
    }
    if ($exam_cb) {
        $sql .= "exam = 'Paid', ";
    }
    if ($composite_cb) {
        $sql .= "composite = 'Paid', ";
    }
    if ($computer_cb) {
        $sql .= "computer = 'Paid', ";
    }

    //months

    if ($jan_cb) {
        $sql .= "jan = 'Paid', ";
    }
    if ($feb_cb) {
        $sql .= "feb = 'Paid', ";
    }
    if ($march_cb) {
        $sql .= "march = 'Paid', ";
    }
    if ($april_cb) {
        $sql .= "april = 'Paid', ";
    }
    if ($may_cb) {
        $sql .= "may = 'Paid', ";
    }
    if ($june_cb) {
        $sql .= "june = 'Paid', ";
    }
    if ($julyfee) {
        $sql .= "july = 'Paid', ";
    }
    if ($aug_cb) {
        $sql .= "aug = 'Paid', ";
    }
    if ($sept_cb) {
        $sql .= "sept = 'Paid', ";
    }
    if ($october_cb) {
        $sql .= "oct = 'Paid', ";
    }
    if ($november_cb) {
        $sql .= "nov = 'Paid', ";
    }
    if ($december_cb) {
        $sql .= "decem = 'Paid', ";
    }
    if ($def_cb) {
        $sql .= "def = 'Paid', ";
    }


    // add more months as necessary
    // remove the trailing comma from the SQL statement
    $sql = rtrim($sql, ", ");
    $sql .= " WHERE student_id = $id";

    $sql .= "; UPDATE van_fee SET ";
    
    if ($janvan_cb) {
        $sql .= "janaury = 'Paid', ";
    }
    if ($febvan_cb) {
        $sql .= "february = 'Paid', ";
    }
    if ($marchvan_cb) {
        $sql .= "march = 'Paid', ";
    }
    if ($aprilvan_cb) {
        $sql .= "april = 'Paid', ";
    }
    if ($mayvan_cb) {
        $sql .= "may = 'Paid', ";
    }
    if ($junevan_cb) {
        $sql .= "june = 'Paid', ";
    }
    if ($julyvanfee_cb) {
        $sql .= "july = 'Paid', ";
    }
    if ($augvan_cb) {
        $sql .= "august = 'Paid', ";
    }
    if ($septvan_cb) {
        $sql .= "september = 'Paid', ";
    }
    if ($octobervan_cb) {
        $sql .= "october = 'Paid', ";
    }
    if ($novembervan_cb) {
        $sql .= "november = 'Paid', ";
    }
    if ($decembervan_cb) {
        $sql .= "december = 'Paid', ";
    }
    if ($def_cb) {
        $sql .= "def = 'Paid', ";
    }
    $sql = rtrim($sql, ", ");
    $sql .= " WHERE student_id = $id;";

    
    // add any necessary WHERE conditions to the SQL statement

    // Execute the SQL query
    
    $result = mysqli_multi_query($conn, $sql);
    if ($result) {
        echo "<script>document.getElementById('myForm').submit();</script>";
    }
}
?>