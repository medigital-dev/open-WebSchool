function runDateNow() {
    var waktu = new Date();
    setTimeout("runDateNow()", 1000);
    let y = waktu.getFullYear();
    let mo = puluhan(waktu.getMonth() + 1);
    let d = puluhan(waktu.getDate());
    let h = puluhan(waktu.getHours());
    let m = puluhan(waktu.getMinutes());
    let s = puluhan(waktu.getSeconds());

    $('#date-header').text(d + "-" + mo + "-" + y + " " + h + ":" + m + ":" + s);
  }

  function puluhan(i) {
    if (i < 10) {
      i = "0" + i
    };
    return i;
  }

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