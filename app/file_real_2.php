<?
/*
*		파일저장시 원본 파일명	
*/
for($t=0;$t<$fileNum_2 ;$t++ ){	
	if(${"fileRM".$t}){	 // 수정일때.
		if($_FILES["up_file_2".$t]["name"]){	 // 다른 이미지를 올릴때.
			$fileNames_2.=$_FILES["up_file_2".$t]["name"]."/";
		}else if($del_file_2[$t]){	// 삭제를 체크했을때.			
			$DelFiles=explode("///",$del_file_2[$t]);
			//echo$fileN_del[0]."<br>".$DelFiles[0];exit;
			// 밀리지 않게 하려면 ereg_replace 함수 가운데 '/' 추가.
			if($upfile_ck=="Y"){$sl="/";}
			else {$sl="";}
			$fileNames_2.=@str_replace($DelFiles[0]."/","$sl",$DelFiles[0]."/");			
		}else{	// 이미지는 유지.
			$fileNames_2.=${"fileRM".$t}."/";
		}
	}else{	// 처음 이미지등록.
		if($upfile_ck=="Y"){	// 파일 밀리지않게.
			$fileNames_2.=$_FILES["up_file_2".$t]["name"]."/";			
		}else {
			if($_FILES["up_file_2".$t]["name"]){$slash="/";}
			else{$slash="";}		
			$fileNames_2.=$_FILES["up_file_2".$t]["name"].$slash;
		}		
	}
	// 첨부파일 설명.	
	if(($_FILES["up_file_2".$t]["name"] || ${"fileRM".$t}) && !$del_file_2[$t]){
		$fcCk=$fileCm_ck[$t];
		if($fcCk=="Y"){
			$files_comments.=$files_comment[$t]."/%|789512364|%/";
		}else {
			$files_comments.="/%|789512364|%/";
		}
	}
}
?>