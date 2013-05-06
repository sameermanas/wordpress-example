<?php
define('DB_NAME', $_ENV['OPENSHIFT_APP_NAME']);
define('DB_USER', $_ENV['OPENSHIFT_MYSQL_DB_USERNAME']);
define('DB_PASSWORD', $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD']);
define('DB_HOST', $_ENV['OPENSHIFT_MYSQL_DB_HOST'] . ':' . $_ENV['OPENSHIFT_MYSQL_DB_PORT']);
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
require_once(ABSPATH . '../.openshift/openshift.inc');
$_default_keys = array(
'AUTH_KEY'         =>  ':(YKuoRY2k`1`)?i=~X#(E/! S0`l k<2UF<VU@>9P?{^^4KasXPWUxFD_OmVzk+',
'SECURE_AUTH_KEY'  =>  'ZZBk%dM|6DZ4OFd+~tdh9!Z8x-z%awt2 Jc1,?C|;pw^$|.UdG$j}IcWmv;xq)&c',
'LOGGED_IN_KEY'    =>  'NOyN~C3oI[C~|2[i3V+Q>ms/XY+=cvy`-w#)&kFxM#kz]p;k-M$w|_{2,|QjNCj+',
'NONCE_KEY'        =>  'e~i_:yWRj#PN+C@5Y%(]-x>(:5FC#|Ay}`;!53vyZ;wYzOYR-9Y.$zGK$+%iq?<$',
'AUTH_SALT'        =>  'YSP`<A*zw+W3 j~UuczbEm(~>f2S{L4=|B$C)@[YqJnQL.dizuF3YE>V5-7Ay~0+',
'SECURE_AUTH_SALT' =>  'NF-z6&m14OQlxg`{QIKfWnc.+2}B 6yP1?i}3Ey*HIl95O0[3ev#T5,qDM@0eOD|',
'LOGGED_IN_SALT'   =>  '2x [uPv+TuwN+qt)8,}6vBul93/H7 _cjs$hw hr8cw75VT&T}sW2b`jOI+XQ/25',
'NONCE_SALT'       =>  '+tY`:ip.!S9d1O WkB!yb-(ea)N47.,r-U(J<CzD046O>j4}`8vt6.iYpaY -j7&',
);
function make_secure_key($args) {
  $hash = $args['hash'];
  $key  = $args['variable'];
  $original = $args['original'];

	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $chars .= '!@#$%^&*()';
  $chars .= '-_ []{}<>~`+=,.;:/?|';

  // Convert the hash to an int to seed the RNG
  srand(hexdec(substr($hash,0,8)));
  // Create a random string the same length as the default
  $val = '';
  for($i = 1; $i <= strlen($original); $i++){
    $val .= substr( $chars, rand(0,strlen($chars))-1, 1);
  }
  // Reset the RNG
  srand();
  // Set the value
  return $val;
}
$array = openshift_secure($_default_keys,'make_secure_key');
foreach ($array as $key => $value) {
  define($key,$value);
}
$table_prefix  = 'f7xI0OhvE2_';
define('WPLANG', '');
define('WP_DEBUG', false);
define('FORCE_SSL_ADMIN', true);
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
