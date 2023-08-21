
$(document).ready(function () {
  const passwordInput = $("#regPass");
  const visibilityToggle = $("#visibility-toggle");
  const visibility_on = $("#visibility-on");
  const visibility_off = $("#visibility-off");

  visibilityToggle.click(function () {
     if (passwordInput.attr("type") === "password") {
        passwordInput.attr("type", "text");
        visibility_on.show();
        visibility_off.hide();
     } else {
        passwordInput.attr("type", "password");
        visibility_on.hide();
        visibility_off.show();
     }
  });

  const loginPasswordInput = $("#loginPass");
  const loginvisibilityToggle = $("#login-visibility-toggle");
  const loginvisibility_on = $("#login-visibility-on");
  const loginvisibility_off = $("#login-visibility-off");

  loginvisibilityToggle.click(function () {
     if (loginPasswordInput.attr("type") === "password") {
        loginPasswordInput.attr("type", "text");
        loginvisibility_on.show();
        loginvisibility_off.hide();
     } else {
        loginPasswordInput.attr("type", "password");
        loginvisibility_on.hide();
        loginvisibility_off.show();
     }
  });

  const profilePasswordInput = $("#profilePass");
  const profilevisibilityToggle = $("#profile-visibility-toggle");
  const profilevisibility_on = $("#profile-visibility-on");
  const profilevisibility_off = $("#profile-visibility-off");

  profilevisibilityToggle.click(function () {
     if (profilePasswordInput.attr("type") === "password") {
        profilePasswordInput.attr("type", "text");
        profilevisibility_on.show();
        profilevisibility_off.hide();
     } else {
        profilePasswordInput.attr("type", "password");
        profilevisibility_on.hide();
        profilevisibility_off.show();
     }
  });

  const newProfilePasswordInput = $("#newPass");
  const newProfilevisibilityToggle = $("#profile-new-visibility-toggle");
  const newProfilevisibility_on = $("#profile-new-visibility-on");
  const newProfilevisibility_off = $("#profile-new-visibility-off");

  newProfilevisibilityToggle.click(function () {
     if (newProfilePasswordInput.attr("type") === "password") {
        newProfilePasswordInput.attr("type", "text");
        newProfilevisibility_on.show();
        newProfilevisibility_off.hide();
     } else {
        newProfilePasswordInput.attr("type", "password");
        newProfilevisibility_on.hide();
        newProfilevisibility_off.show();
     }
  });

  $("#reg").submit(function (e) {
     e.preventDefault();console.log("Called")
     var formData = new FormData(this);
     formData.append("save_reg", true);

     $.ajax({
        type: "POST",
        url: "insert.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
           console.log(response);
           var res = jQuery.parseJSON(response);
           console.log(res);
           if (res.status == 422) {
            $("#errorMessage").text("All fields are mandatory");
            $("#errorMessage").removeClass("d-none");
           } else if (res.status == 200) {
            swal.fire({
               icon: 'success',
                               title: 'Success',
                               text: 'Registered Successful'
               }).then(function() {
                   window.location = "login.html";
               });
               
           } else if (res.status == 500) {
              $("#errorMessage").addClass("d-none");
              $("#reg")[0].reset();
              alertify.set("notifier", "position", "top-right");
              alertify.success(res.message);
           }
        },
     });
  });

  $("#log").submit(function (e) {
     e.preventDefault();

     var formData = new FormData(this);
     formData.append("save_login", true);

     $.ajax({
        type: "POST",
        url: "login.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
           console.log(response);
           var res = jQuery.parseJSON(response);
           console.log(res);

           if (res.status == 200) {
            swal.fire({
               icon: 'success',
                               title: 'Success',
                               text: 'Welcome to our Page'
               }).then(function() {
                   window.location = "profile.php";
               });
           } else if (res.status == 422) {
              $("#errorMessage").text(res.message);
              $("#errorMessage").removeClass("d-none");
           } else {
              $("#errorMessage").text("An error occurred. Please try again later.");
              $("#errorMessage").removeClass("d-none");
           }
        },
        error: function () {
           $("#errorMessage").text("An error occurred. Please try again later.");
           $("#errorMessage").removeClass("d-none");
        },
     });
  });
  $("#editForm").submit(function (e) {
    e.preventDefault();
    var newDOB = $("#dob").val();
    var newContact = $("#contact").val();
    var newPhone = $("#phone").val();
    var newfname = $("#fname").val();
    var newlname = $("#lname").val();

    var formData = new FormData();
    formData.append("new_dob", newDOB);
    formData.append("new_contact", newContact);
    formData.append("new_phone", newPhone);
    formData.append("new_fname", newfname);
    formData.append("new_lname", newlname);

    formData.append("save_changes", true);
    $.ajax({
        type: "POST",
        url: "update.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            var res = jQuery.parseJSON(response);
            console.log(res);

            if (res.status == 200) {
                

                alertify.set("notifier", "position", "top-right");
                alertify.success(res.message);

                // Hide the edit form after successful update
                $("#editCard").hide();

                setTimeout(function () {
                    alertify.dismissAll();
                }, 5000);
            } else {
               $("#errorMessage").text(res.message);
               $("#errorMessage").removeClass("d-none");
            }
        },
        error: function () {
            // Show error message
            alertify.error("An error occurred. Please try again later.");
        },
    });
});
$("#editPassForm").submit(function (e) {
   e.preventDefault();
   var oldPass = $("#profilePass").val();
   var newPass = $("#newPass").val();
   var newConfirmPass = $("#confirmnewPass").val();
   
   var formData = new FormData();
   formData.append("oldPass", oldPass);
   formData.append("newPass", newPass);
   formData.append("newConfirmPass", newConfirmPass);
   
   formData.append("save_changes", true);
   
   $.ajax({
       type: "POST",
       url: "updatepass.php",
       data: formData,
       processData: false,
       contentType: false,
       success: function (response) {
           try {
               var res = jQuery.parseJSON(response);
               console.log(res);
   
               if (res.status == 200) {
                   alertify.set("notifier", "position", "top-right");
                   alertify.success(res.message);
               } else {
                  alertify.set("notifier", "position", "top-right");
                   alertify.error(res.message);
               }
           } catch (error) {
               console.error("Error parsing JSON response:", error);
           }
       },
       error: function () {
           // Show error message
           alertify.error("An error occurred. Please try again later.");
       },
   });
});
// $("#changePhoto").submit(function (e) {
//    e.preventDefault(); // Prevent the form from submitting normally
//    alert("called"); // Debug statement to check if the event handler is triggered
   
//    var formData = new FormData();
//    formData.append("save_changes", true);
   
//    $.ajax({
//        type: "POST",
//        url: "updateimage.php",
//        data: formData, // Sending the form data
//        processData: false, // Important for sending FormData
//        contentType: false, // Important for sending FormData
//        success: function (response) {
//            try {
//                var res = jQuery.parseJSON(response); // Try to parse the response as JSON
//                console.log(res); // Log the parsed response
               
//                if (res.status == 200) {
//                    alertify.set("notifier", "position", "top-right");
//                    alertify.success(res.message);
//                } else {
//                    alertify.set("notifier", "position", "top-right");
//                    alertify.error(res.message);
//                }
//            } catch (error) {
//                console.error("Error parsing JSON response:", error);
//            }
//        },
//        error: function () {
//            // Show error message
//            alertify.error("An error occurred. Please try again later.");
//        },
//    });
// });

$("#logoutButton").click(function() {
   $.ajax({
       type: "POST",
       url: "logout.php", // Replace with the actual logout script
       success: function(response) {
           // Redirect to the login page after successful logout
           window.location.href = "index.php";
       },
       error: function() {
           console.error("Logout failed. Please try again later.");
       }
   });
});
$('#v-pills-tab a').on('click', function(e) {
   e.preventDefault();
   $(this).tab('show');
});
});
