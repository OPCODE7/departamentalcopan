<div class="row m-0 p-0 justify-content-end position-relative">
    <aside class="col-8 col-md-3 p-0 z-3 overflow-y-scroll aside-uti">
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
                <li class="mb-2 aside-links-uti rounded dropdown-item"><a href="<?php echo $APP_URL ?>about/municipales" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-users me-2"></i>Municipales</a></li>
            </ul>

            <ul class="list-unstyled p-0">

                <li class="mb-2 aside-links-uti rounded" id="btn-manual-sace-section"><span href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-file-lines me-2"></i>Manuales y videos de SACE</span></li>
                <li class="mb-2 aside-links-uti rounded"><span href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-brands fa-youtube me-2"></i>Videos de Classroom</span></li>
                <li class="mb-2 aside-links-uti rounded"><span href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-fingerprint me-2"></i>Identidad</span></li>
                <li class="mb-2 aside-links-uti rounded" id="btn-seminario-pnted"><span href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-person-chalkboard me-2"></i>Seminario PNTED</span></li>
                <li class="mb-2 aside-links-uti rounded"><a href="<?php echo $APP_URL ?>login" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded" target="_blank"><i class="fa-solid fa-building me-2"></i>COPECO</a></li>
                <li class="mb-2 aside-links-uti rounded"><span href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-file-circle-check me-2"></i>Pre-Diágnostico</span></li>
                <li class="mb-2 aside-links-uti rounded"><span href="" class="text-decoration-none p-2 w-100 h-100 d-inline-block rounded"><i class="fa-solid fa-file-circle-check me-2"></i>Post-Diágnostico</span></li>
            </ul>
        </div>
    </aside>
    <main class="col-12 col-md-9 px-0 position-relative">
        <div class="position-absolute top-0 w-100 h-100 bg-dark opacity-75 d-none z-1" id="opacity-div"></div>
        <header class="border-bottom border-secondary-subtle w-100 d-flex justify-content-end align-items-center px-2 m-0" style="height: 10vh;">
            <a href="https://forms.gle/WFHbwX8VUZk6W9pf8" class="btn btn-outline-blue text-decoration-none fs-7 fw-semibold" target="_blank"><i class="fa-solid fa-file-lines me-2"></i>Hacer un tramite en SACE</a>
            <i class="fa-solid fa-bars cursor-pointer d-inline-block d-md-none ms-2 fs-1 text-secondary" id="btn-menu-aside"></i>
        </header>
        <div class="row m-0 py-0 px-2 px-md-0 d-flex justify-content-center w-100" id="content-uti" style="min-height: 90vh;">
            <div class="alert text-light alert-dismissible fade show col-12 col-md-10 mt-5 h-25 animated zoomIn glass" role="alert" id="alert-uti">
                <strong class="fs-5"><i class="fa-solid fa-circle-info"></i> ¡Aviso importante para docentes!</strong>
                <p>Hemos implementado estos servicios en línea para todos los docentes del departamento de Copán que necesiten realizar algún trámite en SACE, pero no tienen acceso activo o no pueden desplazarse hasta la oficina departamental de Copán. Les recomendamos subir los documentos de la mejor calidad posible, ya que imprimimos esta información como constancia del trámite realizado, según lo establece el reglamento de USINIEH.</p>
            </div>


        </div>
    </main>
</div>

<script src="<?php echo $APP_URL ?>public/js/views_js/uti.js" type="module"></script>