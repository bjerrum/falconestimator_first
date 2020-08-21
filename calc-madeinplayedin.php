<?php
	$performers = [
		'actor_on_camera' => 'On-Camera Principal',		
		'actor_off_camera' => 'Off-Cameral Principal (Ex. Voiceover)',		
		'extra' => 'Extra Performer',
	];
?>

<div class="question" id="prod_full_term">	
	<h4>Production only or full term (signatory)?</h4>
	<div class="answer" data-set="prod_full_term" data-value="prod_only" data-follow="mipi_performers">Production Only</div>
	<div class="answer" data-set="prod_full_term" data-value="full_term" data-follow="mipi_performers">Full Term (signatory)</div>
</div>

<div class="question" id="mipi_performers">	
	<h4>What type of performer will you be hiring for?</h4>
	<?php
		foreach ($performers as $type => $label) {
			FalconEstimator::slider($type, $label);
		}
	?>
	<div class="answer special">Continue</div>
</div>
<?php foreach ($performers as $type => $label): $default = $type=='actor_off_camera' ? 2 : 8; ?>
<div class="question" id="mipi_<?php echo $type ?>_hours" >
	<h4>How many hours for <span><?php echo $label ?></span>?</h4>
	<?php FalconEstimator::slider( $type.'_hours', '', $default, $default, 12 ); ?>
	<div class="answer" data-show="mipi">Continue</div>
</div>
<?php endforeach; ?>

<?php foreach ($performers as $type => $label): ?>

<div class="question" id="mipi_<?php echo $type ?>_weekend">
	<h4>Weekend or Holiday work for <span><?php echo $label ?></span>?</h4>
	<div class="answer" data-follow="tv_<?php echo $type ?>_weekend_days" data-set="<?php echo $type ?>_weekend" data-value="1">Yes</div>
    <div class="answer" data-set="<?php echo $type ?>_weekend" data-value="0">No</div>
</div>
<div class="question" id="mipi_<?php echo $type ?>_weekend_days">
	<h4>How many days?</h4>
    <?php FalconEstimator::slider($type.'_weekend_days', '', 1, 1, 10); ?>
	<div class="answer">Continue</div>
</div>

<div class="question" id="mipi_<?php echo $type ?>_nightwork">
	<h4>Nightwork work for <span><?php echo $label ?></span>?</h4>
	<div class="answer" data-follow="tv_<?php echo $type ?>_nightwork_time" data-set="<?php echo $type ?>_nightwork" data-value="1">Yes</div>
    <div class="answer" data-set="<?php echo $type ?>_nightwork" data-value="0">No</div>
</div>
<div class="question" id="mipi_<?php echo $type ?>_nightwork_time">
	<h4>How many hours?</h4>
	<?php FalconEstimator::slider($type.'_nightwork_time', '', 1, 1, 10); ?>
	<div class="answer">Continue</div>
</div>

<div class="question" id="mipi_<?php echo $type ?>_travel">
	<h4>Travel reimbursments work for <span><?php echo $label ?></span>?</h4>
	<input type="number" name="<?php echo $type ?>_travel" value="0" placeholder="value in $">
	<div class="answer">Continue</div>
</div>

<?php if (in_array($type, ['actor_on_camera', 'actor_off_camera'])): ?>
	<div class="question" id="mipi_<?php echo $type ?>_lift1">
		<h4>1st lift for <span><?php echo $label ?></span>?</h4>
		<div class="answer" data-follow="mipi_<?php echo $type ?>_lift2" data-set="<?php echo $type ?>_lift1" data-value="1">Yes</div>
    	<div class="answer" data-set="<?php echo $type ?>_lift1" data-value="0">No</div>
	</div>
	<div class="question" id="mipi_<?php echo $type ?>_lift2">
		<h4>2nd lift for <span><?php echo $label ?></span>?</h4>
		<div class="answer" data-set="<?php echo $type ?>_lift2" data-value="1">Yes</div>
    	<div class="answer" data-set="<?php echo $type ?>_lift2" data-value="0">No</div>
	</div>
<?php endif; ?>

<?php endforeach; ?>

