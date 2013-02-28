<?php

    // $this refers to the BaseController

    // Build the title tag dynamically while using the site name constant
    $title = $this->controller . ' - ' . SITE_NAME;

    $description = SITE_DESC;
?>
<!DOCTYPE html>
<html>
<head>

    <!-- Default Charset -->
     <meta charset="utf-8">

    <!-- Try to Force Chrome frame on IE for better rendering -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description; ?>">

    <!-- Responsive design required viewport tag -->
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
