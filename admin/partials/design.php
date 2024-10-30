<?php

/**Design Section**/
?>
<div id="catch">
	<div class="content-wrapper">
		<div class="header">
			<h2><?php esc_html_e( 'Design', 'catch-under-construction' ); ?></h2>
		</div> <!-- .Header -->
		<div class="content">
			<div id="construction_main">
				<?php settings_fields( 'catch-under-construction-group' ); ?>
					<?php
					$defaults = catch_under_construction_default_options();
					$settings = catch_under_construction_get_options();
					?>
					<div class="option-container">
						<table class="form-table" bgcolor="white">
							<tbody>
								<tr>
									<th scope="row"><?php esc_html_e( ' Background Image', 'catch-under-construction' ); ?></th>
									<td>
										<?php
											echo '<input type="text" class="image-url" id="catch_under_construction_options[image]" name="catch_under_construction_options[image]" placeholder="Image URL HERE" value="' . esc_url( $settings['image'] ) . '"/>';
										?>
										<span class="ctis-image-holder">
											<?php
											if ( '' !== $settings['image'] ) {
												echo '<img src="' . esc_url( $settings['image'] ) . '" />';
											}
											?>
										</span>
										<button class="catch-under-construction-upload-media-button button button-primary">
										<?php
										if ( $defaults['image'] === $settings['image'] ) {
											esc_html_e( 'Upload', 'catch-under-construction' );
										} else {
											esc_html_e( 'Change', 'catch-under-construction' );
										}
										?>
										</button>
										<?php
											$hide_class = '';
										if ( $defaults['image'] === $settings['image'] ) {
											$hide_class = 'ctis-hide';
										}
										?>
										<button class="catch-under-construction-reset-media-button button button-primary <?php echo $hide_class; ?>"><?php esc_html_e( 'Reset', 'catch-under-construction' ); ?></button>
									</td>
								</tr>

								<tr>
									<th scope="row"><?php esc_html_e( ' Logo Image', 'catch-under-construction' ); ?></th>
									<td>
										<?php
											echo '<input type="text" class="image-url" id="catch_under_construction_options[logo]" name="catch_under_construction_options[logo]" placeholder="Image URL HERE" value="' . esc_url( $settings['logo'] ) . '"/>';
										?>
										<span class="ctis-image-holder">
											<?php
											if ( '' !== $settings['logo'] ) {
												echo '<img src="' . esc_url( $settings['logo'] ) . '" />';
											}
											?>
										</span>
										<button class="catch-under-construction-upload-media-button button button-primary">
										<?php
										if ( $defaults['logo'] === $settings['logo'] ) {
											esc_html_e( 'Upload', 'catch-under-construction' );
										} else {
											esc_html_e( 'Change', 'catch-under-construction' );
										}
										?>
										</button>
										<?php
											$hide = '';
										if ( $defaults['logo'] === $settings['logo'] ) {
											$hide = 'hide';
										}
										?>
										<button class="catch-under-construction-reset-media-button button button-primary <?php echo $hide_class; ?>"><?php esc_html_e( 'Reset', 'catch-under-construction' ); ?></button>
									</td>
								</tr>

								<tr>
									<th>
										<label><?php esc_html_e( 'Logo Size', 'catch-under-construction' ); ?></label>
									</th>
									<td>
										<input type="number" name="catch_under_construction_options[logo_size]" id="logo-size" min="0"placeholder="200" class="logo_size" value="<?php echo esc_attr( $settings['logo_size'] ); ?>"/>
										<span class="add-on"><?php esc_html_e( 'px', 'catch-under-construction' ); ?></span>
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Sets your desired logo size .Default is set to 200px, and takes theme\'s font size', 'catch-under-construction' ); ?>"></span>
									</td>
								</tr>
								<tr>
									<th>
										<label><?php esc_html_e( 'Title', 'catch-under-construction' ); ?></label>
									</th>
									<td>
										<input type="text" name="catch_under_construction_options[title]" id="title"   value="<?php echo esc_attr( $settings['title'] ); ?>"  />
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Anything you want to put as title.', 'catch-under-construction' ); ?>"></span>
									</td>
								</tr>
								<tr>
									<th>
										<label><?php esc_html_e( 'Footer Text', 'catch-under-construction' ); ?></label>
									</th>
									<td>
										<input type="text" name="catch_under_construction_options[footer_text]" id="title"   value="<?php echo esc_attr( $settings['footer_text'] ); ?>"  />
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Anything you want to put as footer text.', 'catch-under-construction' ); ?>"></span>
									</td>
								</tr>
								<tr>
									<th>
										<label><?php _e( 'Description', 'catch-under-construction' ); ?></label>
									</th>
									<td>
										<?php
										$content   = $settings['description'];
										$editor_id = 'description';
										$settings1 = array(
											'media_buttons' => false,
											'textarea_rows' => 8,
											'textarea_name' => 'catch_under_construction_options[description]',
										);
										wp_editor( $content, $editor_id, $settings1 );
										?>
									</td>
								</tr>
								<tr>
									<th>
									<label><?php esc_html_e( 'Background  Color', 'catch-under-construction' ); ?></label>
									</th>
									<td>
										<input type="text" name="catch_under_construction_options[background_color]" id="background-color" class="color-picker" data-alpha="true" value="<?php echo esc_attr( $settings['background_color'] ); ?>"/>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php esc_html_e( 'Reset Options', 'catch-under-construction' ); ?></th>
									<td>
										<?php
											echo '<input name="catch_under_construction_options[reset]" id="catch_under_construction_options[reset]" type="checkbox" value="1" class="catch_under_construction_options[reset]" />' . esc_html__( 'Check to reset', 'catch-under-construction' );
										?>
										<span class="dashicons dashicons-info tooltip" title="<?php esc_html_e( 'Caution: Reset all settings to default.', 'catch-under-construction' ); ?>"></span>
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
