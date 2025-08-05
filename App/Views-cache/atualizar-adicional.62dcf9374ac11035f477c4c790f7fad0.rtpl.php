<?php if(!class_exists('Rain\Tpl')){exit;}?> <form class="form-add" method="POST" action="/admin/atualizar-adicional/<?php echo htmlspecialchars( $adicional["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    <h3>Atualizar Adicional</h3>
    <div class="input-group">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars( $adicional["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars( $adicional["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Nome do Adicional">
    </div>
    <div class="input-group">
        <label for="preco">Preço</label>
        <input type="text" name="preco" id="preco" value='<?php echo formatarPreco($adicional["preco"]); ?>' placeholder="Preço do Adicional">
    </div>           
    <div class="form-actions">
        <a href="/admin/listar-adicionais/<?php echo htmlspecialchars( $adicional["id_produto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn-form">
            <i class="fas fa-arrow-circle-left btn-icons"></i>
            Cancelar
        </a>
        <button type="submit" class="btn-form">
            <i class="fas fa-plus-circle btn-icons"></i>
            Atualizar
        </button>
    </div>
</form>
