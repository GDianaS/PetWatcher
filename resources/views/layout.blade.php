<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- Fontes --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />

    {{-- Icones --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">

    {{-- CSS --}}
    <link rel="stylesheet" href="<?php echo asset('css/main.css')?>" type="text/css"/>


    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- DatePicker --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    $( function() {
      $( ".datepicker" ).datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true
      });
    } );
    </script>

    <title> @yield('title') </title>
</head>

<body>

    <header>
        <div id="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">Pet<span>Watcher</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @if(auth()->check())
                            
                            @if(Auth::user()->isDivisa)
                            <li class="nav-item">
                                <a class="nav-link" href="/especie">Gestão de espécies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/credenciada">Gestão de credenciadas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/license/create">Cadastro de licenças</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/license/">Revogação licenças</a>
                            </li>
                            @endif
                        
                            @if(Auth::user()->isCredenciada)
                            
                            <li class="nav-item">
                                <a class="nav-link" href="/funcionario">Gestão de Funcionarios</a>
                            </li>
                            @endif

                            @if(Auth::user()->isFuncionarioCredenciada)
                            <li class="nav-item">
                                <a class="nav-link" href="/proprietario/">Gestão de Proprietários</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/animal/">Gestão de animais</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="/consulta_animal">Consulta Animais</a>
                            </li>


                            @endif
        
                        </ul>
        
        
                        <form class="d-flex">
                            @if(auth()->guest())
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/login">Login
                                        <span class="visually-hidden">(current)</span>
                                    </a>
                                </li>
                            </ul>
                            @endif
                            @if(auth()->check())
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="/dashboard">bem vindo, {{$user = Auth::user()->name}}!
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/logout">Logout
                                        <span class="visually-hidden">(current)</span>
                                    </a>
                                </li>
                            </ul>
                            @endif
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        
    
    </header>

    <div class="container">
        <div class="card border-0 shadow my-5">
          <div class="card-body p-5">
            <h1 class="fw-light">@yield('title')</h1>
            <p class="lead">@yield('content')</p>
          </div>
        </div>
      </div>

    <footer class="site-footer bg-dark">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-4 mb-2 mt-3">
                <h5 class= "text-center">Sobre o PetWatcher</h5>
                <p>
                    Pet Watcher é uma plataforma digital que visa viabilizar o Registro Geral de Animais de
                    Estimação, consiste na chipagem de animais, com cadastro online. Este processo só pode
                    ser feito nas unidades da Divisão de Vigilância Sanitária (DIVISA) e ainda em
                    estabelecimentos credenciados por ela.
                </p>
                </div>
                <div class="col-md-4 mb-2 mt-3 contatos">
                    <h5 class= "text-center">Contato & Endereço</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="tel:+5593111111111"  class="nav-link">Tel: (93) 9 9999-9999</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://api.whatsapp.com/send?phone=5593999999999&text=Desejo%20saber%20mais%20sobre%20PetWatcher" target="blank" class="nav-link">WhatsApp: (93) 9 9999-9999</a>
                        </li class="nav-item">

                        <li class="nav-item">
                            <a href="#" class="nav-link">E-mail: petwatcher@gmail.com</a>
                        </li >
                    </ul>
                </div>
                <div class="col-md-4 col-lg-4 mt-3">
                    <h5 class= "text-center" >Mídias Sociais</h5>
                    <div class="wrapper d-flex align-content-around flex-wrap">
                        <div class="button-social">
                            <div class="icon-social">
                                <div class="tooltip"> Facebook</div>
                                <span><i class="fab fa-facebook-f"></i></span>
                            </div>
                        </div>

                        <div class="button-social">
                            <div class="icon-social">
                                <div class="tooltip">Twitter</div>
                                <span><i class="fab fa-twitter"></span></i>
                            </div>
                        </div>

                        <div class="button-social">
                            <div class="icon-social">
                                <div class="tooltip">Instagram</div>
                                <span><i class="fab fa-instagram"></span></i>
                            </div>
                        </div>

                        <div class="button-social">
                            <div class="icon-social">
                                <div class="tooltip">YouTube</div>
                                <span><i class="fab fa-youtube"></span></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mb-4">
            <div class="row align-items-center">
                <div class="col-md-7 col-lg-8">
                <a href="#" class="nav-link">Voltar ao Topo</a>
                </div>
            </div>



    </footer>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>