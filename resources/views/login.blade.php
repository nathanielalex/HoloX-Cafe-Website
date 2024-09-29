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
    
            Login
            <form action="/login" method="POST">
                @csrf
                <div class="input-form">

                    <input type="email" name="email" placeholder="enter email" class="input-class" value={{Cookie::get('mycookie') !== null ? Cookie::get('mycookie') : ""}}>
                </div>
                <div class="input-form">

                    <input type="password" name="password" placeholder="password" class="input-class">
                </div>
                <div>

                    <input type="checkbox" name="remember" class="checkbox-input" checked={{Cookie::get('mycookie') !== null}}>Remember Me
                </div>
                
                <div class="submit-button-container">

                    <input type="submit" value="Submit" class="submit-btn">
                </div>
                <div class="form-link">
                    <span>Don't have an account? <a href="/register" class="signup-link">Register</a></span>
                </div>
        
            </form>
        </div>
    </div>
    
</body>
</html>