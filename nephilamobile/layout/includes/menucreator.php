<?php 

?>
<ul class="nav"> 
<?php if($schoolrole == 'usercoursecreator') {?>
	<!-- Users -->
	 <li class="dropdown">
			<a href="" class="dropdown-toggle" data-toggle="dropdown" title="Users">
					<i class="fa fa-user"></i>Users
					<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
					  
					 <!-- Accounts-->
					 <li class="dropdown-submenu">
							<a href=""  title="Assestment Report">
									<i class="fa fa-files-o"></i>Accounts
									
							</a>
							<ul class="dropdown-menu">
								<li><a title="Browse list of users" href="<?php echo $CFG->wwwroot;?>/admin/user.php?>"><i class="fa fa-file"></i>Browse list of users</a></li>
								<li><a title="Bulk users action" href="<?php echo $CFG->wwwroot;?>/admin/user/user_bulk.php"><i class="fa fa-file"></i>Bulk users action</a></li>
								<li><a title="Add new user" href="<?php echo $CFG->wwwroot;?>/user/editadvanced.php?id=-1"><i class="fa fa-file"></i>Add new user</a></li>
								<li><a title="Cohorts" href="<?php echo $CFG->wwwroot;?>/cohort/index.php"><i class="fa fa-file"></i>Cohorts</a></li>
								<li><a title="Upload users" href="<?php echo $CFG->wwwroot;?>/admin/tool/uploaduser/index.php"><i class="fa fa-file"></i>Upload users</a></li>
								<li><a title="Upload users picture" href="<?php echo $CFG->wwwroot;?>/admin/tool/uploaduser/picture.php"><i class="fa fa-file"></i>Upload users picture</a></li>	
							</ul>
					 </li>
					
			</ul>
	 </li>
	 
	 
	<!-- Users -->
	 <li class="dropdown">
			<a href="" class="dropdown-toggle" data-toggle="dropdown" title="Courses">
					<i class="fa fa-clipboard"></i>Courses
					<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">		
								<li><a title="Manage courses and categories" href="<?php echo $CFG->wwwroot;?>/course/"><i class="fa fa-file"></i>Manage courses and categories</a></li>
								<li><a title="Add a category" href="<?php echo $CFG->wwwroot;?>/course/editcategory.php?parent=0"><i class="fa fa-file"></i>Add a category</a></li>
			</ul>
	 </li>

<?php }?>
</ul> 





