<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="top-bar">
  <div class="menu-btn">
    <i class="fas fa-bars"></i>
  </div>
  <div>
    <h3>Epic Food <span>Admin</span></h3>
  </div> 

  <div class="navbar">     
    <div class="salute" id="salute"></div>
  </div>
  <div class="logout">
    <a href="/admin/logout"><i class="fa-solid fa-right-from-bracket"></i></a>
  </div>
</div>

<div class="side-bar">
    <header>
        <div class="close-btn">
          <i class="fas fa-times"></i>
        </div>
        <img class="img-user" src="/assets/img/imagens/icon.svg" alt="img-user">
        <div class="nome-estabelecimento">
          <p><?php echo htmlspecialchars( $nome_estabelecimento, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        </div>
    </header>
    <div class="input-group search-categories">      
      <input type="text" id="busca_categoria" placeholder="Buscar uma categoria">
      <div id="sugestoes_categorias" class="autocomplete-list"></div>
    </div>
    <div class="menu">
      <div class="item"><a href="/admin/home"><i class="fa-solid fa-house"></i> Home</a></div>
      <div class="item"><a href="/admin/categories"><i class="fa-solid fa-filter"></i> Categorias</a></div>
      <div class="item"><a href="/admin/newCategorie"><i class="fa-solid fa-circle-plus"></i> Cadastrar Categoria</a></div>
      <div class="item"><a href="/admin/cadastrar-produto"><i class="fa-solid fa-circle-plus"></i>Cadastrar Produto</a></div>
      <div class="item"><a href="/"><i class="fa-solid fa-burger"></i> Cardápio</a></div>
      <div class="item"><a href="/admin/logout"><i class="fa-solid fa-right-from-bracket"></i> Sair</a></div>
    </div>
</div>

  