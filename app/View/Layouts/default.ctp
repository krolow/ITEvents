<html>
	<head>
		<title><?php echo __('IT Events'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php 
			echo $this->Html->css(
				array(
					'/css/bootstrap.min.css',
					'/css/bootstrap-responsive.css',
					'/css/common.css'
				)
			);
			echo $this->fetch('css');
		?>
	</head>
	<body>
		<div class="container-narrow">
			<div class="masthead">
				<ul class="nav nav-pills pull-right">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			    <h3 class="muted"><?php echo __('IT Events'); ?></h3>
			</div>
			<hr />
			<div class="content">
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
			<?php 
				echo $this->Html->script(
					array(
						'http://code.jquery.com/jquery-latest.js',
						'/js/bootstrap.min.js'
					)
				);
				echo $this->fetch('script');
			?>
	</body>
</html>