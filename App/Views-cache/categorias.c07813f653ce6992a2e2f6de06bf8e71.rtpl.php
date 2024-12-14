<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="table-container">

    <?php if( $msgSucesso != '' ){ ?>        
        <script>
            msgSucesso('<?php echo htmlspecialchars( $msgSucesso, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
        </script>       
    <?php } ?> 

    <?php if( $msgErro != '' ){ ?>        
      <script>
          msgErro('<?php echo htmlspecialchars( $msgErro, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
      </script>
    <?php } ?>

    
  <h3>Categorias</h3>
  <table class="table">
      <thead>
          <tr>
              <th>Nome Categoria</th>
              <th>Status</th>
              <th>Data Cadastro</th>
              <th>Data Atualização</th>
              <th>Editar</th>
              <th>Deletar</th>
              <th>Ver Produtos</th>
              <th>Exibido na Home</th>
          </tr>
      </thead>
      <tbody>        
          <?php $counter1=-1;  if( isset($category) && ( is_array($category) || $category instanceof Traversable ) && sizeof($category) ) foreach( $category as $key1 => $value1 ){ $counter1++; ?>

              <tr>              
                  <td class="nome-categoria" data-label="Nome Categoria"><span><?php echo htmlspecialchars( $value1["nome_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span></td>
                  <?php if( $value1["status"] == 'ativo' ){ ?>

                    <td class="status" data-label="Status"><?php echo htmlspecialchars( $value1["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa-solid fa-circle-check"></i></td>
                  <?php } ?>

                  <?php if( $value1["status"] == 'inativo' ){ ?>

                    <td class="status" data-label="Status"><?php echo htmlspecialchars( $value1["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fa-solid fa-circle-xmark"></i></td>
                  <?php } ?>              
                  <td data-label="Data-Cadastro"><?php echo formatarData($value1["data_criacao"]); ?></td>
                  <td data-label="Data-Atualização"><?php echo formatarData($value1["data_atualizacao"]); ?></td>
                  <td class="actions" data-label="Editar"><a href="/cardapiodigital/admin/atualizar-categoria/<?php echo htmlspecialchars( $value1["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-pencil"></i></a></td>
                  <td class="actions" data-label="Deletar"><a href="javascript:void(0)" onclick="confirmDelCategorie('<?php echo htmlspecialchars( $value1["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>', '<?php echo htmlspecialchars( $value1["nome_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-trash"></i></a></td>
                  <td class="actions" data-label="Ver Produtos"><a href="/cardapiodigital/admin/categorie/<?php echo htmlspecialchars( $value1["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fa-solid fa-square-arrow-up-right"></i></a></td>
                  <?php if( $value1["exibir_na_home"] == '1' ){ ?>

                    <td class="exibir-home" data-label="Exibido na Home">Sim <i class="fa-solid fa-circle-check check"></i></td>
                  <?php } ?>

                  <?php if( $value1["exibir_na_home"] == '0' ){ ?>

                    <td class="exibir-home" data-label="Exibido na Home">Não <i class="fa-solid fa-circle-xmark xmark"></i></td>
                  <?php } ?>

              </tr>
            <?php } ?>

      </tbody>
  </table>
</div>