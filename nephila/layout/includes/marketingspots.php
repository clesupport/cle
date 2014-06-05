<style>
div.studroom{
width:24%;
height:131px;
border:1px solid transparent;
float:left;
}



</style>

<div class="" id="middle-blocks">
    <div class="span8">
     <div id="studyroom" class="bg" style="background-image: url(<?php echo $CFG->wwwroot;?>/studyroom/Background1.png);">
     		
			<div id="studleft" class="left">
			</div>
			<div class="center">
					<div class="profile">
					<a href="<?php echo $CFG->wwwroot;?>/user/profile.php">	<img src="<?php echo $CFG->wwwroot;?>/studyroom/Profile.png" class="imgProfile" alt="" title="Profile">
					</div>
					
					<div class="calendar">
					<a href="<?php echo $CFG->wwwroot;?>/calendar/view.php">	<img src="<?php echo $CFG->wwwroot;?>/studyroom/Calendar.png" class="imgCalendar" alt="" title="Calendar" >
					</div>
					
					<div class="badges">
					<a href="<?php echo $CFG->wwwroot;?>/badges/mybadges.php">	<img src="<?php echo $CFG->wwwroot;?>/studyroom/Badges.png" class="imgBadges" alt="" title="Badges" ></a>
					</div>
					
					<div class="space1">
					</div>
					
					<div class="space2">
					</div>
					<div class="files">
					<a href="<?php echo $CFG->wwwroot;?>/user/files.php">	<img src="<?php echo $CFG->wwwroot;?>/studyroom/Files.png" class="imgFiles" alt="" title="My Files"> </a>
					</div>
			</div>
			<div id="studright" class="right">
				<div class="space4">
				</div>
				<div class="messages">
				<a href="<?php echo $CFG->wwwroot;?>/message/index.php">	<img src="<?php echo $CFG->wwwroot;?>/studyroom/Messages.png" class="imgMessages" alt="" title="Messages"> </a>
				</div>
			</div>
		</div> 
    </div>
    
    <div class="span4">
        <!-- Advert #2 -->
        <div class="service">
            <!-- Icon & title. Font Awesome icon used. -->
            <h5><span><i class="fa fa-<?php echo $PAGE->theme->settings->marketing2icon ?>"></i> <?php echo $PAGE->theme->settings->marketing2 ?></span></h5>
            <?php if ($hasmarketing2image) { ?>
            	<div class="marketing-image2"></div>
            <?php } ?>
            
            <?php echo $PAGE->theme->settings->marketing2content ?>
            <!-- <p align="right"><a href="<?php echo $PAGE->theme->settings->marketing2buttonurl ?>" id="button"><?php echo $PAGE->theme->settings->marketing2buttontext ?></a></p> -->
        </div>
    </div>
    
    
</div>
