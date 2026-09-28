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
	<?php echo Theme::cssBootstrap(); ?>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" />
	<?php echo Theme::css('css/style.css'); ?>

	<!-- Include JS Scripts from this theme -->
	<?php echo Theme::jquery(); ?>
	<?php echo Theme::jsBootstrap(); ?>

	<!-- Load plugins with the hook siteHead -->
	<?php Theme::plugins('siteHead'); ?>
</head>
<body>
	<!-- Load plugins with the hook siteBodyBegin -->
	<?php Theme::plugins('siteBodyBegin'); ?>

	<!-- Site title and navigation header -->
    <header class="showtime-header">
		<?php echo siteHeader(); ?>
    </header>

	<!-- Breadcrumb navigation -->
	<nav class="showtime-breadcrumb"><?php echo breadcrumb(); ?></nav>

	<div class="showtime-content row">
		<!-- Sidebar -->
		<?php if ($WHERE_AM_I == 'page' && !$page->isStatic()): ?>
			<div class="showtime-sidebar col-12 col-md-4 col-lg-3"><?php echo asideBar(); ?></div>
		<?php endif; ?>

		<!-- Main content -->
		<?php if ($WHERE_AM_I == 'page' && !$page->isStatic()): ?>
			<main class="showtime-content col-12 col-md-8 col-lg-9">
		<?php else: ?>
			<main class="showtime-content col-12">
		<?php endif; ?>

			<!-- Home page content -->
			<?php if ($WHERE_AM_I == 'home'): ?>
				<?php echo home(); ?>
			<?php elseif ($WHERE_AM_I == 'category'): ?>
				<!-- categoryPage content -->
				<?php echo categoryPage(); ?>
			<?php else: ?>
				<!-- Page content and other pages -->
				<?php echo contentPage(); ?>
			<?php endif ?>
		</main>
	</div>

	<!-- Footer -->
	<footer class="showtime-footer">
		<small><?php echo $site->footer(); ?></small>
	</footer>

	<!-- Load plugins with the hook siteBodyBegin -->
	<?php Theme::plugins('siteBodyEnd'); ?>
</body>
</html>
