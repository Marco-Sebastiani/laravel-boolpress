require('./bootstrap');
import Swal from 'sweetalert2';

let elements = document.getElementsByClassName("delete-item");
for(let i = 0 ; i < elements.length; i++){
    elements[i].addEventListener('submit',function(e) {
        e.preventDefault();
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#e41e32',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.'
                );
                elements[i].submit();
            }
        })
    });
}

