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
	<div class="answer" data-show="tv">Continue</div>
</div>
<?php endforeach; ?>

<?php foreach ($performers as $type => $label): ?>


<div class="question" id="mipi_<?php echo $type ?>_overtime">
	<h4>Overtime for <span><?php echo $label ?></span>?</h4>
	<input type="number" name="<?php echo $type ?>_overtime" value="0" placeholder="value in $">
	<div class="answer">Continue</div>
</div>

<div id="mipi_cycle" class="question">
	<h4>Select desired use cycle for Move over for Internet</h4>
	<div class="answer" data-set="mipi_cycle" data-value="4week">4 Week Option</div>
    <div class="answer" data-set="mipi_cycle" data-value="13week">13 Week Option</div>
    <div class="answer" data-set="mipi_cycle" data-value="1year">1 year Option</div>
    <div class="answer" data-set="mipi_cycle" data-value="21month">21 months Option</div>
</div>

<?php endforeach; ?>

