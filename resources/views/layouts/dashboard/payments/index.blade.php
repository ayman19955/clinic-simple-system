@extends('layouts.dashboard.app')

@section('bodycontent')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">المدفوعات</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active" aria-current="page">المدفوعات</li>
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
                                <h3 class="card-title mb-0">قائمة المدفوعات</h3>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#createPayment"><i class="bi bi-plus-lg"></i>
                                        إضافة
                                    </button>
                                </div>
                            </div>

                            <div class="card-body p-1">
                                <div class="mb-3">
                                    <input type="text" id="searchInput" class="form-control" placeholder="بحث...">
                                </div>
                                <div id="paymentTable">
                                    @include('layouts.dashboard.payments._search')
                                </div>
                                <div id="paginationLinks">
                                    {{ $payments->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.dashboard.payments.create')
        @include('layouts.dashboard.payments.update')
        @include('layouts.dashboard.payments.delete')

    </main>
@endsection

@section('scriptcontent')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        $(document).ready(function() {
            // Edit Button Click
            $('.edit-btn').on('click', function() {
                let paymentId = $(this).data('id');
                let clientId = $(this).data('client-id');
                let appointmentId = $(this).data('appointment-id');
                let amount = $(this).data('amount');
                let paymentDate = $(this).data('payment-date');
                let paymentMethod = $(this).data('payment-method');

                // Populate the update modal fields
                $('#client_id').val(clientId);
                $('#appointment_id').val(appointmentId);
                $('#amount').val(amount);
                $('#payment_date').val(paymentDate);
                $('#payment_method').val(paymentMethod);

                // Set the form action URL
                let updateUrl = "{{ route('payments.update', ['paymentUpdate']) }}".replace('paymentUpdate',
                    paymentId);
                $('#formUpdate').attr('action', updateUrl);
            });

            // Delete Button Click
            $('.delete-btn').on('click', function() {
                let paymentId = $(this).data('id');
                let deleteUrl = "{{ route('payments.destroy', ['paymentDelete']) }}".replace(
                    'paymentDelete', paymentId);
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
        var url = "{{ route('payments.index') }}";
    </script>
    <script src="{{ asset('assets/js/custom_js/search.js') }}"></script>
    <script>
        $(document).ready(function() {
            // When the client dropdown changes
            $('#client_id').on('change', function() {
                let clientId = $(this).val(); // Get the selected client ID
                let appointmentDropdown = $('#appointment_id');

                // Clear the appointment dropdown
                appointmentDropdown.empty();

                // If a client is selected, fetch their appointments
                if (clientId) {
                    $.ajax({
                        url: "{{ route('get.appointments.by.client') }}", // Route to fetch appointments
                        type: 'GET',
                        data: {
                            client_id: clientId
                        },
                        success: function(response) {
                            // Populate the appointment dropdown with the fetched appointments
                            if (response.length > 0) {
                                response.forEach(function(appointment) {
                                    appointmentDropdown.append(
                                        `<option value="${appointment.id}">
                                    ${appointment.client.client_name} - ${appointment.appointment_date}
                                </option>`
                                    );
                                });
                            } else {
                                appointmentDropdown.append(
                                    '<option value="">لا توجد مواعيد</option>');
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
