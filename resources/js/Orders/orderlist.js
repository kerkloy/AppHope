

$('.ordDel').on('click', function(e) {
    e.preventDefault();

    var ordID = $(this).data('deld'); // Extract custID from data attribute

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
            axios.delete('/order/'+ ordID)
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

// Define the event handler function
function handleClick(event) {
    // Prevent default behavior of the click event
    event.preventDefault();

    var orderID = $(this).data('order-id');

    Swal.fire({
        title: "Item received?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, receive it!"
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post('/order/status/'+ orderID)
            .then(function (response) {
                // Handle success
                console.log(response.data);
                Swal.fire({
                    title: "Order Received!",
                    text: "Proceed to product list",
                    icon: "success"
                });
            })
            .catch(function (error) {
                // Handle error
                console.error(error);
            });
        } else {
            Swal.fire("Cancelled", "Your action was cancelled.", "info");
        }
    });
}

// Attach the event listener only to buttons that are not disabled
$(document).on('click', '.status:not([disabled])', handleClick);


// $('.status').on('click', function(e) {
//     e.preventDefault();

//     var orderID = $(this).data('order-id');

//     Swal.fire({
//         title: "Item recieved?",
//         text: "You won't be able to revert this!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#3085d6",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Yes, receive it!"
//     }).then((result) => {
//         if (result.isConfirmed) {
//             axios.post('/order/status/'+ orderID)
//             .then(function (response) {
//             // Handle success
//             console.log(response.data);
//             Swal.fire({
//                 title: "Order Recieved!",
//                 text: "Proceed to product list",
//                 icon: "success"
//             });
//             })
//             .catch(function (error) {
//                 // Handle error
//                 console.error(error);
//             });
//         } else {
//             Swal.fire("Cancelled", "Your action was cancelled.", "info");
//         }
//     });
//   });
