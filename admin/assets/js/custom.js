/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";


jQuery.extend(jQuery.validator.messages, {
    required: "Field tidak boleh kosong.",
    remote: "Please fix this field.",
    email: "Please enter a valid email address.",
    url: "Please enter a valid URL.",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Field hanya boleh diisi dengan angka.",
    digits: "Hanya boleh angka.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    minlength: jQuery.validator.format("Mohon masukan {0} angka."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Angka harus lebih kecil dari {0}."),
    min: jQuery.validator.format("Angka harus lebih besar dari {0}.")
});

jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[A-Z a-z /S]+$/g.test(value);
}, "Tidak boleh angka");

$(function() {



    let chart = $("#myChart")
    if(chart.length){
        $.ajax({
            method: 'post',
            dataType: 'json',
            url: 'datapenjualan.php',
            success: res => {
                const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                let penghasilan = [res.jan, res.feb, res.mar, res.apr, res.mei, res.jun, res.jul, res.agu, res.sep, res.okt, res.nov, res.des];
                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'My First dataset',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: penghasilan,
                    }]
                };

                const config = {
                    type: 'line',
                    data: data,
                    options: {}
                };

                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );
            }
        })
    }

    $("#formadmin").validate({
        rules: {
            nama: {
                required: true,
                lettersonly : true
            },
            nohp : {
                required: true,
                number : true
            }
        },
        
        highlight: (element, errorClass, validClass) => {
            $(element).addClass("is-invalid")
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid").addClass("is-valid");

        }
    });



    $('#mytable').DataTable();

})



function transaksi(idsantri, data) {
    $.ajax({
        method: 'post',
        data: {
            idsantri,
            data
        },
        url: 'walisantri/ajax/insert.php',
        dataType : 'json',
        success: res => {
            if (res.res) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Pembayaran berhasil dibuat',
                    text: 'Silahkan lunasi pembayaran',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php?page=walisantri'
                })
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Pembayaran gagal dibuat',
                    text: 'Silahkan coba beberapa saat lagi',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.location.href = 'index.php?page=walisantri'
                })
            }
        }
    })
}


function lanjutPembayaran(idsantri) {

    $.ajax({
        method: 'post',
        data: {
            idsantri
        },
        url: 'walisantri/ajax/pembayaran.php',
        dataType: 'json',
        success: Response => {
            snap.pay(Response.token, {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    transaksi(idsantri,JSON.stringify(result));
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    transaksi(idsantri,JSON.stringify(result));
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });


        }
    })
}


function editSantri(idsantri, idpendaftaran){
    $.ajax({
        method: "post",
        url : 'santridaftar/ajax/datasantri.php',
        data : {
            idsantri
        },
        dataType : "json",
        success : res => {
            $("#idsantri").val(res.id_santri);
            $("#nama").val(res.nama)
            $("#nohp").val(res.no_hp)
            $("#jk").val(res.jk)
            $("#tanggal").val(res.tanggal_lahir)
            $("#tempatlahir").val(res.tempat_lahir)
            $("#alamat").html(res.alamat)
            $("#idpendaftaran").val(idpendaftaran)
        }
    })
}
function uploadBerkasPembayaran(idpendaftaran) {
    $("#idsantripembayaran").val(idpendaftaran)
}

function prosesPembayaran(e) {
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Proses tidak bisa dirubah!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Proses!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: 'walisantri/ajax/updatePembayaran.php',
                method: "post",
                data: {
                    e
                },
                success: res => {
                    if (res) {
                        Swal.fire(
                            'Berhasil!',
                            'Pembayaran berhasil diproses!',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        })
                    } else {
                        Swal.fire(
                            'Gagal!',
                            'Pembayaran gagal diproses!',
                            'error'
                        ).then(() => {
                            window.location.reload();
                        })
                    }
                }
            })


        }
    })
}

function hapusSantri(e, f) {
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Proses tidak bisa dirubah!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Proses!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: 'walisantri/ajax/hapusSantri.php',
                method: "post",
                data: {
                    e,
                    f
                },
                success: res => {
                    console.log(res)
                    if (res) {
                        Swal.fire(
                            'Berhasil!',
                            'Santri berhasil dihapus!',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        })
                    } else {
                        Swal.fire(
                            'Gagal!',
                            'Santri gagal dihapus!',
                            'error'
                        ).then(() => {
                            window.location.reload();
                        })
                    }
                }
            })


        }
    })
}


function editWaliSantri(idwalisantri){
    $.ajax({
        method: "post",
        url : 'walisantripengurus/ajax/datawalisantri.php',
        data : {
            idwalisantri
        },
        dataType : "json",
        success : res => {
            $("#idwalisantri").val(res.id_wali_santri);
            $("#namawali").val(res.nama)
            $("#emailwali").val(res.email)
            $("#alamatwali").html(res.alamat)
            $("#tempatlahirwali").val(res.tempat_lahir)
            $("#tanggalwali").val(res.tanggal_lahir)
            $("#nohp").val(res.no_hp)
        }
    })
}

function detailKamar(idsantri){
    $.ajax({
        method: "post",
        url : 'walisantri/ajax/datakamar.php',
        data : {
            idsantri
        },
        dataType : "json",
        success : res => {

            $("#kamar").val('');
            $("#kelas").val('');
            $("#keterangan").html('');
            if(res.nama_kamar){
                $("#kamar").val(res.nama_kamar);
                $("#kelas").val(res.nama_kelas);
                $("#keterangan").html(res.keterangan);
            }
        }
    })
}


function editPengurus(idpengurus){
    $.ajax({
        method: "post",
        url : 'pengurus/ajax/datapengurus.php',
        data : {
            idpengurus
        },
        dataType : "json",
        success : res => {
            $("#idpengurus").val(res.id_pengurus);
            $("#nama").val(res.nama)
            $("#email").val(res.email)
            $("#bidang").val(res.bidang)
            $("#tanggal").val(res.tanggal_lahir)
            $("#alamat").html(res.alamat)
            $("#nohp").val(res.no_hp)
            $("#hak").val(res.hak_akses)
          
        }
    })
}

function editTanggal(idtanggal){
    $.ajax({
        method: "post",
        data : {
            idtanggal
        },
        url : 'pendaftaran/ajax/datatanggal.php',
        dataType : 'json',
        success : res => {
            $("#idtanggalpendaftaran").val(res.id_tanggal_pendaftaran)
            $("#mulai").val(res.tanggal_mulai)
            $("#selesai").val(res.tanggal_selesai)
        }
    })
}



function hapusData(id, path, back) {
    Swal.fire({
        title: 'Yakin ingin menghapus data?',
        text: "Data akan dihapus selamanya!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: path,
                method: "post",
                data: {
                    id
                },
                dataType : "json",
                success: res => {
                    if (res.hasil) {
                        Swal.fire(
                            'Berhasil Dihapus!',
                            'Data anda sudah terhapus.',
                            'success'
                        ).then(klik => {
                            if (klik.value) {
                                document.location.href = "index.php?page=" + back
                            }
                        })
                    }
                }
            })
        }
    })
}