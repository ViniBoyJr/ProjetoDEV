// Caminhos das imagens
const imagem1 = '../img/Icons/favorite_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.png';
const imagem2 = '../img/Icons/favoritoselected.png';

// Estado atual
let imagemAtual = 1;

function trocarImagem() {
    const img = document.getElementById('imagem');

if (imagemAtual == 1) {
    img.src = imagem2;
    imagemAtual = 2;
} else {
    img.src = imagem1;
    imagemAtual = 1;
    }
}