<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $msgErro != '' ){ ?>        
    <script>
        msgErro('<?php echo htmlspecialchars( $msgErro, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
    </script>
<?php } ?>



<div class="container-login">
    
    <form method="POST" action="/admin" class="formLogin">
        <div class="logo-index">
            <img src="/assets/img/imagens/icon.svg" width="100px" alt="">
            <h2>Epic Food</h2>
        </div>
        <div>
            <input type="text" name="email" placeholder="Digite seu endereço de email" autofocus="true" />
            <span><i class="fa-solid fa-user"></i></span>
        </div>
        <div>
            <input type="password" name="password" placeholder="Digite sua senha" />
            <span><i class="fa-solid fa-lock"></i></span>
        </div>
        <button type="submit" class="btn">Entrar</button>
    </form>
</div>


