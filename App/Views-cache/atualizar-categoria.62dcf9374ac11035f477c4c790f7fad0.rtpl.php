<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $msgErro != '' ){ ?>        
    <script>
        msgErro('<?php echo htmlspecialchars( $msgErro, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
    </script>
<?php } ?>



<form class="form-add" method="POST" action="/admin/atualizar-categoria/<?php echo htmlspecialchars( $categoria["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <h3>Atualizar Categoria</h3>
    <div class="input-group">
        <label for="nome_categoria">Nome da Categoria</label>
        <input type="text" name="nome_categoria" id="nome_categoria" value="<?php echo htmlspecialchars( $categoria["nome_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
    </div>

    <div class="input-group">  
    <label for="id_categoria">Categoria</label>              
        <select name="status" id="status">
            <option value="<?php echo htmlspecialchars( $categoria["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo ucfirst($categoria["status"]); ?></option>
            <?php if( $categoria["status"] == 'ativo' ){ ?>

                <option value="inativo">Inativo</option>
            <?php }else{ ?>

                <option value="ativo">Ativo</option>
            <?php } ?>

        </select>
    </div>


    <div class="input-group">    
    <label for="id_exibir_na_home">Exibido na Home</label>               
    <select name="exibir_na_home" id="exibir_na_home">
        <option value="<?php echo htmlspecialchars( $categoria["exibir_na_home"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            <?php if( $categoria["exibir_na_home"] == 1 ){ ?>

                Exibido na Home
            <?php }else{ ?>

                Ocultado na Home
            <?php } ?>

        </option>

        <?php if( $categoria["exibir_na_home"] == 1 ){ ?>

            <option value="0">Ocultar na Home</option>
        <?php }else{ ?>

            <option value="1">Exibir na Home</option>
        <?php } ?>

    </select>
</div>

    
    <div class="form-actions">
        <a href="/admin/categories" class="btn-form default">
            <i class="fas fa-arrow-circle-left btn-icons"></i>
            Cancelar
        </a>
        <button type="submit" class="btn-form">
            <i class="fas fa-plus-circle btn-icons"></i>
            Atualizar
        </button>
    </div>
</form>