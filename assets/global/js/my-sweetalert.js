function fireNotif(icon, pesan){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
        
    Toast.fire({
        icon: icon,
        title: pesan
    })
}

function fireProgresNofif(pesan){
    Swal.fire({
        width: '25rem',
        html: pesan,
        showConfirmButton: false,
    });
}