<div class="row m-0 p-0 container-fluid justify-content-end">
    <aside class="col-4 col-md-3 p-0 aside position-fixed start-0 overflow-y-scroll" style="height: 75vh;">
        <header class="w-100">
            <div class="border-bottom border-secondary-subtle w-100 d-flex ps-3 align-items-center" style="height: 10vh;">
                <span class="text-decoration-none d-flex align-items-center" id="uti-home">
                    <img src="<?php echo $APP_URL . "public/assets/images/secretaria-educacion-logo.webp" ?>" alt="logo-depa-copan" style="width: 60px;height: 40px;" class="">
                    <h2 class="text-blue fs-5 ms-3 d-inline-block p-0 mb-0 fw-normal">UTI | COPAN</h2>
                </span>
            </div>

        </header>
        <div class="h-auto w-100 px-2">
            <button class="aside-links-uti rounded w-100 text-start border-0 ps-2 py-2" id="dropdown-btn">
                <i class="fa-solid fa-laptop-file me-2"></i>Canales digitales
                <i class="fa-solid fa-angle-down fa-chevron-right ms-2"></i>
            </button>
            <ul class="position-relative start-0 bottom-0 border-0 list-unstyled d-none" id="dropdown-list">
                <li class="mb-2 aside-links-uti rounded dropdow-item"><a href="<?php echo $APP_URL ?>login" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded" target="_blank"><i class="fa-solid fa-chart-simple me-2"></i>Sistema de estadística educativa</a></li>
                <li class="mb-2 aside-links-uti rounded dropdow-item"><a href="<?php echo $APP_URL ?>sace/onlineapplications" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded" target="_blank"><i class="fa-solid fa-toolbox me-2"></i>Herramientas Docentes</a></li>
                <li class="mb-2 aside-links-uti rounded dropdow-item"><a href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-calendar me-2"></i></i>Actualización Docente</a></li>
                <li class="mb-2 aside-links-uti rounded dropdow-item"><a href="<?php echo $APP_URL ?>operations" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded" target="_blank"><i class="fa-solid fa-users-gear me-2"></i>Unidades y Subdirecciones</a></li>
                <li class="mb-2 aside-links-uti rounded dropdown-item"><a href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-users me-2"></i>Municipales</a></li>
            </ul>

            <ul class="list-unstyled p-0">

                <li class="mb-2 aside-links-uti rounded" id="btn-manual-sace-section"><span href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-file-lines me-2"></i>Manuales y videos de SACE</span></li>
                <li class="mb-2 aside-links-uti rounded"><span href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-brands fa-youtube me-2"></i>Videos de Classroom</span></li>
                <li class="mb-2 aside-links-uti rounded"><span href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-fingerprint me-2"></i>Identidad</span></li>
                <li class="mb-2 aside-links-uti rounded"><span href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-person-chalkboard me-2"></i>Seminario PNTED</span></li>
                <li class="mb-2 aside-links-uti rounded"><a href="<?php echo $APP_URL ?>login" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded" target="_blank"><i class="fa-solid fa-building me-2"></i>COPECO</a></li>
                <li class="mb-2 aside-links-uti rounded"><span href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-file-circle-check me-2"></i>Pre-Diágnostico</span></li>
                <li class="mb-2 aside-links-uti rounded"><span href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-file-circle-check me-2"></i>Post-Diágnostico</span></li>
                <li class="mb-2 aside-links-uti rounded"><span href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-list me-2"></i>Lecciones</span></li>
            </ul>
        </div>
    </aside>
    <main class="col-12 col-md-9 px-0">
        <header class="border-bottom border-secondary-subtle w-100 d-flex justify-content-between justify-content-md-end align-items-center px-2 m-0" style="height: 10vh;">
            <i class="fa-solid fa-bars cursor-pointer d-inline-block d-md-none"></i>
            <a href="<?php echo $APP_URL ?>" class="btn btn-outline-blue text-decoration-none fs-7 fw-semibold"><i class="fa-solid fa-file-lines me-2"></i>Hacer un tramite en SACE</a>
        </header>
        <div class="row m-0 p-0 d-flex justify-content-center" style="min-height: 90vh;">
            <div class="alert text-light alert-dismissible fade show col-12 col-md-10 mt-5 h-25 animated zoomIn glass" role="alert" id="alert-uti">
                <strong class="fs-5"><i class="fa-solid fa-circle-info"></i> ¡Aviso importante para docentes!</strong>
                <p>Hemos implementado estos servicios en línea para todos los docentes del departamento de Ocotepeque que necesiten realizar algún trámite en SACE, pero no tienen acceso activo o no pueden desplazarse hasta la oficina departamental de Ocotepeque. Les recomendamos subir los documentos de la mejor calidad posible, ya que imprimimos esta información como constancia del trámite realizado, según lo establece el reglamento de USINIEH.</p>

            </div>

            <section class="row px-3 px-md-4 px-lg-5 mt-3 d-none section-uti" id="manual-sace-section">
                <div class="col-12 col-md-4">
                    <a href="#" class="card text-center border-0 shadow text-decoration-none p-3 animated zoomIn" style="height: 200px;">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title">Documentos</h5>
                            <i class="fa-regular fa-file-lines fs-1 text-blue"></i>
                        </div>
                    </a>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="fw-bold mb-3 text-blue">Registrar Secciones en SACE</h3>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/LOE4frau6a0?si=Z8gBcMaCEOza3qem" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="fw-bold mb-3 text-blue">Asignar Horario en SACE</h3>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/HKMaDxaR-VE?si=iMEwTJysdQPWYud8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="fw-bold mb-3 text-blue">Asignar Clases a Horarios</h3>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/wGQuu57yhJU?si=uNoar2Rc27g5ZhZh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="fw-bold mb-3 text-blue">Asignar Puestos de Trabajo</h3>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/xkoiAeQnI_4?si=rbdhR5XXWBR9CtQa" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="fw-bold mb-3 text-blue">Matrícula de Estudiantes en SACE</h3>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/XUHC2uuG7Kc?si=RrLppTlSWHS9BOzJ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="fw-bold mb-3 text-blue">Cargar Personalidad del Estudiante en SACE</h3>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/VvapvzSUfB4?si=Z4KIrmzW3j01qzUB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="fw-bold mb-3 text-blue">Subir notas de estudiantes a SACE</h3>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/OBtuNSGiDZE?si=q_A_SYcUvOKHFM0m" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="fw-bold mb-3 text-blue">Ejemplo de llenado de ODK</h3>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/MTsjLHUY0sM?si=Fka4OLtgZSmRajRg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="fw-bold mb-3 text-blue">Instalar ODK en ANDROID</h3>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/oUPCtbQya0Q?si=tzgfue1vJgDJ2Qhp" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="col-12 mt-3">
                    <span class="fs-3 fw-bold">Créditos:</span>
                    <p>Los videos utilizados en esta sección son cortesía de <a href="https://www.youtube.com/@brayanavilez421/" target=" _blank">[Brayan Avilez]</a>. <br> Puedes ver más en su canal: <a href="https://www.youtube.com/@brayanavilez421/" target="_blank">[Enlace al Canal]</a>.</p>
                </div>
            </section>
        </div>
    </main>
</div>

<script>
    const $btnDropdown = document.getElementById("dropdown-btn"),
        $aside = document.querySelector(".aside"),
        $alertUti = document.querySelector("#alert-uti"),
        $manualSaceSection = document.querySelector("#manual-sace-section");
    $aside.addEventListener("click", e => {
        if (e.target.matches("#uti-home") || e.target.matches("#uti-home > *")) {
            $alertUti.classList.remove("d-none");
        } else {
            $alertUti.classList.add("d-none");
        }
        if (e.target === $btnDropdown || e.target.matches("#dropdown-btn > *")) {
            $btnDropdown.nextElementSibling.classList.toggle("d-none");
            $btnDropdown.lastElementChild.classList.toggle("fa-chevron-right");
        }

        if (e.target.matches("#btn-manual-sace-section > *")) {
            $manualSaceSection.classList.remove("d-none");
        }

    });
</script>