<!-- Code which contains the form and the table displayed after submit -->
<?php
include_once 'includes/dbinfo.php'; #path to the file 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>GYM MANAGEMENT DATABASE</title>
</head>
<body>
    <h1 class = 'sign-up'>174 GYM MEMBER ACCOUNT</h1>
    <!-- Receiving email from member & delegating to insert.php for table insert: -->
    <div class="form-">
    Hello new gym member!
    <form action="insert.php" method="post" >
    Enter your email: <input type="text" name="email" placeholder='Email'> <input type="submit"> </form>
    </div>

    <!-- Displaying updated table with all the columns and rows: -->
    <?php
    $connect;
    $sql = "SELECT * FROM member";
    $result = $connect->query($sql);
 
    echo "<table class = 'memberTable' border = '1'>
    <tr>
    <th>Member ID</th>
    <th>First name</th>
    <th>Last name</th>
    <th>Email</th>
    <th>Phone</th>
    </tr> ";
    
    while($row = $result ->fetch_assoc()){  
        echo "<tr>";
        echo "<td>" . $row['memberID'] . "</td>";
        echo "<td>" . $row['Fname'] . "</td>";
        echo "<td>" . $row['Lname'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $connect->close();
    ?>

</body>
</html>
