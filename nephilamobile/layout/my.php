<?php
$profile = $USER->profile;
$schoolrole = $profile['schoolrole'];

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
   <link rel="shortcut icon" href="<?php echo $CFG->wwwroot . "/nephilaFavicon/favicon.ico"; ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google web fonts -->
    <?php require_once(dirname(__FILE__).'/includes/fonts.php'); ?>
    <!-- iOS Homescreen Icons -->
    <?php require_once(dirname(__FILE__).'/includes/iosicons.php'); ?>
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>
<style>
div.studroom{
width:197px;
height:131px;
border:1px solid transparent;
float:left;
}

div.studroom img{
 

</style>
<?php echo $OUTPUT->standard_top_of_body_html() ?>
<?php require_once(dirname(__FILE__).'/includes/headercourse.php'); ?>
<?php //require_once(dirname(__FILE__).'/includes/header.php'); ?>

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
                <?php echo $OUTPUT->custom_menu(); ?>
                <ul class="nav pull-right">
                    <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                    <li class="navbar-text"><?php echo $OUTPUT->nephilamobile_logout(); ?></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div id="page-navbar" class="clearfix" style="margin-left:10px">
            			<nav class="breadcrumb-button"><?php //echo $OUTPUT->page_heading_button(); ?></nav>
            			<div class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></div>
        			</div>



<div style="width:800px; height:396px; background-color:#fff; background-image:url('<?php echo $CFG->wwwroot?>/studyroom/studyroom.png'); margin-left:auto; margin-right:auto">

<div class="studroom">
<div style="height:18px;"></div>
<a style="margin-left:70px; margin-top:30px" href=""><img title="Badges" src="<?php echo $CFG->wwwroot; ?>/studyroom/badgesfinal.png" onmouseover="this.src='<?php echo $CFG->wwwroot; ?>/studyroom/badgesfinalmover.png'" onmouseout="this.src='<?php echo $CFG->wwwroot; ?>/studyroom/badgesfinal.png'"></a>
</div>

<div class="studroom"></div>

<div class="studroom">
<a style="" href="<?php echo $CFG->wwwroot;?>/calendar/view.php"><img title = "Calendar" src="<?php echo $CFG->wwwroot; ?>/studyroom/calendarfinal.png" onmouseover="this.src='<?php echo $CFG->wwwroot; ?>/studyroom/calendarfinalmover.png'" onmouseout="this.src='<?php echo $CFG->wwwroot; ?>/studyroom/calendarfinal.png'"></a>
</div>

<div class="studroom">
<a style="margin-left:100px;" href="<?php echo $CFG->wwwroot;?>/user/profile.php"><img title = "Profile" src="<?php echo $CFG->wwwroot; ?>/studyroom/profilefinal.png" onmouseover="this.src='<?php echo $CFG->wwwroot; ?>/studyroom/profilefinalmover.png'" onmouseout="this.src='<?php echo $CFG->wwwroot; ?>/studyroom/profilefinal.png'"></a>
</div>

<div class="studroom"></div>
<div class="studroom"></div>
<div class="studroom"></div>

<div class="studroom"><br /><a style="margin-left:20px;" href="<?php echo $CFG->wwwroot;?>/user/files.php"><img title="Private Files" src="<?php echo $CFG->wwwroot; ?>/studyroom/filesfinal.png" onmouseover="this.src='<?php echo $CFG->wwwroot; ?>/studyroom/filesfinalmover.png'" onmouseout="this.src='<?php echo $CFG->wwwroot; ?>/studyroom/filesfinal.png'"></a></div>


<div class="studroom">
<a style="" href="<?php echo $CFG->wwwroot; ?>/login/logout.php?sesskey=<?php echo sesskey(); ?>"><img title = "Log out" src="<?php echo $CFG->wwwroot; ?>/studyroom/logoutfinal.png" onmouseover="this.src='<?php echo $CFG->wwwroot; ?>/studyroom/logoutfinalmover.png'" onmouseout="this.src='<?php echo $CFG->wwwroot; ?>/studyroom/logoutfinal.png'"></a>
</div>
<div class="studroom"></div>
<div class="studroom"></div>

<div class="studroom"><a style="margin-left:130px;" href="<?php echo $CFG->wwwroot;?>/message/index.php"><img title="Messages" src="<?php echo $CFG->wwwroot; ?>/studyroom/messagesfinal.png" onmouseover="this.src='<?php echo $CFG->wwwroot; ?>/studyroom/messagesfinalmover.png'" onmouseout="this.src='<?php echo $CFG->wwwroot; ?>/studyroom/messagesfinal.png'"></a></div>
<div style="visibility:hidden">




<!-- Start Main Regions -->
<div id="page" class="container-fluid">
    <div id="page-content" class="row-fluid">
        <div id="<?php echo $regionbsid ?>" class="span9">
            <div class="row-fluid">
            	<?php if ($hasboringlayout) { ?>
                <section id="region-main" class="span12 pull-right">
                <?php } else { ?>
                <section id="region-main" class="span12">
                <?php } ?>
                	
                    <?php
                    echo $OUTPUT->course_content_header();
                    echo $OUTPUT->main_content();
                    echo $OUTPUT->course_content_footer();
                    ?>
                </section>
                <?php if ($hasboringlayout) { ?>
                <?php echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column'); ?>
                <?php } else { ?>
                <?php //echo $OUTPUT->blocks('side-pre', 'span4 pull-right'); ?>
                <?php } ?>
            </div>
        </div>
        <?php //echo $OUTPUT->blocks('side-post', 'span3'); ?>
    </div>
    </div>
    <!-- End Main Regions -->

    <a href="#top" class="back-to-top"><i class="fa fa-angle-double-up fa-3x"></i><p><?php print_string('backtotop', 'theme_nephilamobile'); ?></p></a>

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
