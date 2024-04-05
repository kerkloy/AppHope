$('#create').on('submit',function(e){
    e.preventDefault();

    var formData = $(this).serialize();

    // console.log(formData);

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

            axios.post('/supplier/',formData)
            .then(function(response) {
                var data = response.data;
                
                console.log(data);
                Swal.fire({
                    title: "Saved!",
                    text: data.success,
                    icon: "success"
                  })
                
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
   
        }
      });



    
});

$('#update').on('submit', function(e) {
  e.preventDefault();

  // Extract the customer ID from the element with the class 'custAdr'
  const id = $('.supCon').data('ids');

  // Serialize the form data
  const formData = $(this).serialize();

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
      axios.put('/supplier/' + id, formData)
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






