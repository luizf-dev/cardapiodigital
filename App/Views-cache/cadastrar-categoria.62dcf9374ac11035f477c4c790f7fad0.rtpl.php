<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $msgErro != '' ){ ?>        
    <script>
        msgErro('<?php echo htmlspecialchars( $msgErro, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
    </script>
<?php } ?>


<form class="form-add" method="POST" action="/admin/newCategorie">
    <h3>Cadastrar Categoria</h3>
    <div class="input-group">
        <label for="nome_categoria">Nome da Categoria</label>
        <input type="text" name="nome_categoria" id="nome_categoria" placeholder="Nome da Categoria">
    </div>

    <div class="input-group">
        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="">Selecione o status da categoria</option>
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select>
    </div>

    <div class="input-group">                
        <select name="exibir_na_home" id="exibir_na_home">
            <option value="" > Selecione para exibir/ocultar a categoria da Home</option>
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
            Cadastrar
        </button>
    </div>
</form>