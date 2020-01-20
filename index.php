<html>
<head>
    <title>Week 1, Problem 2</title>

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">

</head>

<body>
<div class="receipt">
    <div class="info">
        <p>Boff's Better Baking Business</p>
        <p>Wilmington University</p>
        <p>47 Reads Way</p>
        <p>New Castle, DE 19720</p>
    </div>
    <div class="server-info">Server: Michael Aboff</div>
    <div class="separator"></div>

    <?php require 'receipt_ordered_items.php' ?>

    <div class="separator"></div>

    <?php require 'receipt_totals.php' ?>

    <div class="info">
        <p>Thank you for visiting. Please come again!</p>
    </div>
</div>

<video autoplay muted loop id="background-video">
    <source src="./assets/restaurant_background.mp4" type="video/mp4">
</video>
</body>



</html>