<?php
include_once "./backendLayouts/header.php";
include_once "../database/env.php";

$query = "SELECT * FROM categories";
$res = mysqli_query($db_connect,$query);
$categories = mysqli_fetch_all($res,1);

$edited_id = $_REQUEST['edited_id'] ?? null;
if($edited_id){
    $query = "SELECT * FROM categories WHERE id= '$edited_id'";
    $res = mysqli_query($db_connect,$query);
    $edited_category = mysqli_fetch_assoc($res);
}
?>


<main>
    <div class="container">
        <div class="row">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header"><?= $edited_id ? "Edit":"Add" ?> Category</div>
                <div class="card-body">
                    <form action="../controller/<?= $edited_id ? "category_update":"category_store" ?>.php" method="POST">
                        <input type="hidden" name="id" value="<?= $edited_category['id'] ?? '' ?>">
                        <input value="<?= $edited_category['category_title'] ?? '' ?>" name="category_title" type="text" class="form-control" placeholder="Enter category name">
                            <span class="text-danger">
                                <?= $_SESSION['errors']['category_title'] ?? '' ?>
                            </span>
                        <button class="btn btn-primary btn-sm my-2"><?= $edited_id ? "Update":"Submit" ?></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow">
                    <div class="card-header">All Categories</div>
                    <div class="card-body">
                       <div class="table-responsive">
                        <table class="table text-center">
                            <tr>
                                <th>#</th>
                                <th>Category Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            <?php
                            foreach($categories as $key=>$category){
                            ?>
                                <tr>
                                    <td><?=++$key?></td>
                                    <td><?=ucwords($category['category_title'])?></td>
                                    <td>
                                        <a href="../controller/category_status.php?id=<?=$category['id']?>&status=<?=$category['status']?>" class="text-warning">
                                            <i class="fa-<?= $category['status'] == 1 ? 'solid' : 'regular' ?> fa-star"></i>
                                        </a> 
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="./categories.php?edited_id=<?=$category['id']?>" class="btn btn-sm btn-info">Edit</a>
                                            <a href="../controller/category_delete.php?id=<?=$category['id']?>" class="delete_btn btn btn-sm btn-danger">Delete</a>
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
        </div>
    </div>
</main>








</div>
            <!-- End of Main Content -->

<?php
include_once "./backendLayouts/footer.php";
unset($_SESSION['errors']);
?>

<script>
    $(function(){
        $('.delete_btn').click(function(event){
            event.preventDefault()
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.href = $(this).attr('href')
                }
            })
        })
    })
</script>