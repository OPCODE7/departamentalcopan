<?php
require_once("app/config/Routes.php");
require_once("app/config/Env.php");


$route = new Routes();
$env = new Env();

$userData = "";

if (isset($_SESSION["userlogged"])) {
    $userData =  $_SESSION["userlogged"];
}

$url = $_SERVER['REQUEST_URI'];
$components = parse_url($url);

$lenghtRoute = strlen($components["path"]);
$replaceSlashUrl = str_replace("/", " | ", substr($components["path"], 1, str_ends_with($components["path"], "/") ? $lenghtRoute - 2 : $lenghtRoute));

$titleFormat = strtoupper($replaceSlashUrl);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $env->APP_URL . "public/css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?php echo $env->APP_URL  . "public/css/custom_styles/styles.css" ?>">
    <link rel="stylesheet" href="<?php echo $env->APP_URL  . "public/assets/fontawesome/css/all.min.css" ?>">
    <link rel="shortcut icon" href="<?php echo $env->APP_URL . "public/assets/icons/secretaria.ico" ?>" type="image/x-icon">
    <link
        rel="stylesheet"
        href="<?php echo $env->APP_URL ?>public/plugins/animatecss/animate.compat.css" />

    <title><?php echo $titleFormat ?></title>
    <meta name="description" content="Sitio oficial direccion departamental de educación copán." />

</head>

<body>

    <div class="container-fluid p-0 m-0 d-flex flex-wrap min-vh-100 w-100 position-relative" id="container-principal">
        <section class="row text-secondary align-items-center py-1 border-bottom border-secondary-subtle w-100 px-3 px-md-4 px-lg-5 m-0" id="header-top">
            <div class="social-media col-12 col-md-5 ps-md-0">
                <ul class="social-icons d-flex list-unstyled align-items-center justify-content-center justify-content-md-start m-0">
                    <li class="me-4"><a href="#" class="text-decoration-none color-blue-hover"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li class="me-4"><a href="#" class="text-decoration-none color-blue-hover"><i class="fa-brands fa-twitter"></i></a></li>
                    <li class="me-4"><a href="#" class="text-decoration-none color-blue-hover"><i class="fa-brands fa-youtube"></i></a></li>
                    <li class="me-4"><a href="#" class="text-decoration-none color-blue-hover"><i class="fa-brands fa-instagram"></i></a></li>
                    <li class="me-4"><a href="#" class="text-decoration-none color-blue-hover"><i class="fa-brands fa-whatsapp"></i></a></li>
                </ul>
            </div>
            <div class="col-12 col-md-7 text-center text-md-end fs-6 pe-md-0">
                <small>24/7 Support (123) 456 7890</small>
                <span>/</span>
                <a href="#" class="text-decoration-none text-secondary "><small class="color-blue-hover">E-mail Us</small></a>
                <span>/</span>
                <a href="<?php echo $env->APP_URL ?>login" class="text-decoration-none text-secondary "><small class="color-blue-hover">Login</small></a>
                <span>/</span>
                <a href="#" class="text-decoration-none text-secondary "><small class="color-blue-hover">Register</small></a>
            </div>
        </section>
        <header class="w-100 bg-body sticky-top px-3 px-md-4 px-lg-5 header-navbar-top" style="z-index: 5;height: 15vh;">
            <nav class="navbar navbar-expand-lg py-4 navbar-nav-scroll" id="navbar-header">
                <div class="container-fluid px-0">
                    <a class="navbar-brand" href="<?php echo $env->APP_URL ?>">
                        <img src="<?php echo $env->APP_URL . "public/assets/images/logo-depa-copan.png" ?>" alt="Bootstrap" height="45">
                    </a>
                    <label for="check" class="d-flex d-lg-none" id="btn-navbar-collapse">
                        <input type="checkbox" id="check" class="d-none" data-bs-toggle="collapse" data-bs-target="#navbar-header-layout" aria-controls="navbar-header-layout" aria-expanded="false" aria-label="Toggle navigation" />
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                    <div class="collapse navbar-collapse px-3 mt-2" id="navbar-header-layout">
                        <div class="navbar-nav mt-1 mb-lg-0">
                            <a class="nav-link" aria-current="page" href="<?php echo $env->APP_URL ?>">HOME</a>
                            <li class="nav-item position-relative">
                                <a class="nav-link d-inline-block" href="<?php echo $env->APP_URL ?>about" role="button" style="color: var(--medium-gray);" id="about-links">
                                    ACERCA DE NOSOTROS
                                </a>
                                <button type="button" class="p-0 m-0 dropdown-toggle dropdown-toggle-split bg-transparent border-0" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false" style="color: var(--medium-gray);">
                                </button>
                                <ul class="dropdown-menu mt-0 py-0 rounded-0 row" id="dropdown-menu-about">
                                    <li><a class="dropdown-item" href="<?php echo $env->APP_URL ?>login">Acceso</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $env->APP_URL ?>about/staff">Personal Departamental</a></li>
                                    <li class="dropdown-item nav-item dropend" id="dropdown-item-cooperants">
                                        <a class="nav-link d-inline-block" href="#" role="button" style="color: var(--medium-gray);" id="about-links">
                                            Cooperantes
                                        </a>
                                        <button type="button" class="p-0 m-0 dropdown-toggle dropdown-toggle-split bg-transparent border-0" style="color: var(--medium-gray);" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                        </button>
                                        <ul class="dropdown-menu mt-0 py-0 rounded-0">
                                            <li><a class="dropdown-item" href="#">Aliados</a></li>
                                            <li><a class="dropdown-item" href="#">Inscripciones cooperantes</a></li>
                                            <li><a class="dropdown-item" href="#">Intención</a></li>
                                            <li><a class="dropdown-item" href="#">PODE</a></li>
                                            <li><a class="dropdown-item" href="#">Diágnostico</a></li>
                                            <li><a class="dropdown-item" href="#">Acnur</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Escuelas Normales</a></li>
                                    <li><a class="dropdown-item" href="#">Plan 365</a></li>
                                    <li><a class="dropdown-item" href="#">Correo</a></li>
                                    <li><a class="dropdown-item" href="#">Blog</a></li>
                                    <li><a class="dropdown-item" href="#">Rendición de cuentas 2024</a></li>


                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link d-inline-block" href="#" role="button" style="color: var(--medium-gray);" id="about-links">
                                    SACE
                                </a>
                                <button type="button" class="p-0 m-0 dropdown-toggle dropdown-toggle-split bg-transparent border-0" style="color: var(--medium-gray);" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                </button>
                                <ul class=" dropdown-menu mt-0 py-0 rounded-0">
                                    <li><a class="dropdown-item" href="<?php echo $env->APP_URL ?>sace/onlineapplications">Solicitudes Online</a></li>
                                    <li><a class="dropdown-item" href="#">Calendario 2024</a></li>
                                    <li><a class="dropdown-item" href="#">Sistema SIIE</a></li>

                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link d-inline-block" href="#" role="button" style="color: var(--medium-gray);" id="about-links">
                                    ACTUALIZACIÓN DOCENTE
                                </a>
                                <button type="button" class="p-0 m-0 dropdown-toggle dropdown-toggle-split bg-transparent border-0" style="color: var(--medium-gray);" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu mt-0 py-0 rounded-0">
                                    <li><a class="dropdown-item" href="#">Consulta Docente</a></li>
                                </ul>
                            </li>
                            <a class="nav-link" href="#">PNTED</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="progress-container">
                <div class="progress-bar" id="progressBar"></div>
            </div>
        </header>


        <main class="row w-100 m-0 position-relative overflow-hidden px-0 mx-0" style="min-height: 80vh;">
            <section class="col-12 p-0 d-flex flex-column align-items-center">
                <?php
                if (isset($_GET["view"])) {
                    if ($_GET["view"] != "layout") {
                        if (isset($_GET["view"]) && $_GET["view"] == "about") {
                            include $route->Request("about/about");
                        } else {
                            include $route->Request($_GET["view"]);
                        }
                    }
                    if ($_GET["view"] == "layout") {
                        $destino = $env->Redirect("");
                        echo "<script>location.href='$destino'</script>";
                    }
                } else {
                    include $route->Request("home");
                }
                ?>


            </section>
        </main>
        <span class="fa-solid fa-arrow-up text-white text-decoration-none rounded-circle bg-primary d-flex align-items-center justify-content-center position-fixed cursor-pointer z-3 visually-hidden" style="width: 3em;height: 3em;bottom: 10vh;right: 3vh;" id="go-top"></span>

        <footer class="footer-bg w-100 text-secondary mt-4 px-md-5 bg-dark">
            <div class="row align-items-center  m-0 py-4">
                <div class="col-12 col-md-6 text-center text-md-start mb-4 mb-md-0"> Copyright © 2024 OpCode. All rights reserved. </div>
                <div class="col-12 col-md-6 text-center">
                    <ul class="social-icons-footer list-unstyled d-flex align-items-center justify-content-center justify-content-md-end m-0">
                        <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-twitter"></i></a></li>
                        <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-youtube"></i></a></li>
                        <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-instagram"></i></a></li>
                        <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
    </div>
    </footer>
    </div>
    <script src="<?php echo $env->APP_URL  . "public/js/bootstrap.bundle.min.js" ?>"></script>

    <script>
        const d = document,
            $ = (selector) => d.querySelector(selector),
            $$ = (selector) => d.querySelectorAll(selector),
            $navbarHeader = $("#navbar-header"),
            $dropDownNavbarLayout = $$("#dropdown-navbar-layout"),
            $buttonScrollTop = $("#go-top");
        window.addEventListener("resize", e => {

            if (window.innerWidth >= 992) {
                $navbarHeader.classList.remove("navbar-nav-scroll");
                $dropDownNavbarLayout.forEach(dropdown => {
                    dropdown.setAttribute("data-bs-auto-close", "true");
                });
            } else {
                $navbarHeader.classList.add("navbar-nav-scroll");
                $dropDownNavbarLayout.forEach(dropdown => {
                    dropdown.setAttribute("data-bs-auto-close", "false");
                });
            }
        });

        window.addEventListener("scroll", e => {
            let scrollY = window.scrollY;
            if (scrollY >= 1000) {
                $buttonScrollTop.classList.remove("visually-hidden");
            } else {
                $buttonScrollTop.classList.add("visually-hidden");
            }

            updateProgressBar();
        });

        function updateProgressBar() {
            var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
            var scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrollPercentage = (scrollPosition / scrollHeight) * 100;

            document.getElementById("progressBar").style.width = scrollPercentage + "%";
        }

        $buttonScrollTop.addEventListener("click", e => window.scrollTo(0, 0));
        // setInterval(() => {
        //     let scrollY = window.scrollY;
        //     if (scrollY >= 1000) {
        //         $buttonScrollTop.style.opacity = "100%";
        //     } else {
        //         $buttonScrollTop.style.opacity = "0";
        //     }
        // }, 300);

        d.addEventListener("DOMContentLoaded", e => {
            if (window.innerWidth >= 992) {
                $navbarHeader.classList.remove("navbar-nav-scroll");
                $dropDownNavbarLayout.forEach(dropdown => {
                    dropdown.setAttribute("data-bs-auto-close", "true");
                });
            } else {
                $navbarHeader.classList.add("navbar-nav-scroll");
                $dropDownNavbarLayout.forEach(dropdown => {
                    dropdown.setAttribute("data-bs-auto-close", "false");
                });
            }

        });
    </script>

</body>

</html>