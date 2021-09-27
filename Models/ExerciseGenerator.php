<?php

namespace Models;
use PDO;

class ExerciseGenerator{
    
    private $num1;
    private $num2;
    private $operation;

    public function __construct(){
        $this->operation=$this->randomOperator();
        $this->num1=$this->randomNumberGenerator();
        $this->num2=$this->randomNumberGenerator();
    }

    public function generateExercise($dbcon){
        $exercise=$this->num1.' '.$this->operation.' '.$this->num2;
        $result=($this->operation==="*")?($this->num1*$this->num2):($this->num1+$this->num2);

        $insertExercise=$dbcon->prepare('INSERT INTO exercises SET num1= :num1, num2=:num2, operation=:operation, result=:result');
        $insertExercise->bindParam(':num1', $this->num1);
        $insertExercise->bindParam(':num2', $this->num2);
        $insertExercise->bindParam(':operation', $this->operation);
        $insertExercise->bindParam(':result', $result);

        if ($insertExercise->execute()) {
            $getId=$dbcon->prepare('SELECT MAX(id) AS m_id FROM exercises');
            $getId->execute();
            $row=$getId->fetch(PDO::FETCH_ASSOC);

            return array(
                "exercise"=>$exercise,
                "id"=>$row['m_id']
            );
            die();
        }

        printf("Error: %s \n", $insertExercise->error);
        return false;
    }

    public function checkTheAnswer($dbcon, $id, $user_answer){
        $getResult=$dbcon->prepare('SELECT result FROM exercises WHERE id=:id');
        $getResult->bindParam(":id", $id);
        $getResult->execute();

        if (($getResult->rowCount())>0) {
            $correct_answer=$getResult->fetch(PDO::FETCH_ASSOC);

            if($user_answer==$correct_answer['result']){
                return array(
                    'message'=>'Correct Answer!'
                );
            }else{
                return array(
                    'message'=>'Incorrect Answer!'
                );
            }
        }else{
            return array(
                'message'=>'This id doesn\'t exist!'
            );
        }
    }

    public function randomNumberGenerator(){

        $randomNumber=0;
        switch ($this->operation) {
            case '+':
                $randomNumber=rand(0,50);
                break;
            case '*':
                $randomNumber=rand(0,10);
                break;
            
            default:
                echo "Wrong input";
                break;
        }

        return $randomNumber;
    }

    public function randomOperator(){
        $operators_array=array('+','*');
        $randomized_operators=array_rand($operators_array,1);
        return $operators_array[$randomized_operators];
    }

}