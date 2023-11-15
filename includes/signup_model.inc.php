<?php 
declare(strict_types=1);

function get_username(object $pdo , string $username)
{
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query); //sql injection prevention

    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
};
function get_email(object $pdo , string $email)
{
    $query = "SELECT username FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query); //sql injection prevention

    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
};

function check_signup_errors()
{
    if(isset($_SESSION["errors_signup"]))
    {
        $errors = $_SESSION["errors_signup"];

        echo "<br>";
        foreach($errors as $error)
        {
            echo '<p class="form-error">'. $error .'</p>';
        }
        unset($_SESSION["errors_signup"]);
    }
}; 
?>