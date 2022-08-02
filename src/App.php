<?php
/**
 * DatabaseMigration setup.
 *
 * @package DatabaseMigration
 *
 * @since 1.0.0
 */

namespace DatabaseMigration;

use DatabaseMigration\Migrator;

defined( 'ABSPATH' ) || exit;

/**
 * Main DatabaseMigration class.
 *
 * @class DatabaseMigration\DatabaseMigration
 */

class App {

	/**
	 * Instance of the app.
	 *
	 * @since 1.0.0
	 *
	 * @var DatabaseMigration\App
	 */
	protected static $instance = null;

    /**
     * Instance of Migrator.
     *
     * @var DatabaseMigration\Migrator
     */
    public $migrator = null;

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {
        $this->migrator = new Migrator();
        $this->migrator->init();

		$this->init();
	}

	/**
	 * Get application version.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function version() {
		return DATABASE_MIGRATION_VERSION;
	}

	/**
	 * Initialize the application.
	 *
	 * @since 1.0.0
	 */
	protected function init() {
		if ( ! defined( 'DATABASE_MIGRATION_DEVELOPMENT' ) ||  false === DATABASE_MIGRATION_DEVELOPMENT ) {
			$this->migrator->migrate();
		}
		// Initialize the hooks.
		$this->init_hooks();
	}

	/**
	 * Initialize hooks.
	 *
	 * @since 1.0.0
	 */
	protected function init_hooks() {
		add_action( 'cli_init', array( 'DatabaseMigration\Cli\Cli', 'register' ) );
    }
}
