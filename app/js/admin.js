//==========================================get comment from user to page admin=======================
$(document).ready(function () {
  // AJAX request to fetch comments from the server
  $.ajax({
    url: "app/models/getCommentUserToAmin.php", // Server endpoint for fetching comments
    dataType: "json", // Data type expected from the server
    success: function (res) { // Callback function executed on successful response
      console.log(res); // Log the response for debugging
      if (res?.data?.length > 0) { // Check if comments data exists and is not empty
        $("#showComments").html(""); // Clear existing comments before appending new ones
        // Loop through each comment and generate HTML to display them
        res?.data?.forEach((value, index) => {
          let html = `
            <button type="button" onclick="deleteCommentUser(${value.comments_id})">delete</button> <!-- Button to delete comment -->
            <p>${value.texts}</p> <!-- Display comment text -->
          `;
          $("#showComments").append(html); // Append comment HTML to the designated element
        });
      }
    }
  });

  //==========================================get new from user to page admin=======================
  // AJAX request to fetch new articles from the server
  $.ajax({
    url: "app/models/getNewToAdmin.php", // Server endpoint for fetching new articles
    dataType: "json", // Data type expected from the server
    success: function (res) { // Callback function executed on successful response
      console.log(res); // Log the response for debugging
      if (res?.data?.length > 0) { // Check if new articles data exists and is not empty
        $("#showNew").html(""); // Clear existing new articles before appending new ones
        // Loop through each new article and generate HTML to display them
        res?.data?.forEach((value, index) => {
          let html = `
            <button type="button" onclick="deleteNew(${value.article_id})">delete</button> <!-- Button to delete new article -->
            <p>titles ${value.titles}</p> <!-- Display article title -->
            <p>description ${value.description}</p> <!-- Display article description -->
          `;
          $("#showNew").append(html); // Append article HTML to the designated element
        });
      }
    }
  });
});

//==========================================delete new=======================
// Function to delete a new article
function deleteNew(article_id) {
  $.ajax({
    url: 'app/models/deleteNew.php', // Server endpoint for deleting new article
    type: 'POST', // HTTP method
    data: {
      article_id: article_id // Data to be sent to the server
    },
    dataType: 'json', // Data type expected from the server
    success: function (res) { // Callback function executed on successful response
      if (res.status) { // Check if deletion was successful
        // Display success message using SweetAlert2 and reload the page
        Swal.fire({
          title: 'Bravo',
          text: res.message,
          icon: 'success'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload(); // Reload the page
          }
        });
      } else { // If deletion failed
        // Display error message using SweetAlert2
        Swal.fire({
          title: 'Erreur',
          text: res.message,
          icon: 'error'
        });
      }
    }
  });
}

// ==================================delete comment user===============================
// Function to delete a user comment
function deleteCommentUser(commentID) {
  $.ajax({
    url: 'app/models/deleteCommentUser.php', // Server endpoint for deleting user comment
    type: 'POST', // HTTP method
    data: {
      commentID: commentID // Data to be sent to the server
    },
    dataType: 'json', // Data type expected from the server
    success: function (res) { // Callback function executed on successful response
      if (res.status) { // Check if deletion was successful
        // Display success message using SweetAlert2 and reload the page
        Swal.fire({
          title: 'Bravo',
          text: res.message,
          icon: 'success'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload(); // Reload the page
          }
        });
      } else { // If deletion failed
        // Display error message using SweetAlert2
        Swal.fire({
          title: 'Erreur',
          text: res.message,
          icon: 'error'
        });
      }
    }
  });
}

// =====================================New add to database======================
// Form submission handler for adding a new article to the database
$("#forNew").submit(function (e) {
  e.preventDefault(); // Prevent default form submission behavior

  // Extract data from the form
  let description = $("#description").val();
  let titles = $("#titles").val();

  // AJAX request to add a new article to the database
  $.ajax({
    url: 'app/models/newToDataBase.php', // Server endpoint for adding new article
    type: 'POST', // HTTP method
    data: {
      description: description, // New article description
      titles: titles // New article title
    },
    dataType: 'json', // Data type expected from the server
    success: function (res) { // Callback function executed on successful response
      if (res.status) { // If addition was successful
        // Display success message using SweetAlert2 and reload the page after a short delay
        Swal.fire({
          title: 'Bravo',
          text: res.message,
          icon: 'success'
        }).then((result) => {
          if (result.isConfirmed) {
            $("#writeComments").val(""); // Clear input field
            setTimeout(function () {
              window.location.reload(); // Reload the page
            }, 1200);
          }
        });
      } else { // If addition failed
        // Display error message using SweetAlert2
        Swal.fire({
          title: 'Erreur',
          text: res.message,
          icon: 'error'
        });
      }
    }
  });
});
