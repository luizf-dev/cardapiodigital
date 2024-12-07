//! Msg para alertas de erro 
function msgErro(msgErro){
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Ops! :(',
        text: msgErro,
        showConfirmButton: true,
        timer: 7000
    });
}

//! Msg para alertas de sucesso 
function msgSucesso(msgSucesso){

    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Sucesso! :) ',
        text: msgSucesso,
        showConfirmButton: false,
        timer: 7000
    });
}


//! Essa função abre um modal de confirmação antes da exclusão de algum produto  
function confirmarExclusao(id, nome) {

    const nomeFormatado = `<span class="alert-delete">${nome}</span>`;

    const deletar = Swal.mixin({
        customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true
    });
    
    deletar.fire({
        title: 'Deseja mesmo excluir o produto?',
        text: '',
        html: nomeFormatado,
        showCancelButton: true,
        confirmButtonText: 'Sim, excluir!',
        cancelButtonText: 'Não, cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
        //! Aqui, você pode redirecionar o usuário para a rota de exclusão
        window.location.href = "/cardapiodigital/admin/deletar-produto/" + id;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
        deletar.fire(
            'Cancelado',
            'O produto ' + nomeFormatado + ' não foi excluído.',
            'error'
        );
        }
    });
    }  

//! Essa função abre um modal de confirmação antes da exclusão de alguma categoria
function confirmDelCategorie(id_categoria, nome_categoria) {

    const nomeFormatado = `<h6 class="alert-delete">${nome_categoria}</h6>`;
    const alerta = '<span class="alert-delete-categorie">Atenção!!</span><br>';
    
    Swal.fire({
        title: `${alerta} Ao excluir uma categoria, todos os produtos vinculados a ela serão perdidos! Deseja mesmo excluir a categoria?`,
        text: '',
        html: nomeFormatado,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Excluir!',
        cancelButtonText: 'Cancelar!',
        denyButtonText: 'Dont Save',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
        //! Aqui, você pode redirecionar o usuário para a rota de exclusão
        window.location.href = "/cardapiodigital/admin/deletar-categoria/" + id_categoria;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
            'Cancelado',
            'Categoria ' + nomeFormatado + ' não foi excluída!',
            'error'
        );
        }
    });
}



//= Esse trecho abaixo se refere ao carregamento dos detalhes do produto em um modal para exibição 

//! variável para pegar a posição atual do scroll da tela
let scrollPosition = 0;

//! Selecão do elementos para carregar os detalhes do produto no modal
const detalhesBtns = document.querySelectorAll('.btn-detalhes');
const modal = document.getElementById('modal');
const containerMenu = document.getElementById('container-menu');
const modalImage = document.getElementById('modal-image');
const modalNome = document.getElementById('modal-nome');
const modalDescricao = document.getElementById('modal-descricao');
const modalPreco = document.getElementById('modal-preco');
const closeModal = document.getElementById('close-modal');

//!Função para abrir o modal com os detalhes do produto 
detalhesBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        const id = btn.getAttribute('data-id');
        const nome = btn.getAttribute('data-nome');
        const descricao = btn.getAttribute('data-descricao');
        const imagem = btn.getAttribute('data-imagem');
        const preco = btn.getAttribute('data-preco');

        //! Preenche os dados do produto no modal
        modalImage.src = imagem;
        modalNome.textContent = nome;
        modalDescricao.textContent = descricao;
        modalPreco.textContent = preco;

        //! volta para a atual posição do scroll da tela
        scrollPosition = window.scrollY;

        //! Exibe o modal com os detalhes do produto e oculta os demais itens da tela
        modal.style.display = 'block';
        containerMenu.style.display = 'none';
    });
});

//!Fecha o modal ao clicar no botão de fechar
closeModal.addEventListener('click', () => {
    modal.style.display = 'none';
    containerMenu.style.display = 'block';

    //! Restaurar a posição de rolagem ao fechar o modal
    window.scrollTo(0,scrollPosition);    
});



//= evento para aplicar a classe fixed ao submenu de cartegorias 

//! armazena a ultima posição do scroll
let lastScrollY = window.scrollY;

window.addEventListener('scroll', () => {
    
    const menu = document.getElementById('menu');
    const subMenu = document.getElementById('submenu-scroll');

    //!obtem a posição do menu e do submenu em relação a tela
    const menuPosition = menu.getBoundingClientRect().bottom;
    const subMenuPosition = subMenu.getBoundingClientRect().top;

    //!posição atual do scroll
    const currentScrollY = window.scrollY;

    //! Quando o submenu "encostar" no fim do menu principal e o scroll estiver descendo, fixa o submenu
    if(subMenuPosition <= menuPosition && currentScrollY > lastScrollY){

        subMenu.classList.add('submenu-scroll-fixed');

    }else if(currentScrollY < lastScrollY || currentScrollY <= 0){

        subMenu.classList.remove('submenu-scroll-fixed');
    }

    //!atualiza a ultima posição do scroll
    lastScrollY = currentScrollY;

});




const btnContato = document.getElementById('btn-contato');
const modalContato = document.getElementById('modal-contato');
const btnCloseModalContato = document.getElementById('close-modal-contato');

//=  Exibe o modal de contato
btnContato.addEventListener('click', () => {
    
    modalContato.style.display = 'block';
    //containerMenu.style.display = 'none';
    

});

btnCloseModalContato.addEventListener('click', () => {

    modalContato.style.display = 'none';
});

