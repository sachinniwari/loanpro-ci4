<!doctype html>
<html>

<head>
    <title>User Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/assets/images/icon.png">

    <link rel="stylesheet" href="<?php echo base_url('assets/style.css') ?>">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
</head>

<body>
    <header class="head">
        <a class="logo" href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/images/LoanProLogo.png" alt="logo"
                height="50px"></a>
        <nav>
            <ul class="nav__links">
                <li><a href="<?= base_url() ?>/Home/dashbaord">Home</a></li>
                <!-- <li><a href="#">About</a></li> -->
                <li><a href="#">Setting</a></li>
                <!-- <li><a href="#">Profile</a></li> -->
            </ul>
        </nav>
        <div class="profile"><a id="button" class="cta" href="<?= base_url() ?>/Home/login">Profile</a></div>
    </header>
    
    

    <?php
    $this->renderSection('content');
    ?>

<p id="footer"></p>
<footer>&copy; 2023 Designed By Sachin Shrivastava</footer>
</body>
</html>