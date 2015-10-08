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

		<?= form_open(site_url().'/contact/post', array('id' => 'profileForm')) ?>

		<div class="form-group <?php echo (!empty(form_error('username')) ? 'has-error' : '') ?>">
			<label for="username" class="control-label">Username</label>
			<?= form_input(array('name' => 'username', 'value' => set_value('username', $username), 'size' => 50, 'class' => 'form-control')) ?>
			<span class="help-block"><?= form_error('username'); ?></span>
		</div>

		<div class="form-group <?php echo (!empty(form_error('firstname')) ? 'has-error' : '') ?>">
			<label for="firstname" class="control-label">First Name</label>
			<?= form_input(array('name' => 'firstname', 'value' => set_value('firstname',$firstname_), 'size' => 50, 'class' => 'form-control')); ?>
			<span class="help-block"><?= form_error('firstname'); ?></span>
		</div>

		<div class="form-group <?php echo (!empty(form_error('lastname')) ? 'has-error' : '') ?>">
			<label for="lastname" class="control-label">Last Name</label>
			<?= form_input(array('name' => 'lastname', 'value' => set_value('lastname'), 'size' => 50, 'class' => 'form-control')); ?>
			<span class="help-block"><?= form_error('lastname'); ?></span>
		</div>

		<div class="form-group <?php echo (!empty(form_error('age')) ? 'has-error' : '') ?>">
			<label for="age" class="control-label">Age</label>
			<?= form_input(array('name' => 'age', 'value' => set_value('age'), 'type' => 'number', 'class' => 'form-control', 'min' => '0', 'max' => '199')); ?>
			<span class="help-block"><?= form_error('age'); ?></span>
		</div>

		<div class="form-group <?php echo (!empty(form_error('program')) ? 'has-error' : '') ?>">
			<label for="program" class="control-label">Program</label>
			<?= form_dropdown('program', $programOptions, $this->input->post('program'), 'id="select" class="form-control"') ?>
			<span class="help-block"><?= form_error('program'); ?></span>
		</div>

		<div class="form-group">
			<?= form_submit('submitForm', 'Send E-mail', "class='btn btn-primary btn-lg btn-block'"); ?>
			<?= form_close() ?>
		</div>

	</div>

</div>