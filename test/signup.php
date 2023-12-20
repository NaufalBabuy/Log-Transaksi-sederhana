<?php 
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$database = "interview_test";

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = mysqli_real_escape_string($connection, $_POST['email']);
    $raw_password = $_POST['password']; 

    if (!empty($user_name) && !empty($raw_password) && !is_numeric($user_name)) {
        $hashed_password = md5($raw_password);

        $query = "SELECT MAX(userid) AS last_userid FROM test_user";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $last_userid = $row['last_userid'];
            $userid = $last_userid + 1; 

            $query = "INSERT INTO test_user (userid, email, password) VALUES ('$userid', '$user_name', '$hashed_password')";
            mysqli_query($connection, $query);

            header("Location: login.php");
            die;
        } else {
            echo "Error fetching last userid from the database.";
        }
    } else {
        echo "Please enter some valid information!";
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
</head>

<style type="text/css">

    #text {
        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    }

    #button {
        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
    }

    #box {
        background-color: #c4c4c4;
        margin: auto;
        width: 300px;
        padding: 20px;
    }

    .custom-table {
        display: table;
        width: 100%;
        height: 100px;
        border-collapse: collapse;
        margin: auto; 
        border: 0px solid #5d5d5d; 
    }

    .custom-table-row {
        display: table-row;
    }

    .custom-table-cell {
        display: table-cell;
        width: 100%;
        padding: 0px;
        border: 0px solid white;
    }

    body {
        background-color: grey;
        background-size: cover; 
        background-repeat: no-repeat; 
        height: 100vh; 
        margin: 0; 
        display: flex;
        align-items: center;
        justify-content: center;
        color: white; 
    }

    .texture {
        text-align: center;
    }
</style>

<body>
    <div class="texture">
        <!-- Table using div -->
        <div class="custom-table">
            <div class="custom-table-row">
                <div class="custom-table-cell" style="width:25%"></div>

                <div class="custom-table-cell" style="width: 50%;background-color: #c4c4c4; ">
                    <div id="box">

                        <form method="post">
                            <div style="font-size: 20px; margin: 5px; margin-bottom: 0px; color: black;">Sign Up</div>
                           
                            <input id="text" type="text" name="email"><br><br>
                            <input id="text" type="password" name="password"><br><br>

                            <div class="custom-table" style="width: 100%">
                                <div class="custom-table-row" >
                                    <div class="custom-table-cell" style="font-size: 11px; width:5%"> </div>
                                    <div class="custom-table-cell" style="font-size: 11px; width:5%">                         
                                        <input id="button" type="submit" value="Signup"><br><br><br>
                                        

                                    </div>
                                    <div class="custom-table-cell" style="font-size: 11px; width:5%"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="custom-table-cell" style="width:25%"></div>
            </div>
        </div>
    </div>
</body>

</html>