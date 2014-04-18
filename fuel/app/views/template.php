<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="author" content="ThemeFuse">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Modern Touch | Index</title>

<!-- main JS libs -->
<script src="js/libs/modernizr.min.js"></script>
<script src="js/libs/jquery-1.10.0.js"></script>
<script src="js/libs/jquery-ui.min.js"></script>
<script src="js/libs/bootstrap.min.js"></script>

<!-- Style CSS -->
<link href="css/web.css" media="screen" rel="stylesheet">
<link href="css/bootstrap.css" media="screen" rel="stylesheet">
<link href="style.css" media="screen" rel="stylesheet">

<!-- scripts -->
<script src="js/general.js"></script>

<!-- custom input -->
<script src="js/jquery.customInput.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!-- Placeholders -->
<script type="text/javascript" src="js/jquery.powerful-placeholder.min.js"></script>
<!-- Lightbox prettyPhoto -->
<link href="css/prettyPhoto.css" rel="stylesheet">
<script src="js/jquery.prettyPhoto.js"></script>
<!-- CarouFredSel  -->
<script src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
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
<!-- Progress Bars -->
<script src="js/progressbar.js"></script>
<!-- Calendar -->
<script src="js/jquery-ui.multidatespicker.js"></script>
<!-- range sliders -->
<script src="js/jquery.slider.bundle.js"></script>
<script src="js/jquery.slider.js"></script>
<link rel="stylesheet" href="css/jslider.css">
<!-- Video Player -->
<link href="css/video-js.css" rel="stylesheet">
<script src="js/video.js"></script>

<!-- Scroll Bars -->
<script src="js/jquery.mousewheel.js"></script>
<script src="js/jquery.jscrollpane.min.js"></script>
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
	<style>
		body { margin: 40px; }
	</style>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<h1><?php echo $title; ?></h1>
			<hr>
<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-error">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
		</div>
		<div class="col-md-12">
			<?php echo $content; ?>
		</div>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
</body>
</html>
