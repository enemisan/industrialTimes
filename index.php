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
                <h1>Imported Used Vehicles Parts Undermining Nigeria's Automotive Industry</h1>
                <a href="news/"><button>Read More</button></a>
            </div>
        </div>
    </header>


    <!-- Today's headline -->
    <section class="t-headline">
        <div class="t-flex t-row">
            <p class="t-hl">Today's Headline</p>
            <!-- <a href="news/_national_agency_for_food_and_drugs_administration_and_control.php">
                <div class="t-image">
                    <img src="assets/images/1200px-NAFDAC_emblem.svg_.webp" alt="Headline Image">
                </div>
                <h1>NAFDAC Warns Against Taking Male Enhancement Capsules  PrimeZen Black 6000mg, 2000mg</h1>
                <a href="news/_national_agency_for_food_and_drugs_administration_and_control.php"><button>Read More</button></a>
            </a> -->
            <?php include "news-global/f-landing-links.php" ?>
        </div>
        <div class="t-flex t-column">
            <p class="t-hl">Today's Headline</p>
            <!-- <a href="news/" class="t-column-flex">
                <h1>Access Bank's Wigwe Becomes President of France -  Nigeria Business Council</h1>
                <div>
                    <img src="assets/images/access-bank.jpg" alt="">
                </div>
            </a>
            <a href="news/" class="t-column-flex">
                <h1>BoI Lures Micro, Small and Large Enterprises To SEZs For Better Funding</h1>
                <div>
                    <img src="assets/images/BOI-640x360.jpg" alt="">
                </div>
            </a>
            <a href="news/" class="t-column-flex">
                <h1>"LMN Manufacturing Company to Close Plant Due to Economic Downturn"</h1>
                <div>
                    <img src="" alt="">
                </div>
            </a>
            <a href="news/" class="t-column-flex">
                <h1>"LMN Manufacturing Company to Close Plant Due to Economic Downturn"</h1>
                <div>
                    <img src="" alt="">
                </div>
            </a>
            <a href="news/" class="t-column-flex">
                <h1>"LMN Manufacturing Company to Close Plant Due to Economic Downturn"</h1>
                <div>
                    <img src="" alt="">
                </div>
            </a>
            <a href="news/" class="t-column-flex">
                <h1>"LMN Manufacturing Company to Close Plant Due to Economic Downturn"</h1>
                <div>
                    <img src="" alt="">
                </div>
            </a> -->
            <?php include "news-global/f-today-links.php" ?>
        </div>
    </section>

    <hr>

    <section class="t-feature">
        <div class="t-flex t-row">
            <a href="news/">
                <div class="t-image">
                    <img src="assets/images/headline-img1.jpg" alt="Headline Image">
                </div>
                <h1>"ABC Industries Implements Sustainable Practices, Reduces Carbon Footprint by 30%"</h1>
            </a>
        </div>

        <div class="t-flex t-row">
            <a href="news/">
                <div class="t-image">
                    <img src="assets/images/headline-img1.jpg" alt="Headline Image">
                </div>
                <h1>"ABC Industries Implements Sustainable Practices, Reduces Carbon Footprint by 30%"</h1>
            </a>
        </div>
    </section>


    <hr>

    <section class="t-mini-feature">
        <!-- <div class="t-flex t-column">
            <p class="t-hl">Featuring</p>
            <a href="news/" class="t-column-flex">
                <h1>"LMN Manufacturing Company to Close Plant Due to Economic Downturn"</h1>
                <div>
                    <img src="" alt="">
                </div>
            </a>
            <a href="news/" class="t-column-flex">
                <h1>"LMN Manufacturing Company to Close Plant Due to Economic Downturn"</h1>
                <div>
                    <img src="" alt="">
                </div>
            </a>
        </div>
        <div class="t-flex t-column">
            <p class="t-hl">Featuring</p>
            <a href="news/" class="t-column-flex">
                <h1>"LMN Manufacturing Company to Close Plant Due to Economic Downturn"</h1>
                <div>
                    <img src="" alt="">
                </div>
            </a>
            <a href="news/" class="t-column-flex">
                <h1>"LMN Manufacturing Company to Close Plant Due to Economic Downturn"</h1>
                <div>
                    <img src="" alt="">
                </div>
            </a>
        </div> -->
        <?php include "news-global/f-links.php" ?>
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