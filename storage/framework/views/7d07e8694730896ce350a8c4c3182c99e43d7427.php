<head>
<meta charset="utf-8" />
<title><?php echo $__env->yieldContent('title'); ?> | <?php echo e($project_title); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?php echo e($gsetting->meta_data_desc); ?>" />
<meta name="keywords" content="<?php echo e($gsetting->meta_data_keyword); ?>">
<meta name="author" content="Media City" />
<meta name="MobileOptimized" content="320" />
<link rel="icon" type="image/icon" href="<?php echo e(asset('images/favicon/'.$gsetting->favicon)); ?>"> <!-- favicon-icon -->
<!-- theme styles -->
<link href="<?php echo e(url('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
<link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:300,400,500,700" rel="stylesheet"> <!--  google fonts -->
<link href="https://fonts.googleapis.com/css?family=Muli&display=swap:400,500,600,700" rel="stylesheet"><!-- google fonts -->
<link rel="stylesheet" href="<?php echo e(url('vendor/fontawesome/css/all.css')); ?>" /> <!--  fontawesome css -->
<link rel="stylesheet" href="<?php echo e(url('vendor/font/flaticon.css')); ?>" /> <!-- fontawesome css -->
<link rel="stylesheet" href="<?php echo e(url('vendor/navigation/menumaker.css')); ?>" /> <!-- navigation css -->
<link rel="stylesheet" href="<?php echo e(url('vendor/owl/css/owl.carousel.min.css')); ?>" /> <!-- owl carousel css -->
<link rel="stylesheet" href="<?php echo e(url('vendor/protip/protip.css')); ?>" /> <!-- menu css -->

<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku'); //make a list of rtl languages
?>
<?php if(in_array($language,$rtl)): ?>
<link href="<?php echo e(url('css/rtl.css')); ?>" rel="stylesheet" type="text/css"/> <!-- rtl css -->
<?php else: ?>

<link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet" type="text/css"/> <!-- custom css -->
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(url('css/colorbox.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('admin/bower_components/font-awesome/css/font-awesome.min.css')); ?>"><!-- fontawesome css -->
<link rel="stylesheet" href="<?php echo e(url('css/select2.min.css')); ?>"> <!-- select2 css -->
<link rel="stylesheet" href="<?php echo e(URL::asset('css/pace.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(url('css/protip.css')); ?>" /> <!-- protip css -->
<link rel="manifest" href="<?php echo e(url('manifest.json')); ?>">
<!-- end theme styles -->
</head><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/resources/views/theme/head.blade.php ENDPATH**/ ?>