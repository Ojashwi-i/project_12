<?php include 'connection.php' ?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["fname"])) {
                $vfname = "first name required";
            }else{
                $fname = $_POST['fname'];
            }
            if (empty($_POST["lname"])) {
                $vlname = "last name required";
            }else{
                $lname = $_POST['lname'];
            }
            if (empty($_POST["uname"])) {
                $vuname = "username required";
            }else{
                $uname = $_POST['uname'];
            }
            if (empty($_POST["email"])) {
                $vemail = "email required";
            }else{
                $email = $_POST['email'];
            }
            if (empty($_POST["password"])) {
                $vpassword = "password required";
            }else{
                $password = $_POST['password'];
            }
    
            if (isset($_POST["send"]) && (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["uname"]) || empty($_POST["email"]) || empty($_POST["password"]))) {
            } else {
                $sql = "INSERT INTO `login` (`fname`, `lname`, `uname` , `email` , `password` ) VALUES ('$fname','$lname','$uname','$email','$password')";
                $query = $conn->query($sql);
                $sql = "SELECT * FROM `login`";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { 
                        if($row['uname'] == $uname){
                            $id = $row['login_id'];
                            // echo $id;
                        }  
                    }
                }
                if ($query) {
                    header('location:list.php?id='.urlencode($id));
                } 
            }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do list</title>
    <link rel="stylesheet" href="create_acc.css">
</head>

<body>
        <div class="rectangle1">
                <div style="position: absolute; margin: 0px 30px">
                    <h1>Create an Account</h1>
                    <h5 style="margin-bottom: 30px;">Already have an account? <a href="sign_in.php">Sign In</a></h5>
                    <form method="post">
                        <div style="display: flex;">
                            <div>
                                <label for="fname">First Name</label> <br>
                                <span><?php echo $vfname; ?></span>
                                <input name="fname" class="input1" type="text"> <br>
                            </div>
                            <div style="margin-left:27px;">
                                <label for="lname">Last Name</label> <br>
                                <span><?php echo $vlname; ?></span>
                                <input name="lname" class="input1" type="text"> <br>
                            </div>
                        </div>
                        <label for="uname">Username</label> <br>
                        <span><?php echo $vuname; ?></span>
                        <input name="uname" class="input2" type="text"> <br>
                        <label for="email">Email Address</label> <br>
                        <span><?php echo $vemail; ?></span>
                        <input name="email" class="input2" type="text"> <br>
                        <label for="password">Password</label> <br>
                        <span><?php echo $vpassword; ?></span>
                        <input name="password" class="input2" type="password"> <br>
                        <button name="send" class="button1">Send</button>
                    </form>
                </div>
        </div>

</body>

</html>