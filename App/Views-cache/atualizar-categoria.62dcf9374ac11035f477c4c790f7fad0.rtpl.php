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

        <?php if( $categoria["status"] == 'ativo' ){ ?>

            <label class="active" for="active">Status da Categoria - <?php echo htmlspecialchars( $categoria["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa-solid fa-circle-check"></i></label>
        <?php } ?>

        <?php if( $categoria["status"] == 'inativo' ){ ?>

            <label class="disabled" for="disabled">Status da Categoria - <?php echo htmlspecialchars( $categoria["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa-solid fa-circle-xmark"></i></label>
        <?php } ?>


    <div class="input-group">                
        <select name="status" id="status">
            <option value="<?php echo htmlspecialchars( $categoria["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" > Selecione para alterar o status da categoria</option>
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select>
    </div>

    <div class="input-group">                
        <select name="exibir_na_home" id="exibir_na_home">
            <option value="<?php echo htmlspecialchars( $categoria["exibir_na_home"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> Selecione para exibir/ocultar a categoria da Home</option>
            <option value="0">Ocultar na Home</option>
            <option value="1">Exibir na Home</option>
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