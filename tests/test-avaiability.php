<?php
/**
 * Class SampleTest
 *
 * @package Pubsub_Wp
 */

/**
 * Sample test case.
 */
class Test_avaiability extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */

	    // Plugin activation adds 'wp_pubsub_activated_time' option with current timestamp
	function test_plugin_activation_adds_activated_time_option() {
		// Initialize the class
		$plugin = new PubSubWP();
		
		// Simulate plugin activation
		$plugin->active();
		
		// Get the option value
		$activated_time = get_option('wp_pubsub_activated_time');
		
		// Assert that the option is set and is a valid timestamp
		$this->assertNotFalse($activated_time);
		$this->assertIsInt($activated_time);
		$this->assertLessThanOrEqual(time(), $activated_time);
	}
}
