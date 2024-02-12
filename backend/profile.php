<?php
include_once "./backendLayouts/header.php"
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Profile Page</h1>

                    <div class="wrapper mt-5">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-header">Profile Info</div>
                                    <div class="card-body">

                                    <form enctype="multipart/form-data" action="../controller/profile_update.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="d-block" for="profile_input">
                                                    <img style="max-width: 100%;" class="profile_img" src="<?= get_profile() ?>" alt="">
                                                </label>
                                                    <input name="profile_img" class="d-none" type="file" id="profile_input">
                                                <span class="text-danger">
                                                    <?= $_SESSION['errors']['profile_img'] ?? '' ?>
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <input name="fname" value="<?= $_SESSION['auth']['fname'] ?? '' ?>" placeholder="First Name" type="text" class="form-control my-3">
                                                <span class="text-danger">
                                                    <?= $_SESSION['errors']['fname'] ?? '' ?>
                                                </span>
                                                <input name="lname" value="<?= $_SESSION['auth']['lname'] ?? '' ?>" placeholder="Last Name" type="text" class="form-control my-3">
                            
                                                <input name="email" value="<?= $_SESSION['auth']['email'] ?? '' ?>" placeholder="Email" type="text" class="form-control my-3">
                                                <span class="text-danger">
                                                    <?= $_SESSION['errors']['email'] ?? '' ?>
                                                </span><br>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-header">Password Update</div>
                                    <div class="card-body">
                                        <form action="../controller/password_update.php" method="POST">
                                            <input name="old_pass" placeholder="Old Password" type="text" class="form-control my-3">
                                            <span class="text-danger">
                                                    <?= $_SESSION['errors']['old_pass'] ?? '' ?>
                                            </span>
                                            <input name="new_pass" placeholder="New Password" type="text" class="form-control my-3">
                                            <span class="text-danger">
                                                    <?= $_SESSION['errors']['new_pass'] ?? '' ?>
                                            </span>
                                            <input name="confirm_pass" placeholder="Confirm Password" type="text" class="form-control my-3">
                                            <span class="text-danger">
                                                    <?= $_SESSION['errors']['confirm_pass'] ?? '' ?>
                                            </span>
                                            <button type="submit" class="btn btn-primary">Update Password</button><br>
                                            <span class="text-success">
                                                <b><?=isset($_SESSION['pass']) ? $_SESSION['pass'] : ""?></b>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include_once "./backendLayouts/footer.php"
?>

<script>
  let profileInput = document.querySelector("#profile_input")
  let profileImg = document.querySelector(".profile_img")
    function imageUpdate(event){
      let url = URL.createObjectURL(event.target.files[0])
      profileImg.src = url;
    }
  profileInput.addEventListener("change",imageUpdate)
</script>

<?php
unset($_SESSION['errors'],$_SESSION['pass']);
?>