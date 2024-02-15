<?php
require_once( dirname(__FILE__) . '/../../../wp-load.php');
/* echo $path = __DIR__ . '/uploads/userfiles/'; */

//Создать папку /wp-content/uploads/userfiles/

/* $dir = WP_CONTENT_DIR . '/uploads/userfiles/'; */
$dir = WP_CONTENT_DIR . '/uploads/202999/';

if( ! is_dir( $path ) ) {
  mkdir( $path, 0777, true );
  echo 'Папку создали!';
} else {
  echo 'Папка существует!';
}
