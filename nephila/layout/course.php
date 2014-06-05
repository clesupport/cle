<?php
//$profile = $USER->profile;
//$schoolrole = $profile['schoolrole'];

$haslogo = (!empty($PAGE->theme->settings->logo));
$hasboringlayout = (empty($PAGE->theme->settings->layout)) ? false : $PAGE->theme->settings->layout;
$hasanalytics = (empty($PAGE->theme->settings->useanalytics)) ? false : $PAGE->theme->settings->useanalytics;

if (right_to_left()) {
    $regionbsid = 'region-bs-main-and-post';
} else {
    $regionbsid = 'region-bs-main-and-pre';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $CFG->wwwroot; ?>/nephilaFavicon/favicon.ico" />
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
                <?php // require_once(dirname(__FILE__).'/includes/menu.php'); ?>
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
        <div id="<?php echo $regionbsid ?>" class="span9">
            <div class="row-fluid">
<div id="learningwall" class="span9">
<h2 id="learningwallheader" class="instance">MY LEARNING WALL</h2>

<div id="learningwallcontent" class="span9">
<?php $PAGE->set_heading($COURSE->fullname); ?>
<p></p>

<?php echo '<center><iframe style="border: 1px" width="100%" scrolling="auto" height="520px" frameborder="1" align="left" marginwidth="5px" marginheight="5px" src=" ' . $CFG->wwwroot  .'/wall/index.php?CourseId='.$COURSE->id.'&Id=1&Order=1&Desc=What\'s going on in the class?"></iframe></center>'; ?>
  </div></div>
  
  
            	<?php if ($hasboringlayout) { ?>
                <section id="region-main" class="span12 pull-right">
                <?php } else { ?>
                <section id="region-main" class="span12">
                <?php } ?>
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
                <?php if ($hasboringlayout) { ?>
                <?php echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column'); ?>
                <?php } else { ?>
                <?php echo $OUTPUT->blocks('side-pre', 'span4 pull-right'); ?>
                <?php } ?>
            </div>
        </div>
        <?php echo $OUTPUT->blocks('side-post', 'span3'); ?>
    </div>
    
    <!-- End Main Regions -->

    <a href="#top" class="back-to-top"><i class="fa fa-angle-double-up fa-3x"></i><p><?php print_string('backtotop', 'theme_nephila'); ?></p></a>

	<footer class="container-fluid">
		<?php require_once(dirname(__FILE__).'/includes/footernephila.php'); ?>
	</footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>

<!-- Start Google Analytics -->
<?php if ($hasanalytics) { ?>
	<?php require_once(dirname(__FILE__).'/includes/analytics.php'); ?>
<?php } ?>
<!-- End Google Analytics -->

<?php if($schoolrole == 'cleteacher') {?>
<script type="text/javascript">
$("li.type_setting.collapsed.item_with_icon:contains('Turn editing off')").remove();
$("li.type_setting.collapsed.item_with_icon:contains('Activity chooser off')").remove();
$("li.type_setting.collapsed.item_with_icon:contains('Edit settings')").remove();
$("li.type_setting.collapsed.item_with_icon:contains('Enrolment methods')").remove();
$("li.type_setting.collapsed.item_with_icon:contains('Outcomes')").remove();
</script>
<?php }?>

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
