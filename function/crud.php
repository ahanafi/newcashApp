<?php
function select($columns, $table, $conditions = NULL) {
	if ($conditions != NULL) {
		$sql = "SELECT $columns FROM $table WHERE $conditions ";
	} else {
		$sql = "SELECT $columns FROM $table";
	}

	return getData($sql);
}

function getData($sql){
	global $link;
	if ($data = mysqli_query($link, $sql)) {
		//print_r($data);
		return $data;
	}
}

function execute($sql){
	global $link;
	if (mysqli_query($link, $sql) or die(mysqli_error($link))) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function insert($table, $cols, $values){
	$sql = "INSERT INTO $table ($cols) VALUES ($values) ";

	return execute($sql);
}

function update($table, $data, $id){
	$sql = "UPDATE $table SET $data WHERE id = $id ";
	//die($sql);
	return execute($sql);
}

function delete($table, $id){
	$sql = "DELETE FROM $table WHERE id = $id ";

	return execute($sql);
}

function cekRow($sql) {
	return mysqli_num_rows($sql);
}
?>