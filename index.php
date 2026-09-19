<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<!-- Dynamic title tag -->
	<?php echo Theme::metaTags('title'); ?>

	<!-- Dynamic description tag -->
	<?php echo Theme::metaTags('description'); ?>

	<!-- Favicon -->
	<?php echo Theme::favicon('img/favicon.png'); ?>

	<!-- Include CSS Styles from this theme -->
	<?php echo Theme::css('css/style.css'); ?>

	<!-- Load plugins with the hook siteHead -->
	<?php Theme::plugins('siteHead') ?>
</head>
<body>
	<!-- Load plugins with the hook siteBodyBegin -->
	<?php Theme::plugins('siteBodyBegin') ?>

	<!-- Site title and fixed navigation header -->
	<div class="showtime-header">
		<div class="showtime-header-logo"> 
			<a href="<?php echo $site->url() ?>"><img src="<?php echo $site->logo() ?>" alt="<?php echo $site->description() ?>"></a>
			<div class="showtime-header-logo-text">
				<p><?php echo $site->title() ?></p>
				<small><?php echo $site->slogan() ?></small>
			</div>
		</div>
		<!-- Links on the navigation header -->
		<div class="showtime-header-links">
			<a href="<?php echo $site->url() ?>">Home</a>
			<a href="<?php echo $site->url() ?>/about">About</a>
			<a href="<?php echo $site->url() ?>/contact">Contact</a>
		</div>
	</div>

	<!-- Main content -->
	<div class="showtime-content">
		<!-- Home page content -->
		<?php if ($WHERE_AM_I == 'home'): ?>
			<?php echo home(); ?>
		<?php else: ?>
			<!-- Breadcrumb navigation -->
			<div class="showtime-breadcrumb">
				<?php echo breadcrumb(); ?>
			</div>	
			<!-- Page content -->
			<small><?php echo $page->slug(); ?></small>
			<h3><?php echo $page->title(); ?></h3>
			<?php echo $page->content(); ?>
		<?php endif ?>
	</div>

	<!-- Footer -->
	<div class="showtime-footer">
		<small><?php echo $site->footer() ?></small>
	</div>

	<!-- Load plugins with the hook siteBodyBegin -->
	<?php Theme::plugins('siteBodyEnd') ?>
</body>
</html>
