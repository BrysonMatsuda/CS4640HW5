
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
                break;
            case "answer":
                $this->submitAnswer();
                break;
            case "answer2":
                $this->submitAnswer2();
                break;
            case "manualsessiondestroy":
                $this->sessionDestroyer();
                break;
            case "playagain":
                $this->playAgain();
                break;
            case "quitgame":
                $this->exitGame();
                break;
            default:
                $this->showWelcomePage();
                break;
        }
    }

    public function sessionDestroyer(){
        session_destroy();

        header("Location: welcome.php");
        exit();
    }

    public function showWelcomePage(){
        include("welcome.php");
    }

    public function showCategories(){
        $selectedCategories = $this -> chooseFourCategories();

        include("gametable.php");
    }

    public function playAgain(){
        $_SESSION["currentGameCategories"] = $this->chooseFourCategories();
        $_SESSION["guesses"] = 0;
        $_SESSION["guessArray"] = array();
        $_SESSION["allWords"] = [];

        $this->playGame();
    }

    public function exitGame(){
        $name = $_SESSION["name"];
        $email = $_SESSION["email"];
        $guesses = $_SESSION["guesses"];
        $allWordsList = $_SESSION["allWords"];
        $currentGameCategories = $_SESSION["currentGameCategories"];
        include("gameover.php");
    }

    public function submitAnswer(){
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["answer"])) {
            $userAnswer = $_POST["answer"];
            $selectedCategories = $_SESSION["currentGameCategories"];

            $correctGuesses = 0;
            $submittedWords = explode(" ", $userAnswer);

            foreach($submittedWords as $submittedWord){
                foreach($selectedCategories as $category => $words){
                    if(in_array($submittedWord, $words)){
                        $correctGuesses++;
                        break;
                    }
                }
            }

            header("Location: gamepage.php");
            exit();
        } else {
            echo "Invalid form submission!";
        }
    }

    public function submitAnswer2(){
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["answer"])) {
            $userAnswer = $_POST["answer"];
            $currentCategories = $_SESSION["currentGameCategories"];
            $_SESSION["guesses"] += 1;

            $numericGuesses = explode(" ", $userAnswer);


            $wordAnswersArray = array();
            foreach($numericGuesses as $guessIndex){
                array_push($wordAnswersArray, $_SESSION["allWords"][(int)$guessIndex-1]);
            }
            //var_dump($wordAnswersArray);

            $minCount = 100;
            $blocker = true;
            foreach($currentCategories as $key => $value){
                

                $uniqueArray = array_unique(array_merge($value, $wordAnswersArray));
                //var_dump($uniqueArray);
                
                if(count($uniqueArray) == 4){//4 elements in the merged unique array, which means that all of the words were the same 
                    //remove from the allWords array, log the guess as correct
                    $blocker = false;
                    foreach($numericGuesses as $guessIndex){
                        unset($_SESSION["allWords"][$guessIndex-1]);
                    }
                    $_SESSION["allWords"] = array_values($_SESSION["allWords"]);//makes the indexs be 0-end instead of 0, 3, 4, 5 bc we removed 1 and 2
                    array_push($wordAnswersArray, "Correct Guess! Category: $key");
                    //var_dump($wordAnswersArray);
                    array_push($_SESSION["guessArray"], $wordAnswersArray);

                    //STILL NEED TO CHECK IF GAME IS OVER!!!!!!
                }

                $currCount = count($uniqueArray);

                if($currCount-4 < $minCount){
                    $minCount = $currCount-4;
                }
                
            }

            if($minCount <= 2 && $blocker){//blocker just exists because I add the message above if they got the guess right, so i dont want to add the message again. sorry for bad code
                $num = 4-$minCount;
                array_push($wordAnswersArray, "Incorrect Guess, but you had $num in the same category!");
                array_push($_SESSION["guessArray"], $wordAnswersArray);
            }
            else if($blocker){
                array_push($wordAnswersArray, "Incorrect Guess :(");
                array_push($_SESSION["guessArray"], $wordAnswersArray);
            }

            $this->playGame();
            
        }
    }

    public function playGame(){
        
        if(!isset($_SESSION["currentGameCategories"])){
            $_SESSION["currentGameCategories"] = $this->chooseFourCategories();
            $tempArray = array();
            foreach($_SESSION["currentGameCategories"] as $key => $value){
                //var_dump($value);
                $tempArray=array_merge($tempArray, $value);
                
            }
            shuffle($tempArray);
            $_SESSION["allWords"] = $tempArray;
        }
        //comment below 2 lines out
        //echo("PLAY GAME!");
        $currentGameCategoriesLocalVariable = $_SESSION["currentGameCategories"];
        $name = $_SESSION["name"];
        $email = $_SESSION["email"];
        $guesses = $_SESSION["guesses"];
        $allWordsList = $_SESSION["allWords"];
        $guessArray = $_SESSION["guessArray"];

        //i would also set a variable for number of guesses here
        //and an array of past guesses (words)

        $size = count($allWordsList);

        
        //var_dump($currentGameCategoriesLocalVariable);
        //var_dump($allWordsList);

        include("gametable.php");


    }

    public function checkPostedInfo(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(!empty($_POST["name"]) && !empty($_POST["email"])){
                $_SESSION["name"] = $_POST["name"];
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["guesses"] = 0;
                $_SESSION["guessArray"] = array();
                $this->playGame();
                //header("Location: index.php?command=showcategories");
                //exit();
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