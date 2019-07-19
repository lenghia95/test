<script type="text/javascript">
    $(document).ready(function () {
        $('#valiForm').validate({
            rules: {
                username: {
                    required: true,
                    minlength: 2,
                    maxlength: 32
                },
                email:    {
                    required: true,
                    email: true,
                    remote: {
                        url: "{{ url('/ajax/user-check-email') }}",
                        type: "get",
                        data: {
                            email: function () {
                                return $("input[name='email']").val();
                            },
                        },
                        dataFilter: function (data) {
                            var json = JSON.parse(data);
                            if (json.msg == "true") {
                                return "\"" + "Email của bạn đã tồn tại!" + "\"";
                            } else {
                                return 'true';
                            }
                        }
                    },
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 32
                },
            },
            messages: {
                username: {
                    required:  "Vui lòng nhập tên đăng nhập",
                    minlength: "Tên phải ít nhất 2 ký tự",
                    maxlength: "Tên phải tối đa 32 ký tự"
                },
                email: {
                    required:  "Vui lòng nhập email",
                    email:     "Email của bạn chưa đúng",
                },
                password: {
                    required:  "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu phải ít nhất 6 ký tự",
                    maxlength: "Mật khẩu phải tối đa 32 ký tự"
                },
               
            }
        });

        $(document).on('change', '.grid-switch', function(){
            var status = ($(this).prop('checked')) ? 1 : 0;
            $('input[name=status]').val(status);
        });

        $(document).on('click', '.user-edit',function() {
            var id = $(this).data('id');
            $.ajax({
                method: 'post',
                url: "{{ url('/ajax/user-edit') }}/" + id,
                data: {
                    _method:'PUT',
                    _token:"{{ csrf_token() }}",
                },
                success: function (data) {
                    $("#editModal").modal();
                    $('.edit-content').html(data);
                }
            });
        });

        $(document).on('click', '.user-show',function() {
            var id = $(this).data('id');
            $.ajax({
                method: 'post',
                url: "{{ url('/ajax/user-show') }}/" + id,
                data: {
                    _method:'PUT',
                    _token:"{{ csrf_token() }}",
                },
                success: function (data) {
                    $("#editModal").modal();
                    $('.show-content').html(data);
                }
            });
        });
        
    });
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
</script>