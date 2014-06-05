<?php


$hasiphoneicon = (!empty($PAGE->theme->settings->iphoneicon));
$hasipadicon = (!empty($PAGE->theme->settings->ipadicon));
$hasiphoneretinaicon = (!empty($PAGE->theme->settings->iphoneretinaicon));
$hasipadretinaicon = (!empty($PAGE->theme->settings->ipadretinaicon));

if ($hasiphoneicon) {
    $iphoneicon = $PAGE->theme->settings->iphoneicon;
} else {
	$iphoneicon = $OUTPUT->pix_url('homeicon/iphone', 'theme');
}

if ($hasipadicon) {
    $ipadicon = $PAGE->theme->settings->ipadicon;
} else {
	$ipadicon = $OUTPUT->pix_url('homeicon/ipad', 'theme');
}

if ($hasiphoneretinaicon) {
    $iphoneretinaicon = $PAGE->theme->settings->iphoneretinaicon;
} else {
	$iphoneretinaicon = $OUTPUT->pix_url('homeicon/iphone_retina', 'theme');
}

if ($hasipadretinaicon) {
    $ipadretinaicon = $PAGE->theme->settings->ipadretinaicon;
} else {
	$ipadretinaicon = $OUTPUT->pix_url('homeicon/ipad_retina', 'theme');
}
?>

<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $iphoneicon ?>" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $ipadicon ?>" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $iphoneretinaicon ?>" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $ipadretinaicon ?>" />
