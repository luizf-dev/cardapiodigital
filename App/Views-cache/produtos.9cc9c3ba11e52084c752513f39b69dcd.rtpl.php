<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="submenu-scroll" class="submenu-scroll">
    <a href="/cardapiodigital">Home</a>
    <?php $counter1=-1;  if( isset($category) && ( is_array($category) || $category instanceof Traversable ) && sizeof($category) ) foreach( $category as $key1 => $value1 ){ $counter1++; ?>

      <a href="/cardapiodigital/categorie/<?php echo htmlspecialchars( $value1["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
    <?php } ?>

</div>

<div class="title-category"><h2><?php echo htmlspecialchars( $nome_categoria, ENT_COMPAT, 'UTF-8', FALSE ); ?></h2></div>

<div class="container-menu">
    <?php $counter1=-1;  if( isset($produtos) && ( is_array($produtos) || $produtos instanceof Traversable ) && sizeof($produtos) ) foreach( $produtos as $key1 => $value1 ){ $counter1++; ?>

        <div class="card-menu">
            <div class="card-menu-info">
                <h3 class="menu-item-title"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                <p class="menu-item-description">
                    <?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                </p>
                <button class="btn-detalhes" data-id="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-nome="<?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-descricao="<?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-imagem="../assets/img/uploads/<?php echo htmlspecialchars( $value1["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-preco='R$ <?php echo formatarPreco($value1["preco"]); ?>'><span><i class="fa-solid fa-circle-plus"></i> Detalhes...</span></button>
            </div>
            <div class="card-menu-img">
                <?php if( $value1["imagem"] != '' ){ ?>

                    <img src="/cardapiodigital/assets/img/uploads/<?php echo htmlspecialchars( $value1["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                <?php }else{ ?>

                    <img src="/cardapiodigital/assets/img/uploads/imagem-padrao.jpeg" alt="">
                <?php } ?>

            </div>
        </div>  
    <?php } ?>  
</div>

<!--! Modal oculto! Mostra os detalhes do produto quando solicitado -->
<div id="modal" class="modal" style="display: none;">    
    <div class="modal-content">        
        <div class="modal-body">
            <div class="modal-image">
                <img id="modal-image" src="" alt="Produto" />
                <button class="btn-close-modal" id="close-modal">X</button>
            </div>
            <div class="modal-info">
                <h4 id="modal-nome"></h4>
                <p id="modal-descricao"></p>
                <p id="modal-preco"></p>
            </div>
        </div>
    </div>
</div>

<!--! Modal oculto! Mostra o conteudo de contato-->
<div id="modal-contato" class="modal-contato" style="display: none;">    
    <div class="modal-contato-content">
        <button class="btn-close-modal-contato" id="close-modal-contato">X</button>        
        <div class="modal-contato-body">
            <img src="../assets/img/imagens/logo-restaurante.png" alt="logo">
            <span><i class="fa-solid fa-location-dot"></i> Rua Nome da rua, 2569, Bairro, Cidade, Estado, País</span>
            <span><i class="fa-solid fa-phone"></i> 44 9156-8796</span>
            <span><i class="fa-solid fa-envelope"></i> teste@email.com.br</span>
            <span><i class="fa-brands fa-instagram"></i> @_instagram</span>
            <span><i class="fa-solid fa-globe"></i> www.seusite.com.br</span>
        </div>
    </div>
</div>