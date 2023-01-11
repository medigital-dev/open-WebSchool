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

function system() {
  if ($('#customFileName').is(':checked')) {
      $('#filename').attr('readonly', false);
  } else {
      $('#filename').attr('readonly', true);
  }
  $('#customFileName').click(function() {
      if ($(this).is(':checked')) {
          $('#customFileNameLabel').text('Aktif');
          $('#filename').attr('readonly', false);
      } else {
          $('#customFileNameLabel').text('Tidak Aktif');
          $('#filename').attr('readonly', true).val('');
      }
  });
  $('#simpanUploadConfig').click(function(e) {
      e.preventDefault();
      if ($('#customFileName').is(':checked')) {
          if ($('#filename').val() == '') {
              $('#filename').addClass('is-invalid');
              return;
          }
      }
      $('#form').submit();
  })

  $('#textareaBgColor').on('change', function() {
      const bgcolor = $(this).val();
      $('#one').css('background-color', bgcolor);
  })

  summernote();

  Sortable.create(sortable, {
      handle: '.handle',
      ghostClass: 'bg-info',
      animation: 150
  });
}

function dashboard() {
  table();
}

function komentar() {
  table();
  deleteThis();
}

function pesan() {
  table();
  deleteThis();
}

function daftarpost() {
  table();
  deleteThis();
}

function deleteThis() {
  $('.deleteThis').click(function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Data akan dihapus permanen!",
          icon: 'warning',
          showCancelButton: true,
          cancelButtonText: 'Batal',
          confirmButtonColor: '#d33',
          cancelButtonColor: '#616A6B',
          confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
          if (result.isConfirmed) {
              document.location.href = href;
          }
      })
  });
}

function table() {
  $('table.display').DataTable({
      "responsive": true,
      "lengthMenu": [
          [5, 10, 25, 50, -1],
          [5, 10, 25, 50, "All"]
      ],
      "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
      }
  });
}

function editPost() {
  summernote();
}

function media() {
  bsCustomFileInput.init();
  table();
  deleteThis();

  const message = $('#flash-message').data('flashdata');
  const split = message.split('|');
  if (split[0] == 'error') {
      $('#file').addClass('is-invalid').focus();
  }

  $('#file').change(function(e) {
      var fileName = e.target.files[0].name;
      var output = fileName.split('.');
      var end = output.length - 1;
      var ext = output[end];
      var indexFileName = fileName.indexOf('.' + ext);
      var fileNameWExt = fileName.substr(0, indexFileName);

      $('#ext').val('.' + ext);
      $('#basic-filename').text('.' + ext);
      $('#filename').val(fileNameWExt).prop('readonly', false);
      $('#title').val(fileName).prop('readonly', false);
      $('#alt').prop('readonly', false);
  });

  $('#simpan').click(function(e) {
      e.preventDefault();

      Swal.fire({
          title: 'Memproses data...',
          icon: 'info',
          html: '<div class="spinner-border p-3 m-2 text-primary" role="status">' +
              '<span class="sr-only">Loading...</span>' +
              '</div>',
          showConfirmButton: false
      });

      $('#form').submit();
  });

  function progressHandlingFunction(e) {
      if (e.lengthComputable) {
          let ukuran = e.total / 1024;
          let upload = e.loaded / 1024;
          let progres = e.loaded / e.total * 100;

          // $('.progress-bar').addClass('width', progres.toFixed() + '%');
          $('.progress-bar').css('width', progres.toFixed() + '%').text(progres.toFixed() + '%');
          $('.proses').text(upload.toFixed() + ' Kb / ' + ukuran.toFixed() + ' Kb');

          //Reset progress on complete
          if (e.loaded === e.total) {
              fireNotif('success', 'Upload selesai');
          }
      }
  }

  $('.btn-edit').click(function() {
      const data = $(this).data('file');
      const split = data.split('|');
      var tipe;
      const fullFileName = split[4];
      const splitFullFileName = split[4].split('.');
      const indexExt = splitFullFileName.length - 1;
      const ext = '.' + splitFullFileName[indexExt];
      const indexFilename = fullFileName.indexOf(ext);
      const filename = fullFileName.substr(0, indexFilename);
      const tipeFile = split[3];
      const fileFileSplit = tipeFile.split('/');

      if (fileFileSplit[0] == 'application' || fileFileSplit[0] == '') {
          tipe = 'document';
      } else {
          tipe = fileFileSplit[0];
      }

      $('#id').val(split[0]);
      $('#title').attr('readonly', false).val(split[1]);
      $('#hrefOld').val(split[2]);
      $('#type').val(tipe);
      $('#filename').attr('readonly', false).val(filename);
      $('#basic-filename').text(ext);
      $('#ext').val(ext);
      $('#alt').attr('readonly', false).val(split[5]);
      $('#judul').text('Edit media');
      $('.custom-file').css('display', 'none');
      $('#simpan').text('Simpan');
  });

  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
  });
}

function copyLink(data) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($('#href' + data).text()).select();
  document.execCommand("copy");
  $temp.remove();

  fireNotif('info', 'Url berhasil dicopy ke clipboard!');
}

function user() {
  table();
  deleteThis();
  const level = $('#data-level').data('flashdata');
  if (level != 'root') {
      $("#formTag :input").prop("disabled", true);
  }

  $('#showPassword').click(function() {
      if ($(this).is(':checked')) {
          $('.form-password').attr('type', 'text');
      } else {
          $('.form-password').attr('type', 'password');
      }
  });
}

function resetFormUser() {
  $('#formTag').trigger('reset');
  $('.passInfo').text('');
}

function editUser(id) {
  $('#formTag :input').prop('disabled', false);
  $('#formTag').attr('action', '<?= base_url("admin/setUser"); ?>');
  $('.passInfo').text('Isi bila ingin mengganti password');

  var out = new FormData();
  out.append('id', id);
  $.ajax({
      url: '<?= base_url("admin/getUserById") ?>',
      cache: false,
      contentType: false,
      processData: false,
      data: out,
      type: "POST",
      success: function(response) {
          var string = response.split('|');
          $('#idUser').val(string[0]);
          $('#nama').val(string[1]);
          $('#email').val(string[2]);
          $('#telepon').val(string[3]);
          $('#username').val(string[4]);
          if ($('#level').find("option[value='" + string[6] + "']").length) {
              $('#level').val(string[6]).trigger('change');
          }
      }
  });

  $('#nama').focus();
}



function buttonReply(parentID, idPost) {
  $('#parentID').val(parentID);
  $('#idPost').val(idPost);
  $('#buttonSimpan').prop('disabled', false);
  $('#batalArea').html('<button type="button" class="btn btn-secondary" id="tombolBatal" onclick="batalReply()">Batal</button>');
  $('#reply').attr('readonly', false).focus();
}

function batalReply() {
  $('#formTag').trigger('reset');
  $('#reply').attr('readonly', true);
  $('#buttonSimpan').prop('disabled', true);
  $('#tombolBatal').css('display', 'none');
}

function halaman() {
  summernote();
  table();
  deleteThis();

  $('#judul').keyup(function() {
      const judulValue = $('#judul').val();
      const string = judulValue.toLowerCase().replace(/ /g, "-").replace(/\//g, "-");
      $('#link').val(string);
  });

  $('#editLink').click(function() {
      if ($('#link').is('[readonly')) {
          $('#link').prop('readonly', false).focus();
          $('#editLink').text('Simpan').removeClass('btn-outline-secondary').addClass('btn-success');
      } else {
          $('#link').prop('readonly', true);
          $('#editLink').text('Edit').removeClass('btn-success').addClass('btn-outline-secondary');
      }
  });
}

function tag() {
  table();
  deleteThis();
  $('#buttonEditSlug').click(function() {
      if ($('#slug').is('[readonly]')) {
          $('#slug').prop('readonly', false).focus();
          $('#buttonEditSlug').text('Simpan').removeClass('btn-outline-secondary').addClass('btn-success');
      } else {
          $('#buttonEditSlug').text('Edit').removeClass('btn-success').addClass('btn-outline-secondary');
          $('#slug').prop('readonly', true);
      }
  });

  $('#namaTag').keyup(function() {
      var namaTag = $('#namaTag').val().toLowerCase().replace(/ /g, "-").replace(/\//g, "-");
      $('#slug').val(namaTag);
  })
}

function editTag(id, nama, slug) {
  $('#id_tag').val(id);
  $('#namaTag').val(nama);
  $('#slug').val(slug);
  $('#judul').val('Edit Tag');
  $('#batalArea').html('<button type="button" class="btn btn-secondary" id="tombolBatal" onclick="batalEditTag()">Batal</button>');
}

function editKategori(id, nama, slug) {
  var idKategori = document.getElementById('id_kategori');
  var namaKategori = document.getElementById('namaKategori');
  var slugKategori = document.getElementById('slug');
  var judul = document.getElementById('judul');
  var batalArea = document.getElementById('batalArea');
  idKategori.value = id;
  namaKategori.value = nama;
  slugKategori.value = slug;
  judul.innerText = 'Edit';
  batalArea.innerHTML = '<button type="button" class="btn btn-secondary" id="tombolBatal" onclick="batalEditKategori()">Batal</button>'
}

function batalEditKategori() {
  var judul = document.getElementById('judul');
  $('#formKategori').trigger('reset');
  $('#tombolBatal').css('display', 'none');
  judul.innerText = 'Tambah baru';
}

function batalEditTag() {
  $('#formTag').trigger('reset');
  $('#tombolBatal').css('display', 'none');
  $('#judul').text('Tambah Baru');
}

function kategori() {
  table();
  deleteThis();
  var namaKategori = document.getElementById('namaKategori');
  var slugKategori = document.getElementById('slug');
  var tombolEditSlug = document.getElementById('buttonEditSlug');
  var tombolBatalEdit = document.getElementById('tomblBatal');

  tombolEditSlug.addEventListener('click', function() {
      if ($('#slug').is('[readonly]')) {
          $('#slug').prop('readonly', false);
          tombolEditSlug.innerText = 'Simpan';
          tombolEditSlug.className = 'btn btn-success';
      } else {
          $('#slug').prop('readonly', true);
          tombolEditSlug.innerText = 'Edit';
          tombolEditSlug.className = 'btn btn-outline-secondary';
      }
  })

  namaKategori.addEventListener('keyup', function() {
      var namaKategoriValue = namaKategori.value;
      var string = namaKategoriValue.toLowerCase().replace(/ /g, "-").replace(/\//g, "-");
      slugKategori.value = string;
  });
}

function addKategori(nama, slug) {
  $.ajax({
      url: '<?= base_url("kategori/addKategori/") ?>' + nama + '/' + slug,
      cache: false,
      contentType: false,
      processData: false,
      type: "POST",
      success: function(url) {
          window.location.href = '<?= base_url(); ?>kategori';
      }
  });
};

function post() {
  bsCustomFileInput.init();
  window.setTimeout("waktu()", 50);

  var judul = document.getElementById('judul');
  var linkField = document.getElementById('link');
  var tombolEditLink = document.getElementById('editLink');
  var tombolEditDate = document.getElementById('editDateTime')
  var customDate = document.getElementById('customDateTime');
  var labelCustomDate = document.getElementById('labelCustomDate');
  var iconKategori = document.getElementById('iconKategori');
  var iconTags = document.getElementById('iconTags');

  $('#kategori').change(function() {
      iconKategori.innerHTML = '<i class="fas fa-check-circle fa-fw mr-2"></i>';
      iconKategori.className = 'text-success';
  })

  $('#tag').change(function() {
      var tags = document.getElementById('tag');
      if (tags.value) {
          iconTags.innerHTML = '<i class="fas fa-check-circle fa-fw mr-2"></i>';
          iconTags.className = 'text-success';
      } else {
          iconTags.innerHTML = '<i class="fas fa-exclamation-triangle fa-fw mr-2"></i>';
          iconTags.className = 'text-warning'
      }
  })

  judul.addEventListener('keyup', function() {
      var linkDepan = document.getElementById('urlLink');
      var judulValue = judul.value;
      var string = judulValue.toLowerCase().replace(/ /g, "-").replace(/\//g, "-");
      linkField.value = string;
  });

  tombolEditDate.addEventListener('click', function() {
      if (!$('#dateTime:visible').length) {
          customDate.innerHTML = '<div class="form-group" id="dateTime"><label class="form-label" for="customDate">Edit Tanggal dan waktu penerbitan</label><input type="datetime-local" class="form-control" name="customDate" id="customDate"></div>';
          tombolEditDate.innerText = 'Batal';
          tombolEditDate.className = 'btn btn-danger';
          labelCustomDate.innerText = 'sekarang:';
      } else {
          tombolEditDate.innerText = 'Edit';
          labelCustomDate.innerText = 'penerbitan:';
          tombolEditDate.className = 'btn btn-outline-secondary';
          $('#dateTime').hide();
      }
  })

  tombolEditLink.addEventListener('click', function() {
      if ($('#link').is('[readonly]')) {
          $('#link').prop('readonly', false);
          tombolEditLink.innerText = 'Simpan';
          tombolEditLink.className = 'btn btn-success';
      } else {
          $('#link').prop('readonly', true);
          tombolEditLink.innerText = 'Edit';
          tombolEditLink.className = 'btn btn-outline-secondary';
      }
  });

  summernote();
}

function summernote() {
  $('#summernote').summernote({
      fontSize: 20,
      placeholder: 'Isi postingan',
      tabDisable: true,
      tabsize: 2,
      height: 365,
      lang: 'id-ID',
      toolbar: [
          ['view', ['help']],
          ['misc', ['undo', 'redo']],
          ['style', ['style', 'fontname', 'fontsize', 'paragraph', 'color']],
          ['font', ['bold', 'italic', 'underline']],
          ['paragraph', ['ul', 'ol']],
          ['insert', ['table', 'link', 'video', 'file']],
          ['view', ['fullscreen', 'codeview']],
      ],
      callbacks: {
          onImageUpload: function(files, editor, welEditable) {
              for (let i = 0; i < files.length; i++) {
                  sendFile(files[i]);
              }
          },
          onMediaDelete: function(target) {
              $.delete(target[0].src);
          },
          onFileUpload: function(file) {
              for (let i = 0; i < file.length; i++) {
                  uploadFile(file[i]);
              }
          },
      },
  });

  function uploadFile(file) {
      let data = new FormData();
      data.append("file", file);
      $.ajax({
          data: data,
          type: "POST",
          url: "<?= base_url('admin/setPostFile'); ?>", //Your own back-end uploader
          cache: false,
          contentType: false,
          processData: false,
          xhr: function() { //Handle progress upload
              let myXhr = $.ajaxSettings.xhr();
              if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
              Swal.fire({
                  width: '25rem',
                  title: 'Mengunggah file',
                  icon: 'info',
                  html: '<div class="progress mb-3"><div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div><div class="text-center small proses"></div>',
                  showConfirmButton: false,
                  showCancelButton: true,
                  allowOutsideClick: false
              }).then((result) => {
                  if (result.dismiss === Swal.DismissReason.cancel) {
                      fireNotif('error', 'Upload canceled!');
                      myXhr.abort();
                  }
              });
              return myXhr;
          },
          success: function(reponse) {
              if (reponse == 'error') {
                  fireNotif('error', 'Berkas terlalu besar!');
              } else {
                  fireNotif('success', 'Upload berhasil!');
                  let listMimeImg = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp', 'image/gif', 'image/svg'];
                  let listMimeAudio = ['audio/mpeg', 'audio/ogg'];
                  let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];
                  let elem;

                  if (listMimeImg.indexOf(file.type) > -1) {
                      //Picture
                      $('#summernote').summernote('insertImage', reponse);
                  } else if (listMimeAudio.indexOf(file.type) > -1) {
                      //Audio
                      elem = document.createElement("audio");
                      elem.setAttribute("src", reponse);
                      elem.setAttribute("controls", "controls");
                      elem.setAttribute("preload", "metadata");
                      $('#summernote').summernote('insertNode', elem);
                  } else if (listMimeVideo.indexOf(file.type) > -1) {
                      //Video
                      elem = document.createElement("video");
                      elem.setAttribute("src", reponse);
                      elem.setAttribute("controls", "controls");
                      elem.setAttribute("preload", "metadata");
                      $('#summernote').summernote('insertNode', elem);
                  } else {
                      //Other file type
                      elem = document.createElement("a");
                      let linkText = document.createTextNode(file.name);
                      elem.appendChild(linkText);
                      elem.title = file.name;
                      elem.href = reponse;
                      elem.target = '_blank';
                      elem.className = 'text-decoration-none';
                      $('#summernote').summernote('insertNode', elem);
                  }
              }
          }
      });
  }

  function progressHandlingFunction(e) {
      if (e.lengthComputable) {
          let ukuran = e.total / 1024;
          let upload = e.loaded / 1024;
          let progres = e.loaded / e.total * 100;
          // $('.progress-bar').addClass('width', progres.toFixed() + '%');
          $('.progress-bar').css('width', progres.toFixed() + '%').text(progres.toFixed() + '%');
          $('.proses').text(upload.toFixed() + ' Kb / ' + ukuran.toFixed() + ' Kb');

          //Reset progress on complete
          if (e.loaded === e.total) {
              fireNotif('success', 'Upload selesai');
          }
      }
  }

  function sendFile(files, el) {
      var out = new FormData();
      out.append('file', files);
      $.ajax({
          url: '<?php echo site_url("admin/uploadGambar/post") ?>',
          cache: false,
          contentType: false,
          processData: false,
          data: out,
          type: "POST",
          success: function(response) {
              $('#summernote').summernote('insertImage', response);
          },
          error: function(out) {
              console.log(out);
          }

      });
  };

  $.delete = function(src) {
      $.ajax({
          type: 'POST',
          url: '<?php echo site_url("admin/hapusGambar") ?>',
          cache: false,
          data: {
              src: src
          },
          success: function(response) {
              console.log(response);
          }

      });
  };
}

function buttonRead(id) {
  document.location.href = '<?= base_url(); ?>admin/readComment/' + id;
}

function editMenu(id) {
  var out = new FormData();
  out.append('id', id);
  $.ajax({
      url: '<?= base_url("admin/getMenuById/") ?>',
      cache: false,
      contentType: false,
      processData: false,
      data: out,
      type: "POST",
      success: function(response) {
          var string = response.split('|');
          $('#idMenu').val(string[0]);
          $('#urutan').val(string[1]);
          $('#parent').val(string[2]);
          $('#judul').val(string[4]);
          $('#tipe').val(string[5]);
          if (string[6] == 1) {
              $('#new_tab').prop('checked', true);
          } else {
              $('#new_tab').prop('checked', false);
          }
          var data = {
              id: string[3],
              text: string[3]
          };

          if ($('#link').find("option[value='" + data.id + "']").length) {
              $('#link').val(data.id).trigger('change');
          } else {
              var newOption = new Option(data.text, data.id, true, true);
              $('#link').append(newOption).val(data.id).trigger('change');
          }

          $('#batalArea').html('<button type="button" class="btn btn-secondary mb-3" id="tombolBatalMenu" onclick="batalMenu()">Batal</button>');
          $('#deleteArea').html('<button type="button" class="btn btn-danger mb-3" id="tombolHapusMenu" onclick="hapusMenu(' + string[0] + ')">Hapus</button>');
      }
  });
}

function batalMenu() {
  $('#tombolBatalMenu').hide();
  $('#tombolHapusMenu').hide();
  $('#form').trigger('reset');
}

function hapusMenu(id) {
  var konfirmasi = confirm('Apakah anda yakin untuk menhapus menu ini? (' + id + ')');
  if (konfirmasi) {
      document.location.href = '<?= base_url(); ?>admin/deleteMenu/' + id;
  } else {
      return;
  }
}

function gambarPratinjau() {
  const file = document.querySelector('#file');
  const imgPreview = document.querySelector('.img-preview');
  const fileFoto = new FileReader();
  const iconPreview = document.getElementById('iconPreview');
  const berkas = file.files[0];
  const berkasType = berkas.type.split('/');
  if (berkasType[0] == 'image') {
      fileFoto.readAsDataURL(file.files[0]);
      fileFoto.onload = function(e) {
          iconPreview.innerHTML = '<i class="fas fa-check-circle fa-fw mr-2"></i>';
          iconPreview.className = 'text-success';
          imgPreview.src = e.target.result;
      }
  } else {
      fireNotif('error', 'File bukan dalam bentuk gambar!');
      file.value = '';
      return;
  }
};

function waktu() {
  var waktu = new Date($.now());
  var datetime = document.getElementById('jam');
  setTimeout("waktu()", 1000);

  let y = waktu.getFullYear();
  let b = waktu.getMonth() + 1;
  let d = waktu.getDate();
  let h = waktu.getHours();
  let m = waktu.getMinutes();
  let s = waktu.getSeconds();
  b = puluhan(b);
  d = puluhan(d);
  h = puluhan(h);
  m = puluhan(m);
  s = puluhan(s);

  var now = d + "-" + b + "-" + y + " | " + h + ":" + m + ":" + s;
  datetime.value = now;
}

function puluhan(i) {
  if (i < 10) {
      i = "0" + i
  };
  return i;
}

function alertOnClose() {
  $(window).on('beforeunload', function() {
      return '';
  });
}