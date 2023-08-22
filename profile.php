<!-- <?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {
    include("config.php");
    $username = $_SESSION['login_user'];

    // Fetch user data from the database using the username
    $sql = "SELECT * FROM data WHERE email = '$username'";
    $result = mysqli_query($db, $sql);

    // Check if the query executed successfully
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $email = $row['email'];
            $pass = $row['pass'];
            $phone = $row['phone'];
            $dob = $row['dob'];
            $contact = $row['contact'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $image = $row['image'];

            // Calculate age from date of birth
            $dobDateTime = new DateTime($dob);
            $currentDateTime = new DateTime();
            $ageInterval = $currentDateTime->diff($dobDateTime);
            $age = $ageInterval->y;
        } else {
            echo "No user data found.";
        }
    } else {
        echo "Query failed: " . mysqli_error($db);
    }
} else {
    header("location: index.html"); 
    exit();
}
?> -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="profile.css" />
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
    <script src="profile.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    
  </head>
  <body>
    <!-- <div class="profile-container">
            <div class="profile-image">
                <img src="uploads/<?php echo $image; ?>" alt="User Image">
            </div>
            <div class="profile-details">
                <h2><?php echo $email; ?></h2>
                <p><strong>Phone:</strong> <?php echo $phone; ?></p>
                <p><strong>Date of Birth:</strong> <?php echo $dob; ?></p>
                <p><strong>Contact:</strong> <?php echo $contact; ?></p>
                <?php
                    // Calculate age from date of birth
                    $dobDateTime = new DateTime($dob);
                    $currentDateTime = new DateTime();
                    $ageInterval = $currentDateTime->diff($dobDateTime);
                    $age = $ageInterval->y;
                ?>
                <p><strong>Age:</strong> <?php echo $age; ?> years</p>
            </div>
        </div> -->
    <header>
      <p>Profile Page</p>
      <button id="logoutButton">LOGOUT</button>
    </header>
    <section class="py-5 my-5 profileContainer">
      <div class="container">
        <div class="bg-white shadow rounded-lg d-block d-sm-flex">
          <div class="profile-tab-nav border-right">
            <div class="p-4">
              <div class="img-circle text-center mb-3">
                <img src="uploads/<?php echo $image; ?>" alt="User Image" />
              </div>
              <h4 class="text-center">
                <?php echo $fname; ?>
                <?php echo $lname; ?>
              </h4>
            </div>
            <div
              class="nav flex-column nav-pills"
              id="v-pills-tab"
              role="tablist"
              aria-orientation="vertical"
            >
              <a
                class="nav-link active"
                id="account-tab"
                data-toggle="pill"
                href="#account"
                role="tab"
                aria-controls="account"
                aria-selected="true"
              >
                <i class="fa fa-home text-center mr-1"></i>
                Account
              </a>
              <!-- <a
                class="nav-link"
                id="profilePicture-tab"
                data-toggle="pill"
                href="#profilePicture"
                role="tab"
                aria-controls="dp"
                aria-selected="false"
              >
                <i class="fa fa-key text-center mr-1"></i>
                Change Profile
              </a> -->
              <a
                class="nav-link"
                id="password-tab"
                data-toggle="pill"
                href="#password"
                role="tab"
                aria-controls="password"
                aria-selected="false"
              >
                <i class="fa fa-key text-center mr-1"></i>
                Password
              </a>
            </div>
          </div>

          <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
            <div
              class="tab-pane fade show active"
              id="account"
              role="tabpanel"
              aria-labelledby="account-tab"
            >
              <h3 class="mb-4">Profile</h3>
              <form id="editForm">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>First Name</label>
                      <input
                        type="text"
                        class="form-control"
                        value="<?php echo $fname?>"
                        id="fname"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Last Name</label>
                      <input
                        type="text"
                        class="form-control"
                        value="<?php echo $lname?>"
                        id="lname"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input
                        type="text"
                        class="form-control"
                        value="<?php echo $email?>"
                        disabled
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Phone number</label>
                      <input
                        type="text"
                        class="form-control"
                        value="<?php echo $phone?>"
                        id="phone"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date of Birth</label>
                      <input
                        type="date"
                        class="form-control"
                        value="<?php echo $dob?>"
                        id="dob"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Age</label>
                      <?php
                                        // Calculate age from date of birth
                                        $dobDateTime = new DateTime($dob);
                                        $currentDateTime = new DateTime();
                                        $ageInterval = $currentDateTime->diff($dobDateTime);
                      $age = $ageInterval->y; ?>
                      <input
                        type="text"
                        class="form-control"
                        value="<?php echo $age?>"
                        disabled
                      />
                    </div>
                  </div>
                <!-- <div class="col-md-12">
                    <div class="form-group">
                      <label for="username" class="form-label"> Image </label>
                      <input
                        name="image"
                        class="form-control"
                        type="file"
                        id="formFile"
                      />
                    </div>
                  </div> -->
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Contact</label>
                      <textarea class="form-control" rows="2" id="contact"><?php echo $contact?></textarea>
                    </div>
                  </div>
                </div>
                <div>
                  <button type="submit" class="btn btnColor" id="editForm">
                    Update
                  </button>
                </div>
              </form>
            </div>
            <!-- <div
              class="tab-pane fade"
              id="profilePicture"
              role="tabpanel"
              aria-labelledby="profilePicture-tab"
            >
            
            <div class="image-upload">
                <input type="file" name="" id="logo" onchange="fileValue(this)" >
                <label for="logo" class="upload-field" id="file-label">
                    <div class="file-thumbnail">
                        <img id="image-preview" src="https://www.btklsby.go.id/images/placeholder/basic.png" alt="">
                        <h3 id="filename">
                            Drag and Drop
                        </h3>
                        <p >Supports JPG, PNG, SVG</p>
                    </div>
                </label>
            </div>



            </div> -->
            <div
              class="tab-pane fade"
              id="password"
              role="tabpanel"
              aria-labelledby="password-tab"
            >
              <h3 class="mb-4">Password</h3>
              <form id="editPassForm">
                <div class="row">
                  <div class="col-md-12">
                    <label for="password" class="form-label"
                      >OLD PASSWORD</label
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
                        id="profilePass"
                        name="password"
                        type="password"
                        class="form-control"
                        placeholder="Enter your Password"
                        aria-label="Password"
                        aria-describedby="addon-wrapping"
                      />
                      <span
                        class="input-group-text"
                        id="profile-visibility-toggle"
                      >
                        <span
                          class="material-symbols-outlined"
                          id="profile-visibility-on"
                          style="display: none"
                        >
                          <img
                            src="eye.svg"
                            width="25"
                            alt="Show Password"
                        /></span>
                        <span
                          class="material-symbols-outlined"
                          id="profile-visibility-off"
                          ><img
                            src="eyeSlash.svg"
                            width="25"
                            alt="Hide Password"
                        /></span>
                      </span>
                    </div>
                  </div>
                </div>
                <br />
                <div class="row">
                  <div class="col-md-12">
                    <label for="password" class="form-label"
                      >NEW PASSWORD</label
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
                        id="newPass"
                        name="password"
                        type="password"
                        class="form-control"
                        placeholder="Enter your new Password"
                        aria-label="Password"
                        aria-describedby="addon-wrapping"
                      />
                      <span
                        class="input-group-text"
                        id="profile-new-visibility-toggle"
                      >
                        <span
                          class="material-symbols-outlined"
                          id="profile-new-visibility-on"
                          style="display: none"
                        >
                          <img
                            src="eye.svg"
                            width="25"
                            alt="Show Password"
                        /></span>
                        <span
                          class="material-symbols-outlined"
                          id="profile-new-visibility-off"
                          ><img
                            src="eyeSlash.svg"
                            width="25"
                            alt="Hide Password"
                        /></span>
                      </span>
                    </div>
                  </div>
                </div>
                <br />
                <div class="row">
                  <div class="col-md-12">
                    <label for="password" class="form-label"
                      >CONFIRM NEW PASSWORD</label
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
                        id="confirmnewPass"
                        name="password"
                        type="password"
                        class="form-control"
                        placeholder="Confirm your new Password"
                        aria-label="Password"
                        aria-describedby="addon-wrapping"
                      />
                    </div>
                  </div>
                </div>
                <br />

                <div>
                  <button type="submit" class="btn btnColor">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="errorMessage" class="alert alert-warning d-none"></div>
    </section>
  </body>
</html>
