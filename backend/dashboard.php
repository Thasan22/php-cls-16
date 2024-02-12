<?php
include_once "./backendLayouts/header.php"
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Welcome <?= ucwords($_SESSION['auth']['fname']) ?? '' ?></h1>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php
include_once "./backendLayouts/footer.php"
?>