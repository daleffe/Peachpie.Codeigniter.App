<!DOCTYPE html>
<html lang="en">
 <head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE-edge,chrome-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?php echo ($title ? 'CodeIgniter PeachPie : ' . $title : 'CodeIgniter PeachPie'); ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo asset_url('ico/favicon.ico', ''); ?>">
	<!-- CSS -->
    <link href="<?php echo asset_url('css/bootstrap.min.css', ''); ?>" rel="stylesheet">    
    <?php if (strtolower($this->router->fetch_class()) == 'auth') { ?>
    <link href="<?php echo asset_url('css/signin.css', ''); ?>" rel="stylesheet">
    <?php } ?>
    <!-- Fonts -->
    <link href="<?php echo asset_url('css/bootstrap-icons.css', ''); ?>" rel="stylesheet" type="text/css">
 </head>