<style>
    a {
        text-decoration: none;
        color: #fff;
    }

    .menu-mobile {
        display: none
    }

    .navbar {
        padding: 20px 0;
        background-color: #2e3574;
    }

    .navbar-container {
        max-width: 1280px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 0 7%;
        margin: 0 auto;
        background: #2e3574;
        font-size: 1.7rem;
        font-weight: 500;
    }

    .navbar-logo {
        width: 100%;
    }

    .navbar-option {
        padding: 1rem;
        font-size: 1.2rem;
    }

    .navbar-categorias,
    .menu-content {
        display: none;
        position: absolute;
        background-color: #fff;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 2;
        border-radius: 5px;
        margin: .5rem;
    }

    .navbar-categorias-content {
        padding: .5rem;
        border-radius: 5px;
        margin-top: .5rem;
        margin-bottom: .25rem;
    }

    .navbar-categorias-content:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .navbar-categorias {
        display: block;
        border-radius: 5px;
    }

    @media screen and (max-width: 600px) {
        .navbar-option {
            display: none;
        }

        .menu-mobile {
            display: block;
            font-size: 24px;
            cursor: pointer;
            color: white;
        }
    }


    .menu-content {
        display: none;
        font-size: 20px;
        padding: 1.5rem;
        flex-direction: column;
    }

    .menu-content a {
        color: #000;
        user-select: none;
    }

    .displayBlock {
        display: block;
    }

    .displayFlex {
        display: flex;
    }

    @media screen and (max-width: 768px) {
        .logo {
            float: none !important;
            display: block;
            margin: 0 auto;
        }
    }
</style>
<?php
if(isset($_SESSION['autenticado'])) {
    $autenticado = $_SESSION['autenticado'];
} else {
    $autenticado = false;
}
    $autenticadoOptions = [
        'Favoritos' => '/Projeto01/pages/painel/index.php',
        'Sair' => '/Projeto01/pages/saiu/index.php',
    ];
    $naoautenticadoOptions = ['Entrar' => "/Projeto01/pages/login/index.php"];
    $pagesOptions = [
        'Sobre' => "/Projeto01/pages/sobre/index.php",
        'Contato' => "/Projeto01/pages/contato/index.php",
        'Categorias' => [
            'Livros' => "/Projeto01/pages/categorias/index.php",
        ],
    ];

$options = array_merge($pagesOptions, $autenticado ? $autenticadoOptions : $naoautenticadoOptions);
?>
<div class="navbar">
    <div class="navbar-container">
        <div class="menu-mobile">
            <div class="menuIcon">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="menu-content">
                <?php
                foreach ($options as $key => $value) {
                    if (is_array($value)) {
                        echo "<div class='dropdownMobile' id='categoriasMobile'>
                            <span style='display: flex; color: #000;'>
                            Categorias
                            <i class='fa fa-caret-down' style='margin-left: 10px'></i>
                            </span>
                        ";
                        echo "<div class='navbar-categorias' id='categoriasContentMobile'>";
                        foreach ($value as $key2 => $value2) {
                            echo "<div class='navbar-categorias-content'>
                            <a href='$value2' class='navbar-categorias-content'>$key2</a>
                            </div>";
                        }
                        echo "</div>";
                        echo "</div>";
                    } else {
                        echo "<a href='$value' style='color:#000'>$key</a>";
                    }
                }

                ?>
            </div>
            <script>
                const btnMenu = document.querySelector('.menuIcon');
                btnMenu.addEventListener('click', () => {
                    const menuContent = document.querySelector('.menu-content');
                    menuContent.classList.toggle('displayFlex');
                });
                const btnCategorias = document.querySelector('#categoriasMobile');
                btnCategorias.addEventListener('click', () => {
                    const categoriasContent = document.querySelector('#categoriasContentMobile');
                    categoriasContent.classList.toggle('displayBlock');
                });
            </script>
        </div>
        <div class="navbar-logo">
            <a href="/Projeto01">
                <img src="/Projeto01/imagens/logo.jpg" class="logo" height="70px">
            </a>
        </div>
        <?php
        foreach ($options as $key => $value) {
            if (is_array($value)) {
                echo "<div class='navbar-option dropdown'>
                        <span style='display: flex; color: #fff;'>
                        Categorias
                        <i class='fa fa-caret-down' style='margin-left: 10px'></i>
                        </span>
                        <div class='navbar-categorias'>";
                foreach ($value as $key2 => $value2) {
                    echo "
                    <div class='navbar-categorias-content'>
                    <a href='$value2' class='navbar-categorias-content' style='color: #000'>$key2</a>
                    </div>
                    ";
                }
                echo "</div>
                    </div>";
            } else {
                echo "<div class='navbar-option'>
                        <a href='$value' style='color:#fff;'>$key</a>
                    </div>";
            }
        }
        ?>
    </div>
</div>