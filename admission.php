<?php

include('includes/header.php');
include('config.php');
?>

<h1 class="text-center my-5">New Admission</h1>

<div class="container">
    <form class="row g-3" method="post" action="function/add-student.php">
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="col-md-6">
            <label for="father" class="form-label">Father's Name</label>
            <input type="text" class="form-control" name="father" id="father">
        </div>
        <div class="col-md-6">
            <label for="mother" class="form-label">Mother's Name</label>
            <input type="text" class="form-control" name="mother" id="mother">
        </div>

        <!-- class -->

        <div class="col-md-6">
            <label for="class" class="form-label">Class:</label>
            <select name="class" id="class" class="form-select" required>
                <option value="">-- Select a class --</option>
                <option value="Nursery">Nursery</option>
                <option value="LKG">LKG</option>
                <option value="UKG">UKG</option>
                <option value="1">Class 1</option>
                <option value="2">Class 2</option>
                <option value="3">Class 3</option>
                <option value="4">Class 4</option>
                <option value="5">Class 5</option>
                <option value="6">Class 6</option>
                <option value="7">Class 7</option>
                <option value="8">Class 8</option>
                <option value="9">Class 9</option>
                <option value="10">Class 10</option>
                <option value="11">Class 11</option>
                <option value="12">Class 12</option>
            </select>
        </div>



        <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St">
        </div>
        <!-- <div class="col-12">
    <label for="inputAddress2" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div> -->
        <div class="col-md-6">
            <label for="dob" class="form-label">Date of Birth: </label>
            <input type="date" name="dob" class="dob" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Van Route</label>
            <select name="route" id="inputState" class="form-select" required>
                <option value="">-- Select Route --</option>
                <option value="">NONE</option>
                <option value="BHUJWA-PANANHA">BHUJWA TOLA/ PANANHA</option>
                <option value="KATAI">KATAI CHAURAHA</option>
                <option value="AWADHPUR">AWADHPUR</option>
                <option value="BASAHWA">BASAHWA</option>
                <option value="LEDHA">LEDHA</option>
                <option value="JOGAM">JOGAM</option>
                <option value="SAWALGADHI">SAWALGADHI</option>
                <option value="MADAINA">MADAINA</option>
                <option value="PARSOTIMA">PARSOTIMA</option>
                <option value="KARMEL">KARMEL</option>
                <option value="BARDGONIA">BARDGONIA</option>
                <option value="USARI">USARI</option>
                <option value="USRI-BHISWA">USRI KHURD BHISWA</option>
                <option value="JOGIYAN">JOGIYAN</option>
                <option value="SANDA">SANDA</option>
                <option value="ASANAHAR">ASANAHAR</option>
                <option value="MATHIYAN">MATHIYAN</option>
                <option value="LAVKANI">LAVKANI</option>
                <option value="BARAITOLA">BARAI TOLA</option>
                <option value="VIRWA">VIRWA</option>
                <option value="KALABAN">KALABAN</option>
                <option value="SANGAM-CHAURAHA">CHAURAHA</option>
                <option value="KATAI-GAON">KATAI GAON</option>
                <option value="INDUPUR">INDUPUR</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-lg">Add Student</button>
        </div>
    </form>
    <br>
    <br><br>
</div>