<?php
$profile = $USER->profile;
$schoolrole = $profile['schoolrole'];

$haslogo = (!empty($PAGE->theme->settings->logo));
$hasboringlayout = (empty($PAGE->theme->settings->layout)) ? false : $PAGE->theme->settings->layout;
$hasanalytics = (empty($PAGE->theme->settings->useanalytics)) ? false : $PAGE->theme->settings->useanalytics;

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $CFG->wwwroot;?>/nephilaFavicon/favicon1.ico"/>
    <link rel ="stylesheet" href="<?php echo $CFG->wwwroot . "/nephilaCSS/login.css"?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    <!-- Google web fonts -->
    <?php require_once(dirname(__FILE__).'/includes/fonts.php'); ?>
    <!-- iOS Homescreen Icons -->
    <?php require_once(dirname(__FILE__).'/includes/iosicons.php'); ?>
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>
<?php echo $OUTPUT->standard_top_of_body_html() ?>
<div id="page" class="container-fluid">
	<!-- Start Main Regions -->
    <div id="page-content" class="row-fluid">
        <section id="region-main" class="container span12">
        	<div id="page-navbar" class="clearfix">
        		<nav class="breadcrumb-button"><?php //echo $OUTPUT->page_heading_button(); ?></nav>
            	<div class="breadcrumb-nav"><?php //echo $OUTPUT->navbar(); ?></div>
            		<div id="nephilalogin">
            		
            			<div class="phnxlogo"><img src="<?php echo $CFG->wwwroot; ?>/theme/nephila/pix/logo.png"></img></div>
		            	<?php	  	
				            echo $OUTPUT->course_content_header();
				           
				            echo $OUTPUT->main_content();
				            
				            echo $OUTPUT->course_content_footer();  
				         ?>
				      </div>
        	</div>
	  <!--div id="bodyimage">
          <img  src="<?php echo $CFG->wwwroot; ?>/nephilaIMG/cle.png">
	</div-->	        
	</section>
    </div>
	<!-- End Main Regions -->

    <a href="#top" class="back-to-top"><i class="fa fa-angle-double-up fa-3x"></i><p><?php print_string('backtotop', 'theme_nephilamobile'); ?></p></a>

	

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>

<!-- Start Google Analytics -->
<?php if ($hasanalytics) { ?>
	<?php require_once(dirname(__FILE__).'/includes/analytics.php'); ?>
<?php } ?>
<!-- End Google Analytics -->


	<footer id="footernephila">
		<?php require_once(dirname(__FILE__).'/includes/footernephila.php'); ?>
	</footer>

<script type="text/javascript">
jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});
</script>

</body>
</html>
