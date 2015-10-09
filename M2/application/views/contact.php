<div class="row">

	<div class="col-md-7">

		<h2>Map</h2>

		<div class="map-container">
			<div id="map">
				<!-- gmaps.js -->
				<script src="//maps.google.com/maps/api/js?sensor=true"></script>
				<script src="<?= assetUrl(); ?>/js/gmaps.js"></script>
				<script type="text/javascript">
					var map = new GMaps({el: '#map', lat: 43.2382276, lng: -79.887782});
					map.addMarker({lat: 43.2382276, lng: -79.887782, title: 'SleepyMe', infoWindow: {content: '<p>SleepyMe</p>'}});
					map.setOptions({scrollwheel: false});
				</script>
			</div>
		</div>

	</div>

	<div class="col-md-5">

		<h3><?= $title ?></h3>
		<p class="lead">
			<strong>Sleepyme Hotel</strong><br/>
			59 rue Roubais<br/>
			98765 Cervelo<br/>
			(012) 345-6789<br/>
		</p>

		<? if ($errors) : ?>
		<p class="alert alert-danger"><?= $msg ?></p>
		<? elseif ($submitted) : ?>
		<p class="alert alert-success"><?= $msg ?></p>
		<? endif; ?>

		<?= form_open(site_url() . '/contact/formValidated', array('id' => 'customerComment')) ?>

		<div class="form-group <?php echo (!empty(form_error('name')) ? 'has-error' : '') ?>">
			<label for="name" class="control-label">Full Name</label>
			<?= form_input(array('name' => 'name', 'value' => set_value('name'), 'class' => 'form-control')) ?>
			<span class="help-block"><?= form_error('name'); ?></span>
		</div>

		<div class="form-group <?php echo (!empty(form_error('postal')) ? 'has-error' : '') ?>">
			<label for="postal" class="control-label">Postal Code</label>
			<?= form_input(array('name' => 'postal', 'value' => set_value('postal'), 'class' => 'form-control')); ?>
			<span class="help-block"><?= form_error('postal'); ?></span>
		</div>

		<div class="form-group <?php echo (!empty(form_error('phone')) ? 'has-error' : '') ?>">
			<label for="phone" class="control-label">Phone Number</label>
			<?= form_input(array('name' => 'phone', 'value' => set_value('phone'), 'type' => 'tel', 'class' => 'form-control')); ?>
			<span class="help-block"><?= form_error('phone'); ?></span>
		</div>

		<div class="form-group <?php echo (!empty(form_error('email')) ? 'has-error' : '') ?>">
			<label for="email" class="control-label">E-mail</label>
			<?= form_input(array('name' => 'email', 'value' => set_value('email'), 'type' => 'email', 'class' => 'form-control')); ?>
			<span class="help-block"><?= form_error('email'); ?></span>
		</div>

		<div class="form-group <?php echo (!empty(form_error('comment')) ? 'has-error' : '') ?>">
			<label for="comment" class="control-label">Comment</label>
			<?= form_textarea(array('name' => 'comment', 'value' => set_value('comment'), 'rows' => '4', 'class' => 'form-control')); ?>
			<span class="help-block"><?= form_error('comment'); ?></span>
		</div>

		<div class="form-group">
			<?= form_submit('submitForm', 'Send E-mail', "class='btn btn-primary btn-lg btn-block'"); ?>
			<?= form_close() ?>
		</div>

	</div>

</div>