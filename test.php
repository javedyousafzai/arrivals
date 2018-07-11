<?php

echo ("Arrivals to Europe<br />");

/*	CONNECT TO DATABASE*/
 $db = mysqli_connect('localhost','root', '','europe_rm')
 or die('Error connecting to MySQL server.');

//perorm query
$query = "SELECT * FROM arrivals";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
 echo $row['CoA'] . ' ' . $row['year'] . ': ' . $row['CoOrigin'] .'<br />';
}

/* get the difference of the tow numbers*/

$val = round(getDifference (30000, 10000),1).'%';

echo$val;

function getDifference($oldValue, $newValue)
{
$diff = $newValue - $oldValue;
$percentageDiff = ($diff/$oldValue)*100;
return $percentageDiff;
}

?>