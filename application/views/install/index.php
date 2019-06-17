<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" type="image/png" sizes="16x16"
          href="<?php echo base_url('uploads/favicon.png');?>">

    <title>Installation | Doctor Chamber Management System</title>

    <?php include 'styles.php'; ?>
</head>

<body>

<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>

<div id="wrapper">
    <?php include 'header.php';?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <?php include 'main/'.$page_name.'.php'; ?>
        </div>
        <?php include 'footer.php';?>
    </div>
</div>
    <?php include 'scripts.php'; ?>
</body>

</html>
