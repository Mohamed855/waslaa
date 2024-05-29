@extends('layouts.dashboard')
@section('title', __('translate.add') . ' ' . __('translate.product'))
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row">
            <div class="col-md-12 col-12 m-auto">
                @include('dashboard.products.partials.add')
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#selectedCategory').on('change', function() {
                const categoryId = $(this).val();
                retrieveSubcategories(categoryId);
            });
        });

        function retrieveSubcategories(categoryId) {
            $.ajax({
                url: '{{ asset('') }}' + 'api/subcategories/' + categoryId,
                method: 'GET',
                success: function(response) {
                    const selectSubcategory = $('#selectedSubcategory');
                    selectSubcategory.empty();
                    selectSubcategory.append($('<option>', {
                        value: '',
                        text: 'Select',
                        disabled: true,
                        selected: true
                    }));
                    response.forEach(subcategory => {
                        selectSubcategory.append($('<option>', {
                            value: subcategory.id,
                            text: subcategory.{{ $nameOnLang }}
                        }));
                    });
                }
            });
        }
    </script>
@endsection
