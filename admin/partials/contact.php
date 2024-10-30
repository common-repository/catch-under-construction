<?php
/** Contact Section **/
?>
<div id="catch-under-construction">
	<div class="content-wrapper">
		<div class="header">
			<h2><?php esc_html_e( ' Contact info', 'catch-under-construction' ); ?></h2>
		</div> <!-- .Header -->
		<div class="content">
			<div id="main">
				<?php settings_fields( 'catch-under-construction-group' ); ?>
				<?php
					$defaults =catch_under_construction_default_options();
					$settings =catch_under_construction_get_options();
					?>
					<div class="option-container">
			  			<table class="form-table" bgcolor="white">
							<tbody>
							   <tr>
									<th>
										<label><?php esc_html_e( 'Address', 'catch-under-construction' ); ?></label>
									</th>
									<td>
										<input type="text" name="catch_under_construction_options[address]" id="address"   value="<?php echo esc_attr( $settings['address'] ); ?>" placeholder="<?php _e('Enter your Address','catch-under-construction'); ?>" size="56"  />
										
									</td>
								</tr>

								<tr>
									<th>
										<label><?php esc_html_e( 'Contact No.', 'catch-under-construction' ); ?></label>
									</th>
									<td>
										<input type="text" name="catch_under_construction_options[contact]" id="contact-no"   value="<?php echo esc_attr( $settings['contact'] ); ?>" placeholder="<?php _e('Enter your Contact Number','catch-under-construction'); ?>" size="56"  />
										
									</td>
								</tr>

								<tr>
									<th>
										<label><?php esc_html_e( 'Email Address', 'catch-under-construction' ); ?></label>
									</th>
									<td>
										<input type="text" name="catch_under_construction_options[email]" id="address"   value="<?php echo esc_attr( $settings['email'] ); ?>" placeholder="<?php _e('Enter your Email Address','catch-under-construction'); ?>" size="56"  />
										
									</td>
								</tr>
						</tbody>
					</table>
					<?php submit_button( esc_html__( 'Save Changes', 'catch-under-construction' ) ); ?>
				</div><!-- .option-container -->
			</div><!-- main -->
		</div><!-- .content -->
	</div><!-- .content-wrapper -->
</div><!---catch-under-construction--->
