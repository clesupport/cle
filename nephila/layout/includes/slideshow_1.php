<?php 
    if ($hasslideshow && !strpos($checkuseragent, 'MSIE 7')) { // Hide slideshow for IE7
?>
    <div id="da-slider" class="da-slider <?php echo $hideonphone ?>" style="background-position: 8650% 0%;">

    <?php if ($hasslide1) { ?>
        <div class="da-slide">
            <h2><?php echo $slide1 ?></h2>
            <?php if ($hasslide1caption) { ?>
                <p><?php echo $slide1caption ?></p>
            <?php } ?>
            <?php if ($hasslide1url) { ?>
                <a href="<?php echo $slide1url ?>" class="da-link"><?php echo get_string('readmore','theme_nephila')?></a>
            <?php } ?>
            <?php if ($hasslide1image) { ?>
            <div class="da-img"><img src="<?php echo $slide1image ?>" alt="<?php echo $slide1 ?>"></div>
            <?php } ?>
        </div>
    <?php } ?>
    

    <?php if ($hasslide2) { ?>
        <div class="da-slide">
            <h2><?php echo $slide2 ?></h2>
            <?php if ($hasslide2caption) { ?>
                <p><?php echo $slide2caption ?></p>
            <?php } ?>
            <?php if ($hasslide2url) { ?>
                <a href="<?php echo $slide2url ?>" class="da-link"><?php echo get_string('readmore','theme_nephila')?></a>
            <?php } ?>
            <?php if ($hasslide2image) { ?>
            <div class="da-img"><img src="<?php echo $slide2image ?>" alt="<?php echo $slide2 ?>"></div>
            <?php } ?>
        </div>
    <?php } ?>
    

    <?php if ($hasslide3) { ?>
        <div class="da-slide">
            <h2><?php echo $slide3 ?></h2>
            <?php if ($hasslide3caption) { ?>
                <p><?php echo $slide3caption ?></p>
            <?php } ?>
            <?php if ($hasslide3url) { ?>
                <a href="<?php echo $slide3url ?>" class="da-link"><?php echo get_string('readmore','theme_nephila')?></a>
            <?php } ?>
            <?php if ($hasslide3image) { ?>
            <div class="da-img"><img src="<?php echo $slide3image ?>" alt="<?php echo $slide3 ?>"></div>
            <?php } ?>
        </div>
    <?php } ?>
    

    <?php if ($hasslide4) { ?>
        <div class="da-slide">
            <h2><?php echo $slide4 ?></h2>
            <?php if ($hasslide4caption) { ?>
                <p><?php echo $slide4caption ?></p>
            <?php } ?>
            <?php if ($hasslide4url) { ?>
                <a href="<?php echo $slide4url ?>" class="da-link"><?php echo get_string('readmore','theme_nephila')?></a>
            <?php } ?>
            <?php if ($hasslide4image) { ?>
            <div class="da-img"><img src="<?php echo $slide4image ?>" alt="<?php echo $slide4 ?>"></div>
            <?php } ?>
        </div>
        
    <?php } ?>
    
    <?php 
			$hasslide5 = (!empty($PAGE->theme->settings->slide5));
			$hasslide5image = (!empty($PAGE->theme->settings->slide5image));
			$hasslide5caption = (!empty($PAGE->theme->settings->slide5caption));
			$hasslide5url = (!empty($PAGE->theme->settings->slide5url));
			
			 /* slide5 settings */
			if ($hasslide5) {
			    $slide5 = $PAGE->theme->settings->slide5;
			}
			if ($hasslide5image) {
			    $slide5image = $PAGE->theme->setting_file_url('slide5image', 'slide5image');
			}
			if ($hasslide5caption) {
			    $slide5caption = $PAGE->theme->settings->slide5caption;
			}
			if ($hasslide5url) {
			    $slide5url = $PAGE->theme->settings->slide5url;
			}
			
			$hasslide6 = (!empty($PAGE->theme->settings->slide6));
			$hasslide6image = (!empty($PAGE->theme->settings->slide6image));
			$hasslide6caption = (!empty($PAGE->theme->settings->slide6caption));
			$hasslide6url = (!empty($PAGE->theme->settings->slide6url));
			
			 /* slide6 settings */
			if ($hasslide6) {
			    $slide6 = $PAGE->theme->settings->slide6;
			}
			if ($hasslide6image) {
			    $slide6image = $PAGE->theme->setting_file_url('slide6image', 'slide6image');
			}
			if ($hasslide6caption) {
			    $slide6caption = $PAGE->theme->settings->slide6caption;
			}
			if ($hasslide6url) {
			    $slide6url = $PAGE->theme->settings->slide6url;
			}
			
			$hasslide7 = (!empty($PAGE->theme->settings->slide7));
			$hasslide7image = (!empty($PAGE->theme->settings->slide7image));
			$hasslide7caption = (!empty($PAGE->theme->settings->slide7caption));
			$hasslide7url = (!empty($PAGE->theme->settings->slide7url));
			
			 /* slide7 settings */
			if ($hasslide7) {
			    $slide7 = $PAGE->theme->settings->slide7;
			}
			if ($hasslide7image) {
			    $slide7image = $PAGE->theme->setting_file_url('slide7image', 'slide7image');
			}
			if ($hasslide7caption) {
			    $slide7caption = $PAGE->theme->settings->slide7caption;
			}
			if ($hasslide7url) {
			    $slide7url = $PAGE->theme->settings->slide7url;
			}
			
			$hasslide8 = (!empty($PAGE->theme->settings->slide8));
			$hasslide8image = (!empty($PAGE->theme->settings->slide8image));
			$hasslide8caption = (!empty($PAGE->theme->settings->slide8caption));
			$hasslide8url = (!empty($PAGE->theme->settings->slide8url));
			
			 /* slide8 settings */
			if ($hasslide8) {
			    $slide8 = $PAGE->theme->settings->slide8;
			}
			if ($hasslide8image) {
			    $slide8image = $PAGE->theme->setting_file_url('slide8image', 'slide8image');
			}
			if ($hasslide8caption) {
			    $slide8caption = $PAGE->theme->settings->slide8caption;
			}
			if ($hasslide8url) {
			    $slide8url = $PAGE->theme->settings->slide8url;
			}
			
			$hasslide9 = (!empty($PAGE->theme->settings->slide9));
			$hasslide9image = (!empty($PAGE->theme->settings->slide9image));
			$hasslide9caption = (!empty($PAGE->theme->settings->slide9caption));
			$hasslide9url = (!empty($PAGE->theme->settings->slide9url));
			
			 /* slide9 settings */
			if ($hasslide9) {
			    $slide9 = $PAGE->theme->settings->slide9;
			}
			if ($hasslide9image) {
			    $slide9image = $PAGE->theme->setting_file_url('slide9image', 'slide9image');
			}
			if ($hasslide9caption) {
			    $slide9caption = $PAGE->theme->settings->slide9caption;
			}
			if ($hasslide9url) {
			    $slide9url = $PAGE->theme->settings->slide9url;
			}
			
			$hasslide10 = (!empty($PAGE->theme->settings->slide10));
			$hasslide10image = (!empty($PAGE->theme->settings->slide10image));
			$hasslide10caption = (!empty($PAGE->theme->settings->slide10caption));
			$hasslide10url = (!empty($PAGE->theme->settings->slide10url));
			
			 /* slide10 settings */
			if ($hasslide10) {
			    $slide10 = $PAGE->theme->settings->slide10;
			}
			if ($hasslide10image) {
			    $slide10image = $PAGE->theme->setting_file_url('slide10image', 'slide10image');
			}
			if ($hasslide10caption) {
			    $slide10caption = $PAGE->theme->settings->slide10caption;
			}
			if ($hasslide10url) {
			    $slide10url = $PAGE->theme->settings->slide10url;
			}
	?>
	
     <?php if ( $hasslide5 ) { ?>
        <div class="da-slide">
            <h2><?php echo $slide5 ?></h2>
            <?php if ($hasslide5caption) { ?>
                <p><?php echo $slide5caption ?></p>
            <?php } ?>
            <?php if ($hasslide5url) { ?>
                <a href="<?php echo $slide5url ?>" class="da-link"><?php echo get_string('readmore','theme_nephila')?></a>
            <?php } ?>
            <?php if ($hasslide5image) { ?>
            <div class="da-img"><img src="<?php echo $slide5image ?>" alt="<?php echo $slide5 ?>"></div>
            <?php } ?>
        </div>
        
    <?php } ?>
    
    <?php if ( $hasslide6 ) { ?>
        <div class="da-slide">
            <h2><?php echo $slide6 ?></h2>
            <?php if ($hasslide6caption) { ?>
                <p><?php echo $slide6caption ?></p>
            <?php } ?>
            <?php if ($hasslide6url) { ?>
                <a href="<?php echo $slide6url ?>" class="da-link"><?php echo get_string('readmore','theme_nephila')?></a>
            <?php } ?>
            <?php if ($hasslide6image) { ?>
            <div class="da-img"><img src="<?php echo $slide6image ?>" alt="<?php echo $slide6 ?>"></div>
            <?php } ?>
        </div>
        
    <?php } ?>
    
    <?php if ( $hasslide7 ) { ?>
        <div class="da-slide">
            <h2><?php echo $slide7 ?></h2>
            <?php if ($hasslide7caption) { ?>
                <p><?php echo $slide7caption ?></p>
            <?php } ?>
            <?php if ($hasslide7url) { ?>
                <a href="<?php echo $slide7url ?>" class="da-link"><?php echo get_string('readmore','theme_nephila')?></a>
            <?php } ?>
            <?php if ($hasslide7image) { ?>
            <div class="da-img"><img src="<?php echo $slide7image ?>" alt="<?php echo $slide7 ?>"></div>
            <?php } ?>
        </div>
        
    <?php } ?>
    
    <?php if ( $hasslide8 ) { ?>
        <div class="da-slide">
            <h2><?php echo $slide8 ?></h2>
            <?php if ($hasslide8caption) { ?>
                <p><?php echo $slide8caption ?></p>
            <?php } ?>
            <?php if ($hasslide8url) { ?>
                <a href="<?php echo $slide8url ?>" class="da-link"><?php echo get_string('readmore','theme_nephila')?></a>
            <?php } ?>
            <?php if ($hasslide8image) { ?>
            <div class="da-img"><img src="<?php echo $slide8image ?>" alt="<?php echo $slide8 ?>"></div>
            <?php } ?>
        </div>
        
    <?php } ?>
    
     <?php if ( $hasslide9 ) { ?>
        <div class="da-slide">
            <h2><?php echo $slide9 ?></h2>
            <?php if ($hasslide9caption) { ?>
                <p><?php echo $slide9caption ?></p>
            <?php } ?>
            <?php if ($hasslide9url) { ?>
                <a href="<?php echo $slide9url ?>" class="da-link"><?php echo get_string('readmore','theme_nephila')?></a>
            <?php } ?>
            <?php if ($hasslide9image) { ?>
            <div class="da-img"><img src="<?php echo $slide9image ?>" alt="<?php echo $slide9 ?>"></div>
            <?php } ?>
        </div>
        
    <?php } ?>
    
   <?php if ( $hasslide10 ) { ?>
        <div class="da-slide">
            <h2><?php echo $slide10 ?></h2>
            <?php if ($hasslide10caption) { ?>
                <p><?php echo $slide10caption ?></p>
            <?php } ?>
            <?php if ($hasslide10url) { ?>
                <a href="<?php echo $slide10url ?>" class="da-link"><?php echo get_string('readmore','theme_nephila')?></a>
            <?php } ?>
            <?php if ($hasslide10image) { ?>
            <div class="da-img"><img src="<?php echo $slide10image ?>" alt="<?php echo $slide10 ?>"></div>
            <?php } ?>
        </div>
        
    <?php } ?>
    

        <nav class="da-arrows">
            <span class="da-arrows-prev"></span>
            <span class="da-arrows-next"></span>
        </nav>
        
    </div>
<?php } ?>
