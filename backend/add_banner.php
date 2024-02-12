<?php
include_once "./backendLayouts/header.php"
?>                 
                           <section>
                            <div class="container">
                            <div class="wrapper">
                                <div class="row">
                                    <div class="col-lg-10 mx-auto">
                                <div class="card">
                                    <div class="card-header">Banner Info</div>
                                    <div class="card-body">

                                    <form enctype="multipart/form-data" action="../controller/banners/store.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="d-block" for="banner_input">
                                                    <img style="max-width: 100%;" class="featured_img" src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" alt="">
                                                </label>
                                                    <input accept=".png,.jpg,.jpeg" name="featured_img" class="d-none" type="file" id="banner_input">
                                                <span class="text-danger">
                                                    <?= $_SESSION['errors']['profile_img'] ?? '' ?>
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control my-2" name="heading" placeholder="Enter Banner Title">
                                                <span class="text-danger">
                                                    <?= $_SESSION['errors']['heading'] ?? '' ?>
                                                </span>
                                                <textarea name="details" class="form-control my-2" placeholder="Enter Banner Details"></textarea>
                                                <span class="text-danger">
                                                    <?= $_SESSION['errors']['details'] ?? '' ?>
                                                </span>
                                                <input type="text" class="form-control my-2" name="btn_title" placeholder="Enter Banner Button Title">
                                                <span class="text-danger">
                                                    <?= $_SESSION['errors']['btn_title'] ?? '' ?>
                                                </span>
                                                <input type="text" class="form-control my-2" name="btn_url" placeholder="Enter Banner Button Link">
                                                <span class="text-danger">
                                                    <?= $_SESSION['errors']['btn_url'] ?? '' ?>
                                                </span>
                                                <input type="text" class="form-control my-2" name="video_url" placeholder="Enter Banner Video Link">
                                                <span class="text-danger">
                                                    <?= $_SESSION['errors']['video_url'] ?? '' ?>
                                                </span><br>
                                                <button name="store_btn" type="submit" class="btn btn-primary">Submit</button>
                                                <span class="text-success">
                                                    <b><?=isset($_SESSION['msg']) ? $_SESSION['msg'] : ""?></b>
                                                </span>
                                            </div>
                                        </div>
                                    </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                           </section>
                           
            </div>

<?php
include_once "./backendLayouts/footer.php"
?>


<script>
  let profileInput = document.querySelector("#banner_input")
  let profileImg = document.querySelector(".featured_img")
    function imageUpdate(event){
      let url = URL.createObjectURL(event.target.files[0])
      profileImg.src = url;
    }
  profileInput.addEventListener("change",imageUpdate)
</script>

<?php
unset($_SESSION['errors'],$_SESSION['msg']);
?>