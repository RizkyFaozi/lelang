@if(session('alertSuccess'))
<script>Swal.fire('Berhasil',`{{ session('alertSuccess') }}`,'success');</script>
@elseif(session('alertError'))
<script>Swal.fire('Gagal',`{{ session('alertError') }}`,'error');</script>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('bootstrap/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('bootstrap/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('bootstrap/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('bootstrap/js/datatables-simple-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


<script>
    $( function() {
        function errorInput($el, reason, reasonVal) {
                const $parent = $el.closest('.form-group');
                const $label = $parent.find('label')[0];
                const label = $( $label ).text().replace(' *', '');
                let errMsg = '';

                switch(reason) {
                    case 'required':
                        errMsg = `* ${label} wajib diisi.`;
                        break;

                    case 'minLength':
                        errMsg = `* ${label} minimal ${reasonVal} karakter.`;
                        break;

                    case 'maxLength':
                        errMsg = `* ${label} maksimal ${reasonVal} karakter.`;
                        break;

                    case 'minValue':
                        errMsg = `* ${label} minimal bernilai ${ reasonVal }.`;
                        break;

                    case 'alpha':
                        errMsg = `* ${label} tidak boleh diisi angka.`;
                        break;

                    case 'numeric':
                        errMsg = `* ${label} tidak boleh diisi huruf.`;
                        break;

                    case 'email':
                        errMsg = `* ${label} harus diisi dengan email.`;
                        break;

                    case 'url':
                        errMsg = `* ${label} harus diisi dengan URL yang valid.`;
                        break;

                    default:
                        errMsg = '';
                }

                if( $el.attr('type') == 'file' ) {
                    $el.parent().find('.custom-file-label').addClass('border-danger');
                }

                $el.addClass('border-danger');
                $parent.find('.error-msg').text(errMsg);
            }

            function isFormValid($form) {
                let result = true;

                $form.find('.error-msg').each( function(index, el) {
                    if( $(el).text().length > 0 ) {
                        result = false;
                    }
                });

                return result;
            }

            function formValidation($el) {
                const val = $el.val();
                const minLength = $el.attr('min-length');
                const valLength = val !== null ? val.trim().length : 0;

                const requiredRule = $el.attr('required');
                if(typeof requiredRule != 'undefined' && valLength == 0) {
                    errorInput($el, 'required');
                    return;
                }

                if(typeof minLength != 'undefined' && valLength < minLength) {
                    errorInput($el, 'minLength', minLength);
                    return;
                }

                const maxLength = $el.attr('max-length');
                if(typeof maxLength != 'undefined' && valLength > maxLength) {
                    errorInput($el, 'maxLength', maxLength);
                    return;
                }

                const minValue = $el.attr('min-value');
                if(typeof minValue != 'undefined' && Number(val) < Number(minValue)) {
                    errorInput($el, 'minValue', minValue);
                    return;
                }

                const alphaRule = $el.attr('alpha');
                if(typeof alphaRule != 'undefined' && val.search(/[0-9]+/g) >= 0) {
                    errorInput($el, 'alpha');
                    return;
                }

                const numericRule = $el.attr('numeric');
                if(typeof numericRule != 'undefined' && val.search(/[a-zA-Z]+/g) >= 0) {
                    errorInput($el, 'numeric');
                    return;
                }

                const emailRule = $el.attr('type') == 'email';
                if(emailRule && val.search(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g) < 0) {
                    errorInput($el, 'email');
                    return;
                }

                const urlRule = $el.attr('url');
                if(typeof urlRule != 'undefined' && val.search(/[(http(s)?):\/\/(www\.)?a-zA-Z0-9@:%.\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%\+.~#?&\/\/=]*)/g) < 0) {
                    errorInput($el, 'url');
                    return;
                }

                if( $el.attr('type') == 'file' ) {
                    $el.parent().find('.custom-file-label').removeClass('border-danger').addClass('border-success');
                }

                $el.removeClass('border-danger').addClass('border-success');
                $el.closest('.form-group').find('.error-msg').text('');
            }

            $(document).on('keyup change', 'input:not(.exclude-validation), textarea:not(.exclude-validation), select:not(.exclude-validation)', function() {
                formValidation( $(this) );
            });

            $(document).on('click', 'button[type=submit]:not(.exclude-validation)', function(e) {
                $(this).closest('form').find('input:not(.exclude-validation), textarea:not(.exclude-validation), select:not(.exclude-validation)').each( function(index, el) {
                    formValidation( $(el) );
                });

                if( !isFormValid( $(this).closest('form') ) ) {
                    e.preventDefault();
                }
            });
    });
</script>
