<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $msgErro != '' ){ ?>        
    <script>
        msgErro('<?php echo htmlspecialchars( $msgErro, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
    </script>
<?php } ?>


<form class="form-add" method="POST" action="/admin/cadastrar-produto">
    <h3>Cadastrar Produto</h3>
    <div class="input-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Nome do produto">
    </div>
    <div class="input-group">
        <label for="preco">Preço</label>
        <input type="text" name="preco" id="preco" placeholder="Preço do produto">
    </div>
    
    <div class="input-group">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao" cols="30" rows="10"
            placeholder="Descrição do produto"></textarea>
    </div>
    <div class="input-group">
        <label for="id_categoria">Categoria</label>
        <select name="id_categoria" id="id_categoria">
            <option value="">Selecione uma categoria</option>
            <?php $counter1=-1;  if( isset($categorie) && ( is_array($categorie) || $categorie instanceof Traversable ) && sizeof($categorie) ) foreach( $categorie as $key1 => $value1 ){ $counter1++; ?>

                <option value="<?php echo htmlspecialchars( $value1["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
            <?php } ?>            
        </select>
    </div>
    <div class="input-group">
        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="">Selecione o status do produto</option>
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select>
    </div>
    <div class="form-actions">
        <a href="/admin/categories" class="btn-form default">
            <i class="fas fa-arrow-circle-left btn-icons"></i>
            Cancelar
        </a>
        <button type="submit" class="btn-form">
            <i class="fas fa-plus-circle btn-icons"></i>
            Cadastrar
        </button>
    </div>
</form>