<?php
ini_set("session.use_only_cookies", 1);  //This line ensures that the session ID is passed only through cookies and not through URLs, enhancing security.
ini_set("session.use_strict_mode", 1);  //This enables strict mode, which prevents the use of uninitialized session IDs, protecting against session fixation attacks.

//Sets the parameters for the session cookie, including its lifetime, domain, path, and security settings.
session_set_cookie_params([
    "lifetime"=> 1800,      //30 minutes
    "domain" =>"localhost",//the cookie is only valid for the localhost domain.
    "path" => "/",        //the cookie is available across the entire domain.
    "secure" => true,    //Ensures the cookie is only sent over secure HTTPS connections.
    "httponly" => true  //Makes the cookie inaccessible to JavaScript, reducing the risk of cross-site scripting attacks.
]);

session_start();  //This function starts a new session or resumes an existing one based on the session ID passed through the cookie.

if (isset($_SESSION["user_id"])) 
{
    if(!isset( $_SESSION["last_regeneration"]))
    {
        regenerate_session_id_loggedin();  
    }  
    else
    {
        $interval = 60 * 30;
        if(time() - $_SESSION["last_regeneration"] >= $interval)  //if more than 30 min have passed since the last regen, the following func is called:
        {
            regenerate_session_id_loggedin();
        }
    }
}
else
{
    if(!isset( $_SESSION["last_regeneration"]))
    {
        regenerate_session_id();
    }   
    else
    {
        $interval = 60 * 30;
        if(time() - $_SESSION["last_regeneration"] >= $interval)
        {
            regenerate_session_id();
        }
    }
}



function regenerate_session_id()
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}

function regenerate_session_id_loggedin()
{
    session_regenerate_id(true);

    $userId = $_SESSION["user_id"];                     //
    $newSessionId = session_create_id();               //
    $sessionId = $newSessionId . "_" .  $userId;      // -> Custom session ID strategy adds an additional layer of security by binding the session to the user ID.
    session_id($sessionId);                          //

    $_SESSION["last_regeneration"] = time();
}
?>