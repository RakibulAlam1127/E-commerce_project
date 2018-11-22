<?php include_once __DIR__.'/../../partials/desh_header.php';  ?>


    <div id="wrapper">
    <!-- Sidebar -->
<?php include_once __DIR__.'/../../partials/desh_side_navbar.php';  ?>

<?php $category_title = \App\Model\Category::all(); ?>


    <div id="content-wrapper">
    <div class="container-fluid">

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                  Add Products
            </div>
            <?php include_once __DIR__.'/../../partials/_notification.php';  ?>
            <div class="card-body">
                <form action="product" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <select name="title_id" class="form-control">
                            <?php foreach ($category_title as $category): ?>
                            <option value="<?php echo $category->title; ?>"><?php echo $category->title; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Enter Slug" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description"  class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Enter Price" required>
                    </div>
                    <div class="form-group">
                        <label for="seles_price">Sales Price</label>
                        <input type="text" name="seles_price" class="form-control" placeholder="Enter Sells Price" required>
                    </div>

                   <div class="form-group">
                       <label for="status">Status</label>
                       <select name="active" class="form-control">
                           <option value="1">Active</option>
                           <option value="0">Inactive</option>
                       </select>
                   </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Add Product</button>
                    </div>

                </form>
            </div>
            <div class="card-footer small text-muted">Current Date <?php echo date('Y-m-d'); ?></div>
        </div>

    </div>
    <!-- /.container-fluid -->

<?php include_once __DIR__.'/../../partials/desh_footer.php';  ?>