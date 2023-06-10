@extends(getTemplate() . '.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/owl-carousel2/owl.carousel.min.css">
@endpush

@section('content')
    <a href="https://wa.me/573154032899/?text=Me%20interesa%20conocer%20mas%20acerca%20de%20sus%20servicios"
        style="position:fixed;
width:80px;
height:80px;
bottom:40px;
right:40px;
color:#FFF;
border-radius:50px;
text-align:center;
font-size:40px;
z-index:100;
background-color:#00da91"
        target="_blank"><img src="/store/1/default_images/social/whatsapp.svg" alt="Whatsapp" class="mt-15"
            style="
        width:50px;
        height:50px;"></a>

    {{-- Start Banner's section --}}
    <section class="home-sections container mt-0 mb-50">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"
                    style="background-color: #43d477"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1" style="background-color: #43d477"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <section class="slider-container slider-hero-section2 pt-0"
                        style="background-image: url('{{ $heroSectionData['hero_background'] }}')">

                        @if ($heroSection == '1')
                            <div class="mask"></div>
                        @endif

                        <div class="container user-select-none">
                            <div
                                class="row slider-content align-items-center hero-section2 flex-column-reverse flex-md-row">
                                <div class="col-12 col-md-7 col-lg-6">
                                    <h1 class="text-secondary font-weight-bold">{{ trans('home.new_title_home') }}</h1>
                                    <p class="slide-hint text-gray mt-20">{{ trans('home.new_text_home') }}</p>

                                    <button type="submit"
                                        class="btn btn-primary rounded-pill mt-20">{{ trans('home.find') }}</button>
                                </div>
                                <div class="col-12 col-md-5 col-lg-6">
                                    @if (!empty($heroSectionData['has_lottie']) and $heroSectionData['has_lottie'] == '1')
                                        <lottie-player src="{{ $heroSectionData['hero_vector'] }}" background="transparent"
                                            speed="1" class="w-100" loop autoplay></lottie-player>
                                    @else
                                        <img src="{{ $heroSectionData['hero_vector'] }}"
                                            alt="{{ $heroSectionData['title'] }}" class="img-cover">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="carousel-item">
                    <section class="slider-container slider-hero-section2 pt-0"
                        style="background-image: url('{{ $heroSectionData['hero_background'] }}')">

                        @if ($heroSection == '1')
                            <div class="mask"></div>
                        @endif

                        <div class="container user-select-none">
                            <div
                                class="row slider-content align-items-center hero-section2 flex-column-reverse flex-md-row">
                                <div class="col-12 col-md-7 col-lg-6">
                                    <h1 class="text-secondary font-weight-bold">{{ trans('home.new_title_home2') }}</h1>
                                    <p class="slide-hint text-gray mt-20">{{ trans('home.new_text_home2') }}</p>

                                    <button type="submit"
                                        class="btn btn-primary rounded-pill mt-20">{{ trans('home.find') }}</button>
                                </div>
                                <div class="col-12 col-md-5 col-lg-6">
                                    @if (!empty($heroSectionData['has_lottie']) and $heroSectionData['has_lottie'] == '1')
                                        <lottie-player src="{{ $heroSectionData['hero_vector'] }}" background="transparent"
                                            speed="1" class="w-100" loop autoplay></lottie-player>
                                    @else
                                        <img src="{{ $heroSectionData['hero_vector'] }}"
                                            alt="{{ $heroSectionData['title'] }}" class="img-cover">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    {{-- End Banner's section --}}

    {{-- Start Video's section --}}
    <div class="home-sections container mt-0">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6">
                <video height="400" width="100%" style="border-radius: 10%;" autoplay controls loop muted>
                    <source src="/assets/default/video/video.mp4" type="video/mp4">
                </video>
            </div>
            <div class="col-12 col-lg-6 col-md-6">
                <iframe height="400" width="100%" src="https://www.youtube.com/embed/2w-QqZV_rg8"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen style="border-radius: 20%;border:none;"></iframe>
            </div>
        </div>
    </div>
    {{-- End Video's section --}}

    {{-- Start what_can_you_do section --}}
    <section class="home-sections container mt-25 d-flex justify-content-center"
        style="margin-top: 0px;padding: 0 0 150px;">
        <div style="text-align: center">
            <h2 class="section-title" style="color: black">{{ trans('home.what_can_you_do') }}</h2>
        </div>
    </section>

    <div class="stats-container">
        <div class="container">
            <div class="row" style="border-radius: 50px;background-color: #00da91;height:250px;">
                <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                    <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100 mt-20">
                        <div class="stat-icon-box teacher">
                            <img src="/assets/default/img/stats/teacher.svg" alt="" />
                        </div>
                        <h4 class="stat-title mt-10" style="color: black">{{ trans('home.what_can_you_do_title_1') }}</h4>
                        <p class="stat-desc mt-10">{{ trans('home.what_can_you_do_text_1') }}</p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                    <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100 mt-20">
                        <div class="stat-icon-box student">
                            <img src="/assets/default/img/stats/student.svg" alt="" />
                        </div>
                        <h4 class="stat-title mt-10" style="color: black">{{ trans('home.what_can_you_do_title_2') }}
                        </h4>
                        <p class="stat-desc mt-10">{{ trans('home.what_can_you_do_text_2') }}</p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                    <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100 mt-20">
                        <div class="stat-icon-box video">
                            <img src="/assets/default/img/stats/video.svg" alt="" />
                        </div>
                        <h4 class="stat-title mt-10" style="color: black">{{ trans('home.what_can_you_do_title_3') }}
                        </h4>
                        <p class="stat-desc mt-10">{{ trans('home.what_can_you_do_text_3') }}</p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
                    <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100 mt-20">
                        <div class="stat-icon-box course">
                            <img src="/assets/default/img/stats/course.svg" alt="" />
                        </div>
                        <h4 class="stat-title mt-10" style="color: black">{{ trans('home.what_can_you_do_title_4') }}
                        </h4>
                        <p class="stat-desc mt-10">{{ trans('home.what_can_you_do_text_4') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End what_can_you_do section --}}

    {{-- Start who_needs section --}}
    <div class="home-sections container mt-0 p-25" style="background-color: #ff0844; border-radius: 50px;">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title p-5"
                    style="background-color: #43d477 !important;color:#fff; display:inline-block;">
                    {{ trans('home.who_needs_main_title1') }}</h2>
                <h2 class="section-title" style="color: #fff">{{ trans('home.who_needs_main_title2') }}</h2>
            </div>
            <div class="col-12 col-lg-5 col-md-5 mt-20">
                <h6 class="p-5" style="background-color: #43d477 !important;color:#fff; display:inline-block;">
                    {{ trans('home.who_needs_title_1') }}</h2>
                    <p class="section-hint" style="color: #FFF">{{ trans('home.who_needs_text_1') }}</p>
            </div>
            <div class="col-12 col-lg-5 col-md-5 mt-20">
                <h6 class="p-5" style="background-color: #43d477 !important;color:#fff; display:inline-block;">
                    {{ trans('home.who_needs_title_2') }}</h2>
                    <p class="section-hint" style="color: #FFF">{{ trans('home.who_needs_text_2') }}</p>
            </div>
            <div class="col-12 col-lg-5 col-md-5 mt-20">
                <h6 class="p-5" style="background-color: #43d477 !important;color:#fff; display:inline-block;">
                    {{ trans('home.who_needs_title_3') }}</h2>
                    <p class="section-hint" style="color: #FFF">{{ trans('home.who_needs_text_3') }}</p>
            </div>
            <div class="col-12 col-lg-5 col-md-5 mt-20">
                <h6 class="p-5" style="background-color: #43d477 !important;color:#fff; display:inline-block;">
                    {{ trans('home.who_needs_title_4') }}</h2>
                    <p class="section-hint" style="color: #FFF">{{ trans('home.who_needs_text_4') }}</p>
            </div>
        </div>
    </div>
    {{-- End who_needs section --}}

    <section class="home-sections container mt-35 d-flex justify-content-center"
        style="margin-top: 0px;padding: 0 0 150px;">
        <div style="text-align: center">
            <h2 class="section-title" style="color: black">Kpacit Enterprise</h2>
            <p class="section-hint">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.
                Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor
                (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de
                tal manera que logró hacer un libro de textos especimen.</p>
        </div>
    </section>

    <div class="stats-container container mt-0">
        <div class="row">
            <div class="col-12 col-lg-4 col-md-4 p-30 d-flex flex-column align-items-center align-self-center">
                <div class="stats-item d-flex flex-row align-items-center justify-content-around text-center py-30 px-5 w-100 mt-20"
                    style="background-color: #43d477;">
                    <div class="stat-icon-box course" style="position: absolute; left:-30px; background-color:#ff0844">
                        <img src="/assets/default/img/stats/teacher.svg" alt="" />
                    </div>
                    <h4 class="stat-title mt-10" style="color: black">{{ trans('home.skillful_teachers') }}</h4>
                </div>
                <div class="stats-item d-flex flex-row align-items-center justify-content-around text-center py-30 px-5 w-100 mt-20"
                    style="background-color: #43d477;">
                    <div class="stat-icon-box course" style="position: absolute; left:-30px; background-color:#ff0844">
                        <img src="/assets/default/img/stats/teacher.svg" alt="" />
                    </div>
                    <h4 class="stat-title mt-10" style="color: black">{{ trans('home.skillful_teachers') }}</h4>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-md-4 p-30">
                <div class="stats-item d-flex flex-row align-items-center justify-content-around text-center py-30 px-5 w-100 mt-20"
                    style="background-color: #43d477;">
                    <div class="stat-icon-box course" style="position: absolute; left:-30px; background-color:#ff0844">
                        <img src="/assets/default/img/stats/teacher.svg" alt="" />
                    </div>
                    <h4 class="stat-title mt-10" style="color: black">{{ trans('home.skillful_teachers') }}</h4>
                </div>
                <div class="stats-item d-flex flex-row align-items-center justify-content-around text-center py-30 px-5 w-100 mt-20"
                    style="background-color: #43d477;">
                    <div class="stat-icon-box course" style="position: absolute; left:-30px; background-color:#ff0844">
                        <img src="/assets/default/img/stats/teacher.svg" alt="" />
                    </div>
                    <h4 class="stat-title mt-10" style="color: black">{{ trans('home.skillful_teachers') }}</h4>
                </div>
                <div class="stats-item d-flex flex-row align-items-center justify-content-around text-center py-30 px-5 w-100 mt-20"
                    style="background-color: #43d477;">
                    <div class="stat-icon-box course" style="position: absolute; left:-30px; background-color:#ff0844">
                        <img src="/assets/default/img/stats/teacher.svg" alt="" />
                    </div>
                    <h4 class="stat-title mt-10" style="color: black">{{ trans('home.skillful_teachers') }}</h4>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-md-4 p-30 d-flex flex-column align-items-center align-self-center">
                <div class="stats-item d-flex flex-row align-items-center justify-content-around text-center py-30 px-5 w-100 mt-20"
                    style="background-color: #43d477;">
                    <div class="stat-icon-box course" style="position: absolute; left:-30px; background-color:#ff0844">
                        <img src="/assets/default/img/stats/teacher.svg" alt="" />
                    </div>
                    <h4 class="stat-title mt-10" style="color: black">{{ trans('home.skillful_teachers') }}</h4>
                </div>
                <div class="stats-item d-flex flex-row align-items-center justify-content-around text-center py-30 px-5 w-100 mt-20"
                    style="background-color: #43d477;">
                    <div class="stat-icon-box course" style="position: absolute; left:-30px; background-color:#ff0844">
                        <img src="/assets/default/img/stats/teacher.svg" alt="" />
                    </div>
                    <h4 class="stat-title mt-10" style="color: black">{{ trans('home.skillful_teachers') }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="stats-container container mt-0">
        <div class="row">
            <div class="col-12 d-flex flex-column align-items-center align-self-center">
                <button type="submit" class="btn btn-primary mt-20">
                    <h2 class="section-title" style="color: #fff">Llenar formulario</h2>
                </button>
            </div>
        </div>
    </div>

    <div class="stats-container container mt-50">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 p-30">
                <div class="stats-item d-flex flex-column align-items-end py-10 px-5 w-100 mt-20"
                    style="background-color: #fff;">
                    <h4 class="stat-title" style="color: #ee2354">{{ trans('home.skillful_teachers') }}</h4>
                    <p class="section-hint" style="color: #ee2354; text-align:end">Lorem Ipsum es simplemente el texto de
                        relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de
                        las industrias desde el año 1500, cuando un
                        impresor</p>
                </div>
                <div class="stats-item d-flex flex-column align-items-end py-10 px-5 w-100 mt-20"
                    style="background-color: #fff;">
                    <h4 class="stat-title" style="color: #ee2354">{{ trans('home.skillful_teachers') }}</h4>
                    <p class="section-hint" style="color: #ee2354; text-align:end">Lorem Ipsum es simplemente el texto de
                        relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de
                        las industrias desde el año 1500, cuando un
                        impresor</p>
                </div>
                <div class="stats-item d-flex flex-column align-items-end py-10 px-5 w-100 mt-20"
                    style="background-color: #fff;">
                    <h4 class="stat-title" style="color: #ee2354">{{ trans('home.skillful_teachers') }}</h4>
                    <p class="section-hint" style="color: #ee2354; text-align:end">Lorem Ipsum es simplemente el texto de
                        relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de
                        las industrias desde el año 1500, cuando un
                        impresor</p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-md-6 p-30" style="background-color: #43d477;">
                <img src="/assets/default/img/stats/teacher.svg" alt="" />
            </div>
        </div>
    </div>

    <div class="stats-container container mt-50">
        <div class="row">
            <div class="col-12">
                <section class="home-sections container mt-25" style="margin-top: 0px;padding: 0 0 0;">
                    <div>
                        <h2 class="section-title" style="color: #43d477">TESTIMONIOS REALES</h2>
                    </div>
                </section>
            </div>
            <div class="col-12 col-lg-6 col-md-6 p-30">
                <video height="100%" width="100%" style="border-radius: 25px;" autoplay controls loop muted>
                    <source src="/assets/default/video/video.mp4" type="video/mp4">
                </video>
                <h4 class="stat-title mt-10" style="color: black">{{ trans('home.skillful_teachers') }}</h4>
            </div>
            <div class="col-12 col-lg-6 col-md-6 p-30">
                <div class="stats-item d-flex flex-row align-items-center justify-content-around text-center py-30 px-5 w-100 mt-20"
                    style="background-color: #fff;">
                    <p class="section-hint">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de
                        texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500.</p>
                </div>
                <div class="stats-item d-flex flex-row align-items-center justify-content-around text-center py-30 px-5 w-100 mt-20"
                    style="background-color: #fff;">
                    <video height="150px" width="200px" style="border-radius: 25px;" autoplay controls loop muted>
                        <source src="/assets/default/video/video.mp4" type="video/mp4">
                    </video>
                    <h4 class="stat-title mt-10" style="color: black">{{ trans('home.skillful_teachers') }}</h4>
                </div>
                <div class="stats-item d-flex flex-row align-items-center justify-content-around text-center py-30 px-5 w-100 mt-20"
                    style="background-color: #fff;">
                    <video height="150px" width="200px" style="border-radius: 25px;" autoplay controls loop muted>
                        <source src="/assets/default/video/video.mp4" type="video/mp4">
                    </video>
                    <h4 class="stat-title mt-10" style="color: black">{{ trans('home.skillful_teachers') }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="stats-container container mt-0">
        <div class="row">
            <div class="col-12 d-flex flex-column align-items-center align-self-center">
                <button type="submit" class="btn btn-primary mt-20">
                    <h2 class="section-title" style="color: #fff">Agendar una cita</h2>
                </button>
            </div>
        </div>
    </div>

    <div class="home-sections container mt-0 p-25" style="background-color: #ff0844; border-radius: 50px;">
        <div class="row">
            <div class="col-12 mt-10">
                <p>
                    <a class="btn btn-primary" style="width: 100%; font-size:1rem" data-toggle="collapse"
                        href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        ¿Cuántos usuarios puedo tener?
                    </a>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="panel-section-card py-20 px-25 mt-20">
                        En kpacit la cantidad de usuarios es la que
                        determina el plan que se ajusta a tu empresa. Hemos diseñado varios planes para
                        que empresas pequeñas, medianas y grandes puedan acceder a kpacit sin
                        problemas.
                    </div>
                </div>
            </div>
            <div class="col-12 mt-10">
                <p>
                    <a class="btn btn-primary" style="width: 100%; font-size:1rem" data-toggle="collapse"
                        href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                        ¿Cuántos cursos puedo subir?
                    </a>
                </p>
                <div class="collapse" id="collapseExample2">
                    <div class="panel-section-card py-20 px-25 mt-20">Podrás subir todos los cursos que desees a kpacit
                        enterprise.
                    </div>
                </div>
            </div>
            <div class="col-12 mt-10">
                <p>
                    <a class="btn btn-primary" style="width: 100%; font-size:1rem" data-toggle="collapse"
                        href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                        ¿Son mis cursos públicos?
                    </a>
                </p>
                <div class="collapse" id="collapseExample3">
                    <div class="panel-section-card py-20 px-25 mt-20">No, el material que subes en tu empresa es privado y
                        no será compartido con las demás compañías.
                    </div>
                </div>
            </div>
            <div class="col-12 mt-10">
                <p>
                    <a class="btn btn-primary" style="width: 100%; font-size:1rem" data-toggle="collapse"
                        href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                        ¿Tengo que subir los cursos yo solo?
                    </a>
                </p>
                <div class="collapse" id="collapseExample4">
                    <div class="panel-section-card py-20 px-25 mt-20"> No, aunque kpacit ha sido diseñado para
                        que cualquier persona pueda crear cursos de una forma muy amigable, tenemos
                        un equipo que está disponible para los clientes para ayudarlos en la elaboración y
                        carga del material.
                    </div>
                </div>
            </div>
            <div class="col-12 mt-10">
                <p>
                    <a class="btn btn-primary" style="width: 100%; font-size:1rem" data-toggle="collapse"
                        href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample5">
                        ¿Me pueden ayudar a crear el contenido?
                    </a>
                </p>
                <div class="collapse" id="collapseExample5">
                    <div class="panel-section-card py-20 px-25 mt-20"> Si, de hecho esta es una de nuestras
                        grandes ventajas.  Acompañamos a los empresarios para que el material quede
                        correctamente grabado y sea verdaderamente útil para sus colaboradores.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="home-sections container mt-50 mb-50">
        <div class="row d-flex flex-row align-items-center justify-content-center">
            <div class="col-4">
                <h1 style="color: #000;font-size:2rem;text-align:end">¿Tienes preguntas?</h1>
                <p class="section-hint" style="color: #ee2354; text-align:end">escríbenos y resolvámosla juntos</p>
            </div>
            <div class="col-4 d-flex flex-row align-items-center justify-content-center">
                <img src="/store/1/default_images/social/whatsapp.svg" alt="Whatsapp"
                    style=" width:150px; height:150px; background-color:#00da91; border-radius:25px">
            </div>
            <div class="col-8">
                <button type="submit" class="btn btn-primary mt-20" style="width: 100%">
                    <h4 class="section-title" style="color: #fff">¡Tengo una pregunta!</h4>
                </button>
            </div>
        </div>
    </section>
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/default/vendors/owl-carousel2/owl.carousel.min.js"></script>
    <script src="/assets/default/vendors/parallax/parallax.min.js"></script>
    <script src="/assets/default/js/parts/home.min.js"></script>
    <script src="/assets/default/vendors/lottie/lottie-player.js"></script>
    <script>
        $(document).ready(() => {
            $('.carousel').carousel({
                interval: 2000
            })
        });
    </script>
@endpush
