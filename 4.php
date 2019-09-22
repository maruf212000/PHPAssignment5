<html>
<head>
    <title>The World of Fruit</title>
    <style>
    body
    {
        background-color: yellow;
        align-content:center;
    }
    h2
    {
        background-color: green;
        width:100%;
        text-align:center;
    }
    p
    {
        text-align:center;
    }
    table
    {
        padding-left:250px;
    }
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
    <h2>The World of Fruit</h2>
    <p>Fruit Servey</p>
    <form action="4.php" method="POST">
    <table>
        <tr>
            <td class="l">Name</td>
            <td class="r"><input type="text" name="name" required/></td>
        </tr>
        <tr>
            <td class="l">Address</td>    
            <td class="r"><input type="text" name="add" required/></td>
        </tr>
        <tr>
            <td class="l">Email</td>    
            <td class="r"><input type="text" name="email" required/></td>
        </tr>
        <tr>
            <td class="l">how many pieces  of fruit do you eat per day?</td>
            <td class="r">
                <input type="radio" name="fr" value="0" required/>0<br>
                <input type="radio" name="fr" value="1"/>1<br>
                <input type="radio" name="fr" value="2"/>2<br>
                <input type="radio" name="fr" value="more than 2"/>more than 2<br>
            </td>
        </tr>
        <tr>
            <td class="l">My favourite Fruit</td>
            <td class="r">
                <select name="myfav" size="4" required>
                    <option value="Apple">Apple</option>
                    <option value="Banana">Banana</option>
                    <option value="Mango">Mango</option>
                    <option value="Pomogranate">Pomogranate</option>
                    <option value="Orange">Orange</option>
                    <option value="Watermelon">WaterMelon</option>
                    <option value="Plum">Plum</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="l">Would you like a brochure?</td>    
            <td class="r"><input type="checkbox" name="brochure" value="Yes"/></td>
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

    $con = mysqli_connect($servername,$username,"");
    if(!$con)
        die("Connection Error:- " + mysqli_connect_error());

    $mysql = "CREATE DATABASE FruitWorld;";
    $con->query($mysql);
    $db = "FruitWorld";
    mysqli_select_db($con,$db);
    echo mysqli_error($con);
    $mysql = "CREATE TABLE Survey
                (
                    Name varchar(10),
                    Address varchar(20),
                    Email varchar(15),
                    fruitperday varchar(10),
                    myfav varchar(10),
                    brochure varchar(10)
                );";
    $con -> query($mysql);
    if(isset($_POST["submit"]))
    {
        $name = $_POST["name"];
        $address = $_POST["add"];
        $email = $_POST["email"];
        $fruitperday = $_POST["fr"];
        $myfav = $_POST["myfav"];
        if(isset($_POST["brochure"]))
            $brochure = $_POST["brochure"];
        else
            $brochure = "No";    

        $mysql = "INSERT INTO survey(Name,Address,Email,fruitperday,myfav,brochure) VALUES('$name','$address','$email','$fruitperday','$myfav','$brochure');";
        $con->query($mysql);
        if(!mysqli_error($con))
        {
            echo "Submitted Successfully";
        }
    }
?>                
</body>
</html>