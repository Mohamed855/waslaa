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
@endif

@if (Illuminate\Support\Facades\App::getLocale() == 'en')
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

