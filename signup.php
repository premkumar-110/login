<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="signup.css" />
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
          <span>Welcome to this site!</span>
          <p>Sign up to continue</p>
        </div>
        <hr />
        <div class="row top_border loginContainer" id="login">
          <div class="col">
            <form id="reg">
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="fname" class="form-label"> First Name </label>
                  <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"
                      ><img src="person.svg" width="25" />
                    </span>
                    <input
                      name="fname"
                      type="text"
                      class="form-control"
                      placeholder="Enter your First Name"
                      aria-label="Username"
                      aria-describedby="addon-wrapping"
                      autocomplete="off"
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="lname" class="form-label"> Last Name </label>
                  <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"
                      ><img src="person.svg" width="25" />
                    </span>
                    <input
                      name="lname"
                      type="text"
                      class="form-control"
                      placeholder="Enter your Last Name"
                      aria-label="Username"
                      aria-describedby="addon-wrapping"
                      autocomplete="off"
                    />
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="email" class="form-label"> Email </label>
                  <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"
                      ><img src="mail.svg" width="25" />
                    </span>
                    <input
                      name="email"
                      type="text"
                      class="form-control"
                      placeholder="Enter the Email"
                      aria-label="Username"
                      aria-describedby="addon-wrapping"
                      autocomplete="off"
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="dob" class="form-label">Date of Birth</label>
                  <input
                    name="dob"
                    type="date"
                    class="form-control"
                    id="dob"
                    name="dob"
                  />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="username" class="form-label"> Image </label>
                  <input
                    name="image"
                    class="form-control"
                    type="file"
                    id="formFile"
                  />
                </div>
                <div class="col-md-6">
                  <label for="phone" class="form-label"> Phone Number </label>
                  <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"
                      ><img src="phone.svg" width="25" />
                    </span>
                    <input
                      name="phone"
                      type="text"
                      class="form-control"
                      placeholder="Enter your Phone Number"
                      aria-label="Username"
                      aria-describedby="addon-wrapping"
                      autocomplete="off"
                    />
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-12">
                  <label for="contact" class="form-label">
                    Contact Details</label
                  >
                  <textarea
                    autocomplete="off"
                    name="contact"
                    style="resize: none"
                    type="textarea"
                    class="form-control"
                    id="contact"
                    name="contact"
                    placeholder="Enter your contact details"
                  ></textarea>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
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
                <div class="col-md-6">
                  <label for="Confirmpassword" class="form-label"
                    >Confirm Password</label
                  >
                  <div class="input-group">
                    <span class="input-group-text">
                      <img
                        src="password.svg"
                        width="25"
                        alt="Password Icon"
                      />
                    </span>
                    <input
                      id="loginConfirmpassword"
                      name="password"
                      type="password"
                      class="form-control"
                      placeholder="Confirm your Password"
                      aria-label="Password"
                      aria-describedby="addon-wrapping"
                    />
                  </div>
                </div>
              </div>

              <div class="row p-2 text-end">
                <div class="col-md-12">
                  Already have an account?
                  <a
                    id="showLoginLink"
                    style="color: #d5429b; cursor: pointer"
                    onClick="window.location.href='index.php'"
                    >Login</a
                  >
                </div>
              </div>

              <div id="errorMessage" class="alert alert-warning d-none"></div>
              <button type="submit" class="loginBtn">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
