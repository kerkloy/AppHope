
$('.prodDel').on('click', function(e) {
    e.preventDefault();

    var prodID = $(this).data('deld'); // Extract custID from data attribute

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
            axios.delete('/product/'+ prodID)
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


$('.purchaseBtn').on('click', function(e) {
    e.preventDefault();

    var productId = $(this).data('item');
    var Id = $(this).data('prodid');

    if (productId == 0) {
        Swal.fire({
            title: 'Out of stocks!',
            text: 'Cannot process your purchase. Order more stocks!',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    } else {
        axios.get('/sale/' + Id)
            .then(function(response) {
                // Handle successful response
                console.log(response.data);
                // Redirect to the sale page
                window.location.href = '/sale/' + Id;
            })
            .catch(function(error) {
                // Handle error
                console.error(error);
                Swal.fire({
                    title: 'Error',
                    text: 'Failed to process sale. Please try again later.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
    }
});
