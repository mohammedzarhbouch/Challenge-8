<?php
    include('DBcon.php');
    if (isset($_POST['submit'])) {
        $username = $_POST['email'];
        $password = $_POST['pass'];

        $sql = "select * from users where email = '$username' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1){
            header("Location: welcome.php");
        }
        else{
            echo  '<script>
                        window.location.href = "index.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }
    }
    ?>