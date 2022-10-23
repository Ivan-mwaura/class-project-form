<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $coursename = $_POST['coursename'];
    $endyear = $_POST['endyear'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    $conn = new mysqli('localhost','root','','alumni');
    if($conn->connect_error){
        die('connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into forms(firstname, lastname, gender,coursename, endyear, phonenumber,email, comment)
         values(?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param("ssssssss", $firstname, $lastname, $gender, $coursename, $endyear, $phonenumber,$email, $comment);

        $stmt->execute();
        echo "forms successfully finished...";
        $stmt->close();
        $conn->close();
    }

?>