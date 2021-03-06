<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us</title>

    <link rel="icon" type="image/x-icon" href="../../media/Logos/final/pptext.svg"/>
    <link rel="stylesheet" href="../../css/information.css"/>
    <link rel="stylesheet" href="../../css/navbar.css"/>

    <meta charset="UTF-8"/>
    <meta name="author" content="Claudiu Strimbei"/>
    <meta name="description" content="About Page"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<div id="container">
<nav id="menubar">
        <div id="dropdown" class="button">
            <button id="dropbtn">
                <img id="menu-icon" src="../../media/in-page-images/dropdown.svg" alt="Menu">
            </button>

            <div id="dropdown-content">
                <a href="/Web-Project/Web/php/public/index.php">Home</a>
                <?php if(\app\core\Application::isGuest()):
                    echo '<a href="/Web-Project/Web/php/public/index.php/login">Login</a>';
                else:
                    echo '<a href="/Web-Project/Web/php/public/index.php/logout">Logout</a>';
                    echo '<a href="/Web-Project/Web/php/public/index.php/gallery">Gallery</a>';
                endif;
                ?>
                <a href="/Web-Project/Web/php/public/index.php/settings">Settings</a>
                <a href="/Web-Project/Web/php/public/index.php/information">About</a>
            </div>
        </div>

        <div id="empty"></div>

        <div id="logo" class="button">
            <a href="/Web-Project/Web/php/public/index.php">
                <img id="logo-icon" class="bicon" src="../../media/Logos/final/pptext.svg" alt="Logo">
            </a>
        </div>

        <div class="empty"></div>

        <div id="main-buttons">
            <?php if(\app\core\Application::isGuest()):
                echo '<div id="login" class="button">
                <a href="/Web-Project/Web/php/public/index.php/login">
                    <img class="bicon" src="../../media/in-page-images/login.svg" alt="Login">
                </a>
            </div>';
            else: echo '<div id="login" class="button">
                <a href="/Web-Project/Web/php/public/index.php/logout">
                    <img class="bicon" src="../../media/in-page-images/logout.svg" alt="Logout">
                </a>
                </div>';
            endif;
            ?>

            <div class="main-empty"></div>

            <div id="home" class="button">
                <a href="/Web-Project/Web/php/public/index.php">
                    <img class="bicon" src="../../media/in-page-images/home.svg" alt="Home">
                </a>
            </div>

            <div class="main-empty"></div>

            <?php if(\app\core\Application::isGuest()):
                echo '<div id="gallery" class="button">
                <a href="/Web-Project/Web/php/public/index.php/login">
                    <img class="bicon" src="../../media/in-page-images/gallery.svg" alt="Gallery">
                </a>
            </div>';
            else: echo '<div id="gallery" class="button">
            <a href="/Web-Project/Web/php/public/index.php/gallery">
                <img class="bicon" src="../../media/in-page-images/gallery.svg" alt="Gallery">
            </a>
        </div>';
            endif;
            ?>

            <div id="settings" class="button">
                <a href="/Web-Project/Web/php/public/index.php/settings">
                    <img class="bicon" src="../../media/in-page-images/settings.svg" alt="Settings">
                </a>
            </div>
        </div>

        <div class="empty"></div>

        <div id="info" class="button">
            <a href="/Web-Project/Web/php/public/index.php/information">
                <img class="bicon" src="../../media/in-page-images/info.svg" alt="About">
            </a>
        </div>
    </nav>

    <div id="main">
        <div id="text-container">
            <div id="title">
                <p>About Us</p>
            </div>

            <div id="text">
                <p>
                    We're a team of junior developers, currently in our second year of studies at the
                    <a href="https://www.info.uaic.ro/">Faculty of Computer Science of Iasi</a>.
                </p>

                <p>
                    Our goal was to develop an aggregator type web application, based on our proffessor's
                    <a href="https://profs.info.uaic.ro/~vcosmin/proiectetw">M-PIC project</a> suggestion.
                </p>

                <p>
                    This app is meant for various people who wish to gather all of their pictures into a single place,
                    for ease of access and better manageability.
                </p>

                <p>
                    Users can import pictures from social media platforms, edit them,
                    or even upload new media files from a local source.
                </p>

                <p>
                    Here you can access our app's <a href="../../Documentation/documentation.html" target="_blank">documentation</a> or a short
                    <a href="https://www.youtube.com/watch?v=Bk8LI9CIOkk" target="_blank">presentation video</a> to catch a glimpse of how it works.
                </p>
            </div>

            <div id="subtitle">
                <p>The Team</p>
            </div>

            <div id="team-pics">
                <div class="team">
                    <img class="img" src="../../media/in-page-images/alin.png" alt="Alin">

                    <p>Alin Hirtopanu</p>
                </div>

                <div class="team">
                    <img class="img" src="../../media/in-page-images/claudiu.png" alt="Claudiu">

                    <p>Claudiu Strimbei</p>
                </div>

                <div class="team">
                    <img class="img" src="../../media/in-page-images/razvan.png" alt="Razvan">

                    <p>Razvan Palie</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

