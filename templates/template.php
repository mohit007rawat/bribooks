<!-- templates/template.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        p {
            text-align: justify;
        }
    </style>
</head>
<body>
    <h1><?php echo $singleT; ?></h1>
    <p><?php echo nl2br($content); ?></p>
</body>
</html>