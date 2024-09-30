<div class="carousel slide w-100 mb-4" data-bs-ride="carousel" id="hero-carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active c-item">
            <img src="https://departamentaleducacionocotepeque.com/images/2023/01/24/1.jpg" class="d-block w-100 c-img" alt="Slide 1">
        </div>
        <div class="carousel-item c-item">
            <img src="https://departamentaleducacionocotepeque.com/images/2023/01/24/depa2023.jpg" class="d-block w-100 c-img" alt="Slide 2">
        </div>
        <div class="carousel-item c-item">
            <img src="https://departamentaleducacionocotepeque.com/images/2023/01/25/oli.jpg" class="d-block w-100 c-img" alt="Slide 3">
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
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="card">
                <div class="cover item-a">
                    <h1> Sistema <br>UTI-Reingeniería</h1>
                    <div class="card-back">
                        <a href="#">Sistema de Administración, Gerencia y Gestión de Datos Estadísticos</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="card">
                <div class="cover item-b">
                    <h1>Unidades y <br>Subdirecciones</h1>
                    <div class="card-back">
                        <a href="#">Operaciones de las Unidades y Subdirecciones de la Dirección Departamental de Educación.</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="card">
                <div class="cover item-c">
                    <h1>Herramientas<br>Docentes</h1>
                    <div class="card-back">
                        <a href="#">Operaciones de las Unidades y Subdirecciones de la Dirección Departamental de Educación.</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="card">
                <div class="cover item-d">
                    <h1>Herramientas<br>Estudiantes</h1>
                    <div class="card-back">
                        <a href="#">Herramientas Digitales para estudiantes de todos los niveles.
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section-lg bg-texture mt-4">
    <div class="container">
        <div class="row text-light">
            <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                <div class="text-center"> <i class="fa-solid fa-chalkboard-user fs-2"></i>
                    <div class="fw-bold mt-1 numbers"><span id="target1">490</span>K</div>
                    <p class="mt-1">DOCENTES</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                <div class="text-center"><i class="fa-solid fa-graduation-cap fs-2"></i>
                    <div class="fw-bold mt-1 numbers"><span id="target2">3249</span></div>
                    <p class="mt-1">ESTUDIANTES</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 mb-4 text-light">
                <div class="text-center"> <i class="fa-solid fa-school fs-2"></i>
                    <div class="fw-bold mt-1 numbers"><span id="target3">5340</span></div>
                    <p class="mt-1">ESCUELAS</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                <div class="text-center"> <i class="fa-solid fa-people-roof fs-2"></i>
                    <div class="fw-bold mt-1 numbers"><span id="target4">8512</span></div>
                    <p class="mt-1">FAMILIAS</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const
        $target1 = document.getElementById("target1"),
        $target2 = document.getElementById("target2"),
        $target3 = document.getElementById("target3"),
        $target4 = document.getElementById("target4");

    let count1 = 0,
        count2 = 0,
        count3 = 0,
        count4 = 0;


    let countersInterval = setInterval(() => {
        if (count1 < 50) count1++;
        if (count2 < 39) count2++;
        if (count3 < 10) count3++;
        if (count4 < 12) count4++;

        $target1.textContent = count1;
        $target2.textContent = count2;
        $target3.textContent = count3;
        $target4.textContent = count4;

        if (count1 == 50 && count2 == 39 && count3 == 10 && count4 == 12) clearInterval(countersInterval);
    }, 100);
</script>