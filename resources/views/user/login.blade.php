<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Login and Registration Form in HTML & CSS | CodingLab</title>
    <link rel="stylesheet" href="{{asset('assets/style.css')}}" />
    <!-- Fontawesome CDN Link -->
    <link
      rel="stylesheet"
      <!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

  
    <link
    
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      .bg-image-vertical {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: right center;
        background-size: auto 100%;
      }

      @media (min-width: 1025px) {
        .h-custom-2 {
          height: 100%;
        }
      }
      .login-image {
  width: 90%;
  height: 70vh;
  object-fit: cover;
  object-position: left;
}
 .eye-icon {
        position: absolute;
        top: 30%;
        transform: translateY(-50%);
        right: 10px; /* Adjust as needed */
        cursor: pointer;
    }
    </style>
  </head>

  <body>
 

<section class="vh-100">
  <div class="container-fluid mt-6 pt-5">
    <div class="row">
      <div class="col-sm-6 text-black">
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 pt-xl-0 mt-xl-n5">
      
          <form action="{{ route('login.submit') }}" method="POST" style="width: 25rem; ml-4">
            @csrf
           
            <h1 style="width:30rem" class="fw-normal mb-3" style="letter-spacing: 1px">
              Welcome To Warehouse Management Portal
            </h1>
       @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong></strong> Invalid email or password
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

            <div data-mdb-input-init class="form-outline mb-4">
              <input type="email" id="form2Example18" class="form-control form-control-lg" name="email" required />
              <label class="form-label" for="form2Example18">Email address</label>
            </div>
       <div data-mdb-input-init class="form-outline mb-4 position-relative">
    <input type="password" id="form2Example28" class="form-control form-control-lg" name="password" required />
    <label class="form-label" for="form2Example28">Password</label>
    <i id="togglePassword" class="bi bi-eye-slash eye-icon text-dark"></i>
</div>

            <div class="pt-1 mb-4">
              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block" type="submit" style="background-color: #F3BD00; width: 15rem">
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
    
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="/assets/images/domvan.jpeg" alt="Login image" class="login-image">
      </div>
    </div>
  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('form2Example28');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
</script>

  </body>
</html>
