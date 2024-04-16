$(document).ready(function () {
  // Execute when the document (DOM) is ready
  
  // AJAX request to fetch articles data
  $.ajax({
    url: "app/models/articlesNew.php", // Endpoint URL
    dataType: "json", // Expected data type of the response
    success: function (res) { // Callback function executed upon successful response
      console.log(res); // Log the response to the console for debugging
      
      if (res?.data?.length > 0) { // Check if data array exists and has items
  
        $("#listArticlesNewFromAdmin").html(""); // Clear the HTML content of the target element
  
        // Loop through each item in the data array
        res?.data?.forEach((value, index) => {
          // Generate HTML markup for each article using the retrieved data
          let html = `
            <h2>${value.titles}</h2>
            <br><br>
            <p>${value.description}</p>
          `;
          // Append the HTML markup to the target element
          $("#listArticlesNewFromAdmin").append(html);
        });
      }
    }
  });
});
