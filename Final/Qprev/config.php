<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');



function mysql_unreal_escape_string($string) {
  $characters = array('x00', 'n', 'r', '\\', '\'', '"','x1a');
$o_chars = array("\x00", "\n", "\r", "\\", "'", "\"", "\x1a");
 for ($i = 0; $i < strlen($string); $i++) {
if (substr($string, $i, 1) == '\\') {
    foreach ($characters as $index => $char) {
 if ($i <= strlen($string) - strlen($char) && substr($string, $i + 1, strlen($char)) == $char) {
$string = substr_replace($string, $o_chars[$index], $i, strlen($char) + 1);
  break;
    } } } }
    return $string;
}












?>
