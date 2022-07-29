@extends(getTemplate().'.layouts.app')

@push('styles_top')
<link rel="stylesheet" href="/assets/default/vendors/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="/assets/default/vendors/owl-carousel2/owl.carousel.min.css">
@endpush

@section('content')

@if(!empty(session()->has('msg')))
<div class="alert alert-success my-25 d-flex align-items-center">
    <i data-feather="check-square" width="50" height="50" class="mr-2"></i>
    {{ session()->get('msg') }}
</div>
@endif
<section class="slider-container" style="background-image: url('{{ $heroSectionData['hero_background'] }}'); background-position: left;">
    <div class="row slider-content align-items-center hero-section2 flex-column-reverse flex-md-row">
        <div class="col-12 col-md-7 col-lg-6" style="display: flex; flex-direction: column; align-items: center; gap: 3rem; ">
            <h1 class="text-secondary font-weight-bold">Bienvenido a Kpacit enterprise</h1>
            <p class="slide-hint text-gray mt-20" style="margin:0 !important; ">La mejor herramienta para la gestion del conocimiento de las empresas</p>
            <a id="descubre_mas" href="#cursos"><button class="btn btn-primary rounded-pill">Descubre mas</button></a>
        </div>
        <div id="contactanos" class="col-12 col-md-7 col-lg-6" style="background-color: #ff1e58; border-radius: 5%; padding: 2%; color: white;">
            <h2 style="text-align:center; margin-bottom:5%;">Contactanos</h2>
            <form action="/hola" method="post">
                {{ csrf_field() }}
                <div class="form-input">
                    <label for="nombre_empresa">Nombre empresa:</label>
                    <input id="nombre_empresa" name="nombre_empresa" type="text" class="form-control" required>
                </div>
                <div class="form-input">
                    <label for="nombre_contacto">Nombre contacto:</label>
                    <input id="nombre_contacto" name="nombre_contacto" type="text" class="form-control" required>
                </div>
                <div class="form-input">
                    <label for="correo_contacto">Correo contacto:</label>
                    <input id="correo_contacto" name="correo_contacto" type="email" class="form-control" required>
                </div>
                <div class="form-input">
                    <label for="tel_empresa">Telefono contacto:</label>
                    <input id="tel_empresa" name="tel_empresa" type="tel" class="form-control">
                </div>
                <div class="form-input">
                    <label for="tamaño_empresa">Tamaño de la empresa:</label>
                    <select class="form-control" id="tamaño_empresa" name="tamaño_empresa" required>
                        <option value="menos_5">Menos de 5</option>
                        <option value="menos_10">Entre 5 y 10</option>
                        <option value="menos_20">Entre 10 y 20</option>
                        <option value="menos_50">Entre 20 y 50</option>
                        <option value="mas_50">Mas de 50</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="sector_economico">Sector economico:</label>
                    <input id="sector_economico" name="sector_economico" type="text" class="form-control" required>
                </div>
                <div class="form-input">
                    <label for="pais">Pais:</label>
                    <select class="form-control" class="grid-4" id="country" name="country" required>
                        <option value="">Seleccionar pa&#237;s</option>
                        <option value="AF">Afganist&#225;n</option>
                        <option value="AL">Albania</option>
                        <option value="DE">Alemania</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguila</option>
                        <option value="AQ">Ant&#225;rtida</option>
                        <option value="AG">Antigua y Barbuda</option>
                        <option value="AN">Antillas Neerlandesas</option>
                        <option value="SA">Arabia Saud&#237;</option>
                        <option value="DZ">Argelia</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahr&#233;in</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BE">B&#233;lgica</option>
                        <option value="BZ">Belice</option>
                        <option value="BJ">Ben&#237;n</option>
                        <option value="BM">Bermudas</option>
                        <option value="BY">Bielorrusia</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia y Herzegovina</option>
                        <option value="BW">Botsuana</option>
                        <option value="BR">Brasil</option>
                        <option value="BN">Brun&#233;i Darussalam</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="BT">But&#225;n</option>
                        <option value="CV">Cabo Verde</option>
                        <option value="KH">Camboya</option>
                        <option value="CM">Camer&#250;n</option>
                        <option value="CA">Canad&#225;</option>
                        <option value="BQ">Caribe Neerland&#233;s</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CY">Chipre</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoras</option>
                        <option value="CG">Congo</option>
                        <option value="KR">Corea (Rep&#250;blica de)</option>
                        <option value="KP">Corea (Rep&#250;blica Popular Democr&#225;tica)</option>
                        <option value="CI">Costa de Marfil</option>
                        <option value="CR">Costa Rica</option>
                        <option value="HR">Croacia</option>
                        <option value="CU">Cuba</option>
                        <option value="CW">Curazao</option>
                        <option value="DK">Dinamarca</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="EC">Ecuador</option>
                        <option value="US">EE.UU.</option>
                        <option value="EG">Egipto</option>
                        <option value="SV">El Salvador</option>
                        <option value="ER">Eritrea</option>
                        <option value="SK">Eslovaquia</option>
                        <option value="SI">Eslovenia</option>
                        <option value="ES">Espa&#241;a</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Etiop&#237;a</option>
                        <option value="FJ">Fiji</option>
                        <option value="PH">Filipinas</option>
                        <option value="FI">Finlandia</option>
                        <option value="FR">Francia</option>
                        <option value="GM">Gambia</option>
                        <option value="GE">Georgia</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GD">Granada</option>
                        <option value="GR">Grecia</option>
                        <option value="GL">Groenlandia</option>
                        <option value="GP">Guadalupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GF">Guayana Francesa</option>
                        <option value="GN">Guinea</option>
                        <option value="GQ">Guinea Ecuatorial</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Hait&#237;</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hongkong, China</option>
                        <option value="HU">Hungr&#237;a</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IQ">Irak</option>
                        <option value="IR">Ir&#225;n</option>
                        <option value="IE">Irlanda</option>
                        <option value="IS">Islandia</option>
                        <option value="KY">Islas Caim&#225;n</option>
                        <option value="CK">Islas Cook</option>
                        <option value="FO">Islas Feroe</option>
                        <option value="FK">Islas Malvinas</option>
                        <option value="MP">Islas Marianas del Norte</option>
                        <option value="MH">Islas Marshall</option>
                        <option value="SB">Islas Salom&#243;n</option>
                        <option value="VG">Islas V&#237;rgenes Brit&#225;nicas</option>
                        <option value="VI">Islas V&#237;rgenes de los Estados Unidos</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italia</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Jap&#243;n</option>
                        <option value="JO">Jordania</option>
                        <option value="KZ">Kazajist&#225;n</option>
                        <option value="KE">Kenia</option>
                        <option value="KG">Kirguizist&#225;n</option>
                        <option value="KI">Kiribati</option>
                        <option value="KW">Kuwait</option>
                        <option value="LA">Laos</option>
                        <option value="LS">Lesoto</option>
                        <option value="LV">Letonia</option>
                        <option value="LB">L&#237;bano</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libia</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lituania</option>
                        <option value="LU">Luxemburgo</option>
                        <option value="MO">Macao, China</option>
                        <option value="MK">Macedonia</option>
                        <option value="MG">Madagascar</option>
                        <option value="MY">Malasia</option>
                        <option value="MW">Malawi</option>
                        <option value="MV">Maldivas</option>
                        <option value="ML">Mal&#237;</option>
                        <option value="MT">Malta</option>
                        <option value="MA">Marruecos</option>
                        <option value="MQ">Martinica</option>
                        <option value="MU">Mauricio</option>
                        <option value="MR">Mauritania</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">M&#233;xico</option>
                        <option value="FM">Micronesia</option>
                        <option value="MD">Moldavia</option>
                        <option value="MC">M&#243;naco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">N&#237;ger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NO">Noruega</option>
                        <option value="NC">Nueva Caledonia</option>
                        <option value="NZ">Nueva Zelanda</option>
                        <option value="OM">Om&#225;n</option>
                        <option value="NL">Pa&#237;ses Bajos</option>
                        <option value="PK">Pakist&#225;n</option>
                        <option value="PW">Palaos</option>
                        <option value="PS">Palestina</option>
                        <option value="PA">Panam&#225;</option>
                        <option value="PG">Pap&#250;a Nueva Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Per&#250;</option>
                        <option value="PF">Polinesia Francesa</option>
                        <option value="PL">Polonia</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="GB">Reino Unido</option>
                        <option value="CF">Rep&#250;blica Centroafricana</option>
                        <option value="CZ">Rep&#250;blica Checa</option>
                        <option value="AZ">Rep&#250;blica de Azerbaiy&#225;n</option>
                        <option value="CD">Rep&#250;blica Democr&#225;tica del Congo</option>
                        <option selected="selected" value="DO">Rep&#250;blica Dominicana</option>
                        <option value="GA">Rep&#250;blica Gabonesa</option>
                        <option value="RE">Reuni&#243;n</option>
                        <option value="RW">Ruanda</option>
                        <option value="RO">Ruman&#237;a</option>
                        <option value="RU">Rusia</option>
                        <option value="WS">Samoa</option>
                        <option value="AS">Samoa Americana</option>
                        <option value="KN">San Crist&#243;bal y Nieves</option>
                        <option value="SM">San Marino</option>
                        <option value="PM">San Pedro y Miquel&#243;n</option>
                        <option value="VC">San Vicente y las Granadinas</option>
                        <option value="SH">Santa Elena</option>
                        <option value="LC">Santa Luc&#237;a</option>
                        <option value="ST">Santo Tom&#233; y Pr&#237;ncipe</option>
                        <option value="SN">Senegal</option>
                        <option value="RS">Serbia</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leona</option>
                        <option value="SG">Singapur</option>
                        <option value="SX">Sint Maarten</option>
                        <option value="SY">Siria</option>
                        <option value="SO">Somalia</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SZ">Suazilandia</option>
                        <option value="ZA">Sud&#225;frica</option>
                        <option value="SD">Sud&#225;n</option>
                        <option value="SS">Sud&#225;n del Sur</option>
                        <option value="SE">Suecia</option>
                        <option value="CH">Suiza</option>
                        <option value="SR">Surinam</option>
                        <option value="TH">Tailandia</option>
                        <option value="TW">Taiw&#225;n</option>
                        <option value="TZ">Tanzania</option>
                        <option value="TJ">Tayikist&#225;n</option>
                        <option value="TL">Timor Oriental</option>
                        <option value="TG">Togo</option>
                        <option value="TK">Tokelau</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad y Tobago</option>
                        <option value="TN">T&#250;nez</option>
                        <option value="TC">Turcas y Caicos</option>
                        <option value="TM">Turkmenist&#225;n</option>
                        <option value="TR">Turqu&#237;a</option>
                        <option value="TV">Tuvalu</option>
                        <option value="AE">UAE</option>
                        <option value="UA">Ucrania</option>
                        <option value="UG">Uganda</option>
                        <option value="UY">Uruguay</option>
                        <option value="UZ">Uzbekist&#225;n</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VA">Vaticano</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Vietnam</option>
                        <option value="WF">Wallis y Futuna</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                        <option value="ZW">Zimbabue</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="ciudad">Ciudad:</label>
                    <input id="ciudad" name="ciudad" type="text" class="form-control" required>
                </div>
                <div style="display: flex; justify-content: right;">
                    <button type="submit" class="btn btn-primary form-submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="caracteristicas">
    <h2 id="cursos" class="title-h2">Caracteristicas</h2>
    <div class="caracteristicas-content">
        <div class="caracteristicas-card">
            <h3>GESTIONE EL CONOCIMIENTO</h3>
            <div class="card-content">
                <div class="content-text">
                    <p class="shortp">Tenga toda la información importante de su compañía organizada y en un mismo lugar. A través de la plataforma usted podrá tener el conocimiento de su organización en diferentes formatos disponible para los colaboradores a muy pocos clics de distancia.</p>
                </div>
                <div class="content-video">
                    <iframe src="https://www.youtube.com/embed/LSSG4AllOws" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <a class="cotizar" href="#contactanos"><button href="contactanos" class="btn btn-primary btn-cotizacion">SOLICITA COTIZACION</button></a>
                </div>
            </div>
            <a href="#descubre-mas1" class="descubre-mas" id="descubre-mas1">
                <h4>DESCUBRE MAS</h4>
            </a>
        </div>
        <div class="caracteristicas-card">
            <h3>CONSTRUYE CURSOS</h3>
            <div class="card-content">
                <div class="content-video">
                    <iframe src="https://www.youtube.com/embed/LSSG4AllOws" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <a class="cotizar" href="#contactanos"><button href="contactanos" class="btn btn-primary btn-cotizacion">SOLICITA COTIZACION</button></a>
                </div>
                <p>No basta con tener su conocimiento en un lugar bien gestionado. Para que tenga verdadero valor, debe ser posible transmitirlo a su equipo de una forma simple.

                    Con kpacit enterprise podrá:</br></br>
                    <label>
                        ● Crear cursos de video.</br>
                        ● Subir lecturas en PDF.</br>
                        ● Desarrollar cursos de texto.</br>
                        ● Incluir videos de otros sitios.</br>
                        ● Crear sesiones de clase en vivo ideales para discutir la casuística y retroalimentar los equipos.
                    </label>
                </p>
            </div>
            <a href="#descubre-mas2" class="descubre-mas" id="descubre-mas2">
                <h4>DESCUBRE MAS</h4>
            </a>
        </div>
        <div class="caracteristicas-card">
            <h3>EL TRABAJO ES MEJOR EN EQUIPO</h3>
            <div class="card-content">
                <div class="content-video">
                    <iframe src="https://www.youtube.com/embed/LSSG4AllOws" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <a class="cotizar" href="#contactanos"><button href="contactanos" class="btn btn-primary btn-cotizacion">SOLICITA COTIZACION</button></a>
                </div>
                <p class="shortp">Una de las herramientas más poderosas que tiene kpacit enterprise es la posibilidad de crear grupos de trabajo, Esta función le permite asignar todos los cursos y documentación requerida para una posición en cuestión de segundos.</p>
            </div>
            <a href="#descubre-mas3" class="descubre-mas" id="descubre-mas3">
                <h4>DESCUBRE MAS</h4>
            </a>
        </div>
        <div class="caracteristicas-card">
            <h3>MEDIR ES TAN IMPORTANTE COMO CAPACITAR</h3>
            <div class="card-content">
                <p>Usted necesita saber si su equipo está bien preparado. Con kpacit, usted podrá crear quizzes con diferente tipos de pregunta:</br></br>
                    <label>
                        ● Selección múltiple con única respuesta.</br>
                        ● Falso y verdadero.</br>
                        ● Selección de imágenes.</br>
                        ● Preguntas abiertas.
                    </label>
                </p>
                <div class="content-video">
                    <iframe src="https://www.youtube.com/embed/LSSG4AllOws" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <a class="cotizar" href="#contactanos"><button href="contactanos" class="btn btn-primary btn-cotizacion">SOLICITA COTIZACION</button></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="estadisticas-card">
    <h2 class="title-h2">OBTENGA ESTADÍSTICAS</h2>
    <div class="card-content">
        <p>Usted podrá consultar en tiempo real el avance de su equipo en los procesos de capacitación. Podrá ver el desarrollo por grupos, por persona, por tema o curso, lo que le permite crear planes de acción adecuados para la empresa.</p>
        <div class="content-video">
            <img src="/public/favicon.ico" alt="">
            <a class="cotizar" href="#contactanos"><button href="contactanos" class="btn btn-primary btn-cotizacion">SOLICITA COTIZACION</button></a>
        </div>
    </div>
</section>

<section class="estadisticas-card card-capacitado">
    <h2 class="title-h2">¿SABE CUÁNTO LE CUESTA NO TENER SU PERSONAL BIEN CAPACITADO?</h2>
    <div class="row-cards">
        <div class="stats-card">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ban" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00d990" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <circle cx="12" cy="12" r="9" />
                <line x1="5.7" y1="5.7" x2="18.3" y2="18.3" />
            </svg>
            <h4>1. producto no conforme.</h4>
        </div>
        <div class="stats-card">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-off" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00d990" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <circle cx="6" cy="19" r="2" />
                <path d="M17 17a2 2 0 1 0 2 2" />
                <path d="M17 17h-11v-11" />
                <path d="M9.239 5.231l10.761 .769l-1 7h-2m-4 0h-7" />
                <path d="M3 3l18 18" />
            </svg>
            <h4>2. baja penetración de nuevos productos.</h4>
        </div>
        <div class="stats-card">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-minus" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00d990" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <circle cx="9" cy="7" r="4" />
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                <line x1="16" y1="11" x2="22" y2="11" />
            </svg>
            <h4>3. baja satisfacción de los clientes.</h4>
        </div>
        <div class="stats-card">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-rotate-clockwise-2" width="60" height="60" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00d990" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 4.55a8 8 0 0 1 6 14.9m0 -4.45v5h5" />
                <line x1="5.63" y1="7.16" x2="5.63" y2="7.17" />
                <line x1="4.06" y1="11" x2="4.06" y2="11.01" />
                <line x1="4.63" y1="15.1" x2="4.63" y2="15.11" />
                <line x1="7.16" y1="18.37" x2="7.16" y2="18.38" />
                <line x1="11" y1="19.94" x2="11" y2="19.95" />
            </svg>
            <h4>4. tiempos de reproceso.</h4>
        </div>
    </div>
    <p class="conocimiento">Comienza a gestionar el conocimiento de tu empresa hoy.</p>
    <a class="cotizar" href="#contactanos"><button style="width: 100%;" href="contactanos" class="btn btn-primary btn-cotizacion">SOLICITA COTIZACION</button></a>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var ir_1 = $("#descubre_mas");
        var ir_2 = $("#descubre-mas1");
        var ir_3 = $("#descubre-mas2");
        var ir_4 = $("#descubre-mas3");
        var ir_form = $(".cotizar");
        ir_1.click(function(e) {
            e.preventDefault();
            $("body,html").animate({
                scrollTop: $(this.hash).offset().top,
            }, 800)
        });

        ir_2.click(function(e) {
            e.preventDefault();
            $("body,html").animate({
                scrollTop: $(this.hash).offset().top,
            }, 1000)
        });

        ir_3.click(function(e) {
            e.preventDefault();
            $("body,html").animate({
                scrollTop: $(this.hash).offset().top,
            }, 1000)
        });

        ir_4.click(function(e) {
            e.preventDefault();
            $("body,html").animate({
                scrollTop: $(this.hash).offset().top,
            }, 1000)
        });

        ir_form.click(function(e) {
            e.preventDefault();
            $("body,html").animate({
                scrollTop: 0,
            }, 1000)
        });


    });
</script>

@endsection

@push('scripts_bottom')
<script src="/assets/default/vendors/swiper/swiper-bundle.min.js"></script>
<script src="/assets/default/vendors/owl-carousel2/owl.carousel.min.js"></script>
<script src="/assets/default/vendors/parallax/parallax.min.js"></script>
<script src="/assets/default/js/parts/home.min.js"></script>
@endpush                                    </form>
                                        @else
                                            <a href="/login" class="btn btn-primary btn-block mt-50">{{ trans('financial.purchase') }}</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="swiper-pagination subscribes-swiper-pagination"></div>
                    </div>

                </div>
            </section>

            <div id="parallax5" class="ltr">
                <div data-depth="0.4" class="gradient-box right-gradient-box"></div>
            </div>

            <div id="parallax6" class="ltr">
                <div data-depth="0.6" class="gradient-box bottom-gradient-box"></div>
            </div>
        </div>
    @endif

    @if(!empty($boxVideoOrImage))
        <section class="home-sections home-sections-swiper position-relative">
            <div class="home-video-mask"></div>
            <div class="container home-video-container d-flex flex-column align-items-center justify-content-center position-relative" style="background-image: url('{{ $boxVideoOrImage['background'] ?? '' }}')">
                <a href="{{ $boxVideoOrImage['link'] ?? '' }}" class="home-video-play-button d-flex align-items-center justify-content-center position-relative">
                    <i data-feather="play" width="36" height="36" class=""></i>
                </a>

                <div class="mt-50 pt-10 text-center">
                    <h2 class="home-video-title">{{ $boxVideoOrImage['title'] ?? '' }}</h2>
                    <p class="home-video-hint mt-10">{{ $boxVideoOrImage['description'] ?? '' }}</p>
                </div>
            </div>
        </section>
    @endif

    @if(!empty($instructors) and !$instructors->isEmpty())
        <section class="home-sections container">
            <div class="d-flex justify-content-between">
                <div>
                    <h2 class="section-title">{{ trans('home.instructors') }}</h2>
                    <p class="section-hint">{{ trans('home.instructors_hint') }}</p>
                </div>

                <a href="/instructors" class="btn btn-border-white">{{ trans('home.all_instructors') }}</a>
            </div>

            <div class="position-relative mt-20 ltr">
                <div class="owl-carousel customers-testimonials instructors-swiper-container">

                    @foreach($instructors as $instructor)
                        <div class="item">
                            <div class="shadow-effect">
                                <div class="instructors-card d-flex flex-column align-items-center justify-content-center">
                                    <div class="instructors-card-avatar">
                                        <img src="{{ $instructor->getAvatar() }}" alt="{{ $instructor->full_name }}" class="rounded-circle img-cover">
                                    </div>
                                    <div class="instructors-card-info mt-10 text-center">
                                        <a href="{{ $instructor->getProfileUrl() }}" target="_blank">
                                            <h3 class="font-16 font-weight-bold text-dark-blue">{{ $instructor->full_name }}</h3>
                                        </a>

                                        <p class="font-14 text-gray mt-5">{{ $instructor->bio }}</p>
                                        <div class="stars-card d-flex align-items-center justify-content-center mt-10">
                                            @php
                                                $i = 5;
                                            @endphp
                                            @while(--$i >= 5 - $instructor->rates())
                                                <i data-feather="star" width="20" height="20" class="active"></i>
                                            @endwhile
                                            @while($i-- >= 0)
                                                <i data-feather="star" width="20" height="20" class=""></i>
                                            @endwhile
                                        </div>

                                        @if(!empty($instructor->hasMeeting()))
                                            <a href="{{ $instructor->getProfileUrl() }}?tab=appointments" class="btn btn-primary btn-sm rounded-pill mt-15">{{ trans('home.reserve_a_live_class') }}</a>
                                        @else
                                            <a href="{{ $instructor->getProfileUrl() }}" class="btn btn-primary btn-sm rounded-pill mt-15">{{ trans('public.profile') }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif

    @if(!empty($organizations) and !$organizations->isEmpty())
        <section class="home-sections home-sections-swiper container">
            <div class="d-flex justify-content-between">
                <div>
                    <h2 class="section-title">{{ trans('home.organizations') }}</h2>
                    <p class="section-hint">{{ trans('home.organizations_hint') }}</p>
                </div>

                <a href="/organizations" class="btn btn-border-white">{{ trans('home.all_organizations') }}</a>
            </div>

            <div class="position-relative mt-20">
                <div class="swiper-container organization-swiper-container px-12">
                    <div class="swiper-wrapper py-20">

                        @foreach($organizations as $organization)
                            <div class="swiper-slide">
                                <div class="home-organizations-card d-flex flex-column align-items-center justify-content-center">
                                    <div class="home-organizations-avatar">
                                        <img src="{{ $organization->getAvatar() }}" class="img-cover rounded-circle" alt="{{ $organization->full_name }}">
                                    </div>
                                    <a href="{{ $organization->getProfileUrl() }}" class="mt-25 d-flex flex-column align-items-center justify-content-center">
                                        <h3 class="home-organizations-title">{{ $organization->full_name }}</h3>
                                        <p class="home-organizations-desc mt-10">{{ $organization->bio }}</p>
                                        <span class="home-organizations-badge badge mt-15">{{ $organization->webinars_count }} {{ trans('webinars.classes') }}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="swiper-pagination organization-swiper-pagination"></div>
                </div>
            </div>
        </section>
    @endif

    @if(!empty($blog) and !$blog->isEmpty())
        <section class="home-sections container">
            <div class="d-flex justify-content-between">
                <div>
                    <h2 class="section-title">{{ trans('home.blog') }}</h2>
                    <p class="section-hint">{{ trans('home.blog_hint') }}</p>
                </div>

                <a href="/blog" class="btn btn-border-white">{{ trans('home.all_blog') }}</a>
            </div>

            <div class="row mt-35">

                @foreach($blog as $post)
                    <div class="col-12 col-md-4 col-lg-4 mt-20 mt-lg-0">
                        @include('web.default.blog.grid-list',['post' =>$post])
                    </div>
                @endforeach

            </div>
        </section>
    @endif
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/default/vendors/owl-carousel2/owl.carousel.min.js"></script>
    <script src="/assets/default/vendors/parallax/parallax.min.js"></script>
    <script src="/assets/default/js/parts/home.min.js"></script>
@endpush
