<?php

$numbers = [12, 234651, 234, 41, 89, 196583, 1, 86, 3, 5, 9];

echo max($numbers) . '<br>';

echo min($numbers) . '<br>';

$rand = array_rand($numbers);

echo $rand;