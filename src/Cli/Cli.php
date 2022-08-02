<?php
/**
 * Handles cli command initialization.
 *
 * @since 1.0.0
 * @package DatabaseMigration\Cli
 */

namespace DatabaseMigration\Cli;

class Cli {

	/**
	 * Namespace.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public static $namespace = 'DatabaseMigration\\Cli';

	/**
	 * Register CLI commands.
	 *
	 * @since 1.0.0
	 */
	public static function register() {
		/**
		 * Filters CLI commands.
		 *
		 * @since 1.0.0
		 *
		 * @param array $commands Command to command handler class index.
		 */
		$commands = apply_filters(
			'database_migration_cli_commands',
			array(
				'migration' => self::$namespace . '\\Migration',
			)
		);

		foreach ( $commands as $command => $class ) {
			\WP_CLI::add_command( "database-migration {$command}", $class );
		}
	}
}
