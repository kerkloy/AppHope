$('.saveProd').on('click', function(e) {
  e.preventDefault();

  const id = $(this).data('savep');
  // Serialize the form data
  const formData = $('#updateForm').serialize();

  console.log(formData);

  // Prompt the user for confirmation
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, save it!"
  }).then((result) => {
    if (result.isConfirmed) {
      // Send a PUT request with the updated data
      axios.put('/product/' + id, formData)
        .then(function(response) {
          var data = response.data;
          console.log(data);
          // Display success message
          Swal.fire({
            title: "Saved!",
            text: data.success,
            icon: "success"
          });
        })
        .catch(function(error) {
          console.error('Error:', error);
          // Display error message
          Swal.fire({
            title: "Error!",
            text: "An error occurred while updating.",
            icon: "error"
          });
        });
    }
  });
});

$('.btnCancel').on('click', function(e) {
  e.preventDefault();

  Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, cancel it!"
  }).then((result) => {
      if (result.isConfirmed) {
          axios.get('/customer')
              .then(() => {
                  Swal.fire("Cancelled!", "", "success");
              })
              .catch(error => {
                  console.error('Error:', error);
                  Swal.fire("Error", "An error occurred while cancelling.", "error");
              });
      } else {
          Swal.fire("Cancelled", "Your action was not cancelled.", "info");
      }
  });
});









