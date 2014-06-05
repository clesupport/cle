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
    <link rel="shortcut icon" href="<?php echo $CFG->nephilafavicon; ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google web fonts -->
    <?php require_once(dirname(__FILE__).'/includes/fonts.php'); ?>
    <!-- iOS Homescreen Icons -->
    <?php require_once(dirname(__FILE__).'/includes/iosicons.php'); ?>
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<?php require_once(dirname(__FILE__).'/includes/headercourse.php'); ?>

<header role="banner" class="navbar navbar">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">
            <a class="brand" href="<?php echo $CFG->wwwroot;?>"><?php echo $SITE->shortname; ?></a>
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
                <?php echo $OUTPUT->custom_menu() ?>
                <?php //require_once(dirname(__FILE__).'/includes/menu.php'); ?>
                <ul class="nav pull-right">
                
                    <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                    
                
                    <li class="navbar-text"><?php echo $OUTPUT->nephila_logout() ?></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Start Main Regions -->
<div id="page" class="container-fluid">
    <div id="page-content" class="row-fluid">
        
            <div class="row-fluid">
                <section id="region-main" class="span12">
                
                	<div id="page-navbar" class="clearfix">
            			<nav class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></nav>
            			<div class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></div>
        				</div>
                    <?php
                    echo $OUTPUT->course_content_header();
                    echo $OUTPUT->main_content();
                    echo $OUTPUT->course_content_footer();
                    ?>
                </section>
               
            </div>
       
    </div>
    
    <!-- End Main Regions -->

    <a href="#top" class="back-to-top"><i class="fa fa-angle-double-up fa-3x"></i><p><?php print_string('backtotop', 'theme_nephila'); ?></p></a>

	<footer class="container-fluid">
		<?php require_once(dirname(__FILE__).'/includes/footernephila.php'); ?>
	</footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>


<script type="text/javascript">
//$("#fgroup_id_formathelp_0").remove();
$("#fgroup_id_formathelp_0 fieldset.felement.fgroup label").text("Aiken Format \(Multiple Choice\)");
$("#fgroup_id_formathelp_1").remove();
//$("#fgroup_id_formathelp_2").remove();
$("#fgroup_id_formathelp_3").remove();
$("#fgroup_id_formathelp_5").remove();
$("#fgroup_id_formathelp_6").remove();
$("#fgroup_id_formathelp_7").remove();
$("#fgroup_id_formathelp_8").remove();
$("#id_format_gift").prop("checked",true);
//$("#id_fileformat").hide();


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
