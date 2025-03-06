<?php include 'connection.php' ?>

<?php
    $showalert=FALSE;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        if (isset($_POST["send"]) && (empty($_POST["email"]) || empty($_POST["password"]) )) {
        } else {
            $sql = "SELECT * FROM `login`";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { 
                                    if($email === $row['email'] && $password === $row['password']){
                                        $id = $row['login_id'];
                                        if ($result) {
                                            header('location:user.php?id='.urlencode($id));
                                        } 
                                    }else{
                                        $showalert=TRUE;
                                    }
                                }
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
    <link rel="stylesheet" href="sign_in.css">
    <title>To-do list</title>
</head>

<body>
        <div style="display:none;" id="alert" class="alert">
          This is a danger alert—check it out!
        </div>
        <div class="rectangle1">
                <div style="position: absolute; margin: 0px 30px">
                    <h1>Sign In</h1>
                    <h5 style="margin-bottom: 30px;">Don't have an account? <a href="create_acc.php">Create One</a></h5>
                    <form method="post">
                        <label for="email">Email Address</label> <br>
                        <input name="email" type="text"> <br>
                        <span><?php echo $vemail."<br>"; ?></span>
                        <label for="password">Password</label> <br>
                        <input name="password" type="password">
                        <span><?php echo $vpassword; ?></span> <br>
                        <button name="send" class="button1">Send</button>
                    </form>
                </div>
        </div>
</body>

<script type="text/javascript">
    <?php 
        if($showalert===TRUE){?>

            var alert = document.getElementById("alert");
            alert.style.display = "block";

        <?php
        }
    ?>
</script>

</html>