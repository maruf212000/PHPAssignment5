<html>
<body>
<?php
    $err1 = $err2 = $err3 = "";
    $servername="localhost";
    $username = "root";
    $db = "test";

    $con = mysqli_connect($servername,$username,"",$db);
    if(!$con)
        die("Connection error:- " . mysqli_connect_error());

    if(isset($_POST["submit"]))
    {   
        #validation
        if(empty($_POST["name"]))
            $err1 = "This field is required";
        if(empty($_POST["email"]))
            $err2 = "This field is required";
        if(!empty($_POST["email"]) && !preg_match("/[a-z0-9]+@[a-z0-9]+\.[a-z]{2,3}/",$_POST["email"]))
            $err2 = "Invalid Format";
        #database entry    
        if(!empty($_POST["email"]) && !empty($_POST["name"])&& preg_match("/[a-z0-9]+@[a-z0-9]+\.[a-z]{2,3}/",$_POST["email"]))
        {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $date = date("Y-m-d");
            $mysql = "SELECT Name FROM Registration WHERE Name like '$name';";
            $check = $con->query($mysql);
            $crow=mysqli_fetch_row($check);
            #echo $crow[0];
            #echo $name;
            if($crow[0] == $name)
            {
                $err3 = "Already Registered";
            }
            else
            {
                $mysql = "INSERT INTO Registration(Name,Email,Date) VALUES('$name','$email','$date');";
                $result = mysqli_query($con,$mysql);
                if(!mysqli_error($con))
                {
                    $err3 = "Registered Successfully";
                }
                else{
                    $err3 = mysqli_error($con);
                }
            }
        }
    }
?>
<h1>Register</h1>
    <form action="3.php" method="POST">
        Name:- <input type="text" name="name"/><?php echo $err1 ?><br>
        Email:- <input type="text" name="email"/><?php echo $err2 ?><br>
        <input type="submit" name="submit" value="Register"/><br>
        <?php echo $err3 ?>
    </form>    
</body>
</html>