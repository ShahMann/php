
<?php

$dynamic = [
    'number' => 7,
    'live' => 'House',
    'drive' => 'Car',
];

$one = is_array($dynamic);

$two = is_array($dynamic['number']);

$three = is_array($dynamic[0]);

print_r ($dynamic['number']);

echo $one ? 'The $dynamic variable is an array<br>' : 'The $dynamic variable is not an array<br>';
echo $two ? 'The "number" key of the $dynamic variable is an array<br>' : 'The "number" key of the $dynamic variable is not an array<br>';
echo $three ? 'The 0 index of the $dynamic variable is an array<br>' : 'The 0 index of the $dynamic variable is not an array<br>';

?>