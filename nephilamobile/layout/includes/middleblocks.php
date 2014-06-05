<?php
$hashomeleft = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('home-left', $OUTPUT));
$hashomemiddle = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('home-middle', $OUTPUT));
$hashomeright = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('home-right', $OUTPUT));
$homel = 'home-left';
$homem = 'home-middle';
$homer = 'home-right';
?>

<div class="row-fluid" id="middle-blocks">
    <?php
            		echo $OUTPUT->nephilablocks($homel, 'span4');
            		echo $OUTPUT-> nephilablocks($homem, 'span4');
            		echo $OUTPUT-> nephilablocks($homer, 'span4');
		?>
</div>
