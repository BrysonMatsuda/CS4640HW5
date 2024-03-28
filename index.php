<!DOCTYPE html>
<head>
    <title>Welcome Page</title>
    <link rel = "stylesheet" href = "../styles/styles.css">
</head>
<body>
    <h1>
        Welcome to the Page
    </h1>
    <div class = "container">
        <p> 
            This is some testing input
        </p>  
        <form action = "" method = "GET" class = "form-inputs">
            <div>
                <label for="username">Username</label>
                    <input type="text" id = "username" name = "username" minlength="3">
            </div>
            <div>
                <label for="password">Password</label>
                    <input type="text" id = "password" name = "password" minlength="5">
            </div>
            <button type = "submit" class = "submit-button">Submit</button>
        </form>
    </div>
    
</body>