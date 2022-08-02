<?php
/**
 * Plugin Name: Database Migration
 * Plugin URI: https://example.com
 * Description: A Database Migration system similar to Laravel for WordPress.
 * Author: Example
 * Author URI: https://example.com
 * Version: 1.0.0
 * Requires at least: 5.0
 * Requires PHP: 7.0
 * Text Domain: database-migration
 * Domain Path: /i18n/languages
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

use DatabaseMigration\App;

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'DATABASE_MIGRATION_SLUG' ) ) {
	define( 'DATABASE_MIGRATION_SLUG', 'database-migration' );
}

if ( ! defined( 'DATABASE_MIGRATION_VERSION' ) ) {
	define( 'DATABASE_MIGRATION_VERSION', '1.0.0' );
}

if ( ! defined( 'DATABASE_MIGRATION_PLUGIN_FILE' ) ) {
	define( 'DATABASE_MIGRATION_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'DATABASE_MIGRATION_PLUGIN_BASENAME' ) ) {
	define( 'DATABASE_MIGRATION_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'DATABASE_MIGRATION_PLUGIN_DIR' ) ) {
	define( 'DATABASE_MIGRATION_PLUGIN_DIR', dirname( __FILE__ ) );
}

if ( ! defined( 'DATABASE_MIGRATION_ASSETS' ) ) {
	define( 'DATABASE_MIGRATION_ASSETS', dirname( __FILE__ ) . '/assets' );
}

if ( ! defined( 'DATABASE_MIGRATION_TEMPLATES' ) ) {
	define( 'DATABASE_MIGRATION_TEMPLATES', dirname( __FILE__ ) . '/templates' );
}

if ( ! defined( 'DATABASE_MIGRATION_LANGUAGES' ) ) {
	define( 'DATABASE_MIGRATION_LANGUAGES', dirname( __FILE__ ) . '/i18n/languages' );
}

/**
 * Include the autoloader.
 */
require_once dirname( __FILE__ ) . '/vendor/autoload.php';

if ( ! function_exists( 'dbm' ) ) {
	function dbm() {
		return App::instance();
	}

	dbm();
}
