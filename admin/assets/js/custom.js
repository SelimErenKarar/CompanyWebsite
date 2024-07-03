$(document).ready(function(){

    $(".remove-btn").click(function (e) {
        var $data_url = $(this).data("url");
        swal({
            title: 'Emin misiniz?',
            text: "Bu işlem geri alınamaz!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, sil!',
            cancelButtonText: 'Vazgeç',
        }).then(function(result){
            if (result.value) {
                swal(
                    'Silindi!',
                    'Seçtiğiniz kayıt başarıyla silindi.',
                    'success'
                )
                setTimeout(function(){  window.location.href = $data_url; }, 1500);
            }
        })
    })
})