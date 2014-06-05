<?php
$settings = null;

defined('MOODLE_INTERNAL') || die;


	$ADMIN->add('themes', new admin_category('theme_nephilamobile', 'NephilaMobile'));

	// "geneicsettings" settingpage
	$temp = new admin_settingpage('theme_nephilamobile_generic',  get_string('geneicsettings', 'theme_nephilamobile'));
	
	// Default Site icon setting.
    $name = 'theme_nephilamobile/siteicon';
    $title = get_string('siteicon', 'theme_nephilamobile');
    $description = get_string('siteicondesc', 'theme_nephilamobile');
    $default = 'laptop';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
    
    // Include Awesome Font from Bootstrapcdn
    $name = 'theme_nephilamobile/bootstrapcdn';
    $title = get_string('bootstrapcdn', 'theme_nephilamobile');
    $description = get_string('bootstrapcdndesc', 'theme_nephilamobile');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
	
    // Logo file setting.
    $name = 'theme_nephilamobile/logo';
    $title = get_string('logo', 'theme_nephilamobile');
    $description = get_string('logodesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Font Selector.
    $name = 'theme_nephilamobile/fontselect';
    $title = get_string('fontselect' , 'theme_nephilamobile');
    $description = get_string('fontselectdesc', 'theme_nephilamobile');
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
    $name = 'theme_nephilamobile/headerprofilepic';
    $title = get_string('headerprofilepic', 'theme_nephilamobile');
    $description = get_string('headerprofilepicdesc', 'theme_nephilamobile');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Fixed or Variable Width.
    $name = 'theme_nephilamobile/pagewidth';
    $title = get_string('pagewidth', 'theme_nephilamobile');
    $description = get_string('pagewidthdesc', 'theme_nephilamobile');
    $default = 1200;
    $choices = array(1900=>get_string('fixedwidthwide','theme_nephilamobile'), 1200=>get_string('fixedwidthnarrow','theme_nephilamobile'), 100=>get_string('variablewidth','theme_nephilamobile'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Custom or standard layout.
    $name = 'theme_nephilamobile/layout';
    $title = get_string('layout', 'theme_nephilamobile');
    $description = get_string('layoutdesc', 'theme_nephilamobile');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Include the Editicons css rules
    $name = 'theme_nephilamobile/editicons';
    $title = get_string('editicons', 'theme_nephilamobile');
    $description = get_string('editiconsdesc', 'theme_nephilamobile');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $temp->add($setting);
    
    // Performance Information Display.
    $name = 'theme_nephilamobile/perfinfo';
    $title = get_string('perfinfo' , 'theme_nephilamobile');
    $description = get_string('perfinfodesc', 'theme_nephilamobile');
    $perf_max = get_string('perf_max', 'theme_nephilamobile');
    $perf_min = get_string('perf_min', 'theme_nephilamobile');
    $default = 'min';
    $choices = array('min'=>$perf_min, 'max'=>$perf_max);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Navbar Seperator.
    $name = 'theme_nephilamobile/navbarsep';
    $title = get_string('navbarsep' , 'theme_nephilamobile');
    $description = get_string('navbarsepdesc', 'theme_nephilamobile');
    $nav_thinbracket = get_string('nav_thinbracket', 'theme_nephilamobile');
    $nav_doublebracket = get_string('nav_doublebracket', 'theme_nephilamobile');
    $nav_thickbracket = get_string('nav_thickbracket', 'theme_nephilamobile');
    $nav_slash = get_string('nav_slash', 'theme_nephilamobile');
    $nav_pipe = get_string('nav_pipe', 'theme_nephilamobile');
    $dontdisplay = get_string('dontdisplay', 'theme_nephilamobile');
    $default = '/';
    $choices = array('/'=>$nav_slash, '\f105'=>$nav_thinbracket, '\f101'=>$nav_doublebracket, '\f054'=>$nav_thickbracket, '|'=>$nav_pipe);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Copyright setting.
    $name = 'theme_nephilamobile/copyright';
    $title = get_string('copyright', 'theme_nephilamobile');
    $description = get_string('copyrightdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
    
    // Footnote setting.
    $name = 'theme_nephilamobile/footnote';
    $title = get_string('footnote', 'theme_nephilamobile');
    $description = get_string('footnotedesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Custom CSS file.
    $name = 'theme_nephilamobile/customcss';
    $title = get_string('customcss', 'theme_nephilamobile');
    $description = get_string('customcssdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $ADMIN->add('theme_nephilamobile', $temp);
    
   
    
    /* Custom Menu Settings */
    $temp = new admin_settingpage('theme_nephilamobile_custommenu', get_string('custommenuheading', 'theme_nephilamobile'));
	            
    //This is the descriptor for the following Moodle color settings
    $name = 'theme_nephilamobile/mydashboardinfo';
    $heading = get_string('mydashboardinfo', 'theme_nephilamobile');
    $information = get_string('mydashboardinfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Toggle dashboard display in custommenu.
    $name = 'theme_nephilamobile/displaymydashboard';
    $title = get_string('displaymydashboard', 'theme_nephilamobile');
    $description = get_string('displaymydashboarddesc', 'theme_nephilamobile');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for the following Moodle color settings
    $name = 'theme_nephilamobile/mycoursesinfo';
    $heading = get_string('mycoursesinfo', 'theme_nephilamobile');
    $information = get_string('mycoursesinfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Toggle courses display in custommenu.
    $name = 'theme_nephilamobile/displaymycourses';
    $title = get_string('displaymycourses', 'theme_nephilamobile');
    $description = get_string('displaymycoursesdesc', 'theme_nephilamobile');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Set terminology for dropdown course list
	$name = 'theme_nephilamobile/mycoursetitle';
	$title = get_string('mycoursetitle','theme_nephilamobile');
	$description = get_string('mycoursetitledesc', 'theme_nephilamobile');
	$default = 'course';
	$choices = array(
		'course' => get_string('mycourses', 'theme_nephilamobile'),
		'unit' => get_string('myunits', 'theme_nephilamobile'),
		'class' => get_string('myclasses', 'theme_nephilamobile'),
		'module' => get_string('mymodules', 'theme_nephilamobile')
	);
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);
    
    $ADMIN->add('theme_nephilamobile', $temp);
    
     /* Custom Menu Items Settings Kenny*/
    $temp = new admin_settingpage('theme_nephilamobile_custommenu_items', get_string('custommenuitemheading', 'theme_nephilamobile'));    
   
    // custom menu items for teacher
	 $name = 'theme_nephilamobile/CLETeacher';
	 $title = get_string('custommenuitems1', 'theme_nephilamobile');
	 $description = get_string('configcustommenuitems', 'admin');
	 $default = '';
	 $setting = new admin_setting_configtextarea($name, $title, $description, $default);
	 $temp->add($setting); 
	 
	 // custom menu items for student
	 $name = 'theme_nephilamobile/Student';
	 $title = get_string('custommenuitems2', 'theme_nephilamobile');
	 $description = get_string('configcustommenuitems', 'admin');
	 $default = '';
	 $setting = new admin_setting_configtextarea($name, $title, $description, $default);
	 $temp->add($setting); 
	 
	 // custom menu items for User Course Creator
	 $name = 'theme_nephilamobile/UserCourseCreator';
	 $title = get_string('custommenuitems3', 'theme_nephilamobile');
	 $description = get_string('configcustommenuitems', 'admin');
	 $default = '';
	 $setting = new admin_setting_configtextarea($name, $title, $description, $default);
	 $temp->add($setting); 
	 
	 // custom menu items for User School Admin
	 $name = 'theme_nephilamobile/SchoolAdmin';
	 $title = get_string('custommenuitems4', 'theme_nephilamobile');
	 $description = get_string('configcustommenuitems', 'admin');
	 $default = '';
	 $setting = new admin_setting_configtextarea($name, $title, $description, $default);
	 $temp->add($setting); 
	 
    $ADMIN->add('theme_nephilamobile', $temp);
    
    
	/* Color Settings */
    $temp = new admin_settingpage('theme_nephilamobile_color', get_string('colorheading', 'theme_nephilamobile'));
    $temp->add(new admin_setting_heading('theme_nephilamobile_color', get_string('colorheadingsub', 'theme_nephilamobile'),
            format_text(get_string('colordesc' , 'theme_nephilamobile'), FORMAT_MARKDOWN)));

    // Background Image.
    $name = 'theme_nephilamobile/pagebackground';
    $title = get_string('pagebackground', 'theme_nephilamobile');
    $description = get_string('pagebackgrounddesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'pagebackground');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Main theme colour setting.
    $name = 'theme_nephilamobile/themecolor';
    $title = get_string('themecolor', 'theme_nephilamobile');
    $description = get_string('themecolordesc', 'theme_nephilamobile');
    $default = '#30add1';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Main theme Hover colour setting.
    $name = 'theme_nephilamobile/themehovercolor';
    $title = get_string('themehovercolor', 'theme_nephilamobile');
    $description = get_string('themehovercolordesc', 'theme_nephilamobile');
    $default = '#29a1c4';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for the Slideshow
    $name = 'theme_nephilamobile/slidecolorinfo';
    $heading = get_string('slidecolors', 'theme_nephilamobile');
    $information = get_string('slidecolorsdesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
      // Slide Header colour setting.
    $name = 'theme_nephilamobile/slideheadercolor';
    $title = get_string('slideheadercolor', 'theme_nephilamobile');
    $description = get_string('slideheadercolordesc', 'theme_nephilamobile');
    $default = '#30add1';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Slide Text colour setting.
    $name = 'theme_nephilamobile/slidecolor';
    $title = get_string('slidecolor', 'theme_nephilamobile');
    $description = get_string('slidecolordesc', 'theme_nephilamobile');
    $default = '#888';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Slide Button colour setting.
    $name = 'theme_nephilamobile/slidebuttoncolor';
    $title = get_string('slidebuttoncolor', 'theme_nephilamobile');
    $description = get_string('slidebuttoncolordesc', 'theme_nephilamobile');
    $default = '#30add1';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
        //This is the descriptor for the Slideshow
    $name = 'theme_nephilamobile/footercolorinfo';
    $heading = get_string('footercolors', 'theme_nephilamobile');
    $information = get_string('footercolorsdesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Footer background colour setting.
    $name = 'theme_nephilamobile/footercolor';
    $title = get_string('footercolor', 'theme_nephilamobile');
    $description = get_string('footercolordesc', 'theme_nephilamobile');
    $default = '#000000';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Footer text colour setting.
    $name = 'theme_nephilamobile/footertextcolor';
    $title = get_string('footertextcolor', 'theme_nephilamobile');
    $description = get_string('footertextcolordesc', 'theme_nephilamobile');
    $default = '#DDDDDD';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Footer Block Heading colour setting.
    $name = 'theme_nephilamobile/footerheadingcolor';
    $title = get_string('footerheadingcolor', 'theme_nephilamobile');
    $description = get_string('footerheadingcolordesc', 'theme_nephilamobile');
    $default = '#CCCCCC';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Footer Seperator colour setting.
    $name = 'theme_nephilamobile/footersepcolor';
    $title = get_string('footersepcolor', 'theme_nephilamobile');
    $description = get_string('footersepcolordesc', 'theme_nephilamobile');
    $default = '#313131';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Footer URL colour setting.
    $name = 'theme_nephilamobile/footerurlcolor';
    $title = get_string('footerurlcolor', 'theme_nephilamobile');
    $description = get_string('footerurlcolordesc', 'theme_nephilamobile');
    $default = '#BBBBBB';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Footer URL hover colour setting.
    $name = 'theme_nephilamobile/footerhovercolor';
    $title = get_string('footerhovercolor', 'theme_nephilamobile');
    $description = get_string('footerhovercolordesc', 'theme_nephilamobile');
    $default = '#FFFFFF';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);



 	$ADMIN->add('theme_nephilamobile', $temp);
 
 
    /* Slideshow Widget Settings */
    $temp = new admin_settingpage('theme_nephilamobile_slideshow', get_string('slideshowheading', 'theme_nephilamobile'));
    // $temp->add(new admin_setting_heading('theme_nephilamobile_slideshow', get_string('slideshowheadingsub', 'theme_nephilamobile'),
    //        format_text(get_string('slideshowdesc' , 'theme_nephilamobile'), FORMAT_MARKDOWN)));
    
    // Toggle Slideshow.
	 $name = 'theme_nephilamobile/toggleslideshow';
    $title = get_string('toggleslideshow' , 'theme_nephilamobile');
    $description = get_string('toggleslideshowdesc', 'theme_nephilamobile');
    $alwaysdisplay = get_string('alwaysdisplay', 'theme_nephilamobile');
    $displaybeforelogin = get_string('displaybeforelogin', 'theme_nephilamobile');
    $displayafterlogin = get_string('displayafterlogin', 'theme_nephilamobile');
    $dontdisplay = get_string('dontdisplay', 'theme_nephilamobile');
    $default = 'alwaysdisplay';
    $choices = array('1'=>$alwaysdisplay, '2'=>$displaybeforelogin, '3'=>$displayafterlogin, '0'=>$dontdisplay);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Hide slideshow on phones.
	 $name = 'theme_nephilamobile/hideonphone';
    $title = get_string('hideonphone' , 'theme_nephilamobile');
    $description = get_string('hideonphonedesc', 'theme_nephilamobile');
    $display = get_string('alwaysdisplay', 'theme_nephilamobile');
    $dontdisplay = get_string('dontdisplay', 'theme_nephilamobile');
    $default = 'display';
    $choices = array(''=>$display, 'hidden-phone'=>$dontdisplay);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Slideshow Design Picker.
    $name = 'theme_nephilamobile/slideshowvariant';
    $title = get_string('slideshowvariant' , 'theme_nephilamobile');
    $description = get_string('slideshowvariantdesc', 'theme_nephilamobile');
    $slideshow1 = get_string('slideshow1', 'theme_nephilamobile');
    $slideshow2 = get_string('slideshow2', 'theme_nephilamobile');
    $default = 'slideshow1';
    $choices = array('1'=>$slideshow1, '2'=>$slideshow2);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*
     * Slide 1
     */
     
    //This is the descriptor for Slide One
    $name = 'theme_nephilamobile/slide1info';
    $heading = get_string('slide1', 'theme_nephilamobile');
    $information = get_string('slideinfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephilamobile/slide1';
    $title = get_string('slidetitle', 'theme_nephilamobile');
    $description = get_string('slidetitledesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephilamobile/slide1image';
    $title = get_string('slideimage', 'theme_nephilamobile');
    $description = get_string('slideimagedesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephilamobile/slide1caption';
    $title = get_string('slidecaption', 'theme_nephilamobile');
    $description = get_string('slidecaptiondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephilamobile/slide1url';
    $title = get_string('slideurl', 'theme_nephilamobile');
    $description = get_string('slideurldesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*
     * Slide 2
     */
     
    //This is the descriptor for Slide Two
    $name = 'theme_nephilamobile/slide2info';
    $heading = get_string('slide2', 'theme_nephilamobile');
    $information = get_string('slideinfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephilamobile/slide2';
    $title = get_string('slidetitle', 'theme_nephilamobile');
    $description = get_string('slidetitledesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephilamobile/slide2image';
    $title = get_string('slideimage', 'theme_nephilamobile');
    $description = get_string('slideimagedesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephilamobile/slide2caption';
    $title = get_string('slidecaption', 'theme_nephilamobile');
    $description = get_string('slidecaptiondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephilamobile/slide2url';
    $title = get_string('slideurl', 'theme_nephilamobile');
    $description = get_string('slideurldesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*
     * Slide 3
     */

    //This is the descriptor for Slide Three
    $name = 'theme_nephilamobile/slide3info';
    $heading = get_string('slide3', 'theme_nephilamobile');
    $information = get_string('slideinfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Title.
    $name = 'theme_nephilamobile/slide3';
    $title = get_string('slidetitle', 'theme_nephilamobile');
    $description = get_string('slidetitledesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephilamobile/slide3image';
    $title = get_string('slideimage', 'theme_nephilamobile');
    $description = get_string('slideimagedesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephilamobile/slide3caption';
    $title = get_string('slidecaption', 'theme_nephilamobile');
    $description = get_string('slidecaptiondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephilamobile/slide3url';
    $title = get_string('slideurl', 'theme_nephilamobile');
    $description = get_string('slideurldesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*
     * Slide 4
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephilamobile/slide4info';
    $heading = get_string('slide4', 'theme_nephilamobile');
    $information = get_string('slideinfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephilamobile/slide4';
    $title = get_string('slidetitle', 'theme_nephilamobile');
    $description = get_string('slidetitledesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephilamobile/slide4image';
    $title = get_string('slideimage', 'theme_nephilamobile');
    $description = get_string('slideimagedesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide4image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephilamobile/slide4caption';
    $title = get_string('slidecaption', 'theme_nephilamobile');
    $description = get_string('slidecaptiondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephilamobile/slide4url';
    $title = get_string('slideurl', 'theme_nephilamobile');
    $description = get_string('slideurldesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*
     * Slide 5
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephilamobile/slide5info';
    $heading = get_string('slide5', 'theme_nephilamobile');
    $information = get_string('slideinfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephilamobile/slide5';
    $title = get_string('slidetitle', 'theme_nephilamobile');
    $description = get_string('slidetitledesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephilamobile/slide5image';
    $title = get_string('slideimage', 'theme_nephilamobile');
    $description = get_string('slideimagedesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide5image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephilamobile/slide5caption';
    $title = get_string('slidecaption', 'theme_nephilamobile');
    $description = get_string('slidecaptiondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephilamobile/slide5url';
    $title = get_string('slideurl', 'theme_nephilamobile');
    $description = get_string('slideurldesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*
     * Slide 6
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephilamobile/slide6info';
    $heading = get_string('slide6', 'theme_nephilamobile');
    $information = get_string('slideinfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephilamobile/slide6';
    $title = get_string('slidetitle', 'theme_nephilamobile');
    $description = get_string('slidetitledesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephilamobile/slide6image';
    $title = get_string('slideimage', 'theme_nephilamobile');
    $description = get_string('slideimagedesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide6image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephilamobile/slide6caption';
    $title = get_string('slidecaption', 'theme_nephilamobile');
    $description = get_string('slidecaptiondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephilamobile/slide6url';
    $title = get_string('slideurl', 'theme_nephilamobile');
    $description = get_string('slideurldesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*
     * Slide 7
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephilamobile/slide7info';
    $heading = get_string('slide7', 'theme_nephilamobile');
    $information = get_string('slideinfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephilamobile/slide7';
    $title = get_string('slidetitle', 'theme_nephilamobile');
    $description = get_string('slidetitledesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephilamobile/slide7image';
    $title = get_string('slideimage', 'theme_nephilamobile');
    $description = get_string('slideimagedesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide7image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephilamobile/slide7caption';
    $title = get_string('slidecaption', 'theme_nephilamobile');
    $description = get_string('slidecaptiondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephilamobile/slide7url';
    $title = get_string('slideurl', 'theme_nephilamobile');
    $description = get_string('slideurldesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*
     * Slide 8
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephilamobile/slide8info';
    $heading = get_string('slide8', 'theme_nephilamobile');
    $information = get_string('slideinfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephilamobile/slide8';
    $title = get_string('slidetitle', 'theme_nephilamobile');
    $description = get_string('slidetitledesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephilamobile/slide8image';
    $title = get_string('slideimage', 'theme_nephilamobile');
    $description = get_string('slideimagedesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide8image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephilamobile/slide8caption';
    $title = get_string('slidecaption', 'theme_nephilamobile');
    $description = get_string('slidecaptiondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephilamobile/slide8url';
    $title = get_string('slideurl', 'theme_nephilamobile');
    $description = get_string('slideurldesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*
     * Slide 9
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephilamobile/slide9info';
    $heading = get_string('slide9', 'theme_nephilamobile');
    $information = get_string('slideinfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephilamobile/slide9';
    $title = get_string('slidetitle', 'theme_nephilamobile');
    $description = get_string('slidetitledesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
	
    // Image.
    $name = 'theme_nephilamobile/slide9image';
    $title = get_string('slideimage', 'theme_nephilamobile');
    $description = get_string('slideimagedesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide9image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephilamobile/slide9caption';
    $title = get_string('slidecaption', 'theme_nephilamobile');
    $description = get_string('slidecaptiondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephilamobile/slide9url';
    $title = get_string('slideurl', 'theme_nephilamobile');
    $description = get_string('slideurldesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    /*
     * Slide 10
     */
     
    //This is the descriptor for Slide Four
    $name = 'theme_nephilamobile/slide10info';
    $heading = get_string('slide10', 'theme_nephilamobile');
    $information = get_string('slideinfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_nephilamobile/slide10';
    $title = get_string('slidetitle', 'theme_nephilamobile');
    $description = get_string('slidetitledesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_nephilamobile/slide10image';
    $title = get_string('slideimage', 'theme_nephilamobile');
    $description = get_string('slideimagedesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide10image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = 'theme_nephilamobile/slide10caption';
    $title = get_string('slidecaption', 'theme_nephilamobile');
    $description = get_string('slidecaptiondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_nephilamobile/slide10url';
    $title = get_string('slideurl', 'theme_nephilamobile');
    $description = get_string('slideurldesc', 'theme_nephilamobile');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    
    $ADMIN->add('theme_nephilamobile', $temp);
    
    $temp = new admin_settingpage('theme_nephilamobile_frontcontent', get_string('frontcontentheading', 'theme_nephilamobile'));
	$temp->add(new admin_setting_heading('theme_nephilamobile_frontcontent', get_string('frontcontentheadingsub', 'theme_nephilamobile'),
            format_text(get_string('frontcontentdesc' , 'theme_nephilamobile'), FORMAT_MARKDOWN)));
    
    // Enable Frontpage Content
    $name = 'theme_nephilamobile/usefrontcontent';
    $title = get_string('usefrontcontent', 'theme_nephilamobile');
    $description = get_string('usefrontcontentdesc', 'theme_nephilamobile');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Frontpage Content
    $name = 'theme_nephilamobile/frontcontentarea';
    $title = get_string('frontcontentarea', 'theme_nephilamobile');
    $description = get_string('frontcontentareadesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Frontpage Block alignment.
    $name = 'theme_nephilamobile/frontpageblocks';
    $title = get_string('frontpageblocks' , 'theme_nephilamobile');
    $description = get_string('frontpageblocksdesc', 'theme_nephilamobile');
    $left = get_string('left', 'theme_nephilamobile');
    $right = get_string('right', 'theme_nephilamobile');
    $default = 'left';
    $choices = array('1'=>$left, '0'=>$right);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Toggle Frontpage Middle Blocks
    $name = 'theme_nephilamobile/frontpagemiddleblocks';
    $title = get_string('frontpagemiddleblocks' , 'theme_nephilamobile');
    $description = get_string('frontpagemiddleblocksdesc', 'theme_nephilamobile');
    $alwaysdisplay = get_string('alwaysdisplay', 'theme_nephilamobile');
    $displaybeforelogin = get_string('displaybeforelogin', 'theme_nephilamobile');
    $displayafterlogin = get_string('displayafterlogin', 'theme_nephilamobile');
    $dontdisplay = get_string('dontdisplay', 'theme_nephilamobile');
    $default = 'display';
    $choices = array('1'=>$alwaysdisplay, '2'=>$displaybeforelogin, '3'=>$displayafterlogin, '0'=>$dontdisplay);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
        
    $ADMIN->add('theme_nephilamobile', $temp);
    

	/* Marketing Spot Settings */
	$temp = new admin_settingpage('theme_nephilamobile_marketing', get_string('marketingheading', 'theme_nephilamobile'));
	$temp->add(new admin_setting_heading('theme_nephilamobile_marketing', get_string('marketingheadingsub', 'theme_nephilamobile'),
            format_text(get_string('marketingdesc' , 'theme_nephilamobile'), FORMAT_MARKDOWN)));
	
	// Toggle Marketing Spots.
    $name = 'theme_nephilamobile/togglemarketing';
    $title = get_string('togglemarketing' , 'theme_nephilamobile');
    $description = get_string('togglemarketingdesc', 'theme_nephilamobile');
    $alwaysdisplay = get_string('alwaysdisplay', 'theme_nephilamobile');
    $displaybeforelogin = get_string('displaybeforelogin', 'theme_nephilamobile');
    $displayafterlogin = get_string('displayafterlogin', 'theme_nephilamobile');
    $dontdisplay = get_string('dontdisplay', 'theme_nephilamobile');
    $default = 'display';
    $choices = array('1'=>$alwaysdisplay, '2'=>$displaybeforelogin, '3'=>$displayafterlogin, '0'=>$dontdisplay);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Marketing Spot Image Height
	$name = 'theme_nephilamobile/marketingheight';
	$title = get_string('marketingheight','theme_nephilamobile');
	$description = get_string('marketingheightdesc', 'theme_nephilamobile');
	$default = 100;
	$choices = array(50, 100, 150, 200, 250, 300);
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$temp->add($setting);
	
	//This is the descriptor for Marketing Spot One
    $name = 'theme_nephilamobile/marketing1info';
    $heading = get_string('marketing1', 'theme_nephilamobile');
    $information = get_string('marketinginfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
	
	//Marketing Spot One.
	$name = 'theme_nephilamobile/marketing1';
    $title = get_string('marketingtitle', 'theme_nephilamobile');
    $description = get_string('marketingtitledesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing1icon';
    $title = get_string('marketingicon', 'theme_nephilamobile');
    $description = get_string('marketingicondesc', 'theme_nephilamobile');
    $default = 'star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing1image';
    $title = get_string('marketingimage', 'theme_nephilamobile');
    $description = get_string('marketingimagedesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing1image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing1content';
    $title = get_string('marketingcontent', 'theme_nephilamobile');
    $description = get_string('marketingcontentdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing1buttontext';
    $title = get_string('marketingbuttontext', 'theme_nephilamobile');
    $description = get_string('marketingbuttontextdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing1buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_nephilamobile');
    $description = get_string('marketingbuttonurldesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for Marketing Spot Two
    $name = 'theme_nephilamobile/marketing2info';
    $heading = get_string('marketing2', 'theme_nephilamobile');
    $information = get_string('marketinginfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    //Marketing Spot Two.
	$name = 'theme_nephilamobile/marketing2';
    $title = get_string('marketingtitle', 'theme_nephilamobile');
    $description = get_string('marketingtitledesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing2icon';
    $title = get_string('marketingicon', 'theme_nephilamobile');
    $description = get_string('marketingicondesc', 'theme_nephilamobile');
    $default = 'star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing2image';
    $title = get_string('marketingimage', 'theme_nephilamobile');
    $description = get_string('marketingimagedesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing2image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing2content';
    $title = get_string('marketingcontent', 'theme_nephilamobile');
    $description = get_string('marketingcontentdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing2buttontext';
    $title = get_string('marketingbuttontext', 'theme_nephilamobile');
    $description = get_string('marketingbuttontextdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing2buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_nephilamobile');
    $description = get_string('marketingbuttonurldesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for Marketing Spot Three
    $name = 'theme_nephilamobile/marketing3info';
    $heading = get_string('marketing3', 'theme_nephilamobile');
    $information = get_string('marketinginfodesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    //Marketing Spot Three.
	$name = 'theme_nephilamobile/marketing3';
    $title = get_string('marketingtitle', 'theme_nephilamobile');
    $description = get_string('marketingtitledesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing3icon';
    $title = get_string('marketingicon', 'theme_nephilamobile');
    $description = get_string('marketingicondesc', 'theme_nephilamobile');
    $default = 'star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing3image';
    $title = get_string('marketingimage', 'theme_nephilamobile');
    $description = get_string('marketingimagedesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing3image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing3content';
    $title = get_string('marketingcontent', 'theme_nephilamobile');
    $description = get_string('marketingcontentdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing3buttontext';
    $title = get_string('marketingbuttontext', 'theme_nephilamobile');
    $description = get_string('marketingbuttontextdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_nephilamobile/marketing3buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_nephilamobile');
    $description = get_string('marketingbuttonurldesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    
    $ADMIN->add('theme_nephilamobile', $temp);

	
	/* Social Network Settings */
	$temp = new admin_settingpage('theme_nephilamobile_social', get_string('socialheading', 'theme_nephilamobile'));
	$temp->add(new admin_setting_heading('theme_nephilamobile_social', get_string('socialheadingsub', 'theme_nephilamobile'),
            format_text(get_string('socialdesc' , 'theme_nephilamobile'), FORMAT_MARKDOWN)));
	
    // Website url setting.
    $name = 'theme_nephilamobile/website';
    $title = get_string('website', 'theme_nephilamobile');
    $description = get_string('websitedesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Facebook url setting.
    $name = 'theme_nephilamobile/facebook';
    $title = get_string('facebook', 'theme_nephilamobile');
    $description = get_string('facebookdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Flickr url setting.
    $name = 'theme_nephilamobile/flickr';
    $title = get_string('flickr', 'theme_nephilamobile');
    $description = get_string('flickrdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Twitter url setting.
    $name = 'theme_nephilamobile/twitter';
    $title = get_string('twitter', 'theme_nephilamobile');
    $description = get_string('twitterdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Google+ url setting.
    $name = 'theme_nephilamobile/googleplus';
    $title = get_string('googleplus', 'theme_nephilamobile');
    $description = get_string('googleplusdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // LinkedIn url setting.
    $name = 'theme_nephilamobile/linkedin';
    $title = get_string('linkedin', 'theme_nephilamobile');
    $description = get_string('linkedindesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Pinterest url setting.
    $name = 'theme_nephilamobile/pinterest';
    $title = get_string('pinterest', 'theme_nephilamobile');
    $description = get_string('pinterestdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Instagram url setting.
    $name = 'theme_nephilamobile/instagram';
    $title = get_string('instagram', 'theme_nephilamobile');
    $description = get_string('instagramdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // YouTube url setting.
    $name = 'theme_nephilamobile/youtube';
    $title = get_string('youtube', 'theme_nephilamobile');
    $description = get_string('youtubedesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Skype url setting.
    $name = 'theme_nephilamobile/skype';
    $title = get_string('skype', 'theme_nephilamobile');
    $description = get_string('skypedesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
 
    // VKontakte url setting.
    $name = 'theme_nephilamobile/vk';
    $title = get_string('vk', 'theme_nephilamobile');
    $description = get_string('vkdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting); 
    
    $ADMIN->add('theme_nephilamobile', $temp);
    
    $temp = new admin_settingpage('theme_nephilamobile_mobileapps', get_string('mobileappsheading', 'theme_nephilamobile'));
	$temp->add(new admin_setting_heading('theme_nephilamobile_mobileapps', get_string('mobileappsheadingsub', 'theme_nephilamobile'),
            format_text(get_string('mobileappsdesc' , 'theme_nephilamobile'), FORMAT_MARKDOWN)));
    // Android App url setting.
    $name = 'theme_nephilamobile/android';
    $title = get_string('android', 'theme_nephilamobile');
    $description = get_string('androiddesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // iOS App url setting.
    $name = 'theme_nephilamobile/ios';
    $title = get_string('ios', 'theme_nephilamobile');
    $description = get_string('iosdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for iOS Icons
    $name = 'theme_nephilamobile/iosiconinfo';
    $heading = get_string('iosicon', 'theme_nephilamobile');
    $information = get_string('iosicondesc', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // iPhone Icon.
    $name = 'theme_nephilamobile/iphoneicon';
    $title = get_string('iphoneicon', 'theme_nephilamobile');
    $description = get_string('iphoneicondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'iphoneicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // iPhone Retina Icon.
    $name = 'theme_nephilamobile/iphoneretinaicon';
    $title = get_string('iphoneretinaicon', 'theme_nephilamobile');
    $description = get_string('iphoneretinaicondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'iphoneretinaicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // iPad Icon.
    $name = 'theme_nephilamobile/ipadicon';
    $title = get_string('ipadicon', 'theme_nephilamobile');
    $description = get_string('ipadicondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'ipadicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // iPad Retina Icon.
    $name = 'theme_nephilamobile/ipadretinaicon';
    $title = get_string('ipadretinaicon', 'theme_nephilamobile');
    $description = get_string('ipadretinaicondesc', 'theme_nephilamobile');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'ipadretinaicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $ADMIN->add('theme_nephilamobile', $temp);
    
    /* User Alerts */
    $temp = new admin_settingpage('theme_nephilamobile_alerts', get_string('alertsheading', 'theme_nephilamobile'));
	$temp->add(new admin_setting_heading('theme_nephilamobile_alerts', get_string('alertsheadingsub', 'theme_nephilamobile'),
            format_text(get_string('alertsdesc' , 'theme_nephilamobile'), FORMAT_MARKDOWN)));
    
    //This is the descriptor for Alert One
    $name = 'theme_nephilamobile/alert1info';
    $heading = get_string('alert1', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Enable Alert
    $name = 'theme_nephilamobile/enable1alert';
    $title = get_string('enablealert', 'theme_nephilamobile');
    $description = get_string('enablealertdesc', 'theme_nephilamobile');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Type.
    $name = 'theme_nephilamobile/alert1type';
    $title = get_string('alerttype' , 'theme_nephilamobile');
    $description = get_string('alerttypedesc', 'theme_nephilamobile');
    $alert_info = get_string('alert_info', 'theme_nephilamobile');
    $alert_warning = get_string('alert_warning', 'theme_nephilamobile');
    $alert_general = get_string('alert_general', 'theme_nephilamobile');
    $default = 'info';
    $choices = array('info'=>$alert_info, 'error'=>$alert_warning, 'success'=>$alert_general);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Title.
    $name = 'theme_nephilamobile/alert1title';
    $title = get_string('alerttitle', 'theme_nephilamobile');
    $description = get_string('alerttitledesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Text.
    $name = 'theme_nephilamobile/alert1text';
    $title = get_string('alerttext', 'theme_nephilamobile');
    $description = get_string('alerttextdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for Alert Two
    $name = 'theme_nephilamobile/alert2info';
    $heading = get_string('alert2', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Enable Alert
    $name = 'theme_nephilamobile/enable2alert';
    $title = get_string('enablealert', 'theme_nephilamobile');
    $description = get_string('enablealertdesc', 'theme_nephilamobile');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Type.
    $name = 'theme_nephilamobile/alert2type';
    $title = get_string('alerttype' , 'theme_nephilamobile');
    $description = get_string('alerttypedesc', 'theme_nephilamobile');
    $alert_info = get_string('alert_info', 'theme_nephilamobile');
    $alert_warning = get_string('alert_warning', 'theme_nephilamobile');
    $alert_general = get_string('alert_general', 'theme_nephilamobile');
    $default = 'info';
    $choices = array('info'=>$alert_info, 'error'=>$alert_warning, 'success'=>$alert_general);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Title.
    $name = 'theme_nephilamobile/alert2title';
    $title = get_string('alerttitle', 'theme_nephilamobile');
    $description = get_string('alerttitledesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Text.
    $name = 'theme_nephilamobile/alert2text';
    $title = get_string('alerttext', 'theme_nephilamobile');
    $description = get_string('alerttextdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //This is the descriptor for Alert Three
    $name = 'theme_nephilamobile/alert3info';
    $heading = get_string('alert3', 'theme_nephilamobile');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Enable Alert
    $name = 'theme_nephilamobile/enable3alert';
    $title = get_string('enablealert', 'theme_nephilamobile');
    $description = get_string('enablealertdesc', 'theme_nephilamobile');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Type.
    $name = 'theme_nephilamobile/alert3type';
    $title = get_string('alerttype' , 'theme_nephilamobile');
    $description = get_string('alerttypedesc', 'theme_nephilamobile');
    $alert_info = get_string('alert_info', 'theme_nephilamobile');
    $alert_warning = get_string('alert_warning', 'theme_nephilamobile');
    $alert_general = get_string('alert_general', 'theme_nephilamobile');
    $default = 'info';
    $choices = array('info'=>$alert_info, 'error'=>$alert_warning, 'success'=>$alert_general);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Title.
    $name = 'theme_nephilamobile/alert3title';
    $title = get_string('alerttitle', 'theme_nephilamobile');
    $description = get_string('alerttitledesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Alert Text.
    $name = 'theme_nephilamobile/alert3text';
    $title = get_string('alerttext', 'theme_nephilamobile');
    $description = get_string('alerttextdesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
            
    
    $ADMIN->add('theme_nephilamobile', $temp);
    
    /* Analytics Settings */
    $temp = new admin_settingpage('theme_nephilamobile_analytics', get_string('analyticsheading', 'theme_nephilamobile'));
	$temp->add(new admin_setting_heading('theme_nephilamobile_analytics', get_string('analyticsheadingsub', 'theme_nephilamobile'),
            format_text(get_string('analyticsdesc' , 'theme_nephilamobile'), FORMAT_MARKDOWN)));
    
    // Enable Analytics
    $name = 'theme_nephilamobile/useanalytics';
    $title = get_string('useanalytics', 'theme_nephilamobile');
    $description = get_string('useanalyticsdesc', 'theme_nephilamobile');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Google Analytics ID
    $name = 'theme_nephilamobile/analyticsid';
    $title = get_string('analyticsid', 'theme_nephilamobile');
    $description = get_string('analyticsiddesc', 'theme_nephilamobile');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Clean Analytics URL
    $name = 'theme_nephilamobile/analyticsclean';
    $title = get_string('analyticsclean', 'theme_nephilamobile');
    $description = get_string('analyticscleandesc', 'theme_nephilamobile');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
        
    $ADMIN->add('theme_nephilamobile', $temp);

