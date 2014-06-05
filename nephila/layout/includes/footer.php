<?php

 
$footerl = 'footer-left';
$footerm = 'footer-middle';
$footerr = 'footer-right';

$hascopyright = (empty($PAGE->theme->settings->copyright)) ? false : $PAGE->theme->settings->copyright;
$hasfootnote = (empty($PAGE->theme->settings->footnote)) ? false : $PAGE->theme->settings->footnote;
$hasfooterleft = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('footer-left', $OUTPUT));
$hasfootermiddle = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('footer-middle', $OUTPUT));
$hasfooterright = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('footer-right', $OUTPUT));

?>
	<div class="row-fluid">
		<?php
            		echo $OUTPUT->nephilablocks($footerl, 'span4');

            		echo $OUTPUT->nephilablocks($footerm, 'span4');

            		echo $OUTPUT->nephilablocks($footerr, 'span4');
		?>
 	</div>

	<div class="footerlinks row-fluid">
    	<hr>
    	<p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')); ?></p>
    <?php if ($hascopyright) {
        echo '<p class="copy">&copy; '.date("Y").' '.$hascopyright.'</p>';
    } ?>
    
    <?php if ($hasfootnote) {
        echo '<div class="footnote">'.$hasfootnote.'</div>';
    } ?>
	</div>
	

