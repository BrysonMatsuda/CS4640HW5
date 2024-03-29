<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="CS4640 Spring 2024">
  <meta name="description" content="Our Connections Game">  
  <title>Connections</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"  crossorigin="anonymous">       
</head>

<body>
    
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center mb-4">Connections Game</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>User: <?php echo $name; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Number of Guesses: <?php echo $guesses; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    Words
                </div>
                <div class="card-body">
                    
                    <?php if($size >= 4){ ?>
                        <table class="table table-striped table-dark table-bordered">
                        <tr>
                            <td><?php echo 1 ?>: <?php echo $allWordsList[0] ?></td>
                            <td><?php echo 2 ?>: <?php echo $allWordsList[1] ?></td>
                            <td><?php echo 3 ?>: <?php echo $allWordsList[2] ?></td>
                            <td><?php echo 4 ?>: <?php echo $allWordsList[3] ?></td>
                        </tr>
                    <?php } ?>
                    <?php if($size >= 8){ ?>
                        
                        <tr>
                            <td><?php echo 5 ?>: <?php echo $allWordsList[4] ?></td>
                            <td><?php echo 6 ?>: <?php echo $allWordsList[5] ?></td>
                            <td><?php echo 7 ?>: <?php echo $allWordsList[6] ?></td>
                            <td><?php echo 8 ?>: <?php echo $allWordsList[7] ?></td>
                        </tr>
                    <?php } ?>
                    <?php if($size >= 12){ ?>
                        
                        <tr>
                            <td><?php echo 9 ?>: <?php echo $allWordsList[8] ?></td>
                            <td><?php echo 10 ?>: <?php echo $allWordsList[9] ?></td>
                            <td><?php echo 11 ?>: <?php echo $allWordsList[10] ?></td>
                            <td><?php echo 12 ?>: <?php echo $allWordsList[11] ?></td>
                        </tr>
                    <?php } ?>
                    <?php if($size == 16){ ?>
                        
                        <tr>
                            <td><?php echo 13 ?>: <?php echo $allWordsList[12] ?></td>
                            <td><?php echo 14 ?>: <?php echo $allWordsList[13] ?></td>
                            <td><?php echo 15 ?>: <?php echo $allWordsList[14] ?></td>
                            <td><?php echo 16 ?>: <?php echo $allWordsList[15] ?></td>
                        </tr>
                    <?php } ?>
                        
                    </table>
                    <p>Enter numeric IDs of your guess (space separated):</p>
                    <form action="?command=answer2" method="post">
                        <input type="text" class="form-control mb-3" id="connections-answer" name="answer">
                        <button type="submit" class="btn btn-primary">Submit Guess</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center">
                    Guesses So Far:
                </div>
                <div class="card-body">
                        <table class="table table-dark table-bordered">
                        <?php foreach($guessArray as $array): ?>
                            <tr>
                                <td><?php echo $array[0] ?></td>
                                <td><?php echo $array[1] ?></td>
                                <td><?php echo $array[2] ?></td>
                                <td><?php echo $array[3] ?></td>
                                <td><?php echo $array[4] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </table>


                        
                </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col text-end">
                <a href="gameover.php" class="btn btn-sm btn-danger mt-3">Exit Game</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

