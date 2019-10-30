<?php
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $secretKey = "6LeDOcAUAAAAALTX3-5xJrc8sL6OWD9vhRlhX3ff";
    $response_key = $_POST['g-recaptcha-response'];
    $userIp = $_SERVER['REMOTE_ADDR'];

    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response_key&remoteip=$userIp";
    $response = file_get_contents($url);
    $response = json_decode($response);
    if ($response->success) {
        echo 'ok';
    } else {
        echo 'fail';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="post">
    <input type="text" placeholder="Enter Name" id="name" name="name">
    <input type="submit" value="save" id="submit" name="submit">
    <div class="g-recaptcha" data-sitekey="6LeDOcAUAAAAAOru4UJDNaZc-hJHjZLUn5gehCJe"></div>
    <br/>
</form>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>