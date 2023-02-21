<!doctype html>
<html>
<head>
    <title>Loan Project</title>
    <link rel="icon" type="image/x-icon" href="<?=base_url()?>/assets/images/icon.png">
   
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css')?>">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
</head>
<body>
    <header class="head">
            <a class="logo" href="<?= base_url()?>"><img src="<?= base_url()?>/assets/images/icon.png" alt="logo" height="50px" ></a>
            <nav>
                <ul class="nav__links">
                    <li><a href="<?= base_url()?>">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                </ul>
            </nav>
            <a id="button" class="cta" href="<?= base_url()?>/Home/login">Login</a>
 
    </header>
    <script>
        if(window.location.pathname.split("/")[3] ==="login"){
            let btn = document.getElementById("button");
            btn.innerText = "Signup";
            btn.setAttribute("href","<?= base_url()?>")
        }
        
    </script>
   