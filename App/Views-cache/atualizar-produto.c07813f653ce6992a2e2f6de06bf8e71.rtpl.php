<?php if(!class_exists('Rain\Tpl')){exit;}?>    <?php if( $msgErro != '' ){ ?>        
        <script>
            msgErro('<?php echo htmlspecialchars( $msgErro, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
        </script>
    <?php } ?>


    <form class="form-add" method="POST" action="/cardapiodigital/admin/atualizar-produto/<?php echo htmlspecialchars( $produtos["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        <h3>Atualizar Produto</h3>
        <div class="input-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars( $produtos["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Nome do produto">
        </div>
        <div class="input-group">
            <label for="preco">Preço</label>
            <input type="text" name="preco" id="preco" value='<?php echo formatarPreco($produtos["preco"]); ?>' placeholder="Preço do produto">
        </div>
       <!-- <div class="input-group">
            <label for="imagem"></label>
            <input type="hidden" name="imagem" id="imagem" value="<?php echo htmlspecialchars( $produtos["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        </div> -->
        <div class="input-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao"  cols="30" rows="10"
                placeholder="Descrição do produto"><?php echo htmlspecialchars( $produtos["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
        </div>
        <div class="input-group">
            <label for="id_categoria">Categoria</label>
            <select name="id_categoria" id="id_categoria"> 
                <option value="<?php echo htmlspecialchars( $produtos["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $produtos["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php $counter1=-1;  if( isset($categorie) && ( is_array($categorie) || $categorie instanceof Traversable ) && sizeof($categorie) ) foreach( $categorie as $key1 => $value1 ){ $counter1++; ?>

                    <option value="<?php echo htmlspecialchars( $value1["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>            
            </select>
        </div>
        <div class="input-group">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="<?php echo htmlspecialchars( $produtos["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $produtos["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
            </select>
        </div>
        <div class="form-actions">
            <a href="/cardapiodigital/admin/categorie/<?php echo htmlspecialchars( $produtos["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn-form">
                <i class="fas fa-arrow-circle-left btn-icons"></i>
                Cancelar
            </a>
            <button type="submit" class="btn-form">
                <i class="fas fa-plus-circle btn-icons"></i>
                Atualizar
            </button>
        </div>
    </form>