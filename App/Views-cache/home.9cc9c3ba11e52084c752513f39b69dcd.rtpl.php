<?php if(!class_exists('Rain\Tpl')){exit;}?><h1>OLÁ <?php echo htmlspecialchars( $nome, ENT_COMPAT, 'UTF-8', FALSE ); ?>,  AQUI É A HOME!</h1>
<h1>Lista de produtos</h1>

<table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Descrição</th>
        <th>Status Produto</th>
        <th>Categoria</th>
        <th>Data Cadastro</th>
        <th>Data Atualização</th>
      </tr>
    </thead>
    <tbody>
        <?php $counter1=-1;  if( isset($produto) && ( is_array($produto) || $produto instanceof Traversable ) && sizeof($produto) ) foreach( $produto as $key1 => $value1 ){ $counter1++; ?>

            <tr>
                <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["data_criacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["data_atualizacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            </tr>   
        <?php } ?>   
    </tbody>
  </table>