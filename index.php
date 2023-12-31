<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="login.css" />
    <link
      rel="stylesheet"
      href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"
    />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
  </head>
  <body>
    <div class="backgroundContainer">
      <div class="circle1"></div>
      <div class="circle2"></div>
      <div class="circle3"></div>
      <div class="circle4"></div>
    </div>
    <div class="logincontainer">
      <img
        src="login_vector.svg"
        alt="LoginVector"
        class="LoginVector"
      />
      <div class="details">
        <div class="title">
          <span>Welcome Back!</span>
          <p>Login to continue</p>
        </div>
        <hr />
        <div class="row top_border loginContainer" id="login">
          <div class="col">
            <form id="log">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                  <span class="input-group-text">
                    <img
                      src="mail.svg"
                      width="25"
                      alt="Username Icon"
                    />
                  </span>
                  <input
                    autocomplete="off"
                    name="email"
                    type="email"
                    class="form-control"
                    placeholder="Enter your Eamil..."
                    aria-label="Username"
                    aria-describedby="addon-wrapping"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                  <span class="input-group-text">
                    <img
                      src="password.svg"
                      width="25"
                      alt="Password Icon"
                    />
                  </span>
                  <input
                    id="loginPass"
                    name="password"
                    type="password"
                    class="form-control"
                    placeholder="Enter your Password"
                    aria-label="Password"
                    aria-describedby="addon-wrapping"
                  />
                  <span class="input-group-text" id="login-visibility-toggle">
                    <span
                      class="material-symbols-outlined"
                      id="login-visibility-on"
                      style="display: none"
                    >
                      <img
                        src="eye.svg"
                        width="25"
                        alt="Show Password"
                    /></span>
                    <span
                      class="material-symbols-outlined"
                      id="login-visibility-off"
                      ><img
                        src="eyeSlash.svg"
                        width="25"
                        alt="Hide Password"
                    /></span>
                  </span>
                </div>
              </div>
              <div class="text-end">
                <p>
                  Don't have an account?
                  <a
                    id="showRegisterLink"
                    style="color: #d5429b; cursor: pointer"
                    onClick="window.location.href='signup.php'"
                    >Create account</a
                  >
                </p>
              </div>
              <div id="errorMessage" class="alert alert-warning d-none"></div>
              <button type="submit" class="loginBtn">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
