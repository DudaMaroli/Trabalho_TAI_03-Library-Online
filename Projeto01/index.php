<?php
?>
<!DOCTYPE html>
<html>

<head>
    <title>Library Online</title>
    <link href="./estilos/style.css" rel="stylesheet" />
    <?php include './includes/head.php'; ?>
</head>

<body>
    <?php include_once('./includes/navbar/navbar.php'); ?>
    <!--banner-->
    <section class="banner-principal">
        <div class="overlay"></div>
        </div>
        <form>
				<h2>Library Online</h2>
			</form>
    </section>

    <!--descrição do autor-->
    <div class="conteudo-texto">

        <div class="texto">
            <h2> Qual a importância da leitura?</h2>
            <p>Tanto a leitura quanto a escrita são práticas sociais de suma importância para o desenvolvimento
                da
                cognição humana.</p>
            <p>Ambas proporcionam o desenvolvimento do intelecto e da imaginação, além de promoverem a aquisição
                de
                conhecimentos.
            </p>
            <p>Dessa maneira, quando lemos ocorrem diversas ligações no cérebro que nos permitem desenvolver o
                raciocínio. Além disso, com essa atividade aguçamos nosso senso crítico por meio da capacidade
                de
                interpretação.</p>
            <p>Nesse sentido, vale lembrar que a “interpretação” dos textos é uma das chaves essenciais da
                leitura.
                Afinal, não basta ler ou decodificar os códigos linguísticos, faz-se necessário compreender e
                interpretar essa leitura.</p>

        </div>

        <div class="imagem-texto">
            <img src="imagens/livro2.jpg">
        </div>
    </div>

    <div class="conteudo-ranking">
        <h2>Rankings</h2>

        <div class="box-ranking">
            <i class="fa-sharp fa-solid fa-ranking-star"></i>
            <h4>Os 3 maiores autores brasileiros de todos os tempos</h4>
            <p>1. Machado de Assis (1839-1908)</p>
            <p>2. Clarice Lispector (1920-1977)</p>
            <p>3. Mário de Andrade (1893-1945)</p>
        </div>
        <!--box-especialidades-->
        <div class="box-ranking">
            <i class="fa-sharp fa-solid fa-ranking-star"></i>
            <h4>Os 3 maiores autores no mundo de todos os tempos</h4>
            <p>1. William Shakespeare (1564-1616)</p>
            <p>2. Charles Dickens (1812-1860)</p>
            <p>3. Jane Austen (1775-1817)</p>
        </div>
        <!--box-especialidades-->
        <div class="box-ranking">
            <i class="fa-sharp fa-solid fa-ranking-star"></i>
            <h4>Os 3 maiores autores latino-americano de todos os tempos</h4>
            <p>1. Julio Cortázar</p>
            <p>2. Carlos Fuentes</p>
            <p>3. Gabriel García Márquez</p>
        </div>
        <!--box-especialidades-->
    </div>
    <!--especialidades-->

    <div class="conteudo-generos">
        <h2>Quais são os Gêneros Literários?</h2>
        <div class="box-generos">
            <div class="genero">
                <p class="titulo-genero">Gênero Narrativo</p>
                <p class="descricao-genero">O gênero narrativo se refere a textos que contam histórias.</p>
                <p class="subtitulo-genero">→ Subgêneros do gênero narrativo</p>
                <ul class="subgeneros">
                    <li>Epopeias: são narrativas escritas em verso (com o passar do tempo, as epopeias foram
                        substituídas pelo romance).</li>
                    <li>Romance: é uma longa narrativa escrita em forma de prosa.</li>
                    <li>Fábulas: são contos cujos personagens são animais. Esse tipo de narrativa sempre
                        apresenta
                        uma lição de moral.</li>
                    <li>Contos e novelas: o conto é uma pequena narrativa, já a novela é uma narrativa de
                        tamanho
                        intermediário entre o conto e o romance. Duas famosas novelas brasileiras são O
                        alienista,
                        de Machado de Assis, e A hora da estrela, de Clarice Lispector. Já o conto O segredo de
                        Brokeback Mountain, de Annie Proulx, ficou mundialmente famoso quando foi adaptado para
                        o
                        cinema.</li>
                </ul>
            </div>
            <div class="genero">
                <p class="titulo-genero">Gênero Lírico</p>
                <p class="descricao-genero">O gênero lírico está relacionado a textos que expressam emoções,
                    desejos ou ideias de forma plurissignificativa, ou seja, eles recorrem mais à conotação do
                    que à
                    denotação. Assim, as poesias são textos líricos que podem ser escritos em forma de verso ou
                    de
                    prosa.</p>
                <p class="subtitulo-genero">→ Subgêneros do gênero lírico</p>
                <ul class="subgeneros">
                    <li>Ode: o eu lírico homenageia algo ou alguém.</li>
                    <li>Elegia: é um poema composto em tom melancólico.</li>
                    <li>Madrigal: apresenta caráter pastoril e heroico.</li>
                    <li>Epitalâmio: enaltece o casamento.</li>
                    <li>Écloga: possui aspecto pastoril e apresenta diálogos</li>
                </ul>

            </div>

            <div class="genero">
                <p class="titulo-genero">Gênero Dramático</p>
                <p class="descricao-genero">O gênero dramático está relacionado a textos produzidos para serem
                    interpretados por atores. Tais textos são compostos por atos, cenas, rubricas (instruções do
                    dramaturgo) e falas.</p>
                <p class="subtitulo-genero">→ Subgêneros do gênero dramático</p>
                <ul class="subgeneros">
                    <li>Tragédias: são textos dramáticos de caráter funesto, trágico.</li>
                    <li>Comédias: são textos cômicos, engraçados, com situações e personagens ridículos.</li>
                    <li>Auto: se refere a textos dramáticos que apresentam caráter moral, místico ou satírico.
                    </li>
                    <li>Farsa: é uma peça cômica com apenas um ato.</li>
                </ul>

            </div>
        </div>
    </div>
    <footer>
        <p>Todos os direitos reservados à Emanuelle Ferrazo e Maria Eduarda Maroli</p>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/scripts.js"></script>

    </script>
</body>

</html>