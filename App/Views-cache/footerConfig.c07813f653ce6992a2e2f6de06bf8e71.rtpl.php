<?php if(!class_exists('Rain\Tpl')){exit;}?><script src="/cardapiodigital/assets/js/sweet-alert2.js"></script>
<script src="/cardapiodigital/assets/js/main.js"></script>          
        
        <script>
            //sidebar Admin 
            $(document).ready(function(){
                //jquery for toggle sub menus
                $('.sub-btn').click(function(){
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.dropdown').toggleClass('rotate');
                });

                //jquery for expand and collapse the sidebar
                $('.menu-btn').click(function(){
                $('.side-bar').addClass('active');
                $('.menu-btn').css("visibility", "hidden");
                });

                $('.close-btn').click(function(){
                $('.side-bar').removeClass('active');
                $('.menu-btn').css("visibility", "visible");
                });
            });

             //!mascara para preenchimento do input de preço do produto
             const inputPreco = document.getElementById('preco');

            inputPreco.addEventListener('input', function(){
                
                let valorEmReais = inputPreco.value;

                //Remove tudo que não for dígito
                valorEmReais = valorEmReais.replace(/\D/g, '');

                //Converte o valor para centavos e aplica a máscara de moeda
                valorEmReais = (valorEmReais / 100).toFixed(2).replace('.', ',');


                //Adiciona os pontos de separação de milhar
                valorEmReais = valorEmReais.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                //Atualiza o valor no input
                inputPreco.value = valorEmReais;
            });
        </script>
    </body>
</html>