<?php
/**
 * Create user items meta table.
 *
 * @since 1.0.0.
 */

use DatabaseMigration\Abstracts\Migration;

/**
 * Create user items meta table.
 *
 * @since 1.0.0.
 */
class CreateUserItemsMetaTable extends Migration {
	/**
	 * Run the migration.
	 *
	 * @since 1.0.0.
	 */
	public function up() {
		$sql = "CREATE TABLE {$this->prefix}dbm_user_itemmeta (
			meta_id BIGINT UNSIGNED AUTO_INCREMENT,
			user_item_id BIGINT UNSIGNED NOT NULL,
			meta_key VARCHAR(255) NOT NULL,
			meta_value LONGTEXT,
			PRIMARY KEY  (meta_id),
			KEY user_item_id (user_item_id),
			KEY meta_key (meta_key(191))
		) $this->charset_collate;";

		dbDelta( $sql );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @since 1.0.0.
	 */
	public function down() {
		$this->connection->query( "DROP TABLE IF EXISTS {$this->prefix}dbm_user_itemmeta;" );
	}
}
