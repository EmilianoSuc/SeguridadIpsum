<!DOCTYPE html>
<html lang="en" data-assets-path="../assets/">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesión</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">    
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>
    <body>
        <div class="row justify-content-center" style="align-content: center;margin: 50px;">
            <div class="col-md-6  justify-content-center">
              <div class="card mb-4">
                <h5 class="card-header">Registrate a WePlot</h5>
                <div class="card-body">
                    <form action="{{ route('register.custom') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">                                 
                            <label class="form-label" for="basic-default-password32">Nombre</label>
                            <input type="text" placeholder="Nombre" id="name" class="form-control" name="nombre"
                                required autofocus>
                            @if ($errors->has('nombre'))
                            <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">                                 
                            <label class="form-label" for="basic-default-password32">Apellido</label>
                            <input type="text" placeholder="Apellido" id="name" class="form-control" name="nombre"
                                required autofocus>
                            @if ($errors->has('nombre'))
                            <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">                                 
                            <label class="form-label" for="basic-default-password32">Correo</label>
                            <input type="text" placeholder="Coreo" id="email_address" class="form-control"
                                name="correo" required autofocus>
                            @if ($errors->has('correo'))
                            <span class="text-danger">{{ $errors->first('correo') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">                                 
                            <label class="form-label" for="basic-default-password32">Télefono</label>
                            <input type="tel" placeholder="123-456-7890" id="name" class="form-control" name="nombre"
                                required autofocus>
                            @if ($errors->has('nombre'))
                            <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">                                 
                            <label class="form-label" for="basic-default-password32">País</label>
                            <input type="text" placeholder="Escriba su país" id="name" class="form-control" name="nombre"
                                required autofocus>
                            @if ($errors->has('nombre'))
                            <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                        <div class="form-password-toggle form-group  mb-3">
                            <label class="form-label" for="basic-default-password32">Contraseña</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                id="password"
                                class="form-control"
                                aria-describedby="basic-default-password"
                                name="contrasena" required/>
                              <span class="input-group-text cursor-pointer" id="basic-default-password"
                                ><i class="bx bx-hide"></i
                              ></span>
                              @if ($errors->has('contrasena'))
                              <span class="text-danger">{{ $errors->first('contrasena') }}</span>
                              @endif
                            </div>
                        </div>                       
                        <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-dark btn-block">Registrarse</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>

        <div> <!--JS-->
            <script src="../assets/vendor/libs/jquery/jquery.js"></script>
            <script src="../assets/vendor/libs/popper/popper.js"></script>
            <script src="../assets/vendor/js/bootstrap.js"></script>
            <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        
            <script src="../assets/vendor/js/menu.js"></script>
            <!-- endbuild -->
        
            <!-- Vendors JS -->
        
            <!-- Main JS -->
            <script src="../assets/js/main.js"></script>
        
            <!-- Page JS -->
        
            <!-- Place this tag in your head or just before your close body tag. -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
        </div>
    </body>
</html>