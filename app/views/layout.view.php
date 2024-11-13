<?php
require_once("app/config/Routes.php");
require_once("app/config/Env.php");
require_once("app/controllers/UserController.php");

$route = new Routes();
$env = new Env();
$userController = new UserController();

$APP_URL = $env->APP_URL;

$userData = "";

if (isset($_SESSION["userlogged"])) {
    $userData =  $_SESSION["userlogged"];
    $role = $userData["role"];
    $user = $userController->getUser($userData["id"]);
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
    <link rel="shortcut icon" href="<?php echo $env->APP_URL . "public/assets/icons/logo-depa-copan.ico" ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo $env->APP_URL ?>public/plugins/animatecss/animate.compat.css" />
    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
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
            <div class="col-12 col-md-7 d-flex justify-content-center justify-content-md-end align-items-center fs-6 pe-md-0">
                <small>24/7 Support (123) 456 7890</small>
                <span>/</span>
                <a href="<?php $APP_URL ?>#contact-form" class="text-decoration-none text-secondary "><small class="color-blue-hover">E-mail Us</small></a>
                <?php
                if (empty($userData)) {
                ?>
                    <span>/</span>
                    <a href="<?php echo $env->APP_URL ?>login" class="text-decoration-none text-secondary "><small class="color-blue-hover">Login</small></a>
                    <span>/</span>
                    <a href="<?php echo $APP_URL ?>auth/signup" class="text-decoration-none text-secondary "><small class="color-blue-hover">Register</small></a>
                <?php
                }
                ?>
            </div>
        </section>
        <header class="w-100 bg-body sticky-top px-3 px-md-4 px-lg-5 header-navbar-top" style="z-index: 5;height: 15vh;">
            <nav class="navbar navbar-expand-lg navbar-nav-scroll overflow-visible" id="navbar-header">
                <div class="container-fluid px-0">
                    <a class="navbar-brand p-0" href="<?php echo $env->APP_URL ?>">
                        <img src="<?php echo $env->APP_URL . "public/assets/images/logo-depa.jpg" ?>" alt="Bootstrap" style="width: auto;height: 70px;">
                    </a>
                    <div class="d-flex order-lg-5">
                        <?php
                        if (!empty($userData)) {
                            $userName = explode(' ', $user["FIRSTNAME"])[0] . " " . explode(' ', $user["LASTNAME"])[0];
                        ?>
                            <div class="position-relative">
                                <small class="text-center d-flex align-items-center justify-content-center text-decoration-none m-0 rounded-circle border border-3 bg-transparent dropstart fw-bold cursor-pointer avatar-user" style="width: 45px;height: 45px;">
                                    <span class="text-uppercase text-blue"><?php echo $user["FIRSTNAME"][0] . $user["LASTNAME"][0]  ?></span>
                                </small>
                                <div class="card position-absolute end-50 top-100 user-info h-auto shadow-lg bg-body rounded d-none user-info z-3">
                                    <div class="card-header">
                                        <h5 class="text-dark m-0">Área Personal</h5>
                                    </div>
                                    <div class="card-body d-flex align-items-center">

                                        <div class="mx-3">
                                            <h5 class="text-dark text-capitalize mb-3"><b><?php echo $userName ?></b></h5>
                                            <a href="<?php echo $APP_URL ?>user/admin" class="btn-blue text-white py-2 rounded p-3 text-decoration-none" style="font-size:12px;"><i class="fas fa-gears me-2"></i>Administrar perfil</a>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <a href="<?php echo $APP_URL ?>auth/logout" class="text-decoration-none text-dark">
                                            <i class="fa-sharp fa-solid fa-right-from-bracket"></i>
                                            <span>Logout</span>
                                        </a>
                                    </div>
                                </div>
                            </div>


                        <?php
                        }
                        ?>
                        <label for="check" class="d-flex d-lg-none ms-2" id="btn-navbar-collapse">
                            <input type="checkbox" id="check" class="d-none" data-bs-toggle="collapse" data-bs-target="#navbar-header-layout" aria-controls="navbar-header-layout" aria-expanded="false" aria-label="Toggle navigation" />
                            <span></span>
                            <span></span>
                            <span></span>
                        </label>
                    </div>

                    <div class="collapse navbar-collapse px-3 mt-md-0 mt-2 order-lg-4" id="navbar-header-layout">
                        <div class="navbar-nav mt-1 mb-lg-0 mx-auto">
                            <a class="nav-link nav-link-header-layout" aria-current="page" href="<?php echo $env->APP_URL ?>">HOME</a>
                            <li class="nav-item position-relative">
                                <a class="nav-link d-inline-block nav-link-header-layout" href="<?php echo $env->APP_URL ?>about" role="button" id="about-links">
                                    ACERCA DE NOSOTROS
                                </a>
                                <button type="button" class="p-0 m-0 dropdown-toggle dropdown-toggle-split bg-transparent border-0 nav-link-header-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu z-3 mt-0 py-0 rounded-0" id="dropdown-menu-about">
                                    <li><a class="dropdown-item" href="<?php echo $env->APP_URL ?>login">Acceso</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $env->APP_URL ?>about/staff">Personal Departamental</a></li>
                                    <li class="dropdown-item nav-item dropend" id="dropdown-item-cooperants">
                                        <a class="nav-link d-inline-block nav-link-header-layout p-0" href="#" role="button">
                                            Cooperantes
                                        </a>
                                        <button type="button" class="p-0 m-0 dropdown-toggle dropdown-toggle-split bg-transparent border-0 nav-link-header-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                        </button>
                                        <ul class="dropdown-menu z-3 mt-0 py-0 rounded-0">
                                            <li><a class="dropdown-item" href="#">Aliados</a></li>
                                            <li><a class="dropdown-item" href="#">Inscripciones cooperantes</a></li>
                                            <li><a class="dropdown-item" href="#">Intención</a></li>
                                            <li><a class="dropdown-item" href="#">PODE</a></li>
                                            <li><a class="dropdown-item" href="#">Diágnostico</a></li>
                                            <li><a class="dropdown-item" href="#">Acnur</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Escuelas Normales</a></li>
                                    <li><a class="dropdown-item" href="https://educatrachos.hn/galeria-de-noticias/plan-365/" target="_blank">Plan 365</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $APP_URL ?>about/rendiciondecuentas">Rendición de cuentas 2024</a></li>


                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link d-inline-block nav-link-header-layout" href="https://sace.se.gob.hn/" target="_blank" role="button" id="about-links">
                                    SACE
                                </a>
                                <button type="button" class="p-0 m-0 dropdown-toggle dropdown-toggle-split bg-transparent border-0 nav-link-header-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                </button>
                                <ul class=" dropdown-menu z-3 mt-0 py-0 rounded-0">
                                    <li><a class="dropdown-item" href="<?php echo $env->APP_URL ?>sace/onlineapplications">Solicitudes Online</a></li>
                                    <li><a class="dropdown-item" href="#">Calendario 2024</a></li>
                                    <li><a class="dropdown-item" href="https://siie.se.gob.hn/dashboard" target="_blank">Sistema SIIE</a></li>
                                    <li><a class="dropdown-item" href="<?php echo $APP_URL ?>sace/sartsace">SART-SACE</a></li>
                                    <li class="dropdown-item nav-item dropend" id="">
                                        <a class="nav-link d-inline-block p-0 nav-link-header-layout me-2" href="#" role="button" id="about-links">
                                            Salud Campaña
                                        </a>
                                        <button type="button" class="p-0 m-0 dropdown-toggle dropdown-toggle-split bg-transparent border-0 nav-link-header-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                        </button>
                                        <ul class="dropdown-menu z-3 mt-0 py-0 rounded-0">
                                            <li><a class="dropdown-item" href="#">Estadística Rabia</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-item nav-item dropend" id="">
                                        <a class="nav-link d-inline-block p-0 nav-link-header-layout me-2" href="#" role="button" id="about-links">
                                            Monitoreos
                                        </a>
                                        <button type="button" class="p-0 m-0 dropdown-toggle dropdown-toggle-split bg-transparent border-0 nav-link-header-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                        </button>
                                        <ul class="dropdown-menu z-3 mt-0 py-0 rounded-0">
                                            <li><a class="dropdown-item" href="#">Estadísticos lunes cívico</a></li>
                                            <li><a class="dropdown-item" href="#">Llenar monitoreo lunes</a></li>
                                            <li><a class="dropdown-item" href="#">Monitoreo 200 días clase nacional</a></li>
                                            <li><a class="dropdown-item" href="<?php echo $APP_URL ?>sace/monitoreos/yosipuedo">Yo si puedo</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link d-inline-block nav-link-header-layout" href="#" role="button" id="about-links">
                                    CONCURSO DOCENTE
                                </a>
                                <button type="button" class="p-0 m-0 dropdown-toggle dropdown-toggle-split bg-transparent border-0 nav-link-header-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu z-3 mt-0 py-0 rounded-0">
                                    <li><a class="dropdown-item" href="https://www.se.gob.hn/constancia_concurso/" target="_blank">Constancia concurso</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link d-inline-block nav-link-header-layout" href="#" role="button" id="about-links">
                                    ACTUALIZACIÓN DOCENTE
                                </a>
                                <button type="button" class="p-0 m-0 dropdown-toggle dropdown-toggle-split bg-transparent border-0 nav-link-header-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu z-3 mt-0 py-0 rounded-0">
                                    <li><a class="dropdown-item" href="#">Consulta Docente</a></li>
                                </ul>
                            </li>
                            <a class="nav-link nav-link-header-layout" href="<?php echo $APP_URL ?>pnted">PNTED</a>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="progress-container z-2">
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
                    if ($_GET["view"] == "layout" || ($_GET["view"] == "login" && count($userData) > 0)) {
                        $destino = $env->Redirect("");
                        echo "<script>location.href='$destino'</script>";
                    }
                } else {
                    include $route->Request("home");
                }
                ?>


            </section>
        </main>
        <span class="fa-solid fa-arrow-up text-white text-decoration-none rounded-circle bg-blue d-flex align-items-center justify-content-center position-fixed cursor-pointer z-3 visually-hidden shadow-lg" style="width: 3em;height: 3em;bottom: 10vh;right: 3vh;" id="go-top"></span>

        <footer class="footer-bg w-100 text-secondary">
            <div class="row bg-very-dark px-md-5 w-100 mx-0 py-5">
                <div class="col-12 col-md-4 mt-5 mt-md-0">
                    <h4 class="text-light fw-light uppercase">Enlaces Útiles</h4>
                    <div class="title-line color"></div>
                    <ul class="list-unstyled lh-lg">
                        <li><a href="<?php echo $APP_URL ?>sace/onlineapplications" class="text-decoration-none text-secondary fs-6"><i class="fa fa-angle-right fs-6"></i> Solicitudes Online</a></li>
                        <li><a href="https://sace.se.gob.hn/" target="_blank" class="text-decoration-none text-secondary fs-6"><i class="fa fa-angle-right fs-6"></i> SACE</a></li>
                        <li><a href="<?php echo $APP_URL ?>sace/sartsace" class="text-decoration-none text-secondary fs-6"><i class="fa fa-angle-right fs-6"></i> SART-SACE</a></li>
                        <li><a href="<?php echo $APP_URL ?>uti" class="text-decoration-none text-secondary fs-6"><i class="fa fa-angle-right fs-6"></i> UTI</a></li>
                        <li><a href="<?php echo $APP_URL ?>login" class="text-decoration-none text-secondary fs-6"><i class="fa fa-angle-right fs-6"></i> Acceso</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 mt-5 mt-md-0">
                    <h4 class="text-light fw-light uppercase">Acerca de nosotros</h4>
                    <div class="title-line color"></div>
                    <p class="m-bottom3">Somos una institución encargada de gestionar y coordinar todos los procesos educativos del departamento de Copán, ofreciendo un servicio integral al magisterio.
                        <br>
                        Nos dedicamos a garantizar que los docentes cuenten con las herramientas, el apoyo y los recursos necesarios para llevar a cabo su labor educativa de manera eficiente y con los más altos estándares de calidad.
                    </p>
                </div>
                <div class="col-12 col-md-4 mt-5 mt-md-0">
                    <h4 class="text-light fw-light uppercase">Contacto</h4>
                    <div class="title-line color"></div>
                    <ul class="list-unstyled lh-lg">
                        <li><i class="fa fa-map-marker"></i> Q6C7+WCJ, 41101 Santa Rosa de Copan, Copán</li>
                        <li><i class="fa fa-phone"></i> +1 (012) 345 6789</li>
                        <li><i class="fa fa-envelope"></i> info@yourdomain.com</li>
                    </ul>
                </div>
            </div>
            <div class="row align-items-center m-0 py-4 bg-dark px-md-5 w-100">
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
        </footer>
    </div>
    <script src="<?php echo $env->APP_URL  . "public/js/bootstrap.bundle.min.js" ?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src=" https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>



    <script type="module">
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

        d.addEventListener("click", e => {
            if (!e.target.matches(".dropdown-menu") && !e.target.matches(".dropdown-menu > *") && !e.target.matches(".dropdown-toggle")) {
                d.querySelectorAll(".dropdown-menu").forEach(dropdown => {

                    if (dropdown.classList.contains("show")) dropdown.classList.remove("show");
                });
            }

            if (e.target.matches(".avatar-user") || e.target.matches(".avatar-user > *")) d.querySelector(".user-info").classList.toggle("d-none");
        });
    </script>

    <script>
        new DataTable('#users', {
            responsive: true,
            autoWidth: false,

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron registros que coincidan con lo que buscas",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": 'Buscar:',
                'paginate': {
                    'next': 'Siguiente',
                    'previous': 'Anterior'
                }

            }
        });
    </script>





</body>

</html>