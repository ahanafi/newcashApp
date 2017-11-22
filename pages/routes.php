<?php

if ($page == "profil") {
	
	if ($act == "") {
		include_once 'pages/'.$page.'/sejarah.php';
	} else {
		include_once 'pages/'.$page.'/'.$act.'.php';
	}

} elseif ($page == "data_truk" || $page == "data_sopir") {
	$pg = explode("_", $page);
	$pg = $pg[1];

	if ($act == "") {
		include_once 'pages/'.$pg.'/daftar_'.$pg.'.php';
	} else {
		include_once 'pages/'.$pg.'/'.$act.'.php';
	}

} elseif($page == "registrasi") {

	if ($act == "") {
		include_once 'pages/'.$page.'/registrasi.php';
	} else {
		include_once 'pages/'.$page.'/'.$act.'.php';
	}

} elseif($page == "laporan") {

	if ($act == "") {
		include_once 'pages/'.$page.'/index.php';
	} else {
		include_once 'pages/'.$page.'/'.$act.'.php';
	}

} elseif ($page == "user") {
	
	if ($act == "") {
		include_once 'pages/'.$page.'/detail.php';
	} else {
		include_once 'pages/'.$page.'/'.$act.'.php';
	}

} else if($page == "") {
	include_once 'pages/index.php';
} else {
	include_once 'pages/404.php';
}
?>