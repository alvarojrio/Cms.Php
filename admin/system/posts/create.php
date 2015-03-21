<div class="content form_create">

    <article>

        <header>
            <h1>Criar Produto:</h1>
        </header>

        <?php
        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (isset($post) && $post['SendPostForm']):
           
            //$post['post_status'] = ($post['SendPostForm'] == 'Cadastrar' ? '0' : '1' );
            
            
         
            $post['img_prod'] = ( $_FILES['img_prod']['tmp_name'] ? $_FILES['img_prod'] : null );
            unset($post['SendPostForm']);
  
            require('_models/AdminProduct.class.php');
            $cadastra = new AdmincProdutos;
            $cadastra->ExeCreate($post);

            if ($cadastra->getResult()):
                 
                
                echo "Cadastrado com sucesso !";
                //header('Location: painel.php?exe=posts/update&create=true&postid=' . $cadastra->getResult());
            else:
                WSErro($cadastra->getError()[0], $cadastra->getError()[1]);
            endif;
        endif;
        ?>


        <form name="PostForm" action="" method="post" enctype="multipart/form-data">

            <label class="label">
                <span class="field">Enviar foto:</span>
                <input type="file" name="img_prod" />
            </label>

            <label class="label">
                <span class="field">Name:</span>
                <input type="text" name="prod_name" value="<?php if (isset($post['prod_name'])) echo $post['prod_name']; ?>" />
            </label>
            
            
            <label class="label">
                <span class="field">Cod Unico:</span>
                <input type="text" name="cod_unico" value="<?php if (isset($post['cod_unico'])) echo $post['cod_unico']; ?>" />
            </label>
            

            <label class="label">
                <span class="field">Descricao:</span>
                <textarea class="js_editor" name="descricao_prod" rows="10"><?php if (isset($post['descricao_prod'])) echo htmlspecialchars($post['descricao_prod']); ?></textarea>
            </label>

            <div class="label_line">

                <label class="label_small">
                    <span class="field">Data:</span>
                    <input type="text" class="formDate center" name="prod_time" value="<?php
                    if (isset($post['prod_time'])): echo $post['prod_time'];
                    else: echo date('d/m/Y H:i:s');
                    endif;
                    ?>" />
                </label>

                

                

            </div><!--/line-->

            <input type="submit" class="btn blue" value="Cadastrar" name="SendPostForm" />
            <input type="submit" class="btn green" value="Cadastrar & Publicar" name="SendPostForm" />

        </form>

    </article>

    <div class="clear"></div>
</div> <!-- content home -->