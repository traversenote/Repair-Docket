<?php

function test_input($data) {
  $data = trim($data);
  $data = addslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
  
function decode_input($data) {
	$data = stripslashes($data);
	$data = htmlspecialchars($data, ENT_QUOTES);
	$data = html_entity_decode($data);
	return $data;
}
 
// How long before records should turn red, indicating that they need some attention
$attentionTime = '-2';

?>
