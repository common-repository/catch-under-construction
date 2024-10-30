<?php

/** Social Section**/
?>
<div id="catch">
    <div class="content-wrapper">
        <div class="header">
            <h2><?php esc_html_e( 'Social Links', 'catch-under-construction' ); ?></h2>
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
                            <table class="form-table">
                                <tr>
                                    <th>
                                        <?php esc_html_e( 'Facebook', 'catch-under-construction' ); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="catch_under_construction_options[facebook]" id="facebook"   value="<?php echo esc_attr( $settings['facebook'] ); ?>" placeholder="<?php _e('Enter Facebook Profile Url','catch-under-construction'); ?>" size="56"  /><span style="color: #8e8e8e;">example: https://www.facebook.com</span>
                                        
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <?php esc_html_e( 'Twitter', 'catch-under-construction' ); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="catch_under_construction_options[twitter]" id="twitter"   value="<?php echo esc_attr( $settings['twitter'] ); ?>" placeholder="<?php _e('Enter Twitter Profile Url','catch-under-construction'); ?>" size="56"  /><span style="color: #8e8e8e;">example: https://www.twitter.com</span>
                                        
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <?php esc_html_e( 'Instagram', 'catch-under-construction' ); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="catch_under_construction_options[instagram]" id="instagram"   value="<?php echo esc_attr( $settings['instagram'] ); ?>" placeholder="<?php _e('Enter Instagram Profile Url','catch-under-construction'); ?>" size="56"  /><span style="color: #8e8e8e;">example: https://www.instagram.com</span>
                                        
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <?php esc_html_e( 'Google +', 'catch-under-construction' ); ?>
                                    </th>
                                </tr>
                                
                                <tr>
                                    <th>
                                        <?php esc_html_e( 'Youtube', 'catch-under-construction' ); ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="catch_under_construction_options[youtube]" id="youtube"   value="<?php echo esc_attr( $settings['youtube'] ); ?>" placeholder="<?php _e('Enter Youtube Url','catch-under-construction'); ?>" size="56"  /><span style="color: #8e8e8e;">example:https://www.youtube.com/</span>
                                        
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
