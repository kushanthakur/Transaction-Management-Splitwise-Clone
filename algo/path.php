<?php
  include("../expensemanagement/session.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splitwise Cashflow Minimization, A Capstone Project Under Prof. Govinda K! Let's Make your Contris' Easier!</title>
    <link rel="icon" type="image/x-icon" href="/assets/splogofavicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


    <script src="https://kit.fontawesome.com/5548f5ed00.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="heap.js"></script>
    <script src="script.js" type="module"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: rgb(10, 111, 79);">
        <a class="navbar-brand" href="../index.php#bc"><img src="../assets/splogo.png" alt="logo" class="rounded-circle"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <span class=".text-*-center"><h2 style="text-shadow: 0 0 3px #FF0000; text-align:center;">Welcome to Splitwise Cashflow Minimization, A Capstone Project Under Prof. Govinda K! Let's Make your Contris' Easier!</h2></span>
            <a href="../expensemanagement/logout.php"><button type="button" class="btn btn-warning">Logout</button></a>
        </div>
    </nav>
    <div id="container">
        <div id="mynetwork"></div>
        <div id="container2">
            <span id="temptext" style="width: 100%; text-align: center; font-size: x-large">
                Click on solve to get Solution !!
            </span>
            <div id="mynetwork2" style="display: none"></div>
        </div>
    </div>

    <div>
        <br>
        <button type="button" class="btn btn" id="generate-graph">Get New Problem</button>
        <br>
        <button type="button" class="btn btn-success" id="solve">Solve</button>
    </div>
    <div>
        Under The Guidence of Professor Govinda K
    </div>
</body>

</html>