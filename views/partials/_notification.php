<?php if(!empty($_SESSION['errors'])):?>
    <?php foreach ($_SESSION['errors'] as $error): ?>
        <div class="alert alert-warning">
            <li><?php echo $error; ?></li>
        </div>
    <?php endforeach;?>
    <?php unset($_SESSION['errors']); ?>
<?php endif;?>

<?php if (isset($_SESSION['success'])):?>
    <div class="alert alert-success">
        <?php echo $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif;?>