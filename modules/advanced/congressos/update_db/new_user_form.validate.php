<?php
/*
File revision date: 30-jan-2009
*/
defined('ON_SiTe') or die('Direct Access to this location is not allowed.');
if(isset($_GET['lang'])):
	$lang=$_GET['lang'];
else:
	$lang=$staticvars['language']['main'];
endif;
if(!is_file($staticvars['local_root'].'modules/congressos/language/'.$lang.'.php')):
	include($staticvars['local_root'].'modules/congressos/language/pt.php');
else:
	include($staticvars['local_root'].'modules/congressos/language/'.$lang.'.php');
endif;

if($_POST['affiliation']==''):
	$_SESSION['goback']=true;
	$_SESSION['affiliation']=$regu[1];
endif;
if($_POST['address1']==''):
	$_SESSION['goback']=true;
	$_SESSION['address1']=$regu[2];
endif;
if($_POST['city']==''):
	$_SESSION['goback']=true;
	$_SESSION['city']=$regu[3];
endif;
if($_POST['postal']==''):
	$_SESSION['goback']=true;
	$_SESSION['postal']=$regu[4];
endif;
if($_POST['country']==''):
	$_SESSION['goback']=true;
	$_SESSION['country']=$regu[5];
endif;
if($_SESSION['goback']==true):
	$_SESSION['congress']=$muf[10];
endif;
?>