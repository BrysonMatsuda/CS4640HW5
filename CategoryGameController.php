
<?php

class CategoryGameController {

    //CONSTRUCTOR
    public function __construct($input){
        session_start();
        $this->input = $input;
    }

    public function run(){

        $command = "none";
        if (isset($this->input["command"])){
            $command = $this->input["command"];
        }

        switch($command){
            case "postwelcome":
                $this->checkPostedInfo();
                break;
            default:
                $this->showWelcomePage();
                break;
        }
    }

    public function showWelcomePage(){
        include("welcome.php");
    }

    public function playGame(){
        echo("PLAY GAME!");
    }

    public function checkPostedInfo(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(!empty($_POST["name"]) && !empty($_POST["email"])){
                $_SESSION["name"] = $_POST["name"];
                $_SESSION["email"] = $_POST["email"];
                $this->playGame();
            }
            else{
                echo("Please enter a username and password!");
                include("welcome.php");
            }
        }
        else{
            echo("Please enter a username and password!");
            include("welcome.php");
        }

    }
}