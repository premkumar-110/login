<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUVI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="style.scss"> <!-- You can link your custom style sheet here -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <div class="container">
        <div id="errorMessage" class="alert alert-danger d-none"></div>
    
            <div class="row top_border registerContainer" id="register">
                <div class="col">
                    <h3 class="text-center title" style="color:#6383FA;">REGISTER</h3>
                    <hr>
                    <form id="reg">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="username" class="form-label">
                                    Username
                                </label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"> <i class="bi bi-person"></i> </span>
                                    <input name="username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input name="dob" type="date" class="form-control" id="dob" name="dob">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="contact" class="form-label">Contact Details</label>
                                <textarea autocomplete="off" name="contact" style="resize: none;" type="textarea" class="form-control" id="contact" name="contact" placeholder="Enter your contact details"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">
                                        <span class="material-symbols-outlined">
                                            password
                                        </span>
                                    </span>
                                    <input id="regPass" name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">
                                    <span class="input-group-text" id="visibility-toggle">
                                        <span class="material-symbols-outlined " id="visibility-on" style="display: none;"> visibility</span>
                                        <span class="material-symbols-outlined " id="visibility-off">visibility_off</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row p-2 text-end">
                            <div class="col-md-12">
                                Already have an account? <a  id="showLoginLink" style="color: #0d6efd; cursor: pointer;" onClick="window.location.href='index.php'">Login</a>
                            </div>
                        </div>
                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        <button type="submit" class="btn w-100 btn-block register">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>