<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.catchplugins.com
 * @since      1.0.0
 *
 * @package    Catch_Under_Construction
 * @subpackage Catch_Under_Construction/admin/partials
 */
?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php esc_html_e( 'Catch Under construction', 'catch-under-construction' );?></h1>
    <div id="plugin-description">
        <p><?php esc_html_e( 'Catch Under Construction is a WordPress maintenance mode plugin that helps you display informative under construction page in an elegant manner with numerous customization options integrated into it.', 'catch-under-construction' ); ?></p>
    </div>
    <div class="catchp-content-wrapper">
        <div class="catchp_widget_settings">
            <?php if( isset( $_GET['settings-updated'] ) ) { ?>
                <div id="message" class="notice updated fade">
                    <p><strong><?php esc_html_e( 'Plugin Options Saved.', 'catch-under-construction' ) ?></strong></p>
                </div>
            <?php } ?>

            <form id="construction" method="post" action="options.php">
                <?php settings_fields( 'catch-under-construction-group' ); ?>
                   <?php wp_nonce_field( basename( __FILE__ ), 'catch_under_construction_nounce' );?>

                   <h2 class="nav-tab-wrapper">
                    <a class="nav-tab nav-tab-active" id="dashboard-tab" href="#dashboard"><?php esc_html_e( ' General Setting', 'catch-under-construction' ); ?></a>
                    <a class="nav-tab" id="design-tab" href="#design"><?php esc_html_e( 'Design/Layout', 'catch-under-construction' ); ?></a>
                    <a class="nav-tab" id="contact-tab" href="#contact"><?php esc_html_e( 'Contact', 'catch-under-construction' ); ?></a>
                    <a class="nav-tab" id="social-tab" href="#social"><?php esc_html_e( 'Social links', 'catch-under-construction' ); ?></a>

                    <a class="nav-tab" id="feature-tab" href="#features"><?php esc_html_e( 'Features', 'catch-under-construction' ); ?></a>

                </h2>
                <div id="dashboard" class="wpcatchtab nosave active">
                    <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/dashboard.php';?>
                    <div id="ctp-switch" class="content-wrapper col-3 catch-under-construction-main">
                        <div class="header">
                            <h2><?php esc_html_e( 'Catch Themes & Catch Plugins Tabs', 'catch-under-construction' ); ?></h2>
                        </div> <!-- .Header -->

                        <div class="content">

                            <p><?php echo esc_html__( 'If you want to turn off Catch Themes & Catch Plugins tabs option in Add Themes and Add Plugins page, please uncheck the following option.', 'catch-under-construction' ); ?>
                            </p>
                            <table>
                                <tr>
                                    <td>
                                        <?php echo esc_html__( 'Turn On Catch Themes & Catch Plugin tabs', 'catch-under-construction' );  ?>
                                    </td>
                                    <td>
                                        <?php $ctp_options = ctp_get_options(); ?>
                                        <div class="module-header <?php echo $ctp_options['theme_plugin_tabs'] ? 'active' : 'inactive'; ?>">
                                            <div class="switch">
                                                <input type="hidden" name="ctp_tabs_nonce" id="ctp_tabs_nonce" value="<?php echo esc_attr( wp_create_nonce( 'ctp_tabs_nonce' ) ); ?>" />
                                                <input type="checkbox" id="ctp_options[theme_plugin_tabs]" class="ctp-switch" rel="theme_plugin_tabs" <?php checked( true, $ctp_options['theme_plugin_tabs'] ); ?> >
                                                <label for="ctp_options[theme_plugin_tabs]"></label>
                                            </div>
                                            <div class="loader"></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div><!-- #ctp-switch -->
                </div><!---dashboard---->

               <div id="design" class="wpcatchtab save">
                    <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/design.php';?>

                </div><!---design---->

                 <div id="contact" class="wpcatchtab save">
                    <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/contact.php';?>

                </div><!---design---->


                <div id="social" class="wpcatchtab save">
                    <?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/social.php';?>

                </div><!---social---->

                <div id="features" class="wpcatchtab save">
                    <div class="content-wrapper col-3">
                        <div class="header">
                            <h3><?php esc_html_e( 'Features', 'catch-under-construction' );?></h3>
                        </div><!-- .header -->
                        <div class="content">
                            <ul class="catchp-lists">
                               <li>
                                    <strong><?php esc_html_e( 'Enable Disable/Options', 'catch-under-construction' ); ?></strong>
                                    <p><?php esc_html_e( 'Under the General Settings tab is a bunch of options that you can enable or disable. In order for this plugin to work immediately, you can enable the ‘Under Construction Mode’. For real-time customization, you need to enable various sections that you want to display on your maintenance mode. From this section, you can easily select which options you want to display and which ones do you want to hide.','catch-under-construction' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'Background Image', 'catch-under-construction' ); ?></strong>
                                    <p><?php esc_html_e( 'While displaying the maintenance mode on your website, you need to make sure it is attractive with a clean and visually aesthetic image. Add an eye-pleasing background image which would instantly give a hint about the maintenance mode to your visitors.','catch-under-construction' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'Contact Info', 'catch-under-construction' ); ?></strong>
                                    <p><?php esc_html_e( 'Provide your customers and visitors as an easier way to contact you in case of any emergencies. On the Contact Info section, you can add your email address, contact number, and your address.','catch-under-construction' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'Social Links', 'catch-under-construction' ); ?></strong>
                                    <p><?php esc_html_e( 'Nowadays who does not have a social profile? Let your visitors know where to find you until your website is under construction. Add your social media profiles like Facebook, Twitter, Instagram, Google,and YouTube on the Social Links tab and share them on the maintenance mode page.','catch-under-construction' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'Light Weight', 'catch-under-construction' ); ?></strong>
                                    <p><?php esc_html_e( 'Catch Under Construction is an expedient WordPress plugin to display an informative maintenance mode page that is extremely lightweight. It means you will not have to worry about your website getting slower because of the plugin.','catch-under-construction' ); ?></p>
                                </li>

                                 <li>
                                    <strong><?php esc_html_e( 'Responsive Design', 'catch-under-construction' ); ?></strong>
                                    <p><?php esc_html_e( 'Our new WordPress maintenance mode plugin comes with a responsive design, therefore, there is no need to strain about the plugin breaking your website.','catch-under-construction' ); ?></p>
                                </li>

                                 <li>
                                    <strong><?php esc_html_e( 'Compatible with all WordPress Themes', 'catch-under-construction' ); ?></strong>
                                    <p><?php esc_html_e( 'Gutenberg Compatibility is one of the major concerns nowadays for every plugin developer. Our new Catch Under Construction plugin has been crafted in a way that supports all the WordPress themes.The plugin functions smoothly on any WordPress theme.','catch-under-construction' ); ?></p>
                                </li>

                                <li>
                                    <strong><?php esc_html_e( 'Incredible Support', 'catch-under-construction' ); ?></strong>
                                    <p><?php esc_html_e( 'Catch Under Construction comes with Incredible Support. Our plugin documentation answers most questions about using the plugin.  If you’re still having difficulties, you can post it in our Support Forum.','catch-under-construction' ); ?></p>
                                </li>
                            </ul>
                        </div><!-- .content -->
                    </div><!-- content-wrapper -->
                </div> <!-- Featured -->
            </form><!-- duplicate-page -->
        </div><!-- .catchp_widget_settings -->
        <?php require_once plugin_dir_path(dirname(__FILE__) ) .'/partials/sidebar.php';?>
    </div><!---catch-content-wrapper---->
<?php require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/footer.php'; ?>
</div><!-- .wrap -->
