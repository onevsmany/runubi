<?php

require_once("config.php");

if (!empty($_POST)) {
    $name = trim($_POST["name"]);       //name received form the form
    $email = trim($_POST["email"]); //email address received form the form
    $message = trim($_POST["message"]); // message received form the form

    $success = save_query($name, $email, $message);
    echo ($success);
    if ($success <> 1) {
        $errors[] = "DB Error";
        print_r($errors);
    } else {
        $to = '';   //Email of the receiver
        $subject = 'Contacted from UBI Website ';   //Subject of the email which is to be received
        $headers = "From: " . $email;   //Senders Email address
        $message_body = "Hi,\nYou have a new message from:\n\nName: ".$name."\nEmail id: ".$email."\nMessage : ".$message;  //Text message to be received
        if (mail($to, $subject, $message_body, $headers)) {
            $message = "Thank you, Your message has been received";
            echo "<script type='text/javascript'>
        alert('$message');
        window.location.href='index.html';
        </script>";
        } else {
            $message = "Sorry cannot process your request at this time. Please try again";
            echo "<script type='text/javascript'>
        alert('$message');
        window.location.href='index.html';
        </script>";
        }
    }
}

// Saving the query details in the database
function save_query($name, $email, $message)
{
    global $mysqli;
    $stmt = $mysqli->prepare(
        "INSERT INTO ubi_form (
        name,
        email,
        message,
        timestamp
    )
    VALUES (
        ?,
        ?,
        ?,
        '" . time() . "'

    )"
    );
    $stmt->bind_param("sss", $name, $email, $message);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
?>