<style>
div.studroom{
width:24%;
height:131px;
border:1px solid transparent;
float:left;
}

div.studroom img{
 

</style>

<div class="" id="middle-blocks">
    <div class="span8">
      <div style="width:100%; height:396px; background-color:#fff; background-image:url('<?php echo $CFG->wwwroot?>/studyroom/studyroom.png'); margin-left:auto; margin-right:auto">

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
            <p align="right"><a href="<?php echo $PAGE->theme->settings->marketing2buttonurl ?>" id="button"><?php echo $PAGE->theme->settings->marketing2buttontext ?></a></p>
        </div>
    </div>
    
    
</div>
