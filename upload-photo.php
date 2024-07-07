<?php
if($_SERVER['REQUEST_METHOD']==='POST')
{
    $input = json_decode(file_get_contents('php://input'),true);
    $imgData = $input['image'];
    $base64Data = str_replace('data:image/png;base64,','',$imgData);
    $base64Data = str_replace('','+',$base64Data);
    $decodeData = base64_decode($base64Data);
    $filepath = 'uploads/photo_'.time() . '.png';
    if(file_put_contents($filepath,$decodeData))
    {
        echo json_decode(['success' => true, 'message'=> 'photo uploaded successfully','filepath'=> $filepath]);
     }
     else{
        echo json_encode(['success'=> false, 'image'=> 'Invalid request method']);
     }
    }
    else{
         echo json_encode(['sucess'=> false,'message'=> 'Invalid request method']);
    }
?>