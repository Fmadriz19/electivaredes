<!doctype html>
<html lang="en">

<head>
    <title>Registro de Usuario</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <!-- Section: Design Block -->
    <section class="text-center text-lg-start">

        <!-- Jumbotron -->
        <div class="container py-4">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card bg-body-tertiary">
                        <div class="card-body p-5 shadow-sm text-center">
                            <h2 class="fw-bold mb-5">Regístrese Ahora</h2>

                            <form method="POST" action="{{ route('register') }}" class="row g-3">
                            @csrf
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="name">Nombres</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" />
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="last_name">Apellidos</label>
                                            <input type="text" id="last_name" name="last_name"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                value="{{ old('last_name') }}" />
                                            @error('last_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- User input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="user">Usuario</label>
                                    <input type="text" id="user" name="user"
                                        class="form-control @error('user') is-invalid @enderror"
                                        value="{{ old('user') }}" />
                                    @error('user')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Correo Electrónico</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Contraseña</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" />
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Confirm Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password_confirmation">Confirmar Contraseña</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror" />
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Registrarse
                                </button>

                                <!-- Submit login -->
                                <div class="d-flex align-items-center justify-content-center pb-4">
                                    <p class="mb-0 me-2">¿Ya tienes cuenta?</p>
                                    <a href="{{ route('login') }}" class="btn btn-outline-danger">Inicia Sesión</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg"
                        class="w-100 rounded-4 shadow-sm" alt="" />
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
