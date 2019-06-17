<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'metas.php';?>

    <link rel="icon" type="image/png" sizes="16x16"
          href="<?php echo base_url('uploads/favicon.png');?>">

    <title><?php echo $page_title;?> | <?php echo get_settings('doctor_name');?></title>

    <?php include 'includes_top.php';?>
</head>

<body>

<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>

<div id="wrapper">
    <?php include 'header.php';?>

    <?php include 'doctor/navigation.php';?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title"><?php echo $page_title;?></h4>
                </div>
            </div>
            <?php include 'doctor/'.$page_name.'.php';?>
        </div>
        <?php include 'footer.php';?>
    </div>
</div>
    <?php include 'includes_bottom.php';?>
</body>

</html>
