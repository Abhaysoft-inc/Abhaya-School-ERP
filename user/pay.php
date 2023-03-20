<?php
include("../config.php");
include('../includes/header.php');

$id = $_GET['id'];
$postadm = $_POST['admissionfee'];
$postid = $_POST['postid'];
$postexamfee = $_POST['postexamfee'];
$postcompositefee = $_POST['postcompositefee'];
$postcomputerfee = $_POST['postcomputer'];

?>
<form id="myForm" action="../receipt/generate.php" method="POST">
  <input type="hidden" name="admissionfee" value="<?php echo $postadm; ?>">
  <input type="hidden" name="postid" value="<?php echo $postid; ?>">
  <input type="hidden" name="postexamfee" value="<?php echo $postexamfee; ?>">
  <input type="hidden" name="postcompositefee" value="<?php echo $postcompositefee; ?>">
  <input type="hidden" name="postcomputerfee" value="<?php echo $postcomputerfee; ?>">



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


    // add more months as necessary
    // remove the trailing comma from the SQL statement
    $sql = rtrim($sql, ", ");
    $sql .= " WHERE student_id = $id";
    // add any necessary WHERE conditions to the SQL statement

    // Execute the SQL query
    // Replace "connection" with your database connection variable
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>document.getElementById('myForm').submit();</script>";
    }
}
?>


