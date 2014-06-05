<?php
class theme_nephilamobile_core_renderer extends theme_bootstrapbase_core_renderer {

   /*
	* Sample for logout button only
	*
	*/ 	
	public function nephilamobile_logout(){
		global $USER;
		echo '<a href="'. new moodle_url('/login/logout.php', array('sesskey' => $USER->sesskey)) .'" title="Log Out" style="border: none; padding: 0 5px; margin: 0; font-size: 10pt;"><i class="fa fa-sign-out"></i>Log Out&nbsp;</a>';	
	} 	
	
	public function is_in_frontpage($flag){
		
		$frontpage = $flag;
		if($frontpage == 0){
			return TRUE;
		}else{
			return FALSE;		
		}
	}




 	
 	/*
     * This renders a notification message.
     * Uses bootstrap compatible html.
     */
    public function notification($message, $classes = 'notifyproblem') {
        $message = clean_text($message);
        $type = '';

        if ($classes == 'notifyproblem') {
            $type = 'alert alert-error';
        }
        if ($classes == 'notifysuccess') {
            $type = 'alert alert-success';
        }
        if ($classes == 'notifymessage') {
            $type = 'alert alert-info';
        }
        if ($classes == 'redirectmessage') {
            $type = 'alert alert-block alert-info';
        }
        return "<div class=\"$type\">$message</div>";
    } 
    
    /**
     * Outputs the page's footer
     * @return string HTML fragment
     */
    public function footer() {
        global $CFG, $DB, $USER;

        $output = $this->container_end_all(true);

        $footer = $this->opencontainers->pop('header/footer');

        if (debugging() and $DB and $DB->is_transaction_started()) {
            // TODO: MDL-20625 print warning - transaction will be rolled back
        }

        // Provide some performance info if required
        $performanceinfo = '';
        if (defined('MDL_PERF') || (!empty($CFG->perfdebug) and $CFG->perfdebug > 7)) {
            $perf = get_performance_info();
            if (defined('MDL_PERFTOLOG') && !function_exists('register_shutdown_function')) {
                error_log("PERF: " . $perf['txt']);
            }
            if (defined('MDL_PERFTOFOOT') || debugging() || $CFG->perfdebug > 7) {
                $performanceinfo = nephilamobile_performance_output($perf);
            }
        }

        $footer = str_replace($this->unique_performance_info_token, $performanceinfo, $footer);

        $footer = str_replace($this->unique_end_html_token, $this->page->requires->get_end_code(), $footer);

        $this->page->set_state(moodle_page::STATE_DONE);

        if(!empty($this->page->theme->settings->persistentedit) && property_exists($USER, 'editing') && $USER->editing && !$this->really_editing) {
            $USER->editing = false;
        }

        return $output . $footer;
    }
		
    protected function render_custom_menu(custom_menu $menu) {
    	global $USER, $COURSE, $PAGE, $CFG;
	$profile = $USER->profile;
	$schoolrole = $profile['schoolrole'];
	    
		 if($schoolrole != 'schoolad'){   	
		    	$hasdisplaymycourses = (empty($this->page->theme->settings->displaymycourses)) ? false : $this->page->theme->settings->displaymycourses;
		        if (isloggedin() && !isguestuser() && $hasdisplaymycourses) {
		        	$mycoursetitle = $this->page->theme->settings->mycoursetitle;
		            if ($mycoursetitle == 'module') {
						$branchtitle = get_string('mymodules', 'theme_nephilamobile');
					} else if ($mycoursetitle == 'unit') {
						$branchtitle = get_string('myunits', 'theme_nephilamobile');
					} else if ($mycoursetitle == 'class') {
						$branchtitle = get_string('myclasses', 'theme_nephilamobile');
					} else {
						$branchtitle = get_string('mycourses', 'theme_nephilamobile');
					}
					$branchlabel = '<i class="fa fa-briefcase"></i>'.$branchtitle;
		            $branchurl   = new moodle_url('/my/index.php');
		            $branchsort  = -100000;
		 
		            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
		 			if ($courses = enrol_get_my_courses(NULL, 'fullname ASC')) {
		 				foreach ($courses as $course) {
		 					if ($course->visible){
		 						$branch->add(format_string($course->fullname), new moodle_url('/course/view.php?id='.$course->id), format_string($course->shortname));
		 					}
		 				}
		 			} else {
		                $noenrolments = get_string('noenrolments', 'theme_nephilamobile');
		 				$branch->add('<em>'.$noenrolments.'</em>', new moodle_url('/'), $noenrolments);
		 			}
		            
		        }
        }else if($schoolrole == 'schoolad'){
             
		            $branchlabel = '<i class="fa fa-bullhorn"></i> '.get_string('adminannouncement', 'theme_nephilamobile');
		            $branchurl   = new moodle_url('/admin/settings.php', array('section'=>'theme_nephilamobile_slideshow'));
		            $branchtitle = get_string('adminannouncement', 'theme_nephilamobile');
		            $branchsort  = -100000;
		 
		            $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);	
		            
		            $branchlabel = '<i class="fa fa-film"></i> '.get_string('adminnews', 'theme_nephilamobile');
		            $branchurl   = new moodle_url('/mod/forum/view.php', array('id'=> 23));
		            $branchtitle = get_string('adminnews', 'theme_nephilamobile');
		            $branchsort  = -1000;
		 
		            $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);	   
        }
       
        $hasdisplaymydashboard = (empty($this->page->theme->settings->displaymydashboard)) ? false : $this->page->theme->settings->displaymydashboard;
        if (isloggedin() && !isguestuser() && $hasdisplaymydashboard) {

            $branchlabel = '<i class="fa fa-dashboard"></i>'.get_string('mydashboard', 'theme_nephilamobile');
            $branchurl   = new moodle_url('/my/index.php');
            $branchtitle = get_string('mydashboard', 'theme_nephilamobile');
            $branchsort  = -1000000;
 	    $varsession=sesskey();
			
         $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
 			$branch->add('<em><i class="fa fa-user"></i>'.get_string('profile').'</em>',new moodle_url('/user/profile.php'),get_string('profile'));
		
 			$branch->add('<em><i class="fa fa-calendar"></i>'.get_string('pluginname', 'block_calendar_month').'</em>',new moodle_url('/calendar/view.php'),get_string('pluginname', 'block_calendar_month'));
 			$branch->add('<em><i class="fa fa-envelope"></i>'.get_string('pluginname', 'block_messages').'</em>',new moodle_url('/message/index.php'),get_string('pluginname', 'block_messages'));
			if($schoolrole == 'student'){ 			
 			$branch->add('<em><i class="fa fa-certificate"></i>'.get_string('badges').'</em>',new moodle_url('/badges/mybadges.php', array('myid' => 'mybadges')),get_string('badges'));
			} 			
 			$branch->add('<em><i class="fa fa-file"></i>'.get_string('privatefiles', 'theme_nephilamobile').'</em>',new moodle_url('/user/files.php'),get_string('privatefiles', 'block_private_files'));
 			$branch->add('<em><i class="fa fa-sign-out"></i>'.get_string('logout').'</em>',new moodle_url('/login/logout.php',array('sesskey'=>$varsession)),get_string('logout'));  

			$pagename =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			// echo basename(__FILE__);
				switch($schoolrole) {
					
					case 'cleteacher':
						if($pagename !== $CFG->wwwroot . "/user/profile.php" && 
						$pagename !== $CFG->wwwroot . "/" && 
						$pagename !== $CFG->wwwroot . "/calendar/view.php" && 
						$pagename !== $CFG->wwwroot . "/message/index.php" && 
						$pagename !== $CFG->wwwroot ."/user/files.php" &&
						$pagename !== $CFG->wwwroot . "/question/category.php?courseid=" . $COURSE->id &&
						$pagename !== $CFG->wwwroot . "/question/edit.php?courseid=" . $COURSE->id &&
						$pagename !== $CFG->wwwroot . "/question/import.php?courseid=" . $COURSE->id &&
						$pagename !== $CFG->wwwroot . "/question/export.php?courseid=" . $COURSE->id &&
$pagename !== $CFG->wwwroot . "/badges/index.php?type=2&id=" . $COURSE->id &&
$pagename !== $CFG->wwwroot . "/badges/newbadge.php?type=2&id=" . $COURSE->id &&
$pagename !== $CFG->wwwroot . "/badges/mybadges.php?myid=mybadges" &&
$pagename !== $CFG->wwwroot . "/enrol/users.php?id=" . $COURSE->id &&
$pagename !== $CFG->wwwroot . "/report/progress/index.php?course=" . $COURSE->id &&
$pagename !== $CFG->wwwroot . "/report/log/user.php?id=".$USER->id."&course=".$COURSE->id."&mode=today" &&
$pagename !== $CFG->wwwroot . "/report/log/user.php?id=".$USER->id."&course=".$COURSE->id."&mode=all" &&
$pagename !== $CFG->wwwroot . "/grade/report/grader/index.php?id=".$COURSE->id &&
$pagename !== $CFG->wwwroot . "/grade/report/user/index.php?id=".$COURSE->id &&
$pagename !== $CFG->wwwroot . "/mod/glossary/view.php?id=146"
 ){

						
					    $branchlabel = '<i class="fa fa-list-alt"></i> '. get_string('teachermenu', 'theme_nephilamobile');
				       $branchurl   = new moodle_url('');
				       $branchtitle = get_string('teachermenu', 'theme_nephilamobile');
				       $branchsort  = 100000;
					
					    $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
						
						    $branchlabel = '<i class="fa fa-trophy"></i> Badges';
					       $branchurl   = new moodle_url('');
					       $branchtitle = get_string('badges', 'theme_nephilamobile');
					       $branchsort  = 100000;
					   	 $subBranch = $branch->add($branchlabel, $branchurl, $branchtitle, $branchsort);
						
						    //$branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
						    $subBranch->add('<em><i class="fa fa-sign-in"></i>'.get_string('managebadges', 'theme_nephilamobile').'</em>',new moodle_url('/badges/index.php', array('type' => 2, 'id' => $COURSE->id)),get_string('managebadges', 'theme_nephilamobile'));
					       $subBranch->add('<em><i class="fa fa-plus-square icon-small"></i>'.get_string('addnewbadge', 'theme_nephilamobile').'</em>',new moodle_url('/badges/newbadge.php', array('type' => 2, 'id' => $COURSE->id)),get_string('addnewbadge', 'theme_nephilamobile'));
						
							 $branchlabel = '<i class="fa fa-question"></i> Question Bank';
					       $branchurl   = new moodle_url('');
					       $branchtitle = get_string('questionbank', 'theme_nephilamobile');
					       $branchsort  = 1000000;
						
						    //$branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
						    $subBranch = $branch->add($branchlabel, $branchurl, $branchtitle, $branchsort);
						    $subBranch->add('<em><i class="fa fa-question"></i>'.get_string('questions', 'theme_nephilamobile').'</em>',new moodle_url('/question/edit.php', array('courseid' => $COURSE->id)),get_string('questions', 'theme_nephilamobile'));
							 $subBranch->add('<em><i class="fa fa-bookmark-o"></i>'.get_string('categories', 'theme_nephilamobile').'</em>',new moodle_url('/question/category.php', array('courseid' => $COURSE->id)),get_string('categories', 'theme_nephilamobile'));
							 $subBranch->add('<em><i class="fa fa-download"></i>'.get_string('import', 'theme_nephilamobile').'</em>',new moodle_url('/question/import.php', array('courseid' => $COURSE->id)),get_string('import', 'theme_nephilamobile'));
							 $subBranch->add('<em><i class="fa fa-upload"></i>'.get_string('export', 'theme_nephilamobile').'</em>',new moodle_url('/question/export.php', array('courseid' => $COURSE->id)),get_string('export', 'theme_nephilamobile'));	
						
							 $branchlabel = '<i class="fa fa-tasks"></i> Class List';
					       $branchurl   = new moodle_url('/enrol/users.php', array('id' => $COURSE->id));
					       $branchtitle = get_string('classlist', 'theme_nephilamobile');
					       $branchsort  = 10000000;
					       
					       //$menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       $subBranch = $branch->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       
					       $branchlabel = '<i class="fa fa-archive"></i> Reports';
					       $branchurl   = new moodle_url('');
					       $branchtitle = get_string('reports', 'theme_nephilamobile');
					       $branchsort  = 100000000;
					       
					       //$branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       $subBranch = $branch->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       $subBranch->add('<em><i class="fa fa-file"></i>'.get_string('activitycompletion', 'theme_nephilamobile').'</em>',new moodle_url('/report/progress/index.php', array('course' => $COURSE->id)),get_string('activitycompletion', 'theme_nephilamobile'));
					       $subBranch->add('<em><i class="fa fa-file"></i>'.get_string('logstoday', 'theme_nephilamobile').'</em>',new moodle_url('/report/log/user.php?', array('id' => $USER->id, 'course' => $COURSE->id, 'mode' => 'today')),get_string('logstoday', 'theme_nephilamobile'));
					       $subBranch->add('<em><i class="fa fa-file"></i>'.get_string('alllogs', 'theme_nephilamobile').'</em>',new moodle_url('/report/log/user.php?', array('id' => $USER->id, 'course' => $COURSE->id, 'mode' => 'all')),get_string('alllogs', 'theme_nephilamobile'));
					       $subBranch->add('<em><i class="fa fa-file"></i>'.get_string('sumassessreport', 'theme_nephilamobile').'</em>',new moodle_url('/grade/report/grader/index.php', array('id' => $COURSE->id)),get_string('sumassessreport', 'theme_nephilamobile'));
					       $subBranch->add('<em><i class="fa fa-file"></i>'.get_string('subassessreport', 'theme_nephilamobile').'</em>',new moodle_url('/grade/report/user/index.php', array('id' => $COURSE->id)),get_string('subassessreport', 'theme_nephilamobile'));
					       
					       $branchlabel = '<i class="fa fa-group"></i> My Learning Wall';
					       $branchurl   = new moodle_url('#learningwall');
					       $branchtitle = get_string('mylearningwall', 'theme_nephilamobile');
					       $branchsort  = 1000000000;
					       
					       //$menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       $subBranch = $branch->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       
					       
					       $branchlabel = '<i class="fa fa-exclamation-circle"></i> '.get_string('faq', 'theme_nephilamobile');
					       $branchurl   = new moodle_url('/mod/glossary/view.php', array('id' => 146));
					       $branchtitle = get_string('faq', 'theme_nephilamobile');
					       $branchsort  = 10000000000;
					       
					       //$menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       $subBranch = $branch->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       
					       // echo '</span>';
						}
elseif($pagename !== $CFG->wwwroot . "/user/profile.php" && 
						$pagename !== $CFG->wwwroot. "/" && 
						$pagename !== $CFG->wwwroot ."/calendar/view.php" && 
						$pagename !== $CFG->wwwroot ."/message/index.php" && 
						$pagename !== $CFG->wwwroot ."/user/files.php" ){
$branchlabel = '<i class="fa fa-list-alt"></i> '. get_string('teachermenu', 'theme_nephilamobile');
				       $branchurl   = new moodle_url('');
				       $branchtitle = get_string('teachermenu', 'theme_nephilamobile');
				       $branchsort  = 100000;
					
					    $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
						
						    $branchlabel = '<i class="fa fa-trophy"></i> Badges';
					       $branchurl   = new moodle_url('');
					       $branchtitle = get_string('badges', 'theme_nephilamobile');
					       $branchsort  = 100000;
					   	 $subBranch = $branch->add($branchlabel, $branchurl, $branchtitle, $branchsort);
						
						    //$branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
						    $subBranch->add('<em><i class="fa fa-sign-in"></i>'.get_string('managebadges', 'theme_nephilamobile').'</em>',new moodle_url('/badges/index.php', array('type' => 2, 'id' => $COURSE->id)),get_string('managebadges', 'theme_nephilamobile'));
					       $subBranch->add('<em><i class="fa fa-plus-square icon-small"></i>'.get_string('addnewbadge', 'theme_nephilamobile').'</em>',new moodle_url('/badges/newbadge.php', array('type' => 2, 'id' => $COURSE->id)),get_string('addnewbadge', 'theme_nephilamobile'));
						
							 $branchlabel = '<i class="fa fa-question"></i> Question Bank';
					       $branchurl   = new moodle_url('');
					       $branchtitle = get_string('questionbank', 'theme_nephilamobile');
					       $branchsort  = 1000000;
						
						    //$branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
						    $subBranch = $branch->add($branchlabel, $branchurl, $branchtitle, $branchsort);
						    $subBranch->add('<em><i class="fa fa-question"></i>'.get_string('questions', 'theme_nephilamobile').'</em>',new moodle_url('/question/edit.php', array('courseid' => $COURSE->id)),get_string('questions', 'theme_nephilamobile'));
							 $subBranch->add('<em><i class="fa fa-bookmark-o"></i>'.get_string('categories', 'theme_nephilamobile').'</em>',new moodle_url('/question/category.php', array('courseid' => $COURSE->id)),get_string('categories', 'theme_nephilamobile'));
							 $subBranch->add('<em><i class="fa fa-download"></i>'.get_string('import', 'theme_nephilamobile').'</em>',new moodle_url('/question/import.php', array('courseid' => $COURSE->id)),get_string('import', 'theme_nephilamobile'));
							 $subBranch->add('<em><i class="fa fa-upload"></i>'.get_string('export', 'theme_nephilamobile').'</em>',new moodle_url('/question/export.php', array('courseid' => $COURSE->id)),get_string('export', 'theme_nephilamobile'));	
						 $branchlabel = '<i class="fa fa-archive"></i> Reports';
					       $branchurl   = new moodle_url('');
					       $branchtitle = get_string('reports', 'theme_nephilamobile');
					       $branchsort  = 100000000;
					       $subBranch = $branch->add($branchlabel, $branchurl, $branchtitle, $branchsort);
						
					       //$menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       
					       
					      
					       //$branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       //$subBranch = $branch->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       $subBranch->add('<em><i class="fa fa-file"></i>'.get_string('activitycompletion', 'theme_nephilamobile').'</em>',new moodle_url('/report/progress/index.php', array('course' => $COURSE->id)),get_string('activitycompletion', 'theme_nephilamobile'));
					       $subBranch->add('<em><i class="fa fa-file"></i>'.get_string('logstoday', 'theme_nephilamobile').'</em>',new moodle_url('/report/log/user.php?', array('id' => $USER->id, 'course' => $COURSE->id, 'mode' => 'today')),get_string('logstoday', 'theme_nephilamobile'));
					       $subBranch->add('<em><i class="fa fa-file"></i>'.get_string('alllogs', 'theme_nephilamobile').'</em>',new moodle_url('/report/log/user.php?', array('id' => $USER->id, 'course' => $COURSE->id, 'mode' => 'all')),get_string('alllogs', 'theme_nephilamobile'));
					       $subBranch->add('<em><i class="fa fa-file"></i>'.get_string('sumassessreport', 'theme_nephilamobile').'</em>',new moodle_url('/grade/report/grader/index.php', array('id' => $COURSE->id)),get_string('sumassessreport', 'theme_nephilamobile'));
					       $subBranch->add('<em><i class="fa fa-file"></i>'.get_string('subassessreport', 'theme_nephilamobile').'</em>',new moodle_url('/grade/report/user/index.php', array('id' => $COURSE->id)),get_string('subassessreport', 'theme_nephilamobile'));
					       	 $branchlabel = '<i class="fa fa-tasks"></i> Class List';
					       $branchurl   = new moodle_url('/enrol/users.php', array('id' => $COURSE->id));
					       $branchtitle = get_string('classlist', 'theme_nephilamobile');
					       $branchsort  = 10000000;
					       
					       /*$branchlabel = '<i class="fa fa-group"></i> My Learning Wall';
					       $branchurl   = new moodle_url('#learningwall');
					       $branchtitle = get_string('mylearningwall', 'theme_nephilamobile');
					       $branchsort  = 1000000000;*/
					       
					       //$menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       $subBranch = $branch->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       
					       
					       $branchlabel = '<i class="fa fa-exclamation-circle"></i> '.get_string('faq', 'theme_nephilamobile');
					       $branchurl   = new moodle_url('/mod/glossary/view.php', array('id' => 146));
					       $branchtitle = get_string('faq', 'theme_nephilamobile');
					       $branchsort  = 10000000000;
					       
					       //$menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       $subBranch = $branch->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       
					       // echo '</span>';
						}

					break;
					
					case 'student':
						if($pagename !== $CFG->wwwroot. "/user/profile.php" && 
						$pagename !== $CFG->wwwroot. "/" && 
						$pagename !== $CFG->wwwroot. "/calendar/view.php" && 
						$pagename !== $CFG->wwwroot. "/message/index.php" && 
						$pagename !== $CFG->wwwroot . "/user/files.php" &&
						$pagename !== $CFG->wwwroot . "/badges/view.php?type=2&id=".$COURSE->id &&
						$pagename !== $CFG->wwwroot . "/badges/mybadges.php?myid=mybadges" && 
						$pagename !== $CFG->wwwroot . "/grade/report/user/index.php?id=".$COURSE->id &&
						$pagename !== $CFG->wwwroot . "/grade/report/overview/index.php?id=".$COURSE->id &&
						$pagename !== $CFG->wwwroot . "/badges/mybadges.php?myid=mybadges"){
							 $branchlabel = '<i class="fa fa-list-alt"></i> '. get_string('teachermenu', 'theme_nephilamobile');;
					       $branchurl   = new moodle_url('');
					       $branchtitle = get_string('studentmenu', 'theme_nephilamobile');
					       $branchsort  = 100000;
						
						    $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
							 //$branchSubMenu =$branch->add( '<i class="fa fa-files-o"></i> My Achievements');
							 $branch->add('<em><i class="fa fa-files-o"></i>'.get_string('mylearningwall', 'theme_nephilamobile').'</em>',new moodle_url('#learningwall', array('type' => 2, 'id' => $COURSE->id)),get_string('mylearningwall', 'theme_nephilamobile'));
							 $branch->add('<em><i class="fa fa-trophy"></i>'.get_string('badges', 'theme_nephilamobile').'</em>',new moodle_url('/badges/view.php', array('type' => 2, 'id' => $COURSE->id)),get_string('badges', 'theme_nephilamobile'));
					       
					       $branchSubMenu = $branch->add('<em><i class="fa fa-files-o"></i>'.get_string('assessmtreport', 'theme_nephilamobile').'</em>',new moodle_url(''),get_string('assessmtreport', 'theme_nephilamobile'));
					       $branchSubMenu->add('<em><i class="fa fa-file"></i>'.get_string('sumassess', 'theme_nephilamobile').'</em>',new moodle_url('/grade/report/user/index.php', array('id' => $COURSE->id)),get_string('sumassess', 'theme_nephilamobile'));
					       $branchSubMenu->add('<em><i class="fa fa-file"></i>'.get_string('subsumassess', 'theme_nephilamobile').'</em>',new moodle_url('/grade/report/overview/index.php', array('id' => $COURSE->id)),get_string('subsumassess', 'theme_nephilamobile'));
							   
						}
elseif($pagename !== $CFG->wwwroot. "/user/profile.php" && 
						$pagename !== $CFG->wwwroot. "/" && 
						$pagename !== $CFG->wwwroot. "/calendar/view.php" && 
						$pagename !== $CFG->wwwroot. "/message/index.php" && 
						$pagename !== $CFG->wwwroot . "/user/files.php" ){
				 $branchlabel = '<i class="fa fa-list-alt"></i> '. get_string('teachermenu', 'theme_nephilamobile');;
					       $branchurl   = new moodle_url('');
					       $branchtitle = get_string('studentmenu', 'theme_nephilamobile');
					       $branchsort  = 100000;
						
						    $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
							 //$branchSubMenu =$branch->add( '<i class="fa fa-files-o"></i> My Achievements');
							 //$branch->add('<em><i class="fa fa-files-o"></i>'.get_string('mylearningwall', 'theme_nephilamobile').'</em>',new moodle_url('#learningwall', array('type' => 2, 'id' => $COURSE->id)),get_string('mylearningwall', 'theme_nephilamobile'));
							 $branch->add('<em><i class="fa fa-trophy"></i>'.get_string('badges', 'theme_nephilamobile').'</em>',new moodle_url('/badges/view.php', array('type' => 2, 'id' => $COURSE->id)),get_string('badges', 'theme_nephilamobile'));
					       
					       $branchSubMenu = $branch->add('<em><i class="fa fa-files-o"></i>'.get_string('assessmtreport', 'theme_nephilamobile').'</em>',new moodle_url(''),get_string('assessmtreport', 'theme_nephilamobile'));
					       $branchSubMenu->add('<em><i class="fa fa-file"></i>'.get_string('sumassess', 'theme_nephilamobile').'</em>',new moodle_url('/grade/report/user/index.php', array('id' => $COURSE->id)),get_string('sumassess', 'theme_nephilamobile'));
					       $branchSubMenu->add('<em><i class="fa fa-file"></i>'.get_string('subsumassess', 'theme_nephilamobile').'</em>',new moodle_url('/grade/report/overview/index.php', array('id' => $COURSE->id)),get_string('subsumassess', 'theme_nephilamobile'));
}
					break;
					
					case 'usercoursecreator':
							 $branchlabel = '<i class="fa fa-user"></i> Users';
					       $branchurl   = new moodle_url('');
					       $branchtitle = get_string('users', 'theme_nephilamobile');
					       $branchsort  = 100000;
						
						    $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
						    $branchSubMenu = $branch->add('<em><i class="fa fa-files-o"></i>'.get_string('accounts', 'theme_nephilamobile').'</em>',new moodle_url(''),get_string('accounts', 'theme_nephilamobile'));
						    $branchSubMenu->add('<em><i class="fa fa-file"></i>'.get_string('browselistofusers', 'theme_nephilamobile').'</em>',new moodle_url('/admin/user.php'),get_string('browselistofusers', 'theme_nephilamobile'));
						    $branchSubMenu->add('<em><i class="fa fa-file"></i>'.get_string('bulkuseraction', 'theme_nephilamobile').'</em>',new moodle_url('/admin/user/user_bulk.php'),get_string('bulkuseraction', 'theme_nephilamobile'));
						    $branchSubMenu->add('<em><i class="fa fa-file"></i>'.get_string('addnewusers', 'theme_nephilamobile').'</em>',new moodle_url('/user/editadvanced.php', array('id' => -1)),get_string('addnewusers', 'theme_nephilamobile'));
						    $branchSubMenu->add('<em><i class="fa fa-file"></i>'.get_string('cohorts', 'theme_nephilamobile').'</em>',new moodle_url('/cohort/index.php'),get_string('cohorts', 'theme_nephilamobile'));
						    $branchSubMenu->add('<em><i class="fa fa-file"></i>'.get_string('uploadusers', 'theme_nephilamobile').'</em>',new moodle_url('/admin/tool/uploaduser/index.php'),get_string('uploadusers', 'theme_nephilamobile'));
						    $branchSubMenu->add('<em><i class="fa fa-file"></i>'.get_string('uploaduserspicture', 'theme_nephilamobile').'</em>',new moodle_url('/admin/tool/uploaduser/picture.php'),get_string('uploaduserspicture', 'theme_nephilamobile'));
						    
						    $branchlabel = '<i class="fa fa-clipboard"></i> Courses';
					       $branchurl   = new moodle_url('');
					       $branchtitle = get_string('courses', 'theme_nephilamobile');
					       $branchsort  = 1000000;
					       
					       $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
					       $branch->add('<em><i class="fa fa-file"></i>'.get_string('managecoursesandcategories', 'theme_nephilamobile').'</em>',new moodle_url('/course/'),get_string('managecoursesandcategories', 'theme_nephilamobile'));
					       $branch->add('<em><i class="fa fa-file"></i>'.get_string('addacategory', 'theme_nephilamobile').'</em>',new moodle_url('/course/editcategory.php', array('parent' => 0)),get_string('addacategory', 'theme_nephilamobile'));
					 
					break;
				}
				
							 //$branchlabel = '<i class="fa fa-sign-out"></i> Logout';
					       //$branchurl   = new moodle_url('/login/logout.php', array('sesskey' => $USER->sesskey));
					       //$branchtitle = get_string('logout', 'theme_nephilamobile');
					       //$branchsort  = 100000;
						
						    //$branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
        }
 
        return parent::render_custom_menu($menu);
    }


   
    /**
    * Get the HTML for blocks in the given region.
    *
    * @since 2.5.1 2.6
    * @param string $region The region to get HTML for.
    * @return string HTML.
    * Written by G J Barnard
    */
    
    public function nephilablocks($region, $classes = array(), $tag = 'aside') {
        $classes = (array)$classes;
        $classes[] = 'block-region';
        $attributes = array(
            'id' => 'block-region-'.preg_replace('#[^a-zA-Z0-9_\-]+#', '-', $region),
            'class' => join(' ', $classes),
            'data-blockregion' => $region,
            'data-droptarget' => '1'
        );
        return html_writer::tag($tag, $this->blocks_for_region($region), $attributes);
    }
    
    /**
    * Returns HTML to display a "Turn editing on/off" button in a form.
    *
    * @param moodle_url $url The URL + params to send through when clicking the button
    * @return string HTML the button
    * Written by G J Barnard
    */
    
    public function edit_button(moodle_url $url) {
        $url->param('sesskey', sesskey());    
        if ($this->page->user_is_editing()) {
            $url->param('edit', 'off');
            $btn = 'btn-danger';
            $title = get_string('turneditingoff');
            $icon = 'fa-power-off';
        } else {
            $url->param('edit', 'on');
            $btn = 'btn-success';
            $title = get_string('turneditingon');
            $icon = 'fa-edit';
        }
        return html_writer::tag('a', html_writer::start_tag('i', array('class' => $icon.' fa fa-fw')).
               html_writer::end_tag('i'), array('href' => $url, 'class' => 'btn '.$btn, 'title' => $title));
    }
}


include_once($CFG->dirroot . "/course/format/topics/renderer.php");
 
class theme_nephilamobile_format_topics_renderer extends format_topics_renderer {
    
    protected function get_nav_links($course, $sections, $sectionno) {
        // FIXME: This is really evil and should by using the navigation API.
        $course = course_get_format($course)->get_course();
        $previousarrow= '<i class="fa fa-chevron-circle-left"></i>';
        $nextarrow= '<i class="fa fa-chevron-circle-right"></i>';
        $canviewhidden = has_capability('moodle/course:viewhiddensections', context_course::instance($course->id))
            or !$course->hiddensections;

        $links = array('previous' => '', 'next' => '');
        $back = $sectionno - 1;
        while ($back > 0 and empty($links['previous'])) {
            if ($canviewhidden || $sections[$back]->uservisible) {
                $params = array('id' => 'previous_section');
                if (!$sections[$back]->visible) {
                    $params = array('class' => 'dimmed_text');
                }
                $previouslink = html_writer::start_tag('div', array('class' => 'nav_icon'));
                $previouslink .= $previousarrow;
                $previouslink .= html_writer::end_tag('div');
                $previouslink .= html_writer::start_tag('span', array('class' => 'text'));
                $previouslink .= html_writer::start_tag('span', array('class' => 'nav_guide'));
                $previouslink .= get_string('previoussection', 'theme_nephilamobile');
                $previouslink .= html_writer::end_tag('span');
                $previouslink .= html_writer::empty_tag('br');
                $previouslink .= get_section_name($course, $sections[$back]);
                $previouslink .= html_writer::end_tag('span');
                $links['previous'] = html_writer::link(course_get_url($course, $back), $previouslink, $params);
            }
            $back--;
        }

        $forward = $sectionno + 1;
        while ($forward <= $course->numsections and empty($links['next'])) {
            if ($canviewhidden || $sections[$forward]->uservisible) {
                $params = array('id' => 'next_section');
                if (!$sections[$forward]->visible) {
                    $params = array('class' => 'dimmed_text');
                }
                $nextlink = html_writer::start_tag('div', array('class' => 'nav_icon'));
                $nextlink .= $nextarrow;
                $nextlink .= html_writer::end_tag('div');
                $nextlink .= html_writer::start_tag('span', array('class' => 'text'));
                $nextlink .= html_writer::start_tag('span', array('class' => 'nav_guide'));
                $nextlink .= get_string('nextsection', 'theme_nephilamobile');
                $nextlink .= html_writer::end_tag('span');
                $nextlink .= html_writer::empty_tag('br');
                $nextlink .= get_section_name($course, $sections[$forward]);
                $nextlink .= html_writer::end_tag('span');
                $links['next'] = html_writer::link(course_get_url($course, $forward), $nextlink, $params);
            }
            $forward++;
        }

        return $links;
    }
    
    public function print_single_section_page($course, $sections, $mods, $modnames, $modnamesused, $displaysection) {
        global $PAGE;

        $modinfo = get_fast_modinfo($course);
        $course = course_get_format($course)->get_course();

        // Can we view the section in question?
        if (!($sectioninfo = $modinfo->get_section_info($displaysection))) {
            // This section doesn't exist
            print_error('unknowncoursesection', 'error', null, $course->fullname);
            return;
        }

        if (!$sectioninfo->uservisible) {
            if (!$course->hiddensections) {
                echo $this->start_section_list();
                echo $this->section_hidden($displaysection);
                echo $this->end_section_list();
            }
            // Can't view this section.
            return;
        }

        // Copy activity clipboard..
        echo $this->course_activity_clipboard($course, $displaysection);
        $thissection = $modinfo->get_section_info(0);
        if ($thissection->summary or !empty($modinfo->sections[0]) or $PAGE->user_is_editing()) {
            echo $this->start_section_list();
            echo $this->section_header($thissection, $course, true, $displaysection);
            echo $this->courserenderer->course_section_cm_list($course, $thissection, $displaysection);
            echo $this->courserenderer->course_section_add_cm_control($course, 0, $displaysection);
            echo $this->section_footer();
            echo $this->end_section_list();
        }

        // Start single-section div
        echo html_writer::start_tag('div', array('class' => 'single-section'));

        // The requested section page.
        $thissection = $modinfo->get_section_info($displaysection);

        // Title with section navigation links.
        $sectionnavlinks = $this->get_nav_links($course, $modinfo->get_section_info_all(), $displaysection);
        $sectiontitle = '';
        $sectiontitle .= html_writer::start_tag('div', array('class' => 'section-navigation header headingblock'));
        // Title attributes
        $titleattr = 'mdl-align title';
        if (!$thissection->visible) {
            $titleattr .= ' dimmed_text';
        }
        $sectiontitle .= html_writer::tag('div', get_section_name($course, $displaysection), array('class' => $titleattr));
        $sectiontitle .= html_writer::end_tag('div');
        echo $sectiontitle;

        // Now the list of sections..
        echo $this->start_section_list();

        echo $this->section_header($thissection, $course, true, $displaysection);
        // Show completion help icon.
        $completioninfo = new completion_info($course);
        echo $completioninfo->display_help_icon();

        echo $this->courserenderer->course_section_cm_list($course, $thissection, $displaysection);
        echo $this->courserenderer->course_section_add_cm_control($course, $displaysection, $displaysection);
        echo $this->section_footer();
        echo $this->end_section_list();

        // Display section bottom navigation.
        $sectionbottomnav = '';
        $sectionbottomnav .= html_writer::start_tag('nav', array('id' => 'section_footer'));
        $sectionbottomnav .= $sectionnavlinks['previous']; 
        $sectionbottomnav .= $sectionnavlinks['next']; 
        // $sectionbottomnav .= html_writer::tag('div', $this->section_nav_selection($course, $sections, $displaysection), array('class' => 'mdl-align'));
        $sectionbottomnav .= html_writer::empty_tag('br', array('style'=>'clear:both'));
        $sectionbottomnav .= html_writer::end_tag('nav');
        echo $sectionbottomnav;

        // Close single-section div.
        echo html_writer::end_tag('div');
    }

}


