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
                Views Products
            </div>
            <?php include_once __DIR__.'/../../partials/_notification.php';  ?>
            <div class="card-body">
                <?php $products = \App\Model\Product::all(); ?>
                <?php if ($products->count() > 0): ?>
                <table id="dataTable" class="table">
                    <thead>
                           <th>#</th>
                           <th>Title Id</th>
                           <th>Slug</th>
                           <th>Price</th>
                           <th>Sales Price</th>
                           <th>Active</th>
                           <th>Action</th>
                    </thead>

                    <tbody>
                         <?php $i = 1; foreach ($products as $product ): ?>
                          <tr>
                               <td><?php echo $i; ?></td>
                              <td><?php echo $product->title; ?></td>
                              <td><?php echo $product->slug; ?></td>
                              <td><?php echo $product->price; ?></td>
                              <td><?php echo $product->seles_price; ?></td>
                              <td><?php echo ($product->active === 1)?'Active':'Inactive'; ?></td>
                              <td>
                                  <a href="<?php echo BASE_URL; ?>dashboard/product/edit/<?php echo $product->id; ?>" class="btn btn-sm btn-info">Edit</a>
                                  <a href="<?php echo BASE_URL; ?>dashboard/product/delete/<?php echo $product->id; ?>" onclick="return confirm('Are You Sure to Remove this  Product?'); "  class="btn btn-sm btn-danger" >Delete</a>
                              </td>
                           </tr>
                           <?php $i++; endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <div class="alert alert-info">
                  No Product Add yet.
                </div>
                <?php endif; ?>
            </div>
            <div class="card-footer small text-muted">Current Date <?php echo date('Y-m-d'); ?></div>
        </div>

    </div>
    <!-- /.container-fluid -->

<?php include_once __DIR__.'/../../partials/desh_footer.php';  ?>