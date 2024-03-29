<!DOCTYPE html>
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CS4640 Spring 2024">
    <meta name="description" content="Our Front-Controller Connections Game">
    <title>Welcome Page</title>
    <link rel = "stylesheet" href = "styles/styles.css">
</head>
<body>
    <h1>
        Welcome to Connections!
    </h1>
    <div class = "row">
        <div class = "col-xs-12">
            <p> 
                Login
            </p>  
            <form action = "index.php?command=postwelcome" method = "POST" class = "form-inputs">
                <div class = "mb-3">
                    <label for="name">Username</label>
                        <input type="text" id = "name" name = "name" minlength="3">
                </div>
                <div class = "mb-3">
                    <label for="email">Email</label>
                        <input type="text" id = "email" name = "email" minlength="5">
                </div>
                <button type = "submit" class = "submit-button">Start</button>
            </form>
        </div>
    </div>
    
</body>