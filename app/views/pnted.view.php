<div class="row px-3 px-md-4 px-lg-5 mt-4">
    <h4 class="fw-bold fs-1 col-12 text-center title-online-app">
        Programa Nacional de Transformación Educativa Digital
    </h4>
    <a href="#" class="col-12 col-md-6 col-lg-4 text-decoration-none mt-4 py-3 position-relative d-flex flex-column justify-content-center overflow-hidden" style="height: 40vh;" id="container-image-pnted">
        <img src="<?php echo $APP_URL ?>public/assets/images/aleks.png" alt="Aleks-AI" class="w-100 h-100 position-absolute start-100 image-pnted-tools top-0 " style="z-index:-2;transition: all 0.2s ease;">
        <div class="opacity-div position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-0" style="z-index: -1;transition: all 0.2s ease;"></div>
        <div>
            <i class="fas fa-robot fw-bold fs-2 text-blue me-2" style="z-index: 1;"></i>
            <h5 class="text-uppercase d-inline text-dark fw-bold">Inteligencia Artificial Aleks</h5>
        </div>
        <p class="fw-normal text-secondary mt-2 z-1">Sistema de evaluación y aprendizaje artificialmente inteligente para el área de Matemáticas.
        </p>

    </a>

</div>


<script>
    document.addEventListener("mouseover", e => {
        if (e.target.matches("#container-image-pnted")) {
            e.target.querySelector(".opacity-div").classList.remove("opacity-0");
            e.target.querySelector(".opacity-div").classList.add("opacity-75");
            e.target.querySelector("img").classList.remove("start-100");
            e.target.querySelector("img").classList.add("start-0");
            e.target.querySelector("i").classList.add("text-light");
            e.target.querySelector("h5").classList.add("text-light");
            e.target.querySelector("p").classList.add("text-light");
        }
    });
    document.addEventListener("mouseleave", e => {
        if (e.target.matches("#container-image-pnted")) {
            e.target.querySelector(".opacity-div").classList.remove("opacity-75");
            e.target.querySelector(".opacity-div").classList.add("opacity-0");
            e.target.querySelector("img").classList.remove("start-0");
            e.target.querySelector("img").classList.add("start-100");
        }
    });
</script>