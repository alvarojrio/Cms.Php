<?php
$View = new View;
$tpl_empresa = $View->Load('article_prod');
?>
<!--HOME SLIDER-->
<section class="main-slider">
    <h3>Últimas Atualizações:</h3>
    <div class="container">

        <div class="slidecount">
            <img style="margin-left:100px"src="<?= INCLUDE_PATH; ?>/images/fundo-slide-2.JPG"  />          
        </div>

        <div class="slidenav">
            
             
        </div>   
    </div><!-- Container Slide -->

</section><!-- /slider -->


<!--HOME CONTENT-->
<div class="site-container">

    <section class="main-destaques">
        <h2>Destaques:</h2>
        
        <section class="main_lastnews">
            <h1 class="line_title"><span class="oliva">Produto da loja:</span></h1>

            

         <?php
            $cat = Check::CatByName('noticias');
            $post = new Read;
            $post->ExeRead("plan_prod");
            
            if(!$post->getResult()):
                 WSErro("Desculpe nao existe produto cadastrados!", WS_INFOR);
            else:
                foreach($post->getResult() as $produto){
                $View->Show($produto, $tpl_empresa);
                }
            endif;
            ?>     
            
            <div class="last_news">
                
            </div>


            
        </section><!--  last news -->


                     



    </section><!-- categorias -->
    <div class="clear"></div>
</div><!--/ site container -->