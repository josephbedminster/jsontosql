<?php

getParams();

function getParams() {
	if (!is_writable(".")) {
		echo "Change rights of this folder before continue";
		exit;
	}
	echo "Path of your JSON file :\n";
	$jsonFile = trim(fgets(STDIN));
	if (!file_exists($jsonFile)) {
		echo "File not found !\n";
		exit;
	}
	echo "Name for the output file :\n";
	$outputFile = trim(fgets(STDIN));
	if (file_exists($outputFile)) {
		echo "File already exist !\n";
		exit;
	}
	echo "Your database name :\n";
	$database = trim(fgets(STDIN));
	echo "Your table name :\n";
	$table = trim(fgets(STDIN));
	jsonToSql($jsonFile, $outputFile, $database, $table);
}
function jsonToSql($jsonFile, $outputFile, $database, $table) {
	$json = file_get_contents($jsonFile); 
	$data = json_decode($json);
	$fp = fopen ($outputFile, "w");
	$i = 0;
	foreach ($data as $obj) {
		$name = $obj->name;
		$fullname = $obj->fullname;
		$address = $obj->address;
		$name = addslashes($name);
		$sql = "INSERT INTO `$database`.`$table` (`ID`, `NAME`, `FULLNAME`, `ADDRESS`) VALUES (NULL, '$name', '$fullname', '$address');\n";
		fputs ($fp, $sql);
		$i++;
	}
	echo "Done. File ".$outputFile." has been created with ".$i." entries.\n";
}

?>