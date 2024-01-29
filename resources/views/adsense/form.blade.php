<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .myShadow {
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
        }
    </style>
</head>

<body>
    <div class="mt-3"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating">
                    <textarea name="adsense_code" id="adsenseCode" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">AdSense Reklam Kodu</label>
                </div>
                <button type="submit" class="mt-3 btn btn-lg btn-success fw-bold myShadow w-100" id="save">Kaydet</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- resources/views/welcome.blade.php -->
    <script>
        $(document).ready(function() {
            // Kaydet butonuna tıklandığında AJAX isteği gönder
            $("#save").click(function() {
                var adsenseCode = $("#adsenseCode").val();

                $.ajax({
                    url: "{{ url('save') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "adsense_code": adsenseCode
                    },
                    success: function(response) {
                        // Başarı durumunda SweetAlert2 ile bilgi göster ve sayfayı yönlendir
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı!',
                                text: response.message,
                            });
                        }
                    },
                    error: function(error) {
                        console.error("Hata:", error);
                        // Hata durumunda SweetAlert2 ile hata bilgisi göster
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata!',
                            text: 'Bir hata oluştu. Lütfen tekrar deneyin.',
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>