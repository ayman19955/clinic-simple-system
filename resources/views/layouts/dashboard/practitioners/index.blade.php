@extends('layouts.dashboard.app')

@section('bodycontent')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">الممارسين</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active" aria-current="page">الممارسين</li>
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
                                <h3 class="card-title mb-0">قائمة الممارسين</h3>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#createPractitioner"><i class="bi bi-plus-lg"></i>
                                        إضافة
                                    </button>
                                </div>
                            </div>

                            <div class="card-body p-1">
                                <div class="mb-3">
                                    <input type="text" id="searchInput" class="form-control" placeholder="بحث...">
                                </div>
                                <div id="practitionerTable">
                                    @include('layouts.dashboard.practitioners._search')
                                </div>
                                <div id="paginationLinks">
                                    {{ $practitioners->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.dashboard.practitioners.create')
        @include('layouts.dashboard.practitioners.update')
        @include('layouts.dashboard.practitioners.delete')

    </main>
@endsection

@section('scriptcontent')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        $(document).ready(function() {
            $('.edit-btn').on('click', function() {
                let practitionerId = $(this).data('id');
                let practitionerName = $(this).data('name');
                let specialization = $(this).data('specialization');
                let contactNumber = $(this).data('contact');
                let email = $(this).data('email');
                let experienceYears = $(this).data('experience');
                let availabilityHours = $(this).data('availability');

                $('#practitioner_name').val(practitionerName);
                $('#specialization').val(specialization);
                $('#contact_number').val(contactNumber);
                $('#email').val(email);
                $('#experience_years').val(experienceYears);
                $('#availability_hours').val(availabilityHours);

                let updateUrl = "{{ route('practitioners.update', ['practitionerUpdate']) }}".replace('practitionerUpdate', practitionerId);
                $('#formUpdate').attr('action', updateUrl);
            });

            $('.delete-btn').on('click', function() {
                let practitionerId = $(this).data('id');
                let deleteUrl = "{{ route('practitioners.destroy', ['practitionerDelete']) }}".replace('practitionerDelete', practitionerId);
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
        var url = "{{ route('practitioners.index') }}";
    </script>
    <script src="{{ asset('assets/js/custom_js/search.js') }}"></script>
@endsection
