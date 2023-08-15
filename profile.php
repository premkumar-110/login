<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE) {
    include("config.php");
    $username = $_SESSION['login_user'];

    // Fetch user data from the database using the username
    $sql = "SELECT * FROM data WHERE uname = '$username'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    $dob = $row['dob'];
    $contact = $row['contact'];

    // Calculate age from date of birth
    $dobDateTime = new DateTime($dob);
    $currentDateTime = new DateTime();
    $ageInterval = $currentDateTime->diff($dobDateTime);
    $age = $ageInterval->y;
} else {
    header("location: index.html"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://login-flame.vercel.app/style.css"> <!-- You can link your custom style sheet here -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://login-flame.vercel.app/profile.js"></script>
    <script src="https://login-flame.vercel.app/script.js"></script>
    <style>
       .navbar{
  position: absolute;
  top: 0;
  width: 100%;
  height: auto;
  padding: 1rem;
  display: flex;
  align-items: center;
  justify-content: flex-end;
}
.navbar button{
  padding: .4rem;
  border: #6383fa 1px solid;
  border-radius: .3rem;
  color: #6383fa;
  background-color: white;
}
        </style>
</head>
<body>

    <div class="profilecontainer">
        <div class="navbar">
        <div>
            <button id="logoutButton">Logout</button>
        </div>
    </div>

        <div class="card ">
            <div class="card-header">
                <h4><b>User Profile</b></h4> <button  onclick="toggleEditCard('DOB')" type="button" class="btn btn-outline-primary editBtn"><span class="material-symbols-outlined" tooltip="Edit your DOB">edit</span>Edit</button>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Username</th>
                        <td><?php echo $username; ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td><?php echo $dob; ?></td>
                        
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><?php echo $age; ?></td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td><?php echo $contact; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        
       <!-- ... Other parts of your HTML ... -->

        <div class="card mt-3" id="editCard" style="display: none;">
            <div class="card-header text-center">
                <h3><b>Edit Profile</b></h3>
            </div>
            <div class="card-body">
                <form id="editForm">
                <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="username" class="form-label">
                                Username
                            </label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"> <i class="bi bi-person"></i> </span>
                                <input name="username" type="text" class="form-control"  aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $username; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input name="dob" type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-20">
                            <label for="contact" class="form-label">Contact Details</label>
                            <textarea style="resize: none;" class="form-control" id="editContact" name="editContact" placeholder="Enter your contact details"><?php echo $contact; ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>

<!-- ... Rest of your HTML ... -->

    </div>
</body>
</html>
