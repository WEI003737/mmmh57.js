<?php
$uploads = __DIR__ . '/uploads/';

$output = [
  'newname' => '',
  'name' => '',
  'error' => ''
];

$ext = '';
switch ($_FILES['myfiles']['type']){
    case 'images/jpeg':
        $ext = '.jpg';
        break;
    case 'images/png':
        $ext = '.png';    
};

if(empty($ext)){

}else {
    $filename = md5(uniqid(). $_FILES['myfiles']['name']);
    $filename .= $ext;
    $output['newname'] = $filename;
    //搬移檔案
    move_uploaded_file($_FILES['myfiles']['tmp_name'], $uploads. $filename);
};
