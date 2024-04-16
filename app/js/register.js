// This code snippet is a JavaScript function that handles form submission using jQuery.
// It listens for the submission event of a form with the ID "FormRegister".
$("#FormRegister").submit(function(e) {
  // Prevents the default form submission behavior, which would cause a page refresh.
  e.preventDefault();

  // Extracting values from input fields.
  let name = $("#name").val();
  let email = $("#email").val();
  let psw = $("#psw").val();

  // Validation checks for empty input fields.
  if (name.trim() === '') {
      alert('Veuillez entrer votre prénom et nom.');
      return false;
  }
  if (email.trim() === '') {
      alert('Veuillez entrer votre adresse mail.');
      return false;
  }
  if (psw.trim() === '') {
      alert('Veuillez entrer votre password.');
      return false;
  }

  // Making an AJAX request to the backend.
  $.ajax({
      url: 'app/models/register.php', // URL of the backend PHP script
      type: 'POST', // HTTP method used for the request
      data: { // Data to be sent to the backend
          name: name,
          email: email,
          psw: psw
      },
      dataType: 'json', // Expected data type of the response from the server
      success: function(res) { // Callback function to handle the response
          // If registration is successful, show a success message and redirect to the login page.
          if (res.status) {
              Swal.fire({
                  title: 'Bravo',
                  text: res.message,
                  icon: 'success'
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = "./?action=login";
                  }
              });
          } else { // If registration fails, show an error message.
              Swal.fire({
                  title: 'Erreur',
                  text: res.message,
                  icon: 'error'
              });
          }
      }
  });
});



// // ==========================javascript===========================================
// // Attach submit event listener to the form with id "FormRegister"
// document.getElementById("FormRegister").addEventListener("submit", function(e) {
//   // Prevent default form submission
//   e.preventDefault();

//   // Get values of name, email, and password fields
//   let name = document.getElementById("name").value;
//   let email = document.getElementById("email").value;
//   let psw = document.getElementById("psw").value;

//   // Validate if name field is empty
//   if (name.trim() === '') {
//     alert('Veuillez entrer votre prénom et nom.');
//     return false;
//   }

//   // Validate if email field is empty
//   if (email.trim() === '') {
//     alert('Veuillez entrer votre adresse mail.');
//     return false;
//   }

//   // Validate if password field is empty
//   if (psw.trim() === '') {
//     alert('Veuillez entrer votre password.');
//     return false;
//   }

//   // Create FormData object to send form data
//   let formData = new FormData();
//   formData.append('name', name);
//   formData.append('email', email);
//   formData.append('psw', psw);

//   // Send AJAX request using Fetch API
//   fetch('app/models/register.php', {
//     method: 'POST',
//     body: formData
//   })
//   .then(response => response.json()) // Parse response as JSON
//   .then(res => {
//     // Check if registration was successful
//     if (res.status) {
//       // Display success message using SweetAlert
//       Swal.fire({
//         title: 'Bravo',
//         text: res.message,
//         icon: 'succès'
//       }).then((result) => {
//         // Redirect to login page if user confirms
//         if (result.isConfirmed) {
//           window.location.href = "./?action=login";
//         }
//       });
//     } else {
//       // Display error message using SweetAlert if registration failed
//       Swal.fire({
//         title: 'Erreur',
//         text: res.message,
//         icon: 'Erreur'
//       });
//     }
//   })
//   .catch(error => {
//     // Log and handle any errors that occur during request
//     console.error('Error:', error);
//   });
// });