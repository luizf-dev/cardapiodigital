<?php if(!class_exists('Rain\Tpl')){exit;}?>        <script>


            // Nome do usuário vindo do backend
            const userFullName = "<?php echo htmlspecialchars( $nome_estabelecimento, ENT_COMPAT, 'UTF-8', FALSE ); ?>";       


            // Divide o nome completo para pegar o primeiro nome
           //const firstName = userFullName.split(' ')[0];

            // Saudação dinâmica com base no horário
            const currentHour = new Date().getHours();
            let salute;

            if (currentHour < 12) {
                salute = "Bom dia";
            } else if (currentHour < 18) {
                salute = "Boa tarde";
            } else {
                salute = "Boa noite";
            }

            // Exibe a saudação com o primeiro nome
            const userSalute = `${salute}, ${userFullName}!`;
            document.getElementById("salute").textContent = userSalute;
            
                  

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