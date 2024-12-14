<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $msgErro != '' ){ ?>        
    <script>
        msgErro('<?php echo htmlspecialchars( $msgErro, ENT_COMPAT, 'UTF-8', FALSE ); ?>');
    </script>
<?php } ?>



<div class="container-login">
    <h1>Epic Food <span>Admin</span></h1>
    <form method="POST" action="/cardapiodigital/admin" class="formLogin">
        <h3>Faça seu login</h3>
        <div>
            <input type="text" name="username" placeholder="Digite seu nome de usuário" autofocus="true" />
            <span><i class="fa-solid fa-user"></i></span>
        </div>
        <div>
            <input type="password" name="password" placeholder="Digite sua senha" />
            <span><i class="fa-solid fa-lock"></i></span>
        </div>
        <button type="submit" class="btn">Entrar</button>
    </form>
</div>


