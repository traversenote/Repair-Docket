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
	return $data;
}
 
// How long before records should turn red, indicating that they need some attention
$attentionTime = '-2';

// Script to make entire rows links
echo "<script>\nfunction change(){\ndocument.getElementById('displayFilter').submit();\n}\n</script>\n";

?>