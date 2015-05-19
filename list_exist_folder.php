<?php
$folder_arr = scandir('images');
foreach($folder_arr as $key => $val){
	if($val === '.' || $val === '..'){
		unset($folder_arr[$key]);
	}
}
usort($folder_arr, "strnatcmp");
$data['code'] = 1;
$data['data'] = $folder_arr;
echo json_encode($data);
exit;
?>