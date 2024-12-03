<?php 

//! método para formatar o preço do produto 
function formatarPreco($preco){

    if(!$preco > 0) $preco = 0;

    return number_format($preco, 2 , ",", ".");

}

//! função para exibir a data em formato Brasileiro
function formatarData($date){

    //! verifica se a data está no formato esperado
    if(!$date){
        return null;
    }

    //! cria um objeto dateTime com a data fornecida
    $dataFormatada = DateTime::createFromFormat('Y-m-d H:i:s', $date);

    //! verifica se o objeto foi criado com sucesso
    if(!$dataFormatada){
        return null;
    }

    //! retorna a data no formato brasileiro
    return $dataFormatada->format('d-m-Y - H:i:s');
}