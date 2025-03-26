@extends('layouts.dashboard.app')

@section('bodycontent')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">المواعيد</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active" aria-current="page">المواعيد</li>
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
                                <h3 class="card-title mb-0">قائمة المواعيد</h3>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#createAppointment"><i class="bi bi-plus-lg"></i>
                                        إضافة
                                    </button>
                                </div>
                            </div>

                            <div class="card-body p-1">
                                <div class="mb-3">
                                    <input type="text" id="searchInput" class="form-control" placeholder="بحث...">
                                </div>
                                <div id="appointmentTable">
                                    @include('layouts.dashboard.appointments._search')
                                </div>
                                <div id="paginationLinks">
                                    {{ $appointments->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Include the Create Appointment Modal -->
        @include('layouts.dashboard.appointments.create')
        @include('layouts.dashboard.appointments.update')
        @include('layouts.dashboard.appointments.delete')
    </main>
@endsection

@section('scriptcontent')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        $(document).ready(function() {
            // Edit Button Click
            $('.edit-btn').on('click', function() {
                let appointmentId = $(this).data('id');
                let clientId = $(this).data('client-id');
                let practitionerId = $(this).data('practitioner-id');
                let appointmentDate = $(this).data('appointment-date');
                let appointmentTime = $(this).data('appointment-time');
                let treatmentType = $(this).data('treatment-type');
                let status = $(this).data('status');
                let notes = $(this).data('notes');

                // Populate the update modal fields
                $('#client_id').val(clientId);
                $('#practitioner_id').val(practitionerId);
                $('#appointment_date').val(appointmentDate);
                $('#appointment_time').val(appointmentTime);
                $('#treatment_type').val(treatmentType);
                $('#status').val(status);
                $('#notes').val(notes);

                // Set the form action URL
                let updateUrl = "{{ route('appointments.update', ['appointmentUpdate']) }}".replace('appointmentUpdate', appointmentId);
                $('#formUpdate').attr('action', updateUrl);
            });

            // Delete Button Click
            $('.delete-btn').on('click', function() {
                let appointmentId = $(this).data('id');
                let deleteUrl = "{{ route('appointments.destroy', ['appointmentDelete']) }}".replace('appointmentDelete', appointmentId);
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
        var url = "{{ route('appointments.index') }}";
    </script>
    <script src="{{ asset('assets/js/custom_js/search.js') }}"></script>
@endsection
