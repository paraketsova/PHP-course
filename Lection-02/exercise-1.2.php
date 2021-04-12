<?php
$is_first_name = isset($_GET['firstName']);
$is_last_name = isset($_GET['lastName']);
$return_string;
if ($is_first_name && $is_last_name) {
  $return_string = "Hej $_GET[firstName] $_GET[lastName]";
} else if ($is_first_name && !$is_last_name) {
  $return_string = "Hej $_GET[firstName] efternamn saknas";
} else if (!$is_first_name && $is_last_name) {
  $return_string = "Hej $_GET[lastName] förnamn saknas";
} else {
  $return_string = "Hej! Både för och efternamn saknas";
}
echo $return_string;