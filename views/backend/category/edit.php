
<?php include_once __DIR__.'/../../partials/desh_header.php';  ?>


    <div id="wrapper">
    <!-- Sidebar -->
<?php include_once __DIR__.'/../../partials/desh_side_navbar.php';  ?>



    <div id="content-wrapper">
    <div class="container-fluid">



        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Edit Categories </div>
            <?php include_once __DIR__.'/../../partials/_notification.php';  ?>

           <?php  if (isset($_SESSION['category_id']))
           $category = \App\Model\Category::find($_SESSION['category_id']);?>

            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="title">Enter Title</label>
                        <input type="text" name="title"  class="form-control" value="<?php echo $category->title; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control"  value="<?php echo $category->slug; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select  name="active" class="form-control" required>
                            <option value="1" <?php if($category->active == 1) echo 'selected'; ?>>Active</option>
                            <option value="0" <?php if($category->active == 0) echo 'selected'; ?>>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Edit Category</button>
                    </div>
                </form>



            </div>
            <div class="card-footer small text-muted">Updated at <?php echo date('Y-m-d'); ?></div>
        </div>

    </div>
    <!-- /.container-fluid -->

<?php include_once __DIR__.'/../../partials/desh_footer.php';  ?>