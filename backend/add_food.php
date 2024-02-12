<?php
include_once "./backendLayouts/header.php";
include_once "../database/env.php";

$query = "SELECT * FROM categories WHERE status=true";
$res = mysqli_query($db_connect,$query);
$categories = mysqli_fetch_all($res,1);



?>                 
                           <section>
                            <div class="container">
                            <div class="wrapper">
                                <div class="row">
                                    <div class="col-lg-10 mx-auto">
                                <div class="card">
                                    <div class="card-header">Food Info</div>
                                    <div class="card-body">

                                    <form enctype="multipart/form-data" action="../controller/food_store.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="d-block" for="banner_input">
                                                    <img style="max-width: 100%;" class="featured_img" src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" alt="">
                                                </label>
                                                    <input name="food_img" class="d-none" type="file" id="banner_input">
                                                <span class="text-danger">
                                                    <?= $_SESSION['errors']['food_img'] ?? '' ?>
                                                </span>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control my-2" name="title" placeholder="Enter Food Title">
                                                <span class="text-danger">
                                                    <?= $_SESSION['errors']['title'] ?? '' ?>
                                                </span>
                                                <textarea name="detail" class="form-control my-2" placeholder="Enter Food Detail"></textarea>
                                                <span class="text-danger">
                                                    <?= $_SESSION['errors']['detail'] ?? '' ?>
                                                </span>
                                                <input type="text" class="form-control my-2" name="price" placeholder="Enter Food Price">
                                                <span class="text-danger">
                                                    <?= $_SESSION['errors']['price'] ?? '' ?>
                                                </span>
                                                <select name="cetegory" class="form-control my-2">
                                                    <option disabled selected>Select a category</option>
                                                    <?php
                                                    foreach($categories as $category){
                                                        ?>
                                                        <option value="<?= $category['category_title'] ?>"><?= ucwords($category['category_title']) ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <br>
                                                <button type="submit" class="btn btn-primary">Submit</button>
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