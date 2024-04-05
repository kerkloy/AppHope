$('.custDel').on('click', function(e) {
    e.preventDefault();

    var custID = $(this).data('deld'); // Extract custID from data attribute

    // var url = 'customer/'+custID; // Construct the URL

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete('/customer/'+ custID)
                .then(function(response) {
                    var data = response.data;
                    console.log(data); // Log the response data
                    Swal.fire({
                        title: "Deleted!",
                        text: data.success,
                        icon: "success"
                    });
                })
                .catch(function(error) {
                    console.error('Error:', error);
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting.",
                        icon: "error"
                    });
                });
        }
    });
});
