
<?php


$headers = 'From: <JeMoeder@illuminatie.nl>' . "\r\n" .
'Reply-To: <JeMoeder@illuminatie.nl';

$test = mail('<jim.parengkuan@gmail.com>', 'Hey Geile Jongen', 'Wil je daten???', $headers,
  '-fwebmaster@example.com');


var_dump($test);

?>
