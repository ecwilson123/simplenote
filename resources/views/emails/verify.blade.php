<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
    </head>
    
    <body>
        <h2>Please verify your email address</h2>
        
        <div>
            Thanks for creating an account with simplenote! Please follow the link below to verify your email address {{ URL::to('auth/register/verify/' . $confirmation_code) }}.<br>
        </div>
    </body>
</html>