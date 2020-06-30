<?php
// header('Access-Control-Allow_Origin: *');
// header('Content-type: application/json');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,
//  Access-Control-Allow-Methods, Authorization, X-Requested-With, Origin, Accept');
// header('Access-Control-Request-Headers:content-type');
// header('Access-Control-Request-Method:POST');
// header('Access-Control-Allow-Credentials:true');


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
// // Makes IE to support cookies
header("Content-Type: application/json; charset=utf-8");
include_once '../../config/Database.php';
include_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();
$post = new Post($db);


$data=json_decode(file_get_contents("php://input"));


$post->uname =$_POST["uname"];
$post->email = $_POST["email"];
$post->phone = $_POST["phone"];
$post->date_query=$_POST["date_query"];
$post->comments = $_POST["comments"];






if($post->create()) {
    echo json_encode(
     array('message'=> 'Post Created')
    );

} else {
    echo json_encode(
        array('message'=> 'Post Not Created')
    );
}

