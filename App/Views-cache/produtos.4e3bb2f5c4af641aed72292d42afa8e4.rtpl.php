<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="submenu-scroll" class="submenu-scroll">
    <a href="/">Home</a>
    <?php $counter1=-1;  if( isset($category) && ( is_array($category) || $category instanceof Traversable ) && sizeof($category) ) foreach( $category as $key1 => $value1 ){ $counter1++; ?>

      <a href="/categorie/<?php echo htmlspecialchars( $value1["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nome_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
    <?php } ?>

</div>

<div class="title-category"><h2><?php echo htmlspecialchars( $nome_categoria, ENT_COMPAT, 'UTF-8', FALSE ); ?></h2></div>

<div class="container-menu">
    <?php $counter1=-1;  if( isset($produtos) && ( is_array($produtos) || $produtos instanceof Traversable ) && sizeof($produtos) ) foreach( $produtos as $key1 => $value1 ){ $counter1++; ?>

        <div class="card-menu">
            <a class="btn-detalhes" data-id="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-nome="<?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-descricao="<?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-imagem="/assets/img/uploads/<?php echo htmlspecialchars( $value1["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-preco='R$ <?php echo formatarPreco($value1["preco"]); ?>'>
                <div class="card-menu-info">
                    <h3 class="menu-item-title"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    <p class="menu-item-description">
                        <?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                    </p>
                    <span><i class="fa-solid fa-circle-plus"></i> Detalhes...</span>
                    <!-- <button class="btn-detalhes" data-id="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-nome="<?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-descricao="<?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-imagem="assets/img/uploads/<?php echo htmlspecialchars( $value1["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-preco='R$ <?php echo formatarPreco($value1["preco"]); ?>'><span><i class="fa-solid fa-circle-plus"></i> Detalhes...</span></button> -->
                </div>
                <div class="card-menu-img">
                    <?php if( $value1["imagem"] != '' ){ ?>

                        <img src="/assets/img/uploads/<?php echo htmlspecialchars( $value1["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                    <?php }else{ ?>

                        <img src="/assets/img/uploads/imagem-padrao.jpeg" alt="">
                    <?php } ?>

                </div>
            </a> 
        </div>   
    <?php } ?>  
</div>

<!--! Modal oculto! Mostra os detalhes do produto quando solicitado -->
<div id="modal" class="modal">    
    <div class="modal-content">        
        <div class="modal-body">          
            <div class="modal-image">
                <img id="modal-image" src="" alt="Produto" />              
            </div>
            <div class="modal-info">
                <h2 id="modal-nome"></h2>
                <p id="modal-preco"></p> 
                <p id="modal-descricao"></p>                     
            </div>
            <button class="btn-close-modal" id="close-modal">Fechar</button>
        </div>
    </div>
</div>

<!--! Modal oculto! Mostra o conteudo de contato-->
<div id="modal-contato" class="modal-contato" style="display: none;">    
    <div class="modal-contato-content">
        <button class="btn-close-modal-contato" id="close-modal-contato">X</button>        
        <div class="modal-contato-body">     
            <p>Sua logo aqui</p>
            <img src="/assets/img/imagens/logo.png" alt="logo">        
            <div class="dados-contato">
                <span><i class="fa-solid fa-location-dot"></i> Nome da rua - 2569, Bairro, Cidade, Estado</span>
                <span><i class="fa-brands fa-whatsapp"></i> (47) 99156-8796</span>
                <span><i class="fa-solid fa-envelope"></i> teste@email.com.br</span>
                <span><i class="fa-brands fa-instagram"></i> @_instagram</span>
                <span><i class="fa-solid fa-globe"></i> www.seusite.com.br</span>
            </div>
        </div>
    </div>
</div>