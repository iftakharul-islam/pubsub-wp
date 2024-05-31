<?php
/**
 * Plugin Name:     Pubsub Wp
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     pubsub-wp
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Pubsub_Wp
 */

// Prevent direct access
if (!defined('ABSPATH')){
    exit;
}

class PubSubWP{

    function __construct(){
        add_action('admin_menu', [$this, 'create_admin_menu']);
        register_activation_hook(__FILE__, [$this, 'active']);
        register_deactivation_hook(__FILE__, [$this, 'deactive']);
    }

    public function active(){
        add_option('wp_pubsub_activated_time', time());
    }
    public function deactive(){
        add_option('wp_pubsub_deactivated_time', time());
    }

    public function create_admin_menu(){
        add_menu_page('WP Pub/SUb', 'Pub/Sub', 'manage_options', 'wp-pubsub', [$this, 'admin_page']);
    }

    public function admin_page(){
        echo 
        "<div class='wp-pubsub'>
            <h2>Pub/Sub WP</h2> 
        </div>";
    }
}

// Start Here
(new PubSubWP());