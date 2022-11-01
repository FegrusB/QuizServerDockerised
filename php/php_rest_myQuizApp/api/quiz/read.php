<?php
    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: aplication/json');

    include_once '../../config/Database.php';
    include_once '../../models/Quiz.php';

    // Instansiate and connect to db

    $database = new Database();
    $db = $database->connect();

    $quiz = new Quiz($db);

    //read quiz db query
    $result = $quiz->read();
    $num = $result->rowCount();

    //if quizes returned
    if($num > 0  ){
        $quizes_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $quiz_item = array(
                '_id' => $_id,
                'Name' => $Name,
                'Desc' => $Description
            );
            
            array_push($quizes_arr,$quiz_item);
        }
        echo json_encode($quizes_arr);
    }else{echo json_encode(array('message'=>'no quizzes found'));}