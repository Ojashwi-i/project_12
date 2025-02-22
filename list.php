<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="list.css">
    <title>To-do list</title>
</head>

<body style="background-color: #97c9b9;">
    <div class="main">
        <div class="row mb-0 mx-0 mt-5 p-0">
            <div class="col-3 m-0 profile_container">
                <div class="profile">
                    <h3>First_last name</h3><br>
                    <h6 class="main_name">@username</h6>
                    <div class="info">
                        <div class="d-flex">
                            <h6>Email: </h6>
                        </div>
                    </div>
                    <div class="btns">
                        <button class="btn1">Edit profile</button> <br>
                        <button class="btn2">Change Password</button>
                    </div>
                </div>
            </div>
            <div class="col-9 m-0 sections_container">
                <ul class="nav">
                    <h1>To-do List</h1>
                </ul>

                <button class="add" data-bs-toggle="modal" data-bs-target="#mymodal">Add</button>

                <div style="margin-top: 150px;" class="modal fade" id="mymodal">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h4 class="modal-title">Create a To-do list</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                          <form class="content" method="post">
                          <div class="row m-0 p-0">

                            <div class="col-12 mb-2 in_content">
                              <textarea type="text" name="title" id="title" placeholder="I want to..." class="form-control title"></textarea>
                            </div>

                          </div>
                          </form>
                      </div>

                      <div class="modal-footer mx-4">
                         <button type="submit" class="save" name="save">Save</button>
                     </div>

                    </div>
                  </div>
                </div>

                <div class="quote">
                <h6>Don't want to forget anything?</h6>
                <h1 style="margin: 0px 0px 60px;">Create a To-Do List !</h1>
                </div>

            </div>
        </div>
    </div>
</body>

</html>