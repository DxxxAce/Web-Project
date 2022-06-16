<?php
/** @var $model \app\models\User*/

?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Account Recovery</title>
        
        <link rel="icon" type="image/x-icon" href="../media/Logos/final/pptext.svg">
        <link rel="stylesheet" href="../css/recover.css">
        <link rel="stylesheet" href="../css/navbar.css">

        <meta charset="UTF-8">
        <meta name="author" content="Hirtopanu Alin">
        <meta name="description" content="Account Recovery Page">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <div id="container">
            <nav id="menubar">
                <div id="dropdown" class="button">
                    <button id="dropbtn">
                        <img id="menu-icon" src="../media/in-page-images/dropdown.svg" alt="Menu">
                    </button>

                    <div id="dropdown-content">
                        <a href="index.html">Home</a>

                        <a href="login.html">Login</a>
                        
                        <a href="gallery.html">Gallery</a>
                        
                        <a href="settings.html">Settings</a>

                        <a href="information.html">About</a>
                    </div>
                </div>

                <div id="empty"></div>

                <div id="logo" class="button">
                    <a href="index.html">
                        <img id="logo-icon" class="bicon" src="../media/Logos/final/pptext.svg" alt="Logo">
                    </a>
                </div>

                <div class="empty"></div>

                <div id="main-buttons">
                    <div id="login" class="button">
                        <a href="login.html">
                            <img class="bicon" src="../media/in-page-images/login.svg" alt="Login">
                        </a>
                    </div>

                    <div class="main-empty"></div>

                    <div id="home" class="button">
                        <a href="index.html">
                            <img class="bicon" src="../media/in-page-images/home.svg" alt="Home">
                        </a>
                    </div>

                    <div class="main-empty"></div>

                    <div id="gallery" class="button">
                        <a href="gallery.html">
                            <img class="bicon" src="../media/in-page-images/gallery.svg" alt="Gallery">
                        </a>
                    </div>

                    <div class="main-empty"></div>

                    <div id="settings" class="button">
                        <a href="settings.html">
                            <img class="bicon" src="../media/in-page-images/settings.svg" alt="Settings">
                        </a>
                    </div>
                </div>
                
                <div class="empty"></div>

                <div id="info" class="button">
                    <a href="information.html">
                        <img class="bicon" src="../media/in-page-images/info.svg" alt="About">
                    </a>
                </div>
            </nav>
    
            <div id="main">
                <div class="row"></div>

                <div id="mid">
                    <div class="column"></div>

                    <div id="square">
                        <div id="form">
                            <div id="prompt">
                                <img id="user-icon" src="../media/in-page-images/user.svg" alt="Icon">
                                <h2>Enter email</h2>
                            </div>
        
                            <?php  $form=\app\core\form\Form::begin('',"post") ?>
                                <div id="text-input">
                                    <?php echo $form->field($model,'email')?>
                                </div>
        
                                <input type="submit" value="Recover">

                                <div class="invalid-feedback">
                                    <?php if(strcmp($model->getFirstError('email'),'')!=0)
                                        echo 'Email:'.$model->getFirstError('email').PHP_EOL ?>
                                </div>
                            <?php \app\core\form\Form::end() ?>
                            
                            <a id="link" href="login.html">Back</a>
                        </div>
                    </div>
    
                    <div class="column"></div>
                </div>

                <div class="row"></div>
            </div>
        </div>
    </body>
</html>