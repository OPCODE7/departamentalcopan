<?php
require_once("app/config/Env.php");

$env = new Env();

$APP_URL = $env->APP_URL;

$email = "";
$errorsvalidate = "";
$message = "";
$email = "";
$to = "";
$subject = "";
$message = "";
$headers = "";
$sent = "";
$msgError = "";
$name = "";

$regExp = [
    "email" => "/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/",
    "name" => "/^[a-zA-ZÀ-ȳ\s]{1,50}$/",
    "subject" => "/^[a-zA-ZÀ-ȳ\s]{1,30}$/"

];

if (isset($_POST["sendMail"])) {
    $sent = false;
    $email = $_POST["email"];
    $name = $_POST["name"];
    $message = $_POST["message"];
    $subject = $_POST["subject"];

    if (preg_match($regExp["name"], $name) == 0) {
        $errorsvalidate = "Ingresar nombre válido.";
    } else if (preg_match($regExp["email"], $email) == 0) {
        $errorsvalidate = "Ingresar email válido.";
    } else if (preg_match($regExp["subject"], $subject) == 0) {
        $errorsvalidate = "Ingresar asunto válido.";
    } else if (empty($message)) {
        $errorsvalidate = "Ingresar mensaje válido.";
    } else {

        $to = "opcode777@gmail.com";
        $message = <<<HTML
        <img src="<?php echo $APP_URL?>/public/images/logo-depa-copan.png" alt="logo-depa-copan" width="100" height="100" class="img-fluid">
        <h2>De {$email}:</h2>
        <h4>$message</h4>
        HTML;

        $headers = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "MIME-Version: 1.0 \r\n";
        $headers .= "From: Formulario de Contacto<departamentalcopan>";

        if (mail($to, $subject, $message, $headers)) {
            $sent = true;
        }
    }
}
?>


<div class="carousel slide w-100 mb-4" data-bs-ride="carousel" id="hero-carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active c-item">
            <img src="<?php echo $APP_URL ?>public/assets/images/banner-1.jpg" class="d-block w-100 c-img" alt="Slide 1">
        </div>
        <div class="carousel-item c-item">
            <img src="<?php echo $APP_URL ?>public/assets/images/banner-2.png" class="d-block w-100 c-img" alt="Slide 2">
        </div>
        <div class="carousel-item c-item">
            <img src="<?php echo $APP_URL ?>public/assets/images/banner-3.jpg" class="d-block w-100 c-img" alt="Slide 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
        <span class="fa-solid fa-angle-left fw-bold text-light" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
        <span class="fa-solid fa-angle-right fw-bold text-light" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section class="cards-utilities w-100 px-3 px-md-4 px-lg-5">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-lg-3 mt-4 mt-md-0">
            <div class="card">
                <div class="cover item-a">
                    <h1> Sistema <br>UTI-Reingeniería</h1>
                    <div class="card-back">
                        <span>Sistema de Administración, Gerencia y Gestión de Datos Estadísticos</span>
                        <a href="<?php echo $APP_URL ?>login" class="ov-btn-slide-left text-decoration-none">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-3 mt-4 mt-md-0">
            <div class="card">
                <div class="cover item-b">
                    <h1>Unidades y <br>Subdirecciones</h1>
                    <div class="card-back">
                        <span>Operaciones de las Unidades y Subdirecciones de la Dirección Departamental de Educación.</span>
                        <a href="<?php echo $APP_URL ?>operations" class="ov-btn-slide-left text-decoration-none">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-3 mt-4 mt-md-0">
            <div class="card">
                <div class="cover item-c">
                    <h1>Herramientas<br>Docentes</h1>
                    <div class="card-back">
                        <span>Operaciones de las Unidades y Subdirecciones de la Dirección Departamental de Educación.</span>
                        <a href="<?php echo $APP_URL ?>tools/teachers" class="ov-btn-slide-left text-decoration-none">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-3 mt-4 mt-md-0">
            <div class="card">
                <div class="cover item-d">
                    <h1>Herramientas<br>Estudiantes</h1>
                    <div class="card-back">
                        <span>Herramientas Digitales para estudiantes de todos los niveles.
                        </span>
                        <a href="<?php echo $APP_URL ?>tools/students" class="ov-btn-slide-left text-decoration-none">Ver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row my-4 px-3 px-md-4 px-lg-5 w-100">
    <div class="text-center col-12">
        <h2 class="fw-bold mb-1">Nuestras metas</h2>
        <div class="title-line mx-auto"></div>
    </div>
    <div class="col-12 col-md-6 mb-3 mb-md-0">
        <img src="<?php echo $env->APP_URL ?>public/assets/images/goals-home-page.jpg" class="w-100 h-100" alt="goals">
    </div>
    <div class="col-12 col-md-6">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="fa-solid fa-chart-line me-2 text-blue fs-4"></i> Mejorar la calidad educativa y los resultados académicos
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>Aumentar el rendimiento académico de los estudiantes al implementar programas de capacitación para maestros, introducir tecnologías educativas innovadoras y mejorar los recursos pedagógicos disponibles.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fa-solid fa-school-circle-check me-2 text-blue fs-4"></i> Expandir el acceso a la educación
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p> Incrementar la cobertura educativa al abrir nuevas sedes, ofrecer modalidades de educación a distancia o becas, y establecer alianzas con organizaciones locales para llegar a comunidades con menos acceso a la educación.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fa-solid fa-book-open-reader me-2 text-blue fs-4"></i> Fomentar el desarrollo profesional y personal del equipo docente
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>Implementar programas de desarrollo profesional continuo para los maestros y personal administrativo, con el fin de mejorar sus competencias pedagógicas, fomentar el liderazgo y garantizar un entorno educativo más efectivo y motivador.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fa-solid fa-laptop-code me-2 text-blue fs-4"></i> Incorporar tecnologías innovadoras para mejorar la enseñanza y el aprendizaje
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>Desarrollar e implementar herramientas tecnológicas avanzadas, como plataformas de aprendizaje en línea, aplicaciones interactivas y aulas virtuales, para facilitar el acceso a una educación moderna y flexible, optimizando tanto la enseñanza de los docentes como el aprendizaje de los estudiantes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="section-lg bg-texture mt-4" id="section-statistics">
    <div class="container">
        <div class="row text-light">
            <div class="col-12 mb-4">
                <h2 class="fw-semibold mb-1">Resultados alcanzados</h2>
                <div class="title-line bg-light" style="width: 50px;"></div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                <div class="text-center"> <i class="fa-solid fa-chalkboard-user fs-2"></i>
                    <div class="fw-bold mt-1 numbers"><span id="target1" data-bs-counters>3178</span></div>
                    <p class="mt-1">DOCENTES</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                <div class="text-center"><i class="fa-solid fa-graduation-cap fs-2"></i>
                    <div class="fw-bold mt-1 numbers"><span id="target2" data-bs-counters>74869</span></div>
                    <p class="mt-1">ESTUDIANTES</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 mb-4 text-light">
                <div class="text-center"> <i class="fa-solid fa-school fs-2"></i>
                    <div class="fw-bold mt-1 numbers"><span id="target3" data-bs-counters>1278</span></div>
                    <p class="mt-1">ESCUELAS</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                <div class="text-center"> <i class="fa-solid fa-people-roof fs-2"></i>
                    <div class="fw-bold mt-1 numbers"><span id="target4" data-bs-counters>65</span>K</div>
                    <p class="mt-1">FAMILIAS</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact row w-100 justify-content-center align-items-center" style="height: 90vh;background-color: var(--very-dark);" id="contact-form">
    <form class="col-12 col-md-8 col-lg-6 my-3 text-light" method="POST" id="change-pwd-form">
        <h4 class="fw-semibold mb-3 col-12">Contacto</h4>
        <div class="title-line"></div>
        <div class="row w-100">
            <div class="col-6">
                <label for="name" class="form-label fw-medium">Nombre</label>
                <div>
                    <input type="text" class="form-control bg-transparent border border-primary fw-normal text-light" id="name" name="name" value="">
                </div>
                <div id="alert-error" class="mt-3"></div>
            </div>
            <div class="col-6">
                <label for="email" class="form-label fw-medium">Correo</label>
                <div>
                    <input type="text" class="form-control bg-transparent border border-primary fw-normal text-light" id="email" name="email" value="">
                </div>
                <div id="alert-error" class="mt-3"></div>
            </div>
            <div class="col-12">
                <label for="subject" class="form-label fw-medium">Asunto</label>
                <div>
                    <input type="text" class="form-control bg-transparent border border-primary fw-normal text-light" id="subject" name="subject" value="">
                </div>
                <div id="alert-error" class="mt-3"></div>
            </div>
            <div class="mb-3 col-12">
                <label for="message" class="form-label fw-medium">Mensaje</label>
                <div>
                    <textarea name="message" id="message" class="form-control bg-transparent border border-primary fw-normal text-light"></textarea>
                </div>
                <div id="alert-error" class="mt-3"></div>
            </div>
            <?php
            if ($errorsvalidate != "") {

            ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show mb-0 py-2" role="alert">
                            <strong class="fs-8"><?php echo $errorsvalidate ?></strong>
                            <button type="button" class="btn-close top-50 translate-middle" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            <div class="col-12">
                <button class="btn btn-primary text-uppercase bg-blue fw-semibold position-relative w-100">
                    <input name="sendMail" value="" class="bg-transparent w-100 h-100 position-absolute start-0 border-0 top-0 outline-none btn">
                    <i class="fa-solid fa-paper-plane me-2"></i>
                    </i>Enviar</input>
                </button>
            </div>
        </div>

    </form>
</section>

<div class="row mt-3 px-3 px-md-4 px-lg-5">
    <div class="text-center">
        <h2 class="fw-bold mb-1">Equipo de Liderazgo</h2>
        <div class="title-line mx-auto"></div>
        <p>- Nuestro equipo de liderazgo está compuesto por expertos en el sector educativo y administrativo, comprometidos en impulsar el desarrollo y la eficiencia en los procesos educativos de Copán. -</p>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center scale-img-hover">
        <div class="w-100 overflow-hidden">
            <a href="#">
                <img class="img-fluid w-100" alt="test" src="https://uxliner.com/pageline/demo/images/site-img18.jpg">
            </a>
        </div>
        <div class="mt-2">
            <h4 class="mb-1 fs-5 fw-normal text-secondary">John Doe / <i class="text-blue fs-6">C0-Founder</i></h4>
            <p class="mt-1 text-secondary">Lorem ipsum dolor sit ametis potenti not yet ready nulla esquam ante.</p>
            <ul class="social-icons-team list-unstyled d-flex justify-content-center">
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-twitter"></i></a></li>
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-youtube"></i></a></li>
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center scale-img-hover">
        <div class="w-100 overflow-hidden"><a href="#"><img class="img-fluid w-100" alt="test" src="https://uxliner.com/pageline/demo/images/site-img18.jpg"></a></div>
        <div class="mt-2">
            <h4 class="mb-1 fs-5 fw-normal text-secondary">John Doe / <i class="text-blue fs-6">C0-Founder</i></h4>
            <p class="mt-1 text-secondary">Lorem ipsum dolor sit ametis potenti not yet ready nulla esquam ante.</p>
            <ul class="social-icons-team list-unstyled d-flex justify-content-center">
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-twitter"></i></a></li>
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-youtube"></i></a></li>
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center scale-img-hover">
        <div class="w-100 overflow-hidden"><a href="#"><img class="img-fluid w-100" alt="test" src="https://uxliner.com/pageline/demo/images/site-img18.jpg"></a></div>
        <div class="mt-2">
            <h4 class="mb-1 fs-5 fw-normal text-secondary">John Doe / <i class="text-blue fs-6">C0-Founder</i></h4>
            <p class="mt-1 text-secondary">Lorem ipsum dolor sit ametis potenti not yet ready nulla esquam ante.</p>
            <ul class="social-icons-team list-unstyled d-flex justify-content-center">
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-twitter"></i></a></li>
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-youtube"></i></a></li>
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center scale-img-hover">
        <div class="w-100 overflow-hidden"><a href="#"><img class="img-fluid w-100" alt="test" src="https://uxliner.com/pageline/demo/images/site-img18.jpg"></a></div>
        <div class="mt-2">
            <h4 class="mb-1 fs-5 fw-normal text-secondary">John Doe / <i class="text-blue fs-6">C0-Founder</i></h4>
            <p class="mt-1 text-secondary">Lorem ipsum dolor sit ametis potenti not yet ready nulla esquam ante.</p>
            <ul class="social-icons-team list-unstyled d-flex justify-content-center">
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-twitter"></i></a></li>
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-youtube"></i></a></li>
                <li class="me-4"><a href="#" class="text-decoration-none d-flex justify-content-center align-items-center fw-bold"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>



</div>

<script>
    const
        $target1 = document.getElementById("target1"),
        $target2 = document.getElementById("target2"),
        $target3 = document.getElementById("target3"),
        $target4 = document.getElementById("target4"),
        $section = document.querySelector("#section-statistics");

    const callBack = entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                let count1 = 0,
                    count2 = 0,
                    count3 = 0,
                    count4 = 0;



                let countersInterval = setInterval(() => {
                    if (count1 < 3178) count1 += 454;
                    if (count2 < 74869) count2 += 37434.5;
                    if (count3 < 1278) count3 += 71;
                    if (count4 < 65) count4++;

                    $target1.textContent = count1;
                    $target2.textContent = count2;
                    $target3.textContent = count3;
                    $target4.textContent = count4;

                    if (count1 == 3178 && count2 == 74869 && count3 == 1278 && count4 == 65) clearInterval(countersInterval);
                }, 10);
            } else {
                count1 = 0;
                count2 = 0;
                count3 = 0;
                count4 = 0;
            }

        });
    };

    const observer = new IntersectionObserver(callBack, {
        threshold: [0.5, 0.75]
    });

    observer.observe($section);
</script>