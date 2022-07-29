<?php require get_template_directory() . '/inc/directories.php' ?>

<div id="menu-overlay" class="">
    
    <div class="menu dark">

        <div class="icons">
            <button id="search-btn" class="icon">&#xe8b6;</button>
            <input id="search-input" type="text" placeholder="Søk.."></input>
            <button id="ui-mode-toggle" class="icon">&#xe51c;</button>
            <button id="menu-exit" class="icon">&#xe5cd;</button>
        </div>

        <div class="large-categories">
            <button class="category samfunn extends"> Samfunn </button> <!-- <div class="icon">&#xe5c5;</div> -->
            <button class="category kultur extends"> Kultur </button>
            <button class="category debatt extends"> Debatt </button>
            <button class="category extends"> Arkiv </button>
        </div>

        <div class="small-menu-items">
            <a href="/bergensguide" class="menu-item">Bergensguiden</a>
            <a class="menu-item" href="https://issuu.com/stoffmagasin">
                Papirutgaven
            </a>
            <a href="/om-oss" class="menu-item">Om oss</a>
        </div>

        <div class="menu-footer">

            <div class="social-icons">
                <a class="icon facebook" href="https://www.facebook.com/STOFFmagasin/">
                    
                </a>
                <a class="icon insta" href="https://www.instagram.com/stoffmagasin/">
                    
                </a>
            </div>
            
            <div class="row">

                <div class="text">
                    STOFF arbeider etter Vær Varsom-plakatens regler for god presseskikk, og får støtte fra Velferdstinget Vest.
                    
                    <p><a href="https://goodshit.no">Utviklet av Sigurd Vikene</a></p>
                    
                    <p>© STOFF <?php echo date("Y"); ?></p>
                </div>

                <div class="wrapper">
                    <a class="vt-logo" href="https://vtvest.no/">
                        <?php echo file_get_contents( $imgDir . "/vt-logo.svg"); ?>
                    </a>
                </div>

            </div>

        </div>

    </div>

    <div id="menu-overlay-bg"></div>

</div>
