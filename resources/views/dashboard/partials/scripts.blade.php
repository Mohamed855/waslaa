@if (Illuminate\Support\Facades\App::getLocale() == 'ar')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('/public/../app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->
    <script src="{{ asset('/public/../app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('/public/../app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('/public/../app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('/public/../app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/public/../app-assets/vendors/js/extensions/swiper.min.js') }}"></script>
    <script src="{{ asset('/public/../app-assets/vendors/js/maps/leaflet.min.js') }}"></script>
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('/public/../app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('/public/../app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->
    <script src="{{ asset('/public/../app-assets/js/scripts/extensions/ext-component-toastr.js') }}"></script>
    <script src="{{ asset('/public/../app-assets/js/scripts/pages/app-chat.js') }}"></script>
    <script src="{{ asset('/public/../app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
    <script src="{{ asset('/public/../app-assets/js/scripts/extensions/ext-component-swiper.js') }}"></script>

    <script src="httpss://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="httpss://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('/public/../app-assets/js/scripts/forms/form-repeater.js') }}"></script>
    <script src="{{ asset('/public/../app-assets/js/scripts/maps/map-leaflet.js') }}"></script>
    <script src="{{ asset('/public/../app-assets/Edits/Edits.js') }}"></script>
    <script src="{{ asset('/public/../app-assets/Edits/Date_ar.js') }}"></script>
    <script src="{{ asset('/public/../app-assets/js/scripts/components/components-popovers.js') }}"></script>
@elseif (Illuminate\Support\Facades\App::getLocale() == 'en')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/swiper.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/maps/leaflet.min.js') }}"></script>
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->
    <script src="{{ asset('app-assets/js/scripts/extensions/ext-component-toastr.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-chat.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/extensions/ext-component-swiper.js') }}"></script>

    <script src="httpss://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="httpss://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-repeater.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/maps/map-leaflet.js') }}"></script>
    <script src="{{ asset('app-assets/Edits/Edits.js') }}"></script>
    <script src="{{ asset('app-assets/Edits/Date_en.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/components/components-popovers.js') }}"></script>
@endif

<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyAzkz9iHR9x67shFeiK-CyKLwWcQ-SSGIU",
        authDomain: "wasla-ee2d8.firebaseapp.com",
        projectId: "wasla-ee2d8",
        storageBucket: "wasla-ee2d8.appspot.com",
        messagingSenderId: "47710421695",
        appId: "1:47710421695:web:e8a4e20258194ad9e9fc0a",
        measurementId: "G-VH1517BBSZ"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    function initFirebaseMessagingRegistration() {
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("save-token") }}',
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token saved successfully.');
                    },
                    error: function (err) {
                        console.log('User Chat Token Error'+ err);
                    },
                });
            }).catch(function (err) {
                console.log('User Chat Token Error'+ err);
            });
    }
    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#ArArticleDescription'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#EnArticleDescription'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#ArSideEffects'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#EnSideEffects'))
        .catch(error => {
            console.error(error);
        });
</script>


<script>
    let number = 0;
    $(document).ready(function() {
        url = '';
        $.get(url,
            function(data, textStatus, jqXHR) {
                if (data.orders_count > 0) {
                    $('#notification_number').text(data.orders_count);
                    $('#notification_number').addClass('badge rounded-pill bg-danger badge-up');
                    number = data.orders_count;
                    $("#order_data").html('');
                    data.orders.forEach(order => {
                        orderUrl = '{{ asset('') }}' + 'admin/request_order/' + order.id;
                        console.log(orderUrl);
                        dataAppend = `<a class="list-item"  href="${orderUrl}">
                                <div class="list-item-body">
                                    <p class="fw-bolder text-dark"> @lang('translate.orderId') : ${order.order_id} </p>
                                    <span > User name : ${order.user.name}</span>
                                </div>
                                <div class="list-item-body">

                                </div>
                            </a>`
                        $("#order_data").append(dataAppend);
                    });
                } else {
                    $('#notification_number').text('');
                    $('#notification_number').removeClass('badge rounded-pill bg-danger badge-up');
                    number = 0;
                }
            },
            "json"
        );
    });
    setInterval(() => {
        url = '';
        $.get(url,
            function(data, textStatus, jqXHR) {
                if (data.orders_count > 0) {
                    $('#notification_number').text(data.orders_count);
                    $('#notification_number').addClass('badge rounded-pill bg-danger badge-up');
                    number = data.orders_count;
                    $("#order_data").html('');
                    data.orders.forEach(order => {
                        orderUrl = '{{ asset('') }}' + 'admin/request_order/' + order.id;
                        console.log(orderUrl);
                        dataAppend = `<a class="list-item"  href="${orderUrl}">
                                <div class="list-item-body">
                                    <p class="fw-bolder text-dark"> @lang('translate.orderId') : ${order.order_id} </p>
                                    <span > User name : ${order.user.name}</span>
                                </div>
                                <div class="list-item-body">

                                </div>
                            </a>`
                        $("#order_data").append(dataAppend);
                    });
                } else {
                    $('#notification_number').text('');
                    $('#notification_number').removeClass('badge rounded-pill bg-danger badge-up');
                    number = 0;
                }
            },
            "json"
        );
    }, 10000);
</script>

<script>
    const checkboxes = document.querySelectorAll('.record-checkbox');
    const deleteSelectedButton = document.getElementById('deleteSelected');
    const selectedIdsInput = document.getElementById('selectedIds');
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            const selectedCount = document.querySelectorAll('.record-checkbox:checked').length;
            deleteSelectedButton.disabled = selectedCount === 0;
        });
    });
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            const selectedIds = Array.from(checkboxes)
                .filter((c) => c.checked)
                .map((c) => c.value);
            selectedIdsInput.value = selectedIds.join(',');
            deleteSelectedButton.disabled = selectedIds.length === 0;
        });
    });

    ClassicEditor.create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = feather.icons['eye-off'].toSvg();
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = feather.icons['eye'].toSvg();
        }
    }

    function toggleManagerAddPasswordVisibility() {
        const passwordInput = document.getElementById('managerAddPassword');
        const eyeIcon = document.getElementById('managerAddEyeIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = feather.icons['eye-off'].toSvg();
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = feather.icons['eye'].toSvg();
        }
    }

    function toggleManagerEditPasswordVisibility() {
        const passwordInput = document.getElementById('managerEditPassword');
        const eyeIcon = document.getElementById('managerEditEyeIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = feather.icons['eye-off'].toSvg();
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = feather.icons['eye'].toSvg();
        }
    }
    function toggleConfirmPasswordVisibility() {
        const passwordConfirmInput = document.getElementById('password_confirmation');
        const eyeConfirmIcon = document.getElementById('eyeConfirmIcon');
        if (passwordConfirmInput.type === 'password') {
            passwordConfirmInput.type = 'text';
            eyeConfirmIcon.innerHTML = feather.icons['eye-off'].toSvg();
        } else {
            passwordConfirmInput.type = 'password';
            eyeConfirmIcon.innerHTML = feather.icons['eye'].toSvg();
        }
    }
    function isNumberKey(evt) {
        const charCode = (evt.which) ? evt.which : evt.keyCode;
        return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }
</script>
