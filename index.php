<?php 

$con = mysqli_connect("localhost", "root", "", "mynewdb");

if($con){
    // echo 'Db Connected';
}

if(isset($_POST['submit'])){
    echo 'Form';

    $fname = $_POST['Fname'];
    $phone = $_POST['phone'];

    echo $fname;
    echo $phone;

    $sql = "INSERT INTO contact(fname, phone) value ('$fname', '$phone')";

    $res = mysqli_query($con, $sql);

    if($res){
    echo 'Data Inserted';

    }

}

if(isset($_GET['delid'])){

    $id = $_GET['delid'];

    echo $id;

    $delete_sql = "Delete from contact where id = $id";

    $del = mysqli_query($con, $delete_sql);

    if($delete_sql){
        echo "Data Deleted.";

        echo "<script>window.location.href = 'index.php'</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CONTACT MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h3>CONTACT MANAGEMENT</h3>
        <!-- <P>Fill required fields and find book</P> -->

        <form method="POST">
            <input type="text" name="Fname" placeholder="Friend Name" />
            <input type="tel" name="phone" placeholder="Phone Number" /> <br />
            <button class="btn" name="submit"> Submit</button>
        </form>
    </div>

    <div class="container">
        <h3>CONTACT LIST</h3>

        <table>
            <thead>
                <tr>
                    <th>Contact Name</th>
                    <th>Contact Number</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $fetch = "Select * from contact";
                $res = mysqli_query($con,$fetch );

                $row = mysqli_num_rows($res);

                if ($row>0){
                    while($row = mysqli_fetch_array($res)){

                        ?>
           
                <tr>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><button>Delete</button></td>
                   <td> <a href="index.php?delid=<?php echo ($row['id']);?>" class="delete" title="Delete" data-toggle="tooltip" >Delete</i></a></td>
                
                </tr>
            <?php
            }}
            ?>
            </tbody>
        </table>
    </div>
    <script src="index.js"></script>
</body>

</html>