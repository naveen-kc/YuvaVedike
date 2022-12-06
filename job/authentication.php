<?php      
    include('connection.php');  
    $mobile = $_POST['mobile'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $mobile = stripcslashes($mobile);  
        $password = stripcslashes($password);  
        $mobile = mysqli_real_escape_string($con, $mobile);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from user_details where mobile = '$mobile' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header("Location: adminHome.php");
           // echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid mobile or password.</h1>";  
        }     
?>  
