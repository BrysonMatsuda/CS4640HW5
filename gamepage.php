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
                    <?php foreach ($selectedCategories as $category => $words): ?>
                        <h5 class="card-title text-center"><?= $category ?></h5>
                        <ul>
                            <?php foreach ($words as $word): ?>
                                <li><?= $word ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                    <p>Enter numeric IDs of your guess (space separated):</p>
                    <form action="?command=answer" method="post">
                        <input type="text" class="form-control mb-3" id="connections-answer" name="answer">
                        <button type="submit" class="btn btn-primary">Submit Guess</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

