<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="uppgift_5_b.php" method="post">
    <label for="name">Name:</label><br>
    <input id="name" type="text" name="name" required><br>
    <label for="email">Email:</label><br>
    <input id="email" type="email" name="email" required><br>
    <label for="message">Message:</label><br>
    <textarea id="email" name="message" id="" cols="30" rows="10" required></textarea><br>
    <input type="submit" value="submit">
  </form>
​
​
  <?php
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(400);
        exit("Bad Request");
    }
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("$email is not a valid email address");
        die;
    }
    display($name);
    display($email);
    display($message);
    function display($text) {
        echo "<div><p>$text</p></div>";
    }
  ?>
</body>
</html>