<?php include_once __DIR__.'/../../partials/desh_header.php';  ?>


<div id="wrapper">
    <!-- Sidebar -->
    <?php include_once __DIR__.'/../../partials/desh_side_navbar.php';  ?>
    <div id="content-wrapper">
        <div class="container-fluid">

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Edit Product
                </div>
                <?php include_once __DIR__.'/../../partials/_notification.php';  ?>
                <?php if (isset($_SESSION['product_id'])) $product_detail = \App\Model\Product::find($_SESSION['product_id']);?>
                <?php $all_product = \App\Model\Category::all(); ?>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <select name="title_name" class="form-control">
                                  <?php foreach ($all_product as $product): ?>
                                      <option value="<?php echo $product->title; ?>" <?php if ($product_detail->title === $product->title) echo 'selected'; ?>><?php echo $product->title; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control" value="<?php echo $product_detail->slug; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description"  class="form-control"> <?php echo $product_detail->description; ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $product_detail->price; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="seles_price">Sales Price</label>
                            <input type="text" name="seles_price" class="form-control" value="<?php echo $product_detail->seles_price; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="active" class="form-control">
                                <option <?php if ($product_detail->active === 1) echo 'selected'; ?> value="1">Active</option>
                                <option <?php if ($product_detail->active === 0) echo 'selected'; ?> value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">Edit Product</button>
                        </div>

                    </form>
                </div>
                <div class="card-footer small text-muted">Current Date <?php echo date('Y-m-d'); ?></div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <?php include_once __DIR__.'/../../partials/desh_footer.php';  ?>
