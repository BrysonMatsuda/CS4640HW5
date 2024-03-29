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
            <h1 class="text-center mb-4">Game Over</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>User: <?php echo $name; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Total Guesses: <?php echo $guesses; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    Correct Categories:
                </div>
                <div class="card-body">
                    <?php foreach ($_SESSION["currentGameCategories"] as $category => $words): ?>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <?php echo $category; ?>
                                    </div>
                                    <div class="card-body">
                                    <ul>
                                    <?php foreach ($words as $word): ?>
                                        <li><?php echo $word; ?></li>
                                    <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <form action="index.php?command=playagain" method="post">
                        <button type="submit" class="btn btn-primary">Play Again</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-end">
                <form action="index.php?command=manualsessiondestroy" method="post">
                    <button type="submit" class="btn btn-sm btn-danger mt-3">Exit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>