<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:GET, POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

spl_autoload_register(function($class){
    require_once "../".$class.".php";
});

$exerciseGenerator=new \Models\ExerciseGenerator;
$db = new Components\Database;
$conn=$db->connect();


if ($_SERVER['REQUEST_METHOD']=="GET") {
    if(isset($_GET['getExercise'])){
        echo json_encode($exerciseGenerator->generateExercise($conn));
    }
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $data=json_decode(file_get_contents('php://input'));

    $data_key=array_keys((array)$data);

    if((!in_array("id",$data_key)) || !in_array("answer",$data_key)){
        echo json_encode(array(
            "message"=>"Wrong JSON data given in!"
        ));
    }else{
        $exercise_id=$data->id;
        $user_answer=$data->answer;
        echo json_encode($exerciseGenerator->checkTheAnswer($conn, $exercise_id, $user_answer));

    }
}