global $USER, $COURSE, $PAGE;
	$profile = $USER->profile;
	$schoolrole = $profile['schoolrole'];
	    
		 if($schoolrole != 'schoolad'){   	
		    	$hasdisplaymycourses = (empty($this->page->theme->settings->displaymycourses)) ? false : $this->page->theme->settings->displaymycourses;
		        if (isloggedin() && !isguestuser() && $hasdisplaymycourses) {
		        	$mycoursetitle = $this->page->theme->settings->mycoursetitle;
		            if ($mycoursetitle == 'module') {
						$branchtitle = get_string('mymodules', 'theme_nephila');
					} else if ($mycoursetitle == 'unit') {
						$branchtitle = get_string('myunits', 'theme_nephila');
					} else if ($mycoursetitle == 'class') {
						$branchtitle = get_string('myclasses', 'theme_nephila');
					} else {
						$branchtitle = get_string('mycourses', 'theme_nephila');
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
		                $noenrolments = get_string('noenrolments', 'theme_nephila');
		 				$branch->add('<em>'.$noenrolments.'</em>', new moodle_url('/'), $noenrolments);
		 			}
		            
		        }
        }else if($schoolrole == 'schoolad'){
             
		            $branchlabel = '<i class="fa fa-bullhorn"></i> '.get_string('adminannouncement', 'theme_nephila');
		            $branchurl   = new moodle_url('/admin/settings.php', array('section'=>'theme_nephila_slideshow'));
		            $branchtitle = get_string('adminannouncement', 'theme_nephila');
		            $branchsort  = -100000;
		 
		            $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);	
		            
		            $branchlabel = '<i class="fa fa-film"></i> '.get_string('adminnews', 'theme_nephila');
		            $branchurl   = new moodle_url('/mod/forum/view.php', array('id'=> 23));
		            $branchtitle = get_string('adminnews', 'theme_nephila');
		            $branchsort  = -1000;
		 
		            $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);	   
        }
       
        $hasdisplaymydashboard = (empty($this->page->theme->settings->displaymydashboard)) ? false : $this->page->theme->settings->displaymydashboard;
        if (isloggedin() && !isguestuser() && $hasdisplaymydashboard) {

            $branchlabel = '<i class="fa fa-dashboard"></i>'.get_string('mydashboard', 'theme_nephila');
            $branchurl   = new moodle_url('/my/index.php');
            $branchtitle = get_string('mydashboard', 'theme_nephila');
            $branchsort  = -1000000;
 	    $varsession=sesskey();
			
         $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
 			$branch->add('<em><i class="fa fa-user"></i>'.get_string('profile').'</em>',new moodle_url('/user/profile.php'),get_string('profile'));
		
 			$branch->add('<em><i class="fa fa-calendar"></i>'.get_string('pluginname', 'block_calendar_month').'</em>',new moodle_url('/calendar/view.php'),get_string('pluginname', 'block_calendar_month'));
 			$branch->add('<em><i class="fa fa-envelope"></i>'.get_string('pluginname', 'block_messages').'</em>',new moodle_url('/message/index.php'),get_string('pluginname', 'block_messages'));
			if($schoolrole == 'student'){ 			
 			$branch->add('<em><i class="fa fa-certificate"></i>'.get_string('badges').'</em>',new moodle_url('/badges/mybadges.php', array('myid' => 'mybadges')),get_string('badges'));
			} 			
 			$branch->add('<em><i class="fa fa-file"></i>'.get_string('privatefiles', 'theme_nephila').'</em>',new moodle_url('/user/files.php'),get_string('privatefiles', 'block_private_files'));
 			$branch->add('<em><i class="fa fa-sign-out"></i>'.get_string('logout').'</em>',new moodle_url('/login/logout.php',array('sesskey'=>$varsession)),get_string('logout'));  


	
	if($schoolrole == 'cleteacher') {
		
		
		
			    $branchlabel = '<i class="fa fa-trophy"></i> Badges';
		       $branchurl   = new moodle_url('');
		       $branchtitle = get_string('badges', 'theme_nephila');
		       $branchsort  = 100000;
			
			    $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
			    $branch->add('<em><i class="fa fa-sign-in"></i>'.get_string('managebadges', 'theme_nephila').'</em>',new moodle_url('/badges/index.php', array('type' => 2, 'id' => $COURSE->id)),get_string('managebadges', 'theme_nephila'));
		       $branch->add('<em><i class="fa fa-plus-square icon-small"></i>'.get_string('addnewbadge', 'theme_nephila').'</em>',new moodle_url('/badges/newbadge.php', array('type' => 2, 'id' => $COURSE->id)),get_string('addnewbadge', 'theme_nephila'));
			
				 $branchlabel = '<i class="fa fa-question"></i> Question Bank';
		       $branchurl   = new moodle_url('');
		       $branchtitle = get_string('questionbank', 'theme_nephila');
		       $branchsort  = 1000000;
			
			    $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
			    $branch->add('<em><i class="fa fa-question"></i>'.get_string('questions', 'theme_nephila').'</em>',new moodle_url('/question/edit.php', array('courseid' => $COURSE->id)),get_string('questions', 'theme_nephila'));
				 $branch->add('<em><i class="fa fa-bookmark-o"></i>'.get_string('categories', 'theme_nephila').'</em>',new moodle_url('/question/category.php', array('courseid' => $COURSE->id)),get_string('categories', 'theme_nephila'));
				 $branch->add('<em><i class="fa fa-download"></i>'.get_string('import', 'theme_nephila').'</em>',new moodle_url('/question/import.php', array('courseid' => $COURSE->id)),get_string('import', 'theme_nephila'));
				 $branch->add('<em><i class="fa fa-upload"></i>'.get_string('export', 'theme_nephila').'</em>',new moodle_url('/question/export.php', array('courseid' => $COURSE->id)),get_string('export', 'theme_nephila'));	
			
				 $branchlabel = '<i class="fa fa-tasks"></i> Class List';
		       $branchurl   = new moodle_url('/enrol/users.php', array('id' => $COURSE->id));
		       $branchtitle = get_string('classlist', 'theme_nephila');
		       $branchsort  = 10000000;
		       
		       $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
		       
		       $branchlabel = '<i class="fa fa-archive"></i> Reports';
		       $branchurl   = new moodle_url('');
		       $branchtitle = get_string('reports', 'theme_nephila');
		       $branchsort  = 100000000;
		       
		       $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
		       $branch->add('<em><i class="fa fa-file"></i>'.get_string('activitycompletion', 'theme_nephila').'</em>',new moodle_url('/report/progress/index.php', array('course' => $COURSE->id)),get_string('activitycompletion', 'theme_nephila'));
		       $branch->add('<em><i class="fa fa-file"></i>'.get_string('logstoday', 'theme_nephila').'</em>',new moodle_url('/report/log/user.php?', array('id' => $USER->id, 'course' => $COURSE->id, 'mode' => 'today')),get_string('logstoday', 'theme_nephila'));
		       $branch->add('<em><i class="fa fa-file"></i>'.get_string('alllogs', 'theme_nephila').'</em>',new moodle_url('/report/log/user.php?', array('id' => $USER->id, 'course' => $COURSE->id, 'mode' => 'all')),get_string('alllogs', 'theme_nephila'));
		       $branch->add('<em><i class="fa fa-file"></i>'.get_string('sumassessreport', 'theme_nephila').'</em>',new moodle_url('/grade/report/grader/index.php', array('id' => $COURSE->id)),get_string('sumassessreport', 'theme_nephila'));
		       $branch->add('<em><i class="fa fa-file"></i>'.get_string('subassessreport', 'theme_nephila').'</em>',new moodle_url('/grade/report/user/index.php', array('id' => $COURSE->id)),get_string('subassessreport', 'theme_nephila'));
		       
		       $branchlabel = '<i class="fa fa-group"></i> My Learning Wall';
		       $branchurl   = new moodle_url('');
		       $branchtitle = get_string('mylearningwall', 'theme_nephila');
		       $branchsort  = 1000000000;
		       
		       $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
		       
		       $branchlabel = '<i class="fa fa-exclamation-circle"></i> '.get_string('faq', 'theme_nephila');
		       $branchurl   = new moodle_url('/mod/glossary/view.php', array('id' => 146));
		       $branchtitle = get_string('faq', 'theme_nephila');
		       $branchsort  = 10000000000;
		       
		       $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
		
	}
	

        }
 
 
 return $menu;