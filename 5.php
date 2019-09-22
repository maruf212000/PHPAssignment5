<html>
<head>
    <title>The World of Fruit</title>
    <style>
    table tr td.l
    {
        text-align:right;
    }
    table tr,td
    {
        padding:5px;
    }
    </style>
<body>
    <h1>Sign Up</h1>
    <p>Its free and Always will be</p>
    <form action="5.php" method="POST">
    <table>
        <tr>
            <td class="l"> First Name:</td>
            <td class="r"><input type="text" name="fname" required/></td>
        </tr>
        <tr>
            <td class="l">Last Name:</td>    
            <td class="r"><input type="text" name="lname" required/></td>
        </tr>
        <tr>
            <td class="l">Your Email:</td>    
            <td class="r"><input type="text" name="email" required/></td>
        </tr>
        <tr>
            <td class="l">Re-enter Email:</td>    
            <td class="r"><input type="text" name="remail" required/></td>
        </tr>
        <tr>
            <td class="l">New Password</td>
            <td class="r"><input type="password" name="password" required/></td>
        </tr>
        <tr>
            <td class="l">I am:</td>
            <td class="r">
                <select name="gender">
                    <option value="male">Male</option>
                    <option value="Female">Female</option>
                </select>    
            </td>
        <tr>
            <td class="l">Birthday</td>
            <td class="r"><input type="date" name="date" required/></td>
        </tr>
        <tr>
            <td class="l"></td>    
            <td class="r"><input type="submit" name="submit" value="Submit"/></td>
        </tr> 
    </table>
    </form>
    <?php
        $servername ="localhost";
        $username = "root";
    
        $con = mysqli_connect($servername,$username,"","test");
        if(!$con)
            die("Connection Error:- " + mysqli_connect_error());

        if(isset($_POST["submit"]))
        {
            $date = $_POST["date"];
            echo $date;
            $mysql = "INSERT INTO sign_up(Date) VALUES('$date');";
            $con->query($mysql);
        }
    ?>
</body>
</html>