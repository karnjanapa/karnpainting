$(document).ready(function () {
  // AJAX request to retrieve comments
  $.ajax({
    url: "app/models/getCommentsUser.php",
    dataType: "json",
    success: function (res) {
      console.log(res)
      if (res?.data?.length > 0) {
        // If comments exist, clear the HTML element first
        $("#showComments").html("")
        // Iterate through each comment in the response
        res?.data?.forEach((value,index) => {
          // Generate HTML for each comment and append to the designated element
          let html = `
          <p>${value.texts}</p>
          `;
          $("#showComments").append(html)
        });
      }
    }
  });

  // Form submission handling
  $("#commentUser").submit(function(e) {
    e.preventDefault();
    let Comments = $("#writeComments").val();

    // Validation: Check if the comment is empty
    if (Comments.trim() === '') {
      alert('Veuillez entrer votre prénom et nom.'); // Display an alert if the comment is empty
      return false;
    }

    // AJAX request to submit the comment
    $.ajax({
      url: 'app/models/guestBook.php',
      type: 'POST',
      data: {
        Comments: Comments,
      },
      dataType: 'json',
      success: function(res) {
        if (res.status) {
          // If submission is successful, display a success message using SweetAlert
          Swal.fire({
            title: 'Bravo',
            text: res.message,
            icon: 'success'
          }).then((result) => {
            if (result.isConfirmed) {
              // Clear the comment input field
              $("#writeComments").val("");
              // Reload the page after a short delay
              setTimeout(function(){
                window.location.reload()
              },1200)
            }
          });
        } else {
          // If submission is unsuccessful, display an error message using SweetAlert
          Swal.fire({
            title: 'Erreur',
            text: res.message,
            icon: 'error'
          });
        }
      }
    });
  });
});

// //  ==========================principle one ===================================
// // Attach submit event listener to the form with id "FormRegister"
// document.getElementById("commentUser").addEventListener("submit", function(e) {
//   // Prevent default form submission
//   e.preventDefault();

//   // Get values of name, email, and password fields
//   let name = document.getElementById("writeComments").value;

//   // Validate if name field is empty
//   if (name.trim() === '') {
//     alert('Veuillez entrer votre comments.');
//     return false;
//   }


//   // Create FormData object to send form data
//   let formData = new FormData();
//   formData.append('name', texts );
 

//   // Send AJAX request using Fetch API
//   fetch('app/models/guestBook.php', {
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
//         icon: 'success'
//       }).then((result) => {
//         // Redirect to login page if user confirms
//         if (result.isConfirmed) {
//           window.location.href = "./?action=guestBook";
//         }
//       });
//     } else {
//       // Display error message using SweetAlert if registration failed
//       Swal.fire({
//         title: 'Erreur',
//         text: res.message,
//         icon: 'error'
//       });
//     }
//   })
//   .catch(error => {
//     // Log and handle any errors that occur during request
//     console.error('Error:', error);
//   });
// });


// // ===========================================principle two=============================================

// // Attach submit event listener to the form with id "commentUser"
// document.getElementById("commentUser").addEventListener("submit", function(e) {
//     // Prevent default form submission
//     e.preventDefault();
  
//     // Get value of the comment input field
//     let comment = document.getElementById("writeComments").value;
  
//     // Validate if comment field is empty
//     if (comment.trim() === '') {
//       alert('Veuillez entrer votre commentaire.');
//       return false;
//     }
  
//     // Create FormData object to send form data
//     let formData = new FormData();
//     formData.append('comment', comment);
  
//     // Send AJAX request using Fetch API to submit the comment
//     fetch('app/models/guestBook.php', {
//       method: 'POST',
//       body: formData
//     })
//     .then(response => response.json()) // Parse response as JSON
//     .then(res => {
//       // Check if comment submission was successful
//       if (res.status) {
//         // Display success message using SweetAlert
//         Swal.fire({
//           title: 'Bravo',
//           text: res.message,
//           icon: 'success'
//         }).then((result) => {
//           // Redirect to guest book page if user confirms
//           if (result.isConfirmed) {
//             window.location.href = "./?action=guestBook";
//           }
//         });
//       } else {
//         // Display error message using SweetAlert if comment submission failed
//         Swal.fire({
//           title: 'Erreur',
//           text: res.message,
//           icon: 'error'
//         });
//       }
//     })
//     .catch(error => {
//       // Log and handle any errors that occur during request
//       console.error('Error:', error);
//     });
//   });
  
//   // Function to load comments from database and display them in the "showComments" div
//   function loadComments() {
//     // Send AJAX request to retrieve comments from the database
//     fetch('app/models/guestBook.php')
//     .then(response => response.json()) // Parse response as JSON
//     .then(data => {
//       // Clear existing comments in the "showComments" div
//       document.getElementById("showComments").innerHTML = '';
  
//       // Iterate through the comments and append them to the "showComments" div
//       data.forEach(comment => {
//         // Create a new <p> element for each comment
//         let paragraph = document.createElement("p");
//         // Set the text content of the <p> element to the comment
//         paragraph.textContent = comment.text;
//         // Append the <p> element to the "showComments" div
//         document.getElementById("showComments").appendChild(paragraph);
//       });
//     })
//     .catch(error => {
//       // Log and handle any errors that occur during request
//       console.error('Error:', error);
//     });
//   }
  
//   // Call the loadComments function when the page loads to display existing comments
//   window.addEventListener('load', loadComments);
  