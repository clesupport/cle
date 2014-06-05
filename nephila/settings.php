<?php
$settings = null;

defined('MOODLE_INTERNAL') || die;


	$ADMIN->add('themes', new admin_category('theme_nephila', 'Nephila'));

	// "geneicsettings" settingpage
	$temp = new admin_settingpage('theme_nephila_generic',  get_string('geneicsettings', 'theme_nephila'));
	
	// Default Site icon setting.
    $name = 'theme_nephila/siteicon';
    $title = get_string('siteicon', 'theme_nephila');
    $description = get_string('siteicondesc', 'theme_nephila');
    $default = 'laptop';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
    
    // Include Awesome Font from Bootstrapcdn
    $name = 'theme_nephila/bootstrapcdn';
    $title = get_string('bootstrapcdn', 'theme_nephila');
    $description = get_string('bootstrapcdndesc', 'theme_nephila');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
	
    // Logo file setting.
    $name = 'theme_nephila/logo';
    $title = get_string('logo', 'theme_nephila');
    $description = get_string('logodesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Font Selector.
    $name = 'theme_nephila/fontselect';
    $title = get_string('fontselect' , 'theme_nephila');
    $description = get_string('fontselectdesc', 'theme_nephila');
    $default = '1';
    $choices = array(
    	'1'=>'Oswald & PT Sans', 
    	'2'=>'Lobster & Cabin', 
    	'3'=>'Raleway & Goudy', 
    	'4'=>'Allerta & Crimson Text', 
    	'5'=>'Arvo & PT Sans',
    	'6'=>'Dancing Script & Josefin Sans',
    	'7'=>'Allan & Cardo',
    	'8'=>'Molengo & Lekton',
    	'9'=>'Droid Serif & Droid Sans',
    	'10'=>'Corbin & Nobile',
    	'11'=>'Ubuntu & Vollkorn',
    	'12'=>'Bree Serif & Open Sans', 
    	'13'=>'Bevan & Pontano Sans', 
    	'14'=>'Abril Fatface & Average', 
    	'15'=>'Playfair Display and Muli', 
    	'16'=>'Sansita One & Kameron',
    	'17'=>'Istok Web & Lora',
    	'18'=>'Pacifico & Arimo',
    	'19'=>'Nixie One & Ledger',
    	'20'=>'Cantata One & Imprima',
    	'21'=>'Rancho & Gudea',
    	'22'=>'DISABLE Google Fonts');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // User picture in header setting.
    $name = 'theme_nephila/headerprofilepic';
    $title = get_string('headerprofilepic', 'theme_nephila');
    $description = get_string('headerprofilepicdesc', 'theme_nephila');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Fixed or Variable Width.
    $name = 'theme_nephila/pagewidth';
    $title = get_string('pagewidth', 'theme_nephila');
    $description = get_string('pagewidthdesc', 'theme_nephila');
    $default = 1200;
    $choices = array(1900=>get_string('fixedwidthwide','theme_nephila'), 1200=>get_string('fixedwidthnarrow','theme_nephila'), 100=>get_string('variablewidth','theme_nephila'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Custom or standard layout.
    $name = 'theme_nephila/layout';
    $title = get_string('layout', 'theme_nephila');
    $description = get_string('layoutdesc', 'theme_nephila');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Include the Editicons css rules
    $name = 'theme_nephila/editicons';
    $title = get_string('editicons', 'theme_nephila');
    $description = get_string('editiconsdesc', 'theme_nephila');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $temp->add($setting);
    
    // Performance Information Display.
    $name = 'theme_nephila/perfinfo';
    $title = get_string('perfinfo' , 'theme_nephila');
    $description = get_string('perfinfodesc', 'theme_nephila');
    $perf_max = get_string('perf_max', 'theme_nephila');
    $perf_min = get_string('perf_min', 'theme_nephila');
    $default = 'min';
    $choices = array('min'=>$perf_min, 'max'=>$perf_max);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Navbar Seperator.
    $name = 'theme_nephila/navbarsep';
    $title = get_string('navbarsep' , 'theme_nephila');
    $description = get_string('navbarsepdesc', 'theme_nephila');
    $nav_thinbracket = get_string('nav_thinbracket', 'theme_nephila');
    $nav_doublebracket = get_string('nav_doublebracket', 'theme_nephila');
    $nav_thickbracket = get_string('nav_thickbracket', 'theme_nephila');
    $nav_slash = get_string('nav_slash', 'theme_nephila');
    $nav_pipe = get_string('nav_pipe', 'theme_nephila');
    $dontdisplay = get_string('dontdisplay', 'theme_nephila');
    $default = '/';
    $choices = array('/'=>$nav_slash, '\f105'=>$nav_thinbracket, '\f101'=>$nav_doublebracket, '\f054'=>$nav_thickbracket, '|'=>$nav_pipe);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Copyright setting.
    $name = 'theme_nephila/copyright';
    $title = get_string('copyright', 'theme_nephila');
    $description = get_string('copyrightdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
    
    // Footnote setting.
    $name = 'theme_nephila/footnote';
    $title = get_string('footnote', 'theme_nephila');
    $description = get_string('footnotedesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Custom CSS file.
    $name = 'theme_nephila/customcss';
    $title = get_string('customcss', 'theme_nephila');
    $description = get_string('customcssdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $ADMIN->add('theme_nephila', $temp);
    
   
    
    /* Custom Menu Settings */
    $temp = new admin_settingpage('theme_nephila_custommenu', get_string('custommenuheading', 'theme_nephila'));
	            
    //This is the descriptor for the following Moodle color settings
    $name = 'theme_nephila/mydashboardinfo';
    $heading = get_string('mydashboardinfo', 'theme_nephila');
    $information = get_string('mydashboardinfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Toggle dashboard display in custommenu.
    $name = 'theme_nephila/displaymydashboard';
    $title = get_string('displaymydashboard', 'theme_nephila');
    $description = get_string('displaymydashboarddesc', 'theme_nephila');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for the following Moodle color settings
    $name = 'theme_nephila/mycoursesinfo';
    $heading = get_string('mycoursesinfo', 'theme_nephila');
    $information = get_string('mycoursesinfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Toggle courses display in custommenu.
    $name = 'theme_nephila/displaymycourses';
    $title = get_string('displaymycourses', 'theme_nephila');
    $description = get_string('displaymycoursesdesc', 'theme_nephila');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Set terminology for dropdown course list
	$name = 'theme_nephila/mycoursetitle';
	$title = get_string('mycoursetitle','theme_nephila');
	$description = get_string('mycoursetitledesc', 'theme_nephila');
	$default = 'course';
	$choices = array(
		'course' => get_string('mycourses', 'theme_nephila'),
		'unit' => get_string('myunits', 'theme_nephila'),
		'class' => get_string('myclasses', 'theme_nephila'),
		'module' => get_string('mymodules', 'theme_nephila')
	);
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);
    
    $ADMIN->add('theme_nephila', $temp);
    
     /* Custom Menu Items Settings Kenny*/
    $temp = new admin_settingpage('theme_nephila_custommenu_items', get_string('custommenuitemheading', 'theme_nephila'));    
   
    // custom menu items for teacher
	 $name = 'theme_nephila/CLETeacher';
	 $title = get_string('custommenuitems1', 'theme_nephila');
	 $description = get_string('configcustommenuitems', 'admin');
	 $default = '';
	 $setting = new admin_setting_configtextarea($name, $title, $description, $default);
	 $temp->add($setting); 
	 
	 // custom menu items for student
	 $name = 'theme_nephila/Student';
	 $title = get_string('custommenuitems2', 'theme_nephila');
	 $description = get_string('configcustommenuitems', 'admin');
	 $default = '';
	 $setting = new admin_setting_configtextarea($name, $title, $description, $default);
	 $temp->add($setting); 
	 
	 // custom menu items for User Course Creator
	 $name = 'theme_nephila/UserCourseCreator';
	 $title = get_string('custommenuitems3', 'theme_nephila');
	 $description = get_string('configcustommenuitems', 'admin');
	 $default = '';
	 $setting = new admin_setting_configtextarea($name, $title, $description, $default);
	 $temp->add($setting); 
	 
	 // custom menu items for User School Admin
	 $name = 'theme_nephila/SchoolAdmin';
	 $title = get_string('custommenuitems4', 'theme_nephila');
	 $description = get_string('configcustommenuitems', 'admin');
	 $default = '';
	 $setting = new admin_setting_configtextarea($name, $title, $description, $default);
	 $temp->add($setting); 
	 
    $ADMIN->add('theme_nephila', $temp);
    
    
	/* Color Settings */
    $temp = new admin_settingpage('theme_nephila_color', get_string('colorheading', 'theme_nephila'));
    $temp->add(new admin_setting_heading('theme_nephila_color', get_string('colorheadingsub', 'theme_nephila'),
            format_text(get_string('colordesc' , 'theme_nephila'), FORMAT_MARKDOWN)));

    // Background Image.
    $name = 'theme_nephila/pagebackground';
    $title = get_string('pagebackground', 'theme_nephila');
    $description = get_string('pagebackgrounddesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pagebackground');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Main theme colour setting.
    $name = 'theme_nephila/themecolor';
    $title = get_string('themecolor', 'theme_nephila');
    $description = get_string('themecolordesc', 'theme_nephila');
    $default = '#30add1';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Main theme Hover colour setting.
    $name = 'theme_nephila/themehovercolor';
    $title = get_string('themehovercolor', 'theme_nephila');
    $description = get_string('themehovercolordesc', 'theme_nephila');
    $default = '#29a1c4';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for the Slideshow
    $name = 'theme_nephila/slidecolorinfo';
    $heading = get_string('slidecolors', 'theme_nephila');
    $information = get_string('slidecolorsdesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
      // Slide Header colour setting.
    $name = 'theme_nephila/slideheadercolor';
    $title = get_string('slideheadercolor', 'theme_nephila');
    $description = get_string('slideheadercolordesc', 'theme_nephila');
    $default = '#30add1';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Slide Text colour setting.
    $name = 'theme_nephila/slidecolor';
    $title = get_string('slidecolor', 'theme_nephila');
    $description = get_string('slidecolordesc', 'theme_nephila');
    $default = '#888';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Slide Button colour setting.
    $name = 'theme_nephila/slidebuttoncolor';
    $title = get_string('slidebuttoncolor', 'theme_nephila');
    $description = get_string('slidebuttoncolordesc', 'theme_nephila');
    $default = '#30add1';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
        //This is the descriptor for the Slideshow
    $name = 'theme_nephila/footercolorinfo';
    $heading = get_string('footercolors', 'theme_nephila');
    $information = get_string('footercolorsdesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Footer background colour setting.
    $name = 'theme_nephila/footercolor';
    $title = get_string('footercolor', 'theme_nephila');
    $description = get_string('footercolordesc', 'theme_nephila');
    $default = '#000000';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Footer text colour setting.
    $name = 'theme_nephila/footertextcolor';
    $title = get_string('footertextcolor', 'theme_nephila');
    $description = get_string('footertextcolordesc', 'theme_nephila');
    $default = '#DDDDDD';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Footer Block Heading colour setting.
    $name = 'theme_nephila/footerheadingcolor';
    $title = get_string('footerheadingcolor', 'theme_nephila');
    $description = get_string('footerheadingcolordesc', 'theme_nephila');
    $default = '#CCCCCC';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Footer Seperator colour setting.
    $name = 'theme_nephila/footersepcolor';
    $title = get_string('footersepcolor', 'theme_nephila');
    $description = get_string('footersepcolordesc', 'theme_nephila');
    $default = '#313131';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Footer URL colour setting.
    $name = 'theme_nephila/footerurlcolor';
    $title = get_string('footerurlcolor', 'theme_nephila');
    $description = get_string('footerurlcolordesc', 'theme_nephila');
    $default = '#BBBBBB';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Footer URL hover colour setting.
    $name = 'theme_nephila/footerhovercolor';
    $title = get_string('footerhovercolor', 'theme_nephila');
    $description = get_string('footerhovercolordesc', 'theme_nephila');
    $default = '#FFFFFF';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);



 	$ADMIN->add('theme_nephila', $temp);
 
 
    /* Slideshow Widget Settings */
    $temp = new admin_settingpage('theme_nephila_slideshow', get_string('slideshowheading', 'theme_nephila'));
    // $temp->add(new admin_setting_heading('theme_nephila_slideshow', get_string('slideshowheadingsub', 'theme_nephila'),
    //        format_text(get_string('slideshowdesc' , 'theme_nephila'), FORMAT_MARKDOWN)));
    
    // Toggle Slideshow.
/*    $name = 'theme_nephila/toggleslideshow';
    $title = get_string('toggleslideshow' , 'theme_nephila');
    $description = get_string('toggleslideshowdesc', 'theme_nephila');
    $alwaysdisplay = get_string('alwaysdisplay', 'theme_nephila');
    $displaybeforelogin = get_string('displaybeforelogin', 'theme_nephila');
    $displayafterlogin = get_string('displayafterlogin', 'theme_nephila');
    $dontdisplay = get_string('dontdisplay', 'theme_nephila');
    $default = 'alwaysdisplay';
    $choices = array('1'=>$alwaysdisplay, '2'=>$displaybeforelogin, '3'=>$displayafterlogin, '0'=>$dontdisplay);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);*/
    
    // Hide slideshow on phones.
/*    $name = 'theme_nephila/hideonphone';
    $title = get_string('hideonphone' , 'theme_nephila');
    $description = get_string('hideonphonedesc', 'theme_nephila');
    $display = get_string('alwaysdisplay', 'theme_nephila');
    $dontdisplay = get_string('dontdisplay', 'theme_nephila');
    $default = 'display';
    $choices = array(''=>$display, 'hidden-phone'=>$dontdisplay);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);*/
    
    // Slideshow Design Picker.
/*    $name = 'theme_nephila/slideshowvariant';
    $title = get_string('slideshowvariant' , 'theme_nephila');
    $description = get_string('slideshowvariantdesc', 'theme_nephila');
    $slideshow1 = get_string('slideshow1', 'theme_nephila');
    $slideshow2 = get_string('slideshow2', 'theme_nephila');
    $default = 'slideshow1';
    $choices = array('1'=>$slideshow1, '2'=>$slideshow2);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);*/

    /*
     * Slide 1
     */
     
    //This is the descriptor for Slide One
    $name = 'theme_nephila/slide1info';
    $heading = get_string('slide1', 'theme_nephila');
    $information = get_string('slideinfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephila/slide1';
    $title = get_string('slidetitle', 'theme_nephila');
    $description = get_string('slidetitledesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephila/slide1image';
    $title = get_string('slideimage', 'theme_nephila');
    $description = get_string('slideimagedesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephila/slide1caption';
    $title = get_string('slidecaption', 'theme_nephila');
    $description = get_string('slidecaptiondesc', 'theme_nephila');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephila/slide1url';
    $title = get_string('slideurl', 'theme_nephila');
    $description = get_string('slideurldesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*
     * Slide 2
     */
     
    //This is the descriptor for Slide Two
    $name = 'theme_nephila/slide2info';
    $heading = get_string('slide2', 'theme_nephila');
    $information = get_string('slideinfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephila/slide2';
    $title = get_string('slidetitle', 'theme_nephila');
    $description = get_string('slidetitledesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephila/slide2image';
    $title = get_string('slideimage', 'theme_nephila');
    $description = get_string('slideimagedesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephila/slide2caption';
    $title = get_string('slidecaption', 'theme_nephila');
    $description = get_string('slidecaptiondesc', 'theme_nephila');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephila/slide2url';
    $title = get_string('slideurl', 'theme_nephila');
    $description = get_string('slideurldesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*
     * Slide 3
     */

    //This is the descriptor for Slide Three
    $name = 'theme_nephila/slide3info';
    $heading = get_string('slide3', 'theme_nephila');
    $information = get_string('slideinfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Title.
    $name = 'theme_nephila/slide3';
    $title = get_string('slidetitle', 'theme_nephila');
    $description = get_string('slidetitledesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephila/slide3image';
    $title = get_string('slideimage', 'theme_nephila');
    $description = get_string('slideimagedesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephila/slide3caption';
    $title = get_string('slidecaption', 'theme_nephila');
    $description = get_string('slidecaptiondesc', 'theme_nephila');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephila/slide3url';
    $title = get_string('slideurl', 'theme_nephila');
    $description = get_string('slideurldesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*
     * Slide 4
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephila/slide4info';
    $heading = get_string('slide4', 'theme_nephila');
    $information = get_string('slideinfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephila/slide4';
    $title = get_string('slidetitle', 'theme_nephila');
    $description = get_string('slidetitledesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephila/slide4image';
    $title = get_string('slideimage', 'theme_nephila');
    $description = get_string('slideimagedesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephila/slide4caption';
    $title = get_string('slidecaption', 'theme_nephila');
    $description = get_string('slidecaptiondesc', 'theme_nephila');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephila/slide4url';
    $title = get_string('slideurl', 'theme_nephila');
    $description = get_string('slideurldesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*
     * Slide 5
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephila/slide5info';
    $heading = get_string('slide5', 'theme_nephila');
    $information = get_string('slideinfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephila/slide5';
    $title = get_string('slidetitle', 'theme_nephila');
    $description = get_string('slidetitledesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephila/slide5image';
    $title = get_string('slideimage', 'theme_nephila');
    $description = get_string('slideimagedesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephila/slide5caption';
    $title = get_string('slidecaption', 'theme_nephila');
    $description = get_string('slidecaptiondesc', 'theme_nephila');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephila/slide5url';
    $title = get_string('slideurl', 'theme_nephila');
    $description = get_string('slideurldesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*
     * Slide 6
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephila/slide6info';
    $heading = get_string('slide6', 'theme_nephila');
    $information = get_string('slideinfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephila/slide6';
    $title = get_string('slidetitle', 'theme_nephila');
    $description = get_string('slidetitledesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephila/slide6image';
    $title = get_string('slideimage', 'theme_nephila');
    $description = get_string('slideimagedesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephila/slide6caption';
    $title = get_string('slidecaption', 'theme_nephila');
    $description = get_string('slidecaptiondesc', 'theme_nephila');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephila/slide6url';
    $title = get_string('slideurl', 'theme_nephila');
    $description = get_string('slideurldesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*
     * Slide 7
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephila/slide7info';
    $heading = get_string('slide7', 'theme_nephila');
    $information = get_string('slideinfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephila/slide7';
    $title = get_string('slidetitle', 'theme_nephila');
    $description = get_string('slidetitledesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephila/slide7image';
    $title = get_string('slideimage', 'theme_nephila');
    $description = get_string('slideimagedesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide7image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephila/slide7caption';
    $title = get_string('slidecaption', 'theme_nephila');
    $description = get_string('slidecaptiondesc', 'theme_nephila');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephila/slide7url';
    $title = get_string('slideurl', 'theme_nephila');
    $description = get_string('slideurldesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*
     * Slide 8
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephila/slide8info';
    $heading = get_string('slide8', 'theme_nephila');
    $information = get_string('slideinfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephila/slide8';
    $title = get_string('slidetitle', 'theme_nephila');
    $description = get_string('slidetitledesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephila/slide8image';
    $title = get_string('slideimage', 'theme_nephila');
    $description = get_string('slideimagedesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide8image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephila/slide8caption';
    $title = get_string('slidecaption', 'theme_nephila');
    $description = get_string('slidecaptiondesc', 'theme_nephila');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephila/slide8url';
    $title = get_string('slideurl', 'theme_nephila');
    $description = get_string('slideurldesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*
     * Slide 9
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephila/slide9info';
    $heading = get_string('slide9', 'theme_nephila');
    $information = get_string('slideinfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephila/slide9';
    $title = get_string('slidetitle', 'theme_nephila');
    $description = get_string('slidetitledesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
	
    // Image.
    $name = 'theme_nephila/slide9image';
    $title = get_string('slideimage', 'theme_nephila');
    $description = get_string('slideimagedesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide9image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephila/slide9caption';
    $title = get_string('slidecaption', 'theme_nephila');
    $description = get_string('slidecaptiondesc', 'theme_nephila');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephila/slide9url';
    $title = get_string('slideurl', 'theme_nephila');
    $description = get_string('slideurldesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*
     * Slide 10
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephila/slide10info';
    $heading = get_string('slide10', 'theme_nephila');
    $information = get_string('slideinfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephila/slide10';
    $title = get_string('slidetitle', 'theme_nephila');
    $description = get_string('slidetitledesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephila/slide10image';
    $title = get_string('slideimage', 'theme_nephila');
    $description = get_string('slideimagedesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide10image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephila/slide10caption';
    $title = get_string('slidecaption', 'theme_nephila');
    $description = get_string('slidecaptiondesc', 'theme_nephila');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephila/slide10url';
    $title = get_string('slideurl', 'theme_nephila');
    $description = get_string('slideurldesc', 'theme_nephila');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    
    $ADMIN->add('theme_nephila', $temp);
    
    $temp = new admin_settingpage('theme_nephila_frontcontent', get_string('frontcontentheading', 'theme_nephila'));
	$temp->add(new admin_setting_heading('theme_nephila_frontcontent', get_string('frontcontentheadingsub', 'theme_nephila'),
            format_text(get_string('frontcontentdesc' , 'theme_nephila'), FORMAT_MARKDOWN)));
    
    // Enable Frontpage Content
    $name = 'theme_nephila/usefrontcontent';
    $title = get_string('usefrontcontent', 'theme_nephila');
    $description = get_string('usefrontcontentdesc', 'theme_nephila');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Frontpage Content
    $name = 'theme_nephila/frontcontentarea';
    $title = get_string('frontcontentarea', 'theme_nephila');
    $description = get_string('frontcontentareadesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Frontpage Block alignment.
    $name = 'theme_nephila/frontpageblocks';
    $title = get_string('frontpageblocks' , 'theme_nephila');
    $description = get_string('frontpageblocksdesc', 'theme_nephila');
    $left = get_string('left', 'theme_nephila');
    $right = get_string('right', 'theme_nephila');
    $default = 'left';
    $choices = array('1'=>$left, '0'=>$right);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Toggle Frontpage Middle Blocks
    $name = 'theme_nephila/frontpagemiddleblocks';
    $title = get_string('frontpagemiddleblocks' , 'theme_nephila');
    $description = get_string('frontpagemiddleblocksdesc', 'theme_nephila');
    $alwaysdisplay = get_string('alwaysdisplay', 'theme_nephila');
    $displaybeforelogin = get_string('displaybeforelogin', 'theme_nephila');
    $displayafterlogin = get_string('displayafterlogin', 'theme_nephila');
    $dontdisplay = get_string('dontdisplay', 'theme_nephila');
    $default = 'display';
    $choices = array('1'=>$alwaysdisplay, '2'=>$displaybeforelogin, '3'=>$displayafterlogin, '0'=>$dontdisplay);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
        
    $ADMIN->add('theme_nephila', $temp);
    

	/* Marketing Spot Settings */
	$temp = new admin_settingpage('theme_nephila_marketing', get_string('marketingheading', 'theme_nephila'));
	$temp->add(new admin_setting_heading('theme_nephila_marketing', get_string('marketingheadingsub', 'theme_nephila'),
            format_text(get_string('marketingdesc' , 'theme_nephila'), FORMAT_MARKDOWN)));
	
	// Toggle Marketing Spots.
    $name = 'theme_nephila/togglemarketing';
    $title = get_string('togglemarketing' , 'theme_nephila');
    $description = get_string('togglemarketingdesc', 'theme_nephila');
    $alwaysdisplay = get_string('alwaysdisplay', 'theme_nephila');
    $displaybeforelogin = get_string('displaybeforelogin', 'theme_nephila');
    $displayafterlogin = get_string('displayafterlogin', 'theme_nephila');
    $dontdisplay = get_string('dontdisplay', 'theme_nephila');
    $default = 'display';
    $choices = array('1'=>$alwaysdisplay, '2'=>$displaybeforelogin, '3'=>$displayafterlogin, '0'=>$dontdisplay);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Marketing Spot Image Height
	$name = 'theme_nephila/marketingheight';
	$title = get_string('marketingheight','theme_nephila');
	$description = get_string('marketingheightdesc', 'theme_nephila');
	$default = 100;
	$choices = array(50, 100, 150, 200, 250, 300);
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$temp->add($setting);
	
	//This is the descriptor for Marketing Spot One
    $name = 'theme_nephila/marketing1info';
    $heading = get_string('marketing1', 'theme_nephila');
    $information = get_string('marketinginfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
	
	//Marketing Spot One.
	$name = 'theme_nephila/marketing1';
    $title = get_string('marketingtitle', 'theme_nephila');
    $description = get_string('marketingtitledesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing1icon';
    $title = get_string('marketingicon', 'theme_nephila');
    $description = get_string('marketingicondesc', 'theme_nephila');
    $default = 'star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing1image';
    $title = get_string('marketingimage', 'theme_nephila');
    $description = get_string('marketingimagedesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing1content';
    $title = get_string('marketingcontent', 'theme_nephila');
    $description = get_string('marketingcontentdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing1buttontext';
    $title = get_string('marketingbuttontext', 'theme_nephila');
    $description = get_string('marketingbuttontextdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing1buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_nephila');
    $description = get_string('marketingbuttonurldesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for Marketing Spot Two
    $name = 'theme_nephila/marketing2info';
    $heading = get_string('marketing2', 'theme_nephila');
    $information = get_string('marketinginfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    //Marketing Spot Two.
	$name = 'theme_nephila/marketing2';
    $title = get_string('marketingtitle', 'theme_nephila');
    $description = get_string('marketingtitledesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing2icon';
    $title = get_string('marketingicon', 'theme_nephila');
    $description = get_string('marketingicondesc', 'theme_nephila');
    $default = 'star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing2image';
    $title = get_string('marketingimage', 'theme_nephila');
    $description = get_string('marketingimagedesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing2content';
    $title = get_string('marketingcontent', 'theme_nephila');
    $description = get_string('marketingcontentdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing2buttontext';
    $title = get_string('marketingbuttontext', 'theme_nephila');
    $description = get_string('marketingbuttontextdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing2buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_nephila');
    $description = get_string('marketingbuttonurldesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for Marketing Spot Three
    $name = 'theme_nephila/marketing3info';
    $heading = get_string('marketing3', 'theme_nephila');
    $information = get_string('marketinginfodesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    //Marketing Spot Three.
	$name = 'theme_nephila/marketing3';
    $title = get_string('marketingtitle', 'theme_nephila');
    $description = get_string('marketingtitledesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing3icon';
    $title = get_string('marketingicon', 'theme_nephila');
    $description = get_string('marketingicondesc', 'theme_nephila');
    $default = 'star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing3image';
    $title = get_string('marketingimage', 'theme_nephila');
    $description = get_string('marketingimagedesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing3content';
    $title = get_string('marketingcontent', 'theme_nephila');
    $description = get_string('marketingcontentdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing3buttontext';
    $title = get_string('marketingbuttontext', 'theme_nephila');
    $description = get_string('marketingbuttontextdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephila/marketing3buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_nephila');
    $description = get_string('marketingbuttonurldesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    
    $ADMIN->add('theme_nephila', $temp);

	
	/* Social Network Settings */
	$temp = new admin_settingpage('theme_nephila_social', get_string('socialheading', 'theme_nephila'));
	$temp->add(new admin_setting_heading('theme_nephila_social', get_string('socialheadingsub', 'theme_nephila'),
            format_text(get_string('socialdesc' , 'theme_nephila'), FORMAT_MARKDOWN)));
	
    // Website url setting.
    $name = 'theme_nephila/website';
    $title = get_string('website', 'theme_nephila');
    $description = get_string('websitedesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Facebook url setting.
    $name = 'theme_nephila/facebook';
    $title = get_string('facebook', 'theme_nephila');
    $description = get_string('facebookdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Flickr url setting.
    $name = 'theme_nephila/flickr';
    $title = get_string('flickr', 'theme_nephila');
    $description = get_string('flickrdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Twitter url setting.
    $name = 'theme_nephila/twitter';
    $title = get_string('twitter', 'theme_nephila');
    $description = get_string('twitterdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Google+ url setting.
    $name = 'theme_nephila/googleplus';
    $title = get_string('googleplus', 'theme_nephila');
    $description = get_string('googleplusdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // LinkedIn url setting.
    $name = 'theme_nephila/linkedin';
    $title = get_string('linkedin', 'theme_nephila');
    $description = get_string('linkedindesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Pinterest url setting.
    $name = 'theme_nephila/pinterest';
    $title = get_string('pinterest', 'theme_nephila');
    $description = get_string('pinterestdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Instagram url setting.
    $name = 'theme_nephila/instagram';
    $title = get_string('instagram', 'theme_nephila');
    $description = get_string('instagramdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // YouTube url setting.
    $name = 'theme_nephila/youtube';
    $title = get_string('youtube', 'theme_nephila');
    $description = get_string('youtubedesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Skype url setting.
    $name = 'theme_nephila/skype';
    $title = get_string('skype', 'theme_nephila');
    $description = get_string('skypedesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
 
    // VKontakte url setting.
    $name = 'theme_nephila/vk';
    $title = get_string('vk', 'theme_nephila');
    $description = get_string('vkdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting); 
    
    $ADMIN->add('theme_nephila', $temp);
    
    $temp = new admin_settingpage('theme_nephila_mobileapps', get_string('mobileappsheading', 'theme_nephila'));
	$temp->add(new admin_setting_heading('theme_nephila_mobileapps', get_string('mobileappsheadingsub', 'theme_nephila'),
            format_text(get_string('mobileappsdesc' , 'theme_nephila'), FORMAT_MARKDOWN)));
    // Android App url setting.
    $name = 'theme_nephila/android';
    $title = get_string('android', 'theme_nephila');
    $description = get_string('androiddesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // iOS App url setting.
    $name = 'theme_nephila/ios';
    $title = get_string('ios', 'theme_nephila');
    $description = get_string('iosdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for iOS Icons
    $name = 'theme_nephila/iosiconinfo';
    $heading = get_string('iosicon', 'theme_nephila');
    $information = get_string('iosicondesc', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // iPhone Icon.
    $name = 'theme_nephila/iphoneicon';
    $title = get_string('iphoneicon', 'theme_nephila');
    $description = get_string('iphoneicondesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'iphoneicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // iPhone Retina Icon.
    $name = 'theme_nephila/iphoneretinaicon';
    $title = get_string('iphoneretinaicon', 'theme_nephila');
    $description = get_string('iphoneretinaicondesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'iphoneretinaicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // iPad Icon.
    $name = 'theme_nephila/ipadicon';
    $title = get_string('ipadicon', 'theme_nephila');
    $description = get_string('ipadicondesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'ipadicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // iPad Retina Icon.
    $name = 'theme_nephila/ipadretinaicon';
    $title = get_string('ipadretinaicon', 'theme_nephila');
    $description = get_string('ipadretinaicondesc', 'theme_nephila');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'ipadretinaicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $ADMIN->add('theme_nephila', $temp);
    
    /* User Alerts */
    $temp = new admin_settingpage('theme_nephila_alerts', get_string('alertsheading', 'theme_nephila'));
	$temp->add(new admin_setting_heading('theme_nephila_alerts', get_string('alertsheadingsub', 'theme_nephila'),
            format_text(get_string('alertsdesc' , 'theme_nephila'), FORMAT_MARKDOWN)));
    
    //This is the descriptor for Alert One
    $name = 'theme_nephila/alert1info';
    $heading = get_string('alert1', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Enable Alert
    $name = 'theme_nephila/enable1alert';
    $title = get_string('enablealert', 'theme_nephila');
    $description = get_string('enablealertdesc', 'theme_nephila');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Type.
    $name = 'theme_nephila/alert1type';
    $title = get_string('alerttype' , 'theme_nephila');
    $description = get_string('alerttypedesc', 'theme_nephila');
    $alert_info = get_string('alert_info', 'theme_nephila');
    $alert_warning = get_string('alert_warning', 'theme_nephila');
    $alert_general = get_string('alert_general', 'theme_nephila');
    $default = 'info';
    $choices = array('info'=>$alert_info, 'error'=>$alert_warning, 'success'=>$alert_general);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Title.
    $name = 'theme_nephila/alert1title';
    $title = get_string('alerttitle', 'theme_nephila');
    $description = get_string('alerttitledesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Text.
    $name = 'theme_nephila/alert1text';
    $title = get_string('alerttext', 'theme_nephila');
    $description = get_string('alerttextdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for Alert Two
    $name = 'theme_nephila/alert2info';
    $heading = get_string('alert2', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Enable Alert
    $name = 'theme_nephila/enable2alert';
    $title = get_string('enablealert', 'theme_nephila');
    $description = get_string('enablealertdesc', 'theme_nephila');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Type.
    $name = 'theme_nephila/alert2type';
    $title = get_string('alerttype' , 'theme_nephila');
    $description = get_string('alerttypedesc', 'theme_nephila');
    $alert_info = get_string('alert_info', 'theme_nephila');
    $alert_warning = get_string('alert_warning', 'theme_nephila');
    $alert_general = get_string('alert_general', 'theme_nephila');
    $default = 'info';
    $choices = array('info'=>$alert_info, 'error'=>$alert_warning, 'success'=>$alert_general);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Title.
    $name = 'theme_nephila/alert2title';
    $title = get_string('alerttitle', 'theme_nephila');
    $description = get_string('alerttitledesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Text.
    $name = 'theme_nephila/alert2text';
    $title = get_string('alerttext', 'theme_nephila');
    $description = get_string('alerttextdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for Alert Three
    $name = 'theme_nephila/alert3info';
    $heading = get_string('alert3', 'theme_nephila');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Enable Alert
    $name = 'theme_nephila/enable3alert';
    $title = get_string('enablealert', 'theme_nephila');
    $description = get_string('enablealertdesc', 'theme_nephila');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Type.
    $name = 'theme_nephila/alert3type';
    $title = get_string('alerttype' , 'theme_nephila');
    $description = get_string('alerttypedesc', 'theme_nephila');
    $alert_info = get_string('alert_info', 'theme_nephila');
    $alert_warning = get_string('alert_warning', 'theme_nephila');
    $alert_general = get_string('alert_general', 'theme_nephila');
    $default = 'info';
    $choices = array('info'=>$alert_info, 'error'=>$alert_warning, 'success'=>$alert_general);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Title.
    $name = 'theme_nephila/alert3title';
    $title = get_string('alerttitle', 'theme_nephila');
    $description = get_string('alerttitledesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Text.
    $name = 'theme_nephila/alert3text';
    $title = get_string('alerttext', 'theme_nephila');
    $description = get_string('alerttextdesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
            
    
    $ADMIN->add('theme_nephila', $temp);
    
    /* Analytics Settings */
    $temp = new admin_settingpage('theme_nephila_analytics', get_string('analyticsheading', 'theme_nephila'));
	$temp->add(new admin_setting_heading('theme_nephila_analytics', get_string('analyticsheadingsub', 'theme_nephila'),
            format_text(get_string('analyticsdesc' , 'theme_nephila'), FORMAT_MARKDOWN)));
    
    // Enable Analytics
    $name = 'theme_nephila/useanalytics';
    $title = get_string('useanalytics', 'theme_nephila');
    $description = get_string('useanalyticsdesc', 'theme_nephila');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Google Analytics ID
    $name = 'theme_nephila/analyticsid';
    $title = get_string('analyticsid', 'theme_nephila');
    $description = get_string('analyticsiddesc', 'theme_nephila');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Clean Analytics URL
    $name = 'theme_nephila/analyticsclean';
    $title = get_string('analyticsclean', 'theme_nephila');
    $description = get_string('analyticscleandesc', 'theme_nephila');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
        
    $ADMIN->add('theme_nephila', $temp);

