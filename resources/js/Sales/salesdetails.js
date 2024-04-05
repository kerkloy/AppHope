$('.soldQty').on('input', function() {
    updateTotalSales();
  });

  function updateTotalSales() {
      var price = parseFloat($('.sPrice').val()) || 0;
      var quantity = parseFloat($('.soldQty').val()) || 0;

      var total = price * quantity;
      $('.tPrice').val(total.toFixed(2)); // Display total with 2 decimal places
  }

$('#salesForm').on('submit',function(e){
    e.preventDefault();

    var formData = $(this).serialize();

    console.log(formData);

    let quan = $('.quantity2').data('quan');
    let typequan = $("#qtySold").val();


            Swal.fire({
                title: "Checkout?",
                text: "Are you sure you want to checkout?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, proceed!"
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    axios.post('/sale/purchase', formData)
            .then(function (response) {
                var data = response.data;
                
                if (data.hasOwnProperty('error')) {
                    // If the response contains an error message, display it
                    Swal.fire({
                        title: "Error!",
                        text: data.error,
                        icon: "error"
                    });
                } else {
                    // Otherwise, display success message
                    Swal.fire({
                        title: "Saved!",
                        text: data.success,
                        icon: "success"
                    });
                }
            })
            .catch(function (error) {
                // Display generic error message if request fails
                console.error('Error:', error);
                Swal.fire({
                    title: "Error!",
                    text: "An unexpected error occurred.",
                    icon: "error"
                });
            });
        }
    });
});

//   $('#salesForm').on('submit',function(e){
//     e.preventDefault();

//     var formData = $(this).serialize();

//     // console.log(formData);

//     let quan = $('.quantity2').data('quan');
//     let typequan = $("#qtySold").val();


//     Swal.fire({
//         title: "Checkout?",
//         text: "Are you sure you want to checkout?",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#3085d6",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Yes, proceed!"
//       }).then((result) => {
//         if (result.isConfirmed) {

//             if(quan >typequan ){
//                 console.log('taas');
//             }   else{
//             axios.post('/sale/purchase',formData)
//             .then(function(response) {
//                 var data = response.data;


//                 // console.log(data);
//                 Swal.fire({
//                     title: "Saved!",
//                     text: data.success,
//                     icon: "success"
//                   })
                
//             })
//             .catch(function(error) {
//                 console.error('Error:', error);
//             });
//             }
            
         
   
//         }
//       });
// });





// $(document).ready(function(){
//     let quan = $('.quantity2').data('quan');
//     let typequan = $(".soldQty").val();

  


//     $('.btnCheck').on('click',function(){
//         console.log(quan  + " " + typequan);
//         if(quan > typequan){
//             alert('tass kaayu');
//         }else{
//             alert('save')
//         }
//     });
// })


