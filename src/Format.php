<?php
/**
 * Format related functions.
 *
 * @package DatabaseMigration
 *
 * @since 1.0.0
 */

namespace DatabaseMigration;

defined( 'ABSPATH' ) || exit;

class Format {
    public static function kebab_to_camel( $string ) {
        return str_replace( '-', '', ucwords( $string, '-' ) );
    }

    public static function kebab_to_snake( $string ) {
        return strtolower( preg_replace( '/(?<!^)([A-Z])/', '_$1', $string ) );
    }

    public static function strtolower( $string ) {
        return function_exists( 'mb_strtolower' ) ? mb_strtolower( $string ) : strtolower( $string );
    }

    public static function snake_to_pascal( $string ) {
        return str_replace( '_', '', ucwords( $string, '_' ) );
    }
}
