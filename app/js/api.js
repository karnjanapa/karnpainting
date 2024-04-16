// When the document is ready, execute the following code
$(document).ready(function () {
  // Make an AJAX request to the specified URL
  $.ajax({
    // URL of the API endpoint to fetch data from
    url: "https://data.culture.gouv.fr/api/explore/v2.1/catalog/datasets/musees-de-france-base-museofile/records?limit=20&refine=region%3A%22Bretagne%22",
    // HTTP method (GET in this case)
    type: "GET",
    // Expected data type of the response
    dataType: "json",
    // Function to be executed if the request succeeds
    success: function (res) {
      // Log the response object to the console
      console.log(res);
      
      // Check if the 'results' property of the response object exists and has a length greater than 0
      if (res?.results?.length > 0) {
        // Clear the HTML content of the element with id 'apiData'
        $("#apiData").html("");
        
        // Loop through each item in the 'results' array of the response
        res?.results?.forEach((value, index) => {
          // Generate HTML markup for a table row with data from the current item
          let html = `
            <tr>
              <td scope="row">${index + 1}</td>
              <td>${value.departement}</td>
              <td>${value.nom_officiel}</td>
              <td>${value.adresse}</td>
            </tr>
          `;
          
          // Append the generated HTML to the element with id 'apiData'
          $("#apiData").append(html);
        });
      }
    }
  });
});
