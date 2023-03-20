<?php

include('includes/header.php');
include('config.php');

$sql = "SELECT id, name, father, mother, class, address, dob, route FROM students";
$result = mysqli_query($conn, $sql);

?>

<h1 class="text-center my-5">Students List</h1>

<div class="container my-2">
    <label for="filter">Search By Class:</label>
    <select class="form-select my-1" id="filter" style="width: 20%;" aria-label="Default select example">
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

    <table class="table caption-top my-5">
        <caption>List of Students</caption>
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Class</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $name = $row['name'];
                $class = $row['class'];



                echo '<tr><th scope="row">'.$id.'</th><td>'.$name.'</td><td>'.$class.'</td><td><a href="user?id='.$id.'" class="btn btn-primary mx-2">View</a><button class="btn btn-danger">Delete</button><td></tr>';
            } ?>

            
            

        </tbody>
    </table>
</div>