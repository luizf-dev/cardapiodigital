<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $msgSucesso != '' ){ ?>        
    <script>
        msgSucesso('<?php echo htmlspecialchars( $msgSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
    </script>       
<?php } ?> 

<?php if( $msgErro != '' ){ ?>        
<script>
    msgErro('<?php echo htmlspecialchars( $msgErro, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
</script>
<?php } ?>



<div class="container-adicionais">
    <div class="table-container">
        <h3>Adicionais do produto - <a href="/admin/detalhe-produto/<?php echo htmlspecialchars( $id_produto, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: #17c717; text-decoration: underline;"><?php echo htmlspecialchars( $nome_produto, ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h3>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome Adicional</th>
                    <th>Preço</th>                    
                    <th>Editar</th>
                    <th>Deletar</th>           
                </tr>
            </thead>
            <tbody>        
                <?php $counter1=-1;  if( isset($adicionais) && ( is_array($adicionais) || $adicionais instanceof Traversable ) && sizeof($adicionais) ) foreach( $adicionais as $key1 => $value1 ){ $counter1++; ?>

                    <tr>              
                        <td class="nome-adicional" data-label="Nome"><span><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span></td>                                     
                        <td class="nome-adicional" data-label="Preço"><span>R$ <?php echo formatarPreco($value1["preco"]); ?></span></td>                                     
                        <td class="actions" data-label="Editar"><a href="/admin/atualizar-adicional/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-pencil"></i></a></td>
                        <td class="actions" data-label="Deletar"><a href="javascript:void(0)" onclick="confirmDelAdicional('<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-trash"></i></a></td>                  
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>
