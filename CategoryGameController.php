
<?php

class CategoryGameController {

    private $categories = [];

    //CONSTRUCTOR
    public function __construct($input){
        session_start();
        $this->input = $input;
        $this->loadCategoriesFromJSON();
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
            case "showcategories":
                $this->showCategories();
            case "answer":
                $this->submitAnswer();
                break;
            default:
                $this->showWelcomePage();
                break;
        }
    }

    public function showWelcomePage(){
        include("welcome.php");
    }

    public function showCategories(){
        $selectedCategories = $this -> chooseFourCategories();

        include("gamepage.php");
    }

    public function playGame(){
        
        if(!isset($_SESSION["currentGameCategories"])){
            $_SESSION["currentGameCategories"] = $this->chooseFourCategories();
        }
        //comment below 2 lines out
        echo("PLAY GAME!");
        $currentGameCategoriesLocalVariable = $_SESSION["currentGameCategories"];
        $currentNameLocalVariable = $_SESSION["name"];
        $currentEmailLocalVariable = $_SESSION["email"];
        $currentGuessesLocalVariable = $_SESSION["guesses"];

        //i would also set a variable for number of guesses here
        //and an array of past guesses (words)

        
        var_dump($currentGameCategoriesLocalVariable);


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


    public function loadCategoriesFromJSON(){
        $this->categories = json_decode(file_get_contents("connections.json"), true);
    }

    public function chooseFourCategories(){
        $chosenCategories = array_rand($this->categories, 4);//chooses 4 random keys from the categories list
        $finalArray = array();
        foreach($chosenCategories as $element){
            $tempArray = array();
            $wordKeyArray = array_rand($this->categories[$element],4);//puts the keys of 4 words from the current category into wordKeyArray
            foreach($wordKeyArray as $wordKey){
                array_push($tempArray, $this->categories[$element][$wordKey]);
            }
            $finalArray[$element] = $tempArray;
        }
        return $finalArray;
    }
}