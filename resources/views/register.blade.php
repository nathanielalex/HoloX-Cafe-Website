<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/loginPage.css">
</head>
<body>
    <div class="container">
        
        <div class="form-container">
            Register
            <form action="/register" method="POST">
                @csrf
                <div class="input-form">
                    <input type="text" name="name" placeholder="name"  class="input-class">
                </div>
                
                <div class="input-form">
                    <input type="email" name="email" placeholder="enter email"  class="input-class">
                </div>
                
                <div class="input-form">
                    <input type="password" name="password" placeholder="password" class="input-class">
                </div>
                
                
                <div class="submit-button-container">
                    <input type="submit" value="Submit" class="submit-btn">
                </div>
        
            </form>
        </div>
    </div>
</body>
</html>