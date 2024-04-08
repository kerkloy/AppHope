document.addEventListener('DOMContentLoaded', function() {

$('.purchDel').on('click', function(e) {
    e.preventDefault();

    var saleID = $(this).data('deld'); // Extract custID from data attribute


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
            axios.delete('/sale/'+ saleID)
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


// Get all buttons with class "printReceipt" from all rows
const buttons = document.querySelectorAll('.printReciept');
console.log(buttons);
// Loop through each button and add event listener
buttons.forEach(button => {
  button.addEventListener('click', function() {
    // Handle the click event here, for example:
    //const receiptName = this.parentNode.previousElementSibling.textContent;

    var spID = $(this).data('print');

        axios.get('/sale/print/' + spID) 
        .then(response => {
            // Handle the response data here
            const saleData = response.data;
            // Call the function to print receipt with saleData
            printReceipt(saleData);
        })
        .catch(error => {
            console.error('Error fetching sale data:', error);
        });
  });
});
function printReceipt(data) {
    console.log(data);

    // document.getElementById().removeAttribute
    document.getElementById('pname').textContent = data.sale.prodName;
    document.getElementById('pbrand').textContent = data.sale.prodBrand;
    document.getElementById('ptype').textContent = data.sale.prodType;
    document.getElementById('pprice').textContent = data.sale.prodSPrice;
    document.getElementById('psold').textContent = data.sale.qtySold;
    document.getElementById('psales').textContent = data.sale.totalSales;
    document.getElementById('cname').textContent = data.sale.custName;
    document.getElementById('sdate').textContent = data.sale.soldDate;
    document.getElementById('transNo').textContent = data.sale.transaction_number;
 window.print();
}

});



