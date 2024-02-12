<?php
include_once "./backendLayouts/header.php";
include "../database/env.php";
$query = "SELECT * FROM banners";
$res = mysqli_query($db_connect,$query);
$fetch_data = mysqli_fetch_all($res,1);

    // echo "<pre>";
    // print_r($fetch_data);
    // echo "</pre>";
?> 

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 card">
                    <div class="caed-header">
                        <h5>All Banner Lists</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover table-striped">
                            <tr>
                                <td>#</td>
                                <td>Heading</td>
                                <td>Featured imgage</td>
                                <td>Details</td>
                                <td>Btn title</td>
                                <td>Btn url</td>
                                <td>Video url</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>

                            <?php
                            foreach($fetch_data as $key=> $data){
                            ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?= $data['heading'] ?></td>
                                <td>
                                    <img width="100" src="../controller/banners/uploads/<?= $data['featured_img'] ?>" alt="">
                                </td>
                                <td><?= $data['details'] ?></td>
                                <td><?= $data['button_title'] ?></td>
                                <td><?= $data['button_url'] ?></td>
                                <td><?= $data['video_url'] ?></td>
                                <td>
                                <!-- <a href=""><i class="fa-regular fa-star"></i></a> -->
                                <a href="../controller/banners/status.php?status-id=<?= $data['id'] ?>"><i class="<?= $data['status'] == 1 ? 'fa-solid' : 'fa-regular'?> fa-star"></i></a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </td>
                                
                            </tr>

                            <?php
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>




</div>
<?php
include_once "./backendLayouts/footer.php";
?>