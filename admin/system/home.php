<div class="content home">

    <aside>
        <h1 class="boxtitle">Estatísticas de Vendas:</h1>

        <article class="sitecontent boxaside">
            <h1 class="boxsubtitle">Venda do mes Atual:. <?php echo date('d-m-Y'); ?></h1>

            <?php
            //OBJETO READ
            $read = new Read;
          $ddte = date('Y-m-d');
            
            
            //LER PRODUTOS
            $read->ExeRead('plan_prod');
            $ContProduto = $read->getRowCount();

           

            ?>

            <ul>
                <li class="view"><span><?= Check::VerificarVendas($ddte); ?></span> venda</li>
                <li class="user"><span><?= $ContProduto; ?></span> Produtos cadastrados</li>
            
                <li class="line"></li>
                 <h1 class="boxsubtitle">Venda do mes Anterior:. 
                     <?php echo date('d/m/Y', strtotime('-1 months', strtotime(date('Y-m-d')))); ?></h1>
                <li class="post"><span><?= Check::VerificarVendas(date('Y-m-d', strtotime('-1 months', strtotime(date('Y-m-d'))))); ?></span> Vendas</li>
                <li class="emp"><span><?= $ContProduto; ?></span> Produtos cadastrados</li>
                <!--<li class="comm"><span>38</span> comentários</li>-->
            </ul>
            <div class="clear"></div>
        </article>

        <article class="useragent boxaside">
            <h1 class="boxsubtitle">Produtos mais vendidos:</h1>

            <?php
            //LE O TOTAL DE VENDA DOS PRODUTOS
            $read->FullRead("SELECT SUM(qnt_vendas) AS TotalViews FROM relatorio");
            $TotalViews = $read->getResult()[0]['TotalViews'];
            //var_dump($TotalViews);
            $read->ExeRead("relatorio", "ORDER BY qnt_vendas DESC LIMIT 6");
            if (!$read->getResult()):
                WSErro("Oppsss, Ainda não existem estatísticas de produtos!", WS_INFOR);
            else:
                echo "<ul>";
                foreach ($read->getResult() as $nav):
                    extract($nav);

                    //REALIZA PORCENTAGEM DE VENDAS POR PRODUTO!
                    $percent = substr(( $qnt_vendas / $TotalViews ) * 100, 0, 5);
                    ?>
                    <li>
                        <p><strong><?= Check::RecorverName($id_prod); ?>:</strong> <?= $percent; ?>%</p>
                        <span style="width: <?= $percent; ?>%"></span>
                        <p><?= $qnt_vendas; ?> vendas</p>
                    </li>
                    <?php
                endforeach;
                echo "</ul>";
            endif;
            ?>

            <div class="clear"></div>
        </article>
    </aside>

    
    
    
    <section class="content_statistics">

        <h1 class="boxtitle">Mix.. Dos produtos:</h1>

        <section>
            <h1 class="boxsubtitle">Calculo do mes (<?php echo date('d/m/Y'); ?>)</h1>

            

            <article>
                <?php
                $read->ExeRead("relatorio");
                foreach ($read->getResult() as $ids):
                    ?>   

                    

                    <h1> <?php Check::CalcMix($ids['id_prod'], $ddte); ?></h1>

                    <?php
                endforeach;
                ?>
            </article>

        </section>          
                   
        
        
        
        
        
        <section>
            <h1 class="boxsubtitle">Calculo do mes (<?php echo date('01/m/Y', strtotime('+1 months', strtotime(date('Y-m-d')))); ?>)</h1>

            

            <article>
                <?php
                $DateProximo = date('Y-m-d', strtotime('+1 months', strtotime(date('Y-m-d'))));
              
                $read->ExeRead("relatorio");
                foreach ($read->getResult() as $ids):
                    ?>   

                    

                <h1> 
            
  <?php  Check::CalcMixNext($ids['id_prod'], $DateProximo); ?></h1>

                    <?php
                endforeach;
                
           
               
?>
            </article>

        </section>  
        
        
        
        
        
        

    </section> <!-- Estatísticas -->

    <div class="clear"></div>
    
</div> <!-- content home -->