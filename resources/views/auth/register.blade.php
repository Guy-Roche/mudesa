<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>MUDESA | S'inscrire</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('backend/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-white">

        <!-- Begin page -->
        <div class="account-page">
            <div class="container-fluid p-0">        
                <div class="row align-items-center g-0">
                    <div class="col-xl-5">
                        <div class="row">
                            <div class="col-md-7 mx-auto">
                                <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
                                    <div class="mb-4 p-0 mt-5">
                                        <a href="index.html" class="auth-logo">
                                            <img src="{{ asset('backend/images/logo2.jpg') }}" alt="logo-dark" class="mx-auto" height="100" />
                                        </a>
                                    </div>
    
                                    <div class="pt-0">
                                        <form action="{{ route('register') }}" class="my-4" method="POST">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="username" class="form-label">Nom de l'utilisateur</label>
                                                <input class="form-control" name="name" type="text" id="username" required="" placeholder="Entrer votre nom d'utilisateur">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="emailaddress" class="form-label">Email</label>
                                                <input class="form-control" type="email" id="emailaddress" name="email" required="" placeholder="Entrer votre email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group mb-3">
                                                <label for="phone" class="form-label">Numéro de téléphone</label>
                                                <input class="form-control" type="tel" name="phone" id="phone" required="" placeholder="Entrer votre numéro de téléphone">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="password" class="form-label">Mot de passe</label>
                                                <input class="form-control" type="password" required="" name="password" id="password" placeholder="Entrer votre mot de passe">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group mb-3">
                                                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                                                <input class="form-control" type="password" required="" name="password_confirmation" id="password_confirmation" placeholder="Confirmer votre mot de passe">
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group d-flex mb-3">
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                                        <label class="form-check-label" for="checkbox-signin">J'accepte les <a href="#" class="text-primary fw-medium"> Conditions Générales</a></label>
                                                    </div>
                                                </div><!--end col-->
                                            </div>
                                            
                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-primary" type="submit"> S'inscrire</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="account-page-bg p-md-5 p-4">
                            <div class="text-center">
                                <h3 class="text-dark mb-3 pera-title">Veuiller renseigner ce formulaire pour créer un compte</h3>
                                <div class="auth-image">
                                    <img src="{{ asset('backend/images/authentication.svg') }}" class="mx-auto img-fluid"  alt="images">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{ asset('backend/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('backend/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('backend/libs/feather-icons/feather.min.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('backend/js/app.js') }}"></script>
        
    </body>
</html>