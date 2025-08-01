<?php if(!class_exists('Rain\Tpl')){exit;}?>    <?php if( $msgErro != '' ){ ?>        
        <script>
            msgErro('<?php echo htmlspecialchars( $msgErro, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
        </script>
    <?php } ?>


    
    <form class="form-add" action="/admin/cadastrar-imagem/<?php echo htmlspecialchars( $produtos["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST" enctype="multipart/form-data">       
        <h3>Cadastrar Imagem</h3>
        <div class="input-group">
            <label for="image">Selecione uma imagem</label>
            <input type="file" name="imagem" id="imagem">
        </div>

        <div class="form-actions">
            <a href="/admin/categorie/<?php echo htmlspecialchars( $produtos["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn-form">
                <i class="fas fa-arrow-circle-left btn-icons"></i>
                Cancelar
            </a>
            <button type="submit" class="btn-form">
                <i class="fas fa-plus-circle btn-icons"></i>
                Cadastrar
            </button>
        </div>
    </form>