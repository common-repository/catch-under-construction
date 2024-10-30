<!DOCTYPE html>
<html lang="en">
<?php
$settings = catch_under_construction_get_options();
?>

<head>
	<meta charset="utf-8">
	<title>
		<?php bloginfo( 'name' ); ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- <link rel="stylesheet" href="<?php echo plugins_url( 'css/style.css', dirname( __FILE__ ) ); ?>"> -->
	<link rel="stylesheet" href="<?php echo plugins_url( 'css/font-awesome/css/font-awesome.min.css', dirname( __FILE__ ) ); ?>">
	<link rel='stylesheet' type="text/css" href="<?php echo plugins_url( 'css/catch-under-construction-public.css', dirname( __FILE__ ) ); ?>">
	<style type="text/css">
		<?php
		$style              = '';
		$construction_style = '';
		if ( '' !== $settings['image'] ) {
			$construction_style .= "
				background: linear-gradient( rgba(0, 0, 0, 0.4) 100%, rgba(0, 0, 0, 0.4)100%),url({$settings['image']});
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-position: top center;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				";
		} else {
			if ( '' !== $settings['background_color'] ) {
				$construction_style .= "background: {$settings['background_color']};";
			} else {
				$construction_style .= 'background: #21759B;';
			}
		}

		$style .= ".construction {{$construction_style}}\n";

		$logo_style  = "max-width:{$settings['logo_size']}em;";
		$logo_style .= 'height:auto;';

		$style .= ".logo {{$logo_style}}\n";

		if ( '' !== $settings['background_color'] ) {
			$container_style = "background-color: {$settings['background_color']};";
			$style          .= ".container {{$container_style}}\n";
		}

		echo $style;

		?>
	</style>
</head>

<body class="construction">
	<?php if ( '1' == $settings['enable_logo'] ) { ?>
		<div class="site-title" style="display:block;overflow:hidden">
			<img src="<?php echo esc_url( $settings['logo'] ); ?>" class="logo" />
		</div>
	<?php } ?>

	<div class="container">
		<div class="hero-content">
			<center>
				<div>
					<?php if ( '1' == $settings['enable_title'] ) { ?>
						<h1 id="title">
							<?php
							if ( '' != $settings['title'] ) {
								echo ucwords( esc_html( $settings['title'] ) );
							} else {
								echo esc_html( ' Catch Under Construction', 'catch-under-construction' );
							}
							?>
						</h1>
				</div>
			<?php } ?>
			<div id="description">
				<p>
					<?php
					if ( '' !== $settings['description'] ) {
						echo wp_kses_post( $settings['description'] );
					} else {
						echo esc_html( 'This website will launch soon very soon. Please wait!!!', 'catch-under-construction' );
					}
					?>
				</p>
				<?php if ( '1' == $settings['enable_contact'] ) { ?>
					<ul class="contact-info">
						<?php if ( '' !== $settings['address'] ) { ?>
							<li><i class="fa fa-map-marker"></i><?php echo esc_html( $settings['address'] ); ?></li>
						<?php } ?>

						<?php if ( '' !== $settings['contact'] ) { ?>
							<li><i class="fa fa-phone"> </i><?php echo esc_html( $settings['contact'] ); ?></li>
						<?php } ?>

						<?php if ( '' !== $settings['email'] ) { ?>
							<li><i class="fa fa-envelope-o"></i><?php echo esc_html( $settings['email'] ); ?></li>
						<?php } ?>

					</ul>
				<?php } ?>
			</div><!-- #description -->
			</center>
		</div><!-- .hero-content -->
	</div><!-- .container -->
	<div class="footer">
		<?php if ( '1' == $settings['enable_social'] ) { ?>
			<div class="footer-social">
				<ul class="footer__social-links">
					<?php if ( '' !== $settings['facebook'] ) { ?>
						<li>
							<a href="<?php echo esc_url( $settings['facebook'] ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
						</li>
					<?php } ?>
					<?php if ( '' !== $settings['twitter'] ) { ?>
						<li>
							<a href="<?php echo esc_url( $settings['twitter'] ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
						</li>
					<?php } ?>

					<?php if ( '' !== $settings['instagram'] ) { ?>
						<li>
							<a href="<?php echo esc_url( $settings['instagram'] ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
						</li>
					<?php } ?>

					<?php if ( '' !== $settings['youtube'] ) { ?>
						<li>
							<a href="<?php echo esc_url( $settings['youtube'] ); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
						</li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>
		<h1 id="ft_text">
			<?php
			if ( '' !== $settings['footer_text'] ) {
				echo ucwords( wp_kses_post( $settings['footer_text'] ) );
			} else {
				esc_html__( 'Catch Themes @ ', 'catch-under-construction-pro' ) . wp_date( 'Y' );
			}
			?>

		</h1>
	</div><!-- .footer -->
</body>

</html>
