<?php $__env->startSection('title', 'Contact Us'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- about-home start -->
<section id="wishlist-home" class="wishlist-home-main-block">
    <div class="container">
        <h1 class="wishlist-home-heading text-white"><?php echo e(__('frontstaticword.Contactus')); ?></h1>
    </div>
</section> 
<!-- about-home end -->
<!-- contact-us start-->
<section id="contact-us" class="contact-us-main-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <!-- map -->
                    <section id="location" class="map-location btm-30"></section>
                <!-- end map -->
            </div>
            <div class="col-lg-5 col-md-6">
                <h4 class="contact-us-heading"><?php echo e(__('frontstaticword.KeepinTouch')); ?></h4>
                <form id="demo-form2" method="post" action="<?php echo e(route('contact.user')); ?>" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />

                    <div class="form-group">
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="E-mail">
                    </div>
                    <div class="comment btm-20">
                        <textarea id="comment" name="message" rows="6" placeholder="Your Message"></textarea>
                    </div>

                    
                    <div class="contact-form-btn">
                        <button type="submit" class="btn btn-primary" title="Send Message"><?php echo e(__('frontstaticword.Message')); ?></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="contact-dtl">
            <h4 class="contact-us-heading btm-40"><?php echo e(__('frontstaticword.ContactDetails')); ?></h4>
            <div class="row">
                <div class="offset-lg-1 col-lg-3 col-md-4">
                    <ul>
                        <li class="btm-10"><i class="fa fa-map-marker"></i></li>
                        <li class="btm-10 caps"><?php echo e(__('frontstaticword.address')); ?></li>
                        <li class="btm-40"><?php echo e($gsetting->default_address); ?></li>
                    </ul>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-4">
                    <ul>
                        <li class="btm-10"><i class="fa fa-envelope"></i></li>
                        <li class="btm-10 caps"><?php echo e(__('frontstaticword.Email')); ?> </li>
                        <li class="btm-40"><?php echo e($gsetting->wel_email); ?></li>
                    </ul>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-4">
                    <ul>
                        <li class="btm-10"><i class="fa fa-phone"></i></li>
                        <li class="btm-10 caps"><?php echo e(__('frontstaticword.Phone')); ?></li>
                        <li class="btm-40"><?php echo e($gsetting->default_phone); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact us end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

<script>
    
jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "https://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
    document.body.appendChild(script);
  });
  function initialize(){
    var myLatLng = {lat: 25.3500, lng: 74.6333}; // Insert Your Latitude and Longitude For Footer Wiget Map
    var mapOptions = {
      center: myLatLng, 
      zoom: 15,
      disableDefaultUI: true,
      scrollwheel: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]     
    }
    // For Footer Widget Map
    var map = new google.maps.Map(document.getElementById("location"), mapOptions);
    var image = 'images/icons/map.png';
    var beachMarker = new google.maps.Marker({
      position: myLatLng, 
      map: map,   
      icon: image
    });    
  }
</script>
<!-- end jquery -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/edustar.academiaenvivo.com/httpdocs/new/edu-pro-new/resources/views/front/contact.blade.php ENDPATH**/ ?>