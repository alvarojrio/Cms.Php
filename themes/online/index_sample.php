<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">

        <!--[if lt IE 9]>
            <script src="../../_cdn/html5.js"></script>
         <![endif]-->        

        <title>PROVA!</title>

        <meta name="description" content="Prova">
        <meta name="keywords" content="prova programador"> 
        <meta name="author" content="Alvaro jr">
        <meta name="robots" content="index, follow">

        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Baumans' rel='stylesheet' type='text/css'>

    </head>
    <body>

        <header class="main-header">
            <div class="container">
                <hgroup>
                    <h1>Prova para programador php O.O :)!</h1>
                </hgroup>

                <div class="header-banner">
                    <!--468x60-->
          <img src="_tmp/banner_medium.png" />
                </div><!-- banner -->

                <nav class="main-nav">
                    <h3>Navegue nas sessões:</h3>

                    <ul>
                        <li><a href="Home" title="Home">Home</a></li>
                      
                        <li class="search">
                            <form name="search" action="" method="post">
                                <input class="fls" type="text" name="s" />
                                <input class="btn" type="submit" name="sendsearch" value="" />
                            </form>
                        </li>

                    </ul>
                </nav> <!-- main nav -->
            </div><!-- Container Header -->
        </header> <!-- main header -->


        <!--SESSÃO 1-->
        <section class="main-slider">
            <h3>Últimas Atualizações:</h3>
            <div class="container">

                <div class="slidecount">
                    <?php for ($sl = 1; $sl <= 3; $sl++): ?>
                        <article>
                            <div class="img slide_img">
                                <!--460x230-->
                                <img alt="" title="" src="_tmp/0<?= $sl; ?>.jpg" />                                
                            </div>

                            <header>
                                <h1><a href="#"><?= $sl; ?> Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</a></h1>
                                <time datetime="2013-11-11" pubdate><?= date('d/m/Y H:i'); ?>Hs</time>
                                <p class="tagline">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                            </header>
                        </article>
                    <?php endfor; ?>                
                </div>

                <div class="slidenav"></div>   
            </div><!-- Container Slide -->

        </section><!-- /slider -->


        <div class="site-container">

            <section class="main-destaques">
                <h2>Destaques:</h2>

                <section class="main_lastnews">
                    <h1 class="line_title"><span class="oliva">Últimas Notícias:</span></h1>

                    <article class="one_news">
                        <div class="img">
                            <!--268x185-->
                            <img alt="" title="" src="_tmp/04.jpg" /> 
                        </div>

                        <header>
                            <h1><a href="#">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</a></h1>
                            <time datetime="2013-11-11" pubdate><?= date('d/m/Y H:i'); ?>Hs</time>
                            <p class="tagline">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        </header>

                    </article>

                    <div class="last_news">
                        <?php for ($ul = 5; $ul <= 8; $ul++): ?>
                            <article>
                                <div class="img">
                                    <!--120x80-->
                                    <img alt="" title="" src="_tmp/0<?= $ul; ?>.jpg" />
                                </div>

                                <header>
                                    <h1><a href="#">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</a></h1>
                                    <time datetime="2013-11-11" pubdate><?= date('d/m/Y H:i'); ?>Hs</time>
                                </header>
                            </article>
                        <?php endfor; ?>
                    </div>


                   

                        

                    <div class="last_news">
                        <?php for ($sl = 5; $sl <= 6; $sl++): ?>
                            <article>
                                <div class="img slide_img">
                                    <!--120x80-->
                                    <img alt="" title="" src="_tmp/0<?= $sl; ?>.jpg" />
                                </div>

                                <header>
                                    <h1><a href="#"><?= $sl; ?> Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</a></h1>
                                    <time datetime="2013-11-11" pubdate><?= date('d/m/Y H:i'); ?>Hs</time>
                                </header>
                            </article>
                        <?php endfor; ?>
                    </div>
                </section>

            </section><!-- categorias -->
            <div class="clear"></div>
        </div><!--/ site container -->

        <footer class="main-footer">
            <section class="container">                
                <h2>Veja mais</h2>

                <nav>
                    <h3 class="line_title"><span>Categorias:</span></h3>
                    <ul>
                        <li><a href="Home" title="Home">Página</a></li>
                        <li><a href="Home" title="Home">Página</a></li>
                        <li><a href="Home" title="Home">Página</a></li>
                    </ul>
                </nav>

                <article>
                    <h3 class="line_title"><span>Um resumo:</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy</p>
                </article>

                <article class="footer_contact">
                    <h3 class="line_title"><span>Contato:</span></h3>
                    <form name="FormContato" action="" method="post">
                        <label>
                            <span>nome:</span>
                            <input type="text" title="Informe seu nome" name="nome" required />
                        </label>

                        <label>
                            <span>e-mail:</span>
                            <input type="email" title="Informe seu e-mail" name="email" required />
                        </label>

                        <label>
                            <span>mensagem:</span>
                            <textarea title="Envie sua mensagem" required rows="3"></textarea>
                        </label>

                        <input type="submit" value="Enviar" class="btn">                        
                    </form>
                </article>
                <div class="clear"></div>
            </section>

        </footer>


    </body>

    <script src="../../_cdn/jquery.js"></script>
    <script src="../../_cdn/jcycle.js"></script>
    <script src="../../_cdn/jmask.js"></script>
    <script src="../../_cdn/shadowbox/shadowbox.js"></script>
    <script>
        $(function() {
            //Monta o Slide
            $('.main-slider .slidecount').cycle({
                fx: 'fade',
                speed: 1000,
                timeout: 3000,
                pager: '.slidenav'
            });

            //Inicia a shadowbox
            Shadowbox.init();

            //Navega tabs das empresas na home
            $('.navitem li').click(function() {
                var nav = $('.navitem li');
                var tab = $(this).attr('id');
                if ($(this).hasClass('tabactive')) {
                    //Aba ativa. Não faz nada
                    return false;
                } else {
                    nav.removeClass('tabactive'); //REMOVE A CLASSE ATIVA
                    $(this).addClass('tabactive');
                    $('.tab').fadeOut('fast', function() {
                        window.setTimeout(function() {
                            $('.' + tab).fadeIn('fast');
                        }, 350);
                    });
                }
            });
        });
    </script>

</html>