<!-- Code for inserting new members into the member table -->
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
    <br>
    <?php
    $connect;
    if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
    }
    //Retreiving email from the form submission: (convert to string for bind_param)
    $emailinfo = strval($_REQUEST['email']);
    //Retreiving max ID and incrementing by 1 for new members:
    $maxID = "SELECT MAX(memberID) as 'maxID' FROM member";
    $maxIDresult = $connect->query($maxID);
    while($row = $maxIDresult->fetch_assoc()){
        $newMemberID =  $row['maxID']+1;
    }
    //Inserting new member information into database using a prepared statement(150 maximum members):
    if($newMemberID<150){
        $sqlstatement = $connect->prepare("INSERT INTO member (memberID, email) VALUES (?,?)");
        $sqlstatement->bind_param("is", $newMemberID, $emailinfo); //integer, string
        $sqlstatement->execute();
        header("Refresh: 0, url=https://gym174.herokuapp.com/");
    }
    else{
        echo "The gym is full. Check back later!";
    }
   
   $connect->close(); ?>
    
</body>
</html>
