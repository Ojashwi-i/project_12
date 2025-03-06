<?php include 'connection.php' ?>

<?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            //echo $id;
        }

        if (isset($_POST['save'])) { 
            $list = $_POST['list'];
            $sql = "INSERT INTO `list` (`list`,`login_id`) VALUES ('$list','$id')";
            $query = $conn->query($sql);
            if ($query) {
                header('location:user.php?id='.urlencode($id));
            } 
        }
                                                
        if (isset($_POST['edit'])) { 
            $list_id = $_POST['list_id'];
            $ulist = $_POST['ulist'];
            $sql = "UPDATE `list` SET `list`='$ulist' WHERE id=$list_id";
            $query = $conn->query($sql);
        }

        if (isset($_POST["delete"])) {
            $list_id = $_POST["list_id"];
            $sql = "DELETE FROM `list` WHERE id=$list_id";
            $query= $conn->query($sql);
        }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/03afbd77fe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="user.css">
    <title>To-do list</title>
</head>

<body style="background-color: #97c9b9;">
    <div class="main">
        <div class="row mb-0 mx-0 mt-5 p-0">
            <div class="col-3 m-0 profile_container">
                <div class="profile">
                    <!-- For showing user data -->
                        <?php    
                        $sql = "SELECT * FROM `login` WHERE login_id=$id";
                            $result = $conn->query($sql);
                            // echo "<pre>";
                            // print_r($result);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <h3><?php echo $row['fname']." ".$row['lname'] ?></h3><br>
                                    <h6 class="main_name">@<?php echo $row['uname'] ?></h6>
                                    <div class="info">
                                        <div class="d-flex">
                                            <h6>Email: <?php echo $row['email'] ?></h6>
                                        </div>
                                    </div>
                        <?php
                                }
                            } 
                    
                        ?>

                    <div class="btns">
                        <button class="btn1">Edit profile</button> <br>
                        <button class="btn1">Change Password</button> <br>
                        <button name="log_out" onclick="log_out();" class="btn1">Log Out</button>
                    </div>
                </div>
            </div>
            <div class="col-9 m-0 sections_container">

                <ul class="nav">
                    <h1>To-do List</h1>
                </ul>

                <!-- For adding list data -->
                <button class="add" data-bs-toggle="modal" data-bs-target="#mymodal">Add</button>

                <div style="margin-top: 150px;" class="modal fade" id="mymodal">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h4 class="modal-title">Create a To-do list</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                      </div>
                      <div class="modal-body">
                          <form class="content" method="post">
                          <div class="row m-0 p-0">

                            <div class="col-12 mb-2 in_content">
                              <textarea type="text" name="list" placeholder="I want to..." class="form-control title"></textarea>
                            </div>

                          </div>
                        </div>
                        
                        <div class="modal-footer mx-4">
                            <button class="save" name="save">Save</button>
                        </div>
                           </form>

                    </div>
                  </div>
                </div>

                <div class="list-group">
                    <!-- For showing the list created by user -->
                    <?php
                    
                        $sql = "SELECT * FROM `list` WHERE login_id=$id";
                        $result = $conn->query($sql);
                        // echo "<pre>";
                        // print_r($result);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div class="list">
                                    <button onclick="change_css(this);" class="tick" id="tick"><i class="fa-solid fa-xmark"></i></button>
                                    <p style="display:inline;">
                                        <?php 
                                            $list_id=$row['id'];
                                            echo $row['list']; 
                                        ?>
                                    </p>
                                    <!-- For updating the list data -->
                                    <button class="edit" data-bs-toggle="modal" data-bs-target="#createmodal-<?php echo $list_id; ?>"><i class="fa-solid fa-pen-to-square"></i></button>

                                    <div style="margin-top: 150px;" class="modal fade" id="createmodal-<?php echo $list_id; ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Your list</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                                        </div>
                                
                                        <div class="modal-body">
                                            <form class="content" method="post">
                                            <div class="row m-0 p-0">
                                                <div class="col-12 mb-2 in_content">
                                                <textarea type="text" name="ulist" class="form-control title"><?php echo $row['list']?></textarea>
                                                <input type="hidden" name="list_id" value="<?php echo $list_id ?>">
                                                </div>

                                            </div> 
                                        </div>
                                        
                                        <div class="modal-footer mx-4">
                                            <button class="save" name="edit">Save</button>
                                        </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                    </div>

                                    <!-- For deleting list data -->
                                     <form style="display:inline;" method="post">
                                        <input type="hidden" name="list_id" value="<?php echo $list_id; ?>">
                                        <button name="delete" class="trash"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                        <?php
                        }
                        } else {
                            header('location:list.php?id='.urlencode($id));
                            ?>
                            <?php
                        }
                    ?>

                 </div>

        </div>
    </div>
</body>

<script type="text/javascript">
    function log_out(){
        window.location.href = 'sign_in.php';
    }

    function change_css(button){

        if (button.innerHTML === '<i class="fa-solid fa-xmark"></i>') {
            button.innerHTML = '<i class="fa-solid fa-check"></i>';
        } else {
            button.innerHTML = '<i class="fa-solid fa-xmark"></i>';
        }

        button.classList.toggle('checked');

        if (button.classList.contains('checked')) {
            button.innerHTML = '<i class="fa-solid fa-check"></i>';
        } else {
            button.innerHTML = '<i class="fa-solid fa-xmark"></i>';
        }

    }
</script>

</html>