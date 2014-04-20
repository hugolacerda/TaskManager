<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta charset="utf-8">
	<meta name="author" content="ThemeFuse">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('web.css'); ?>
	<?php echo Asset::css('style.css'); ?>

	<!-- jquery -->
	<?php echo Asset::js('modernizr.min.js'); ?>	
	<?php echo Asset::js('jquery-1.10.0.js'); ?>	
	<?php echo Asset::js('bootstrap.min.js'); ?>
	<?php echo Asset::js('general.js'); ?>
	<?php echo Asset::js('jquery.customInput.js'); ?>

	<?php echo Asset::js('jquery.powerful-placeholder.min.js'); ?>
	<?php echo Asset::js('general.js'); ?>
	<?php echo Asset::js('jquery.customInput.js'); ?>

	<style>
		body { margin: 50px; }
	</style>
	<?php echo Asset::js(array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'bootstrap.js'
	)); ?>
	<script>
		$(function(){ $('.topbar').dropdown(); });
	</script>



<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
<head>
<script>
    jQuery(document).ready(function($) {

        $('#carouFredsel-1').carouFredSel({
            next : "#carousel-next-1",
            prev : "#carousel-prev-1",
            auto: false,
            scroll: {items : 1}
        });

        $(window).resize(function() {

            $('#carouFredsel-1').carouFredSel({
                next : "#carousel-next-1",
                prev : "#carousel-prev-1",
                auto: false,
                scroll: {items : 1}
            });
        })
    });
</script>
<script type="text/javascript">
	jQuery(function()
	{
		jQuery('.scrollbar').jScrollPane({
			verticalDragMaxHeight: 18,
			verticalDragMinHeight:18
		});

		jQuery('.scrollbar.style2').jScrollPane({
			verticalDragMaxHeight: 28,
			verticalDragMinHeight:28
		});

		jQuery('.scrollbar.style3').jScrollPane({
			verticalDragMaxHeight: 38,
			verticalDragMinHeight:38
		});

		jQuery('.scrollbar.style4').jScrollPane({
			verticalDragMaxHeight: 38,
			verticalDragMinHeight:38
		});
	});
</script>

<!--[if lt IE 9]><script src="js/respond.min.js"></script><![endif]-->
<!--[if gte IE 9]>
<style type="text/css">
    .gradient {filter: none !important;}
</style>
<![endif]-->
</head>

<body>
	<?php if ($current_user): ?>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">My Site</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
						<?php echo Html::anchor('user', 'Dashboard') ?>
					</li>

					<?php
						$files = new GlobIterator(APPPATH.'classes/controller/user/*.php');
						foreach($files as $file)
						{
							$section_segment = $file->getBasename('.php');
							$section_title = Inflector::humanize($section_segment);
							?>
							<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
								<?php echo Html::anchor('user/'.$section_segment, $section_title) ?>
							</li>
							<?php
						}
					?>
				</ul>
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $current_user->username ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo Html::anchor('user/logout', 'Logout') ?></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<div class="body_wrap">
	    <div class="container">

	        <!-- content -->
	        <div class="content " role="main">
		
		
			<div class="row">
				<div class="col-md-12">
					<h1><?php echo $title; ?></h1>
					<hr>
	<?php if (Session::get_flash('success')): ?>
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>
						<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
						</p>
					</div>
	<?php endif; ?>
	<?php if (Session::get_flash('error')): ?>
					<div class="alert alert-error alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>
						<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
						</p>
					</div>
	<?php endif; ?>
				</div>
				<div class="col-md-12">
	<?php echo $content; ?>
				</div>
			</div>
			<hr/>
			<footer>
				<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
				<p>
					<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
					<small>Version: <?php echo (Fuel::VERSION); ?></small>
				</p>
			</footer>
		</div>
	</div>
</body>
</html>
