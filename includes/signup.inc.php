<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $username= $_POST["username"];
    $password= $_POST["pwd"];
    $email= $_POST["email"];

    try 
    {
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_controller.inc.php";

        //handlers
        if(is_input_empty($username, $password, $email))
        {

        }
        if(is_email_invalid($email))
        {

        }
        if(get_username($pdo , $username))
        {

        }
        if(is_email_registered($pdo, $email))
        {

        }

    } catch(PDOException $e)
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