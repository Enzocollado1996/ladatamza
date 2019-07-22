<html lang="es-AR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

        <title>Ladatamdza</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Mada:300,400,500,600,700,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i,800" rel="stylesheet">
        <?= $this->Html->css('frontend/styles.css') ?>
    </head>
    <body>
        <div class="wrap">        
            <div class="container no-padding-sides" style="position: relative;">
                <div id="the-wrapper">
                    <div class="header-top">
                        <div class="row top-header">
                            <div class="col-xs-18 col-xs-offset-3 col-md-12 col-md-offset-1 img-header margin-top-x">
                                <a href="/site/index"></a>
                                <h5 class="hidden-xs">
                                    Lunes, 22                     
                                    de Julio de 2019
                                </h5>
                            </div>
                        </div>	
                    </div>    
                    <div style="min-height:45px">
                        <div class="top-navbar-themes">
                            <nav class="navbar navbar-default">
                                <div class="container-fluid no-padding-sides">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-main-navbar" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>

                                        <div class="brand-container-responsive">
                                            <a href="/site/index">
                                                <img src="//losandes.com.ar/uploads/configtheme/la-ok5ced3eeec9be2.png" alt="">                
                                            </a>
                                        </div>

                                        <div class="article_menu_search hidden-md hidden-lg">

                                            <form id="w91" action="/article/search" method="GET">                   <div class="input-group">
                                                    <input type="text" name="ArticleSearch[_search]" class="form-control" placeholder="Buscar" aria-describedby="basic-addon2">
                                                    <span class="input-group-addon" data-search-button="">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                    </span>
                                                </div>
                                            </form>               </div>

                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="top-main-navbar">
                                        <a class="brand-container" href="/site/index">
                                            <img src="//losandes.com.ar/uploads/configtheme/la-ok5ced3eeec9be2.png" alt="">                 </a>

                                        <div class="menu-container">
                                            <div class="principal-site_menu_location">
                                            </div>
                                        </div>

                                        <div class="article_menu_search hidden-xs hidden-sm">

                                            <form id="w92" action="/article/search" method="GET">

                                                <div class="input-group">
                                                    <input type="text" name="ArticleSearch[_search]" class="form-control" placeholder="Buscar" aria-describedby="basic-addon2">
                                                    <span class="input-group-addon" data-search-button="">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                    </span>
                                                </div>
                                            </form>                 </div>

                                    </div>
                                </div>
                            </nav>   
                        </div>
                    </div>
                    <div class="row box-container first-peperito">
                        <div class="col-xs-24">
                            <div data-col="88953"><div data-id="93416" data-box="ThemesDayBox" data-mode="3">
                                    <div class="titles-of-the-day">
                                        <nav class="navbar navbar-default">
                                            <div class="container-fluid no-padding-sides">
                                                <ul>
                                                    <li><a href="#">Norte</a></li>
                                                    <li><a href="#">Centro</a></li>
                                                    <li><a href="#">Sur</a></li>
                                                    <li><a href="#">Generales</a></li>
                                                </ul>

                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </body>
</html>