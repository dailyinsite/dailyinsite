<?php
// default redirection
$url = $_REQUEST["callback"].'?callback_func='.$_REQUEST["callback_func"];
$bSuccessUpload = is_uploaded_file($_FILES['Filedata']['tmp_name']);

// SUCCESSFUL
if(bSuccessUpload) {
	/*
	*	 �����Ϳ��� �����̸��� ���� ��� ó���ϴ� �κ��� ���� ���ε�� �̸��� ���� ����� ��.
	*/
	$rand=rand(0,9);
	$spt=explode(".",$_FILES['Filedata']['name']);
	$extention=$spt[sizeof($spt)-1];
	$_FILES['Filedata']['name']="IMG_".date("YmdHis").$rand.".".$extention;	

	$tmp_name = $_FILES['Filedata']['tmp_name'];
	$name = $_FILES['Filedata']['name'];
	
	$filename_ext = strtolower(array_pop(explode('.',$name)));
	$allow_file = array("jpg", "png", "bmp", "gif");
	
	if(!in_array($filename_ext, $allow_file)) {
		$url .= '&errstr='.$name;
	} else {
		$uploadDir = '../../../files/se_upload/';
		if(!is_dir($uploadDir)){
			mkdir($uploadDir, 0777);
		}
		
		$newPath = $uploadDir.urlencode($_FILES['Filedata']['name']);
		
		@move_uploaded_file($tmp_name, $newPath);
		
		$url .= "&bNewLine=true";
		$url .= "&sFileName=".urlencode(urlencode($name));
		$url .= "&sFileURL=http://$_SERVER[HTTP_HOST]/files/se_upload/".urlencode(urlencode($name));
	}
}
// FAILED
else {
	$url .= '&errstr=error';
}
	
header('Location: '. $url);
?>