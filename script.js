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

  $("#reg").submit(function (e) {
     e.preventDefault();
     alert("Called")
     var formData = new FormData(this);
     formData.append("save_reg", true);

     $.ajax({
        type: "POST",
        url: "https://login-flame.vercel.app/insert.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
           console.log(response);
           var res = jQuery.parseJSON(response);
           console.log(res);
           if (res.status == 422) {
              $("#errorMessage").addClass("d-none");
              $("#reg")[0].reset();
              alertify.set("notifier", "position", "top-right");
              alertify.success(res.message);
           } else if (res.status == 200) {
              $("#errorMessage").addClass("d-none");
              $("#reg")[0].reset();
              alertify.set("notifier", "position", "top-right");
              alertify.success(res.message);
              $("#user").load(location.href + " #user");
              setTimeout(function () {
                 alertify.dismissAll();
              }, 5000);

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
     alert("Called")
     var formData = new FormData(this);
     formData.append("save_login", true);

     $.ajax({
        type: "POST",
        url: "https://login-flame.vercel.app/login.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
           console.log(response);
           var res = jQuery.parseJSON(response);
           console.log(res);

           if (res.status == 200) {
              $("#errorMessage").addClass("d-none");
              $("#log")[0].reset();

              alertify.set("notifier", "position", "top-right");
              alertify.success(res.message);

              window.location.href = "profile.php";

              setTimeout(function () {
                 alertify.dismissAll();
              }, 5000);
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
    var newContact = $("#editContact").val();

    var formData = new FormData();
    formData.append("new_dob", newDOB);
    formData.append("new_contact", newContact);
    formData.append("save_changes", true);

    $.ajax({
        type: "POST",
        url: "https://login-flame.vercel.app/update.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            var res = jQuery.parseJSON(response);
            console.log(res);

            if (res.status == 200) {
                // Update the displayed data and show success message
                $("#dob").val(newDOB);
                $("#contact").val(newContact);

                alertify.set("notifier", "position", "top-right");
                alertify.success(res.message);

                // Hide the edit form after successful update
                $("#editCard").hide();

                setTimeout(function () {
                    alertify.dismissAll();
                }, 5000);
            } else {
                // Show error message
                alertify.error(res.message);
            }
        },
        error: function () {
            // Show error message
            alertify.error("An error occurred. Please try again later.");
        },
    });
});
$("#logoutButton").click(function() {
   $.ajax({
       type: "POST",
       url: "https://login-flame.vercel.app/logout.php", // Replace with the actual logout script
       success: function(response) {
           // Redirect to the login page after successful logout
           window.location.href = "index.php";
       },
       error: function() {
           console.error("Logout failed. Please try again later.");
       }
   });
});
});
