<?php
    session_start();

    // Check if user is logged in (using the session status from your login file)
    if(!isset($_SESSION['status'])){
        header('location: login.html');
        exit();
    }

    // Handling the "Add Medicine" Form Submission
    if(isset($_POST['submit'])){

        $id = $_POST['med_id'];
        $name = $_POST['med_name'];
        $category = $_POST['med_cat'];
        $price = $_POST['med_price'];
        $quantity = $_POST['med_qty'];

        if($id == "" || $name == "" || $category == "" || $price == "" || $quantity == ""){
            echo "Error: All fields are required!";
        } else {
            // In a real app, you would save to a database here.
            // For now, we simulate success and redirect.
            $_SESSION['last_added'] = $name;
            header('location: medicine_management.php?success=1');
        }

    }
?>

<html>
    <head>
        <title>MEDICINE MANAGEMENT</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <h1>Medicine Inventory</h1>
        <p>Welcome, <?php echo $_SESSION['username']; ?> | <a href="logout.php">Logout</a></p>
        
        <?php 
            if(isset($_GET['success'])){
                echo "<p style='color: green;'>Medicine added successfully!</p>";
            }
        ?>

        <table>
            <tr>
                <th>ID</th>
                <th>MEDICINE NAME</th>
                <th>CATEGORY</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>ACTION</th>
            </tr>
            <tr>
                <td>MED101</td>
                <td>Napa extra</td>
                <td>Fever</td>
                <td>10tk</td>
                <td>120</td>
                <td>
                    <button class="edit">EDIT</button>
                    <button class="delete">DELETE</button>
                    <button class="restock">RESTOCK</button>
                </td>
            </tr>
            </table>

        <hr>
        <h3>Add New Medicine</h3>
        <form method="POST" action="medicine_management.php">
            ID: <input type="text" name="med_id" value=""> <br>
            Name: <input type="text" name="med_name" value=""> <br>
            Category: <input type="text" name="med_cat" value=""> <br>
            Price: <input type="text" name="med_price" value=""> <br>
            Qty: <input type="text" name="med_qty" value=""> <br>
            <input type="submit" name="submit" value="ADD MEDICINE">
        </form>

        <script src="script.js"></script>
    </body>
</html>