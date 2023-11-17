<?php
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $username= $_POST["username"];
    $password= $_POST["pwd"];

    try 
    {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_controller.inc.php';
        //require_once 'login_view.inc.php';

        //handlers
        $errors = [];

        if(is_input_empty($username, $password, $email))
        {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)) 
        {
          $errors["login_incorrect"] = "Incorrect login info!";  
        }
        if (!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) 
        {
            $errors["login_incorrect"] = "Incorrect login info!"; 
        }

        require_once "config_session.inc.php";

        if($errors) //returns true if it has data inside, false, if not.
        {
            $_SESSION["errors_signup"] = $errors;
            

            header("Location: ../index.php");
            die();
        }
    } 
    catch(PDOException $e)
    {
        die("Query failed: " . $e -> getMessage());
    }
    catch(Exception $e)
    {
        die("Unexpected error accured: " . $e -> getMessage());
    }
}
else
{
    header("Location: ../index.php");
    die();
}
?>