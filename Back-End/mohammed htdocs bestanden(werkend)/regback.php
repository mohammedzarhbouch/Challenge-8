<?php
include("DBcon.php");

if(isset($_POST['submit'])){
    if(!empty($_POST['email']) && !empty($_POST['psw'])){
        $Email = $_POST['email'];
        $password = $_POST['psw'];

        $query = "INSERT INTO users (Email, Password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $Email, $password);
        $run = mysqli_stmt_execute($stmt);

        if($run){
            header("Location: index.html");
        exit;

        }
        else{
            echo "form not submitted";
        }
    }
    else{
        echo "all fields required";
    }
}
?>
