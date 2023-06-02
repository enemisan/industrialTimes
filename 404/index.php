<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/global/global.css">
    <link rel="stylesheet" href="../assets/global/flex.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>404</title>
</head>
<body>
    <?php
    // Send a 404 status code
    http_response_code(404);

    // Display the custom 404 error page content
    echo "<h1>404 Page Not Found</h1>";
    echo "<p>The page you are looking for could not be found.</p>";
    ?>
</body>
</html>