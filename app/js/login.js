// // ============sql============================

// Attach submit event listener to the form with id "FormLogin"
$("form#FormLogin").submit(function(e) {
  // Prevent default form submission
  e.preventDefault();

  // Get the values of the username and password fields
  let uname = $("#uname").val();
  let psw = $("#psw").val();

  // Validate if username field is empty
  if (uname.trim() === '') {
      // Display an alert message if username is empty
      alert('Veuillez entrer votre adresse mail.');
      // Return false to prevent further execution
      return false;
  }
  
  // Validate if password field is empty
  if (psw.trim() === '') {
      // Display an alert message if password is empty
      alert('Veuillez entrer votre password.');
      // Return false to prevent further execution
      return false;
  }

  // Make an AJAX request using jQuery
  $.ajax({
    // URL to which the request is sent
    url: 'app/models/login.php',
    // Type of request (POST)
    type: 'POST',
    // Data to be sent in the request
    data: {
      uname,
      psw
    },
    // Expected data type of the response
    dataType: 'json',
    // Function to be called if the request succeeds
    success: function(res) {
      // Check if the status in the response is true
      if (res.status) {
        // Display a success message using SweetAlert
        Swal.fire({
          title: 'Bravo',
          text: res.message,
          icon: 'success'
        }).then((result) => {
          // Redirect to another page if the user confirms
          if (result.isConfirmed) {
            window.location.href = "./?action=default";
          }
        });
      } else {
        // Display an error message using SweetAlert
        Swal.fire({
          title: 'Oops',
          text: res.message,
          icon: 'error'
        });
      }
    },
    // Function to be called if the request fails
    error: function() {
      // Display an error message using SweetAlert
      Swal.fire({
        title: 'Oops',
        text: 'Something went wrong. Please try again later.',
        icon: 'error'
      });
    }
  });
});


// // ===========================javascript==================================
// // Add event listener for form submission
// document.getElementById("FormLogin").addEventListener("submit", function(e) {
//   // Prevent default form submission
//   e.preventDefault();

//   // Get input values
//   let uname = document.getElementById("uname").value;
//   let psw = document.getElementById("psw").value;

//   // Validate input fields
//   if (uname.trim() === '') {
//     alert('Please enter your email address.');
//     return false;
//   }
  
//   if (psw.trim() === '') {
//     alert('Please enter your password.');
//     return false;
//   }

//   // Create FormData object to send form data
//   let formData = new FormData();
//   formData.append('uname', uname);
//   formData.append('psw', psw);

//   // Send AJAX request using fetch API
//   fetch('app/models/login.php', {
//     method: 'POST',
//     body: formData
//   })
//   .then(response => response.json())
//   .then(res => {
//     // Handle response from server
//     if (res.status) {
//       // If login successful, show success message and redirect
//       Swal.fire({
//         title: 'félicitations',
//         text: res.message,
//         icon: 'succès'
//       }).then((result) => {
//         if (result.isConfirmed) {
//           window.location.href = "./?action=default";
//         }
//       });
//     } else {
//       // If login failed, show error message
//       Swal.fire({
//         title: 'Oops',
//         text: res.message,
//         icon: 'erreur'
//       });
//     }
//   })
//   .catch(error => {
//     // Log and handle any errors that occur during request
//     console.error('Error:', error);
//   });
// });
