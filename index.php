<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/global/global.css">
    <link rel="stylesheet" href="assets/global/flex.css">
    <link rel="stylesheet" media="(max-width:800px) and (min-width:451px)" href="tablet.css">
    <title>Industrial Times</title>
</head>

<body>
    <section class="search-bar" id="search-bar">
        <input type="text">
        <input type="button" value="Search">
    </section>
    <header>
        <nav>
            <a href = "./" class="logo">
                Industrial<span>Times</span>
            </a>
            <ul>
                <li><a href="../association/">Association</a></li>
                <li><a href="#">Banks</a></li>
                <li><a href="#">Companies</a></li>
                <li><a href="#">Commerce</a></li>
                <li><a href="#">Leaders</a></li>
                <li><a href="#">Regulators</a></li>
                <li><a href="#">Trade</a></li>
                <li><a href="#">Technology</a></li>
                <li><a href="#">Events</a></li>
            </ul>
            <a href="search/" class="search-menu" id="search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>
        </nav>

        <div class="header-cnts">
            <div>
                <p>Latest Today</p>
                <?php include "header.php" ?>
            </div>
        </div>
    </header>


    <!-- Today's headline -->
    <section class="t-headline">
        <div class="t-flex t-row">
            <p class="t-hl">Today's Headline</p>
            <?php include "news-global/f-landing-links.php" ?>
        </div>
        <div class="t-flex t-column">
            <p class="t-hl">Today's Headline</p>
            <?php include "news-global/f-today-links.php" ?>
        </div>
    </section>

    <a href="#">
        <div class="ad">
            Advertise
        </div>
    </a>
    

    <hr>

    <section class="t-feature">
        <?php include "news-global/f-double-links.php" ?>
    </section>

    <a href="#">
        <div class="ad">
            Advertise
        </div>
    </a>


    <hr>

    <section class="t-mini-feature">
        <div id="content" class="content-div">
            <?php include "news-global/f-links.php" ?>
        </div>
    </section>


    <footer>
        <div class="footer-logo">
            Industrial<span>Times</span>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, laborum nihil.<br>Numquam quod illum
            cumque molestias facere officiis commodi maiores!</p>
        <ul>
            <li><a href="association/">Association</a></li>
            <li><a href="#">Commerce</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Contacts</a></li>
            <li><a href="./">Home</a></li>
        </ul>
        <div class="footer-socials">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <i class="fa fa-instagram" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </div>
    </footer>


    <script src="assets/global/global.js"></script>
    <script src="https://kit.fontawesome.com/da98164faa.js" crossorigin="anonymous"></script>
</body>

</html>