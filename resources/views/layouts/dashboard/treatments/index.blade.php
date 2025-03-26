@extends('layouts.dashboard.app')

@section('bodycontent')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">العلاجات</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active" aria-current="page">العلاجات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-12">
                            <div class="card-header justify-content-center">
                                <h3 class="card-title mb-0">قائمة العلاجات</h3>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#createTreatment"><i class="bi bi-plus-lg"></i>
                                        إضافة
                                    </button>
                                </div>
                            </div>

                            <div class="card-body p-1">
                                <div class="mb-3">
                                    <input type="text" id="searchInput" class="form-control" placeholder="بحث...">
                                </div>
                                <div id="treatmentTable">
                                    @include('layouts.dashboard.treatments._search')
                                </div>
                                <div id="paginationLinks">
                                    {{ $treatments->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.dashboard.treatments.create')
        @include('layouts.dashboard.treatments.update')
        @include('layouts.dashboard.treatments.delete')

    </main>
@endsection

@section('scriptcontent')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        $(document).ready(function() {
            $('.edit-btn').on('click', function() {
                let treatmentId = $(this).data('id');
                let appointmentId = $(this).data('appointment-id');
                let treatmentDescription = $(this).data('treatment-description');
                let treatmentDate = $(this).data('treatment-date');
                let productsUsed = $(this).data('products-used');
                let results = $(this).data('results');

                $('#appointment_id').val(appointmentId);
                $('#treatment_description').val(treatmentDescription);
                $('#treatment_date').val(treatmentDate);
                $('#products_used').val(productsUsed);
                $('#results').val(results);

                let updateUrl = "{{ route('treatments.update', ['treatmentUpdate']) }}".replace('treatmentUpdate', treatmentId);
                $('#formUpdate').attr('action', updateUrl);
            });

            $('.delete-btn').on('click', function() {
                let treatmentId = $(this).data('id');
                let deleteUrl = "{{ route('treatments.destroy', ['treatmentDelete']) }}".replace('treatmentDelete', treatmentId);
                $('#formDelete').attr('action', deleteUrl);
            });
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "نجاح",
                text: "{{ session('success') }}",
                confirmButtonText: "حسنًا"
            });
        </script>
    @endif

    <script>
        var url = "{{ route('treatments.index') }}";
    </script>
    <script src="{{ asset('assets/js/custom_js/search.js') }}"></script>
@endsection
