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
        Welcome to the Page
    </h1>
    <div class = "row">
        <div class = "col-xs-12">
            <p> 
                This is some testing input
            </p>  
            <form action = "?command=question" method = "POST" class = "form-inputs">
                <div class = "mb-3">
                    <label for="username">Username</label>
                        <input type="text" id = "username" name = "username" minlength="3">
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