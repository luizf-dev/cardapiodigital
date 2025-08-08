<?php if(!class_exists('Rain\Tpl')){exit;}?>    <?php if( $msgSucesso != '' ){ ?>        
        <script>
           msgSucesso('<?php echo htmlspecialchars( $msgSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
        </script>       
    <?php } ?>   

    <?php if( $msgErro != '' ){ ?>        
        <script>
           msgErro('<?php echo htmlspecialchars( $msgErro, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
        </script>       
    <?php } ?>


    <h3 class="titulo-categoria"><?php echo htmlspecialchars( $produtos["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
    <div class="produtos">           
        <div class="produto">
            <div class="dados-produto">                             
                <div class="img-produto">
                    <?php if( $produtos["imagem"] != '' ){ ?>

                        <img id="product-image-<?php echo htmlspecialchars( $value["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" src="/assets/img/uploads/<?php echo htmlspecialchars( $produtos["imagem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="food">
                    <?php }else{ ?>

                        <img src="/assets/img/uploads/imagem-padrao.jpeg" alt="">
                    <?php } ?>

                </div>
                <div class="info">
                    <h5 class="nome-produto"><?php echo htmlspecialchars( $produtos["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                    <p><span class="descricao">Descrição:</span> <?php echo htmlspecialchars( $produtos["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    <p><span class="preco">Preço: </span> <?php echo formatarPreco($produtos["preco"]); ?></p> 
                    <?php if( $produtos["status"] == 'ativo' ){ ?>

                        <p class="status"><span class="status">Status do Produto: </span> <?php echo htmlspecialchars( $produtos["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa-solid fa-circle-check"></i></p>
                    <?php } ?>

                    <?php if( $value["status"] == 'inativo' ){ ?>

                        <p class="status"><span class="status">Status do Produto: </span> <?php echo htmlspecialchars( $produtos["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa-solid fa-circle-xmark"></i></p>
                    <?php } ?>            
                    <p><span class="categoria">Categoria: </span><?php echo htmlspecialchars( $produtos["nome_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    <p><span class="date">Data Cadastro: </span><?php echo formatarData($produtos["data_criacao"]); ?></p>
                    <p><span class="date">Data Atualização: </span><?php echo formatarData($produtos["data_atualizacao"]); ?></p>
                </div>
            </div>
            <div class="actions-produtos">
                <a class="btns" href="/admin/cadastrar-imagem/<?php echo htmlspecialchars( $produtos["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">                             
                    <i class="fa-solid fa-image"></i> 
                    Atualizar Imagem
                </a>
                <a class="btns" href="/admin/atualizar-produto/<?php echo htmlspecialchars( $produtos["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <i class="fa-solid fa-pen-to-square"></i>                       
                    Atualizar Produto
                </a>
                <a class="btns" href="javascript:void(0)" onclick="confirmarExclusao('<?php echo htmlspecialchars( $produtos["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $produtos["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')">                            
                    <i class="fa-solid fa-trash-can"></i>
                    Excluir Produto
                </a> 
                <a class="btns" href="javascript:void(0)" onclick="abrirModalAdicional('<?php echo htmlspecialchars( $produtos["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')">                            
                    <i class="fa-solid fa-circle-plus"></i>
                    Cadastrar Adicional
                </a>
                <a class="btns btn-ver-adicionais" href="/admin/listar-adicionais/<?php echo htmlspecialchars( $produtos["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <i class="fa-solid fa-eye"></i>
                    Ver Adicionais
                </a>
            </div>
        </div>      
    </div>

    <!-- Modal Cadastrar Adicional -->
    <div id="modal-adicional" class="modal-overlay-adicional">
        <div class="modal-content-adicional">
            <span class="close-modal-adicional" onclick="fecharModalAdicional()">&times;</span>
            <h2>Cadastrar Adicional</h2>
            <form id="form-adicional" method="POST" action="/admin/cadastrar-adicional">
                <input type="hidden" name="id_produto" id="id_produto_adicional">
                <input type="hidden" value="<?php echo htmlspecialchars( $id_categoria, ENT_COMPAT, 'UTF-8', FALSE ); ?>"  name="id_categoria">

                <div class="form-group">
                    <label for="nome">Nome do Adicional:</label>
                    <input type="text" name="nome" placeholder="Nome do Adicional" autofocus>
                </div>

                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="text" name="preco" id="preco" placeholder="Preço do Adicional">
                </div>                

                <button type="submit" class="btn">Cadastrar</button>
            </form>
        </div>
    </div>


