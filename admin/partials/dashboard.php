<?php

/*Dashboard Section**/
?>
<div id="catch" class="catchids-main">
	<div class="content-wrapper">
		<div class="header">
			<h2><?php esc_html_e( 'Settings', 'catch-under-construction' ); ?></h2>
		</div> <!-- .Header -->
		<div class="content">
			
			<div id="construction_main">
				<?php settings_fields( 'catch-under-construction-group' ); ?>
					<?php
					$defaults =catch_under_construction_default_options();
					$settings = catch_under_construction_get_options();
					?>

					<div class="option-container">
						
			  			<table class="form-table" bgcolor="white">
			  				
							<tbody>
								 <button class="live preview button button-primary">
								<a href="<?php echo bloginfo("url"); ?>?catch_under_construction=true&TB_iframe=true&width=500&height=532" target="_blank"><?php echo sprintf (__("Live Preview</a>","catch-under-construction")); ?>
								<tr>
								<th scope="row"><?php esc_html_e( 'Enable Under Construction Mode', 'catch-under-construction' ); ?></th>
								<td>
									<div class="module-header <?php echo $settings['status'] ? 'active' : 'inactive'; ?>">
										<div class="switch">
				                            <input type="checkbox" id="catch_under_construction_options[status]" name="catch_under_construction_options[status]" class="wpuc-input-switch" rel="status" <?php checked( true, $settings['status'] ); ?> >
				                            <label for="catch_under_construction_options[status]"></label>
				                        </div>
				                        <div class="loader"></div>
				                    </div>
								</td>
							    </tr>

							    <tr>
								<th scope="row"><?php esc_html_e( 'Enable Logo', 'catch-under-construction' ); ?></th>
								<td>
									<div class="module-header <?php echo $settings['enable_logo'] ? 'active' : 'inactive'; ?>">
										<div class="switch">
				                            <input type="checkbox" id="catch_under_construction_options[enable_logo]" name="catch_under_construction_options[enable_logo]" class="wpuc-input-switch" rel="enable_logo" <?php checked( true, $settings['enable_logo'] ); ?> >
				                            <label for="catch_under_construction_options[enable_logo]"></label>
				                        </div>
				                        <div class="loader"></div>
				                    </div>
								</td>
							    </tr>

							    <tr>
								<th scope="row"><?php esc_html_e( 'Enable Background', 'catch-under-construction' ); ?></th>
								<td>
									<div class="module-header <?php echo $settings['enable_background'] ? 'active' : 'inactive'; ?>">
										<div class="switch">
				                            <input type="checkbox" id="catch_under_construction_options[enable_background]" name="catch_under_construction_options[enable_background]" class="wpuc-input-switch" rel="enable_background" <?php checked( true, $settings['enable_background'] ); ?> >
				                            <label for="catch_under_construction_options[enable_background]"></label>
				                        </div>
				                        <div class="loader"></div>
				                    </div>
								</td>
							    </tr>

							    <tr>
								<th scope="row"><?php esc_html_e( 'Enable Title', 'catch-under-construction' ); ?></th>
								<td>
									<div class="module-header <?php echo $settings['enable_title'] ? 'active' : 'inactive'; ?>">
										<div class="switch">
				                            <input type="checkbox" id="catch_under_construction_options[enable_title]" name="catch_under_construction_options[enable_title]" class="wpuc-input-switch" rel="enable_title" <?php checked( true, $settings['enable_title'] ); ?> >
				                            <label for="catch_under_construction_options[enable_title]"></label>
				                        </div>
				                        <div class="loader"></div>
				                    </div>
								</td>
							    </tr>

							    <tr>
								<th scope="row"><?php esc_html_e( 'Enable Social Links', 'catch-under-construction' ); ?></th>
								<td>
									<div class="module-header <?php echo $settings['enable_social'] ? 'active' : 'inactive'; ?>">
										<div class="switch">
				                            <input type="checkbox" id="catch_under_construction_options[enable_social]" name="catch_under_construction_options[enable_social]" class="wpuc-input-switch" rel="enable_social" <?php checked( true, $settings['enable_social'] ); ?> >
				                            <label for="catch_under_construction_options[enable_social]"></label>
				                        </div>
				                        <div class="loader"></div>
				                    </div>
								</td>
							    </tr>

							    <tr>
								<th scope="row"><?php esc_html_e( 'Enable Contact', 'catch-under-construction' ); ?></th>
								<td>
									<div class="module-header <?php echo $settings['enable_contact'] ? 'active' : 'inactive'; ?>">
										<div class="switch">
				                            <input type="checkbox" id="catch_under_construction_options[enable_contact]" name="catch_under_construction_options[enable_contact]" class="wpuc-input-switch" rel="enable_contact" <?php checked( true, $settings['enable_contact'] ); ?> >
				                            <label for="catch_under_construction_options[enable_contact]"></label>
				                        </div>
				                        <div class="loader"></div>
				                    </div>
								</td>
							    </tr>
							</tbody>
						</table>
						<?php submit_button( esc_html__( 'Save Changes', 'catch-under-construction' ) ); ?>
					</div><!-- .option-container -->
			</div><!-- #constructio_main -->
		</div><!-- .content -->
	</div><!-- .content-wrapper -->
</div><!---catch-->
