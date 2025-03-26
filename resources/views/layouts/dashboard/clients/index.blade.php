@extends('layouts.dashboard.app')

@section('bodycontent')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">العملاء</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active" aria-current="page">العملاء</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-md-12">

                        <!-- /.card -->
                        <div class="card mb-12">
                            <div class="card-header justify-content-center">
                                <h3 class="card-title mb-0 ">قائمة العملاء</h3>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#createClient"><i class="bi bi-plus-lg"></i>
                                        اضافة
                                    </button>
                                </div>
                                {{-- session --}}

                            </div>

                            <!-- /.card-header -->

                            <div class="card-body p-1">
                                {{-- search --}}
                                <div class="mb-3">
                                    <input type="text" id="searchInput" class="form-control" placeholder="بحث...">
                                </div>
                                <div id="clientTable">
                                    @include('layouts.dashboard.clients._search')
                                </div>
                                <div id="paginationLinks">
                                    {{ $clients->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- /.col -->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
        @include('layouts.dashboard.clients.create')
        @include('layouts.dashboard.clients.update')
        @include('layouts.dashboard.clients.delete')
    </main>
@endsection
@section('scriptcontent')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {

            $('.edit-btn').on('click', function() {
                // Get client data from button attributes
                let clientId = $(this).data('id');
                let clientName = $(this).data('name');
                let dateOfBirth = $(this).data('dob');
                let gender = $(this).data('gender');
                let contactNumber = $(this).data('contact');
                let email = $(this).data('email');
                let address = $(this).data('address');
                let medicalHistory = $(this).data('history');
                let emergencyContact = $(this).data('emergency');

                // Set modal form fields with the retrieved data
                $('#client_name').val(clientName);
                $('#date_of_birth').val(dateOfBirth);
                $('select[name="gender"]').val(gender);
                $('#contact_number').val(contactNumber);
                $('#email').val(email);
                $('#address').val(address);
                $('#medical_history').val(medicalHistory);
                $('#emergency_contact').val(emergencyContact);

                let updateUrl = "{{ route('clients.update', ['clientUpdate']) }}".replace('clientUpdate',
                    clientId);
                $('#formUpdate').attr('action', updateUrl);
            });

        });
    </script>
    <script>
        $(document).ready(function() {


            $('.delete-btn').on('click', function() {
                // Get client data from button attributes
                let clientId = $(this).data('id');

                let deleteUrl = "{{ route('clients.destroy', ['clientDelete']) }}".replace('clientDelete',
                    clientId);

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
        var url = "{{ route('clients.index') }}";
    </script>
    @if (session('errors'))
        <script>
            var session = "{!! implode('<br>', session('errors')->all()) !!}";
        </script>
        <script src="{{ asset('assets/js/custom_js/sweetalert.js') }}"></script>
    @endif

    <script src="{{ asset('assets/js/custom_js/search.js') }}"></script>
@endsection
