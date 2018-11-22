<?php include_once __DIR__.'/../../partials/desh_header.php';  ?>


 <div id="wrapper">
    <!-- Sidebar -->
<?php include_once __DIR__.'/../../partials/desh_side_navbar.php';  ?>



    <div id="content-wrapper">
    <div class="container-fluid">



        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Add Categories </div>
            <?php include_once __DIR__.'/../../partials/_notification.php';  ?>
            <div class="card-body">
                <form action="category" method="post">
                    <div class="form-group">
                        <label for="title">Enter Title</label>
                        <input type="text" name="title" required class="form-control" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" required placeholder="Enter Slug">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select required name="active" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Add Category</button>
                    </div>
                </form>
                <div class="well">
                     <?php $categories = \App\Model\Category::all(); ?>
                    <?php if ($categories->count() > 0):?>
                     <h2 class="text-center">Category List</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                               <th>Id</th>
                                 <th>Title</th>
                                  <th>Slug</th>
                                  <th>Status</th>
                                    <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                  foreach ($categories as $category):
                                ?>
                                <tr>
                                    <td><?php echo $category->id; ?></td>
                                    <td><?php echo $category->title; ?></td>
                                    <td><?php echo $category->slug; ?></td>
                                     <td><?php echo $category->active === 1 ? 'Active' : 'Inactive' ?></td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="<?php echo BASE_URL; ?>dashboard/category/edit/<?php echo $category->id; ?>">Edit</a>
                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure to remove category?'); "  href="<?php echo BASE_URL; ?>dashboard/category/delete/<?php echo $category->id; ?>">Delete</a>
                                    </td>
                                 </tr>
                                 <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                     <div class="alert alert-info">
                        No Category Added.
                    </div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="card-footer small text-muted">Updated at <?php echo date('Y-m-d'); ?></div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <script>
        $(document).ready( function () {
            $('dataTable').DataTable();
        } );
    </script>
<?php include_once __DIR__.'/../../partials/desh_footer.php';  ?>