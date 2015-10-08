<!DOCTYPE html>

<html>

	<head>
		<title><?= $title ?> &ndash; SleepyMe</title>
		<link href="<?= assetUrl(); ?>/css/styles.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		
		<div class="container">
			
			<header>
				
				<nav>
					<ul class="nav nav-pills pull-right">
						<li role="presentation" class="<?= active_link('index') ?>"><?= anchor ('site','Home') ?></li>
						<li role="presentation" class="<?= active_link('roomsAndRates') ?>"><?= anchor ('site/roomsAndRates','Rooms &amp; Rates') ?></li>
						<li role="presentation" class="<?= active_link('reservations') ?>"><?= anchor ('site/reservations','Reservations') ?></li>
						<li role="presentation" class="<?= active_link('contact') ?>"><?= anchor ('site/contact','Contact') ?></li>
					</ul>
				</nav>
				
				<img class="logo" src = "<?= assetUrl(); ?>/img/logo.png" height="96px">
				
			</header>
			
			<img src = "<?= assetUrl(); ?>/img/headerPic.jpg" class="img-responsive">