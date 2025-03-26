@extends('layouts.dashboard.app')

@section('bodycontent')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">المخزون</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active" aria-current="page">المخزون</li>
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
                                <h3 class="card-title mb-0">قائمة المخزون</h3>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#createInventory"><i class="bi bi-plus-lg"></i>
                                        إضافة
                                    </button>
                                </div>
                            </div>

                            <div class="card-body p-1">
                                <div class="mb-3">
                                    <input type="text" id="searchInput" class="form-control" placeholder="بحث...">
                                </div>
                                <div id="inventoryTable">
                                    @include('layouts.dashboard.inventories._search')
                                </div>
                                <div id="paginationLinks">
                                    {{ $inventories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.dashboard.inventories.create')
        @include('layouts.dashboard.inventories.update')
        @include('layouts.dashboard.inventories.delete')

    </main>
@endsection

@section('scriptcontent')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        $(document).ready(function() {
            // Edit Button Click
            $('.edit-btn').on('click', function() {
                let inventoryId = $(this).data('id');
                let productName = $(this).data('product-name');
                let productType = $(this).data('product-type');
                let quantity = $(this).data('quantity');
                let expiryDate = $(this).data('expiry-date');
                let supplierInfo = $(this).data('supplier-info');

                // Populate the update modal fields
                $('#product_name').val(productName);
                $('#product_type').val(productType);
                $('#quantity').val(quantity);
                $('#expiry_date').val(expiryDate);
                $('#supplier_info').val(supplierInfo);

                // Set the form action URL
                let updateUrl = "{{ route('inventories.update', ['inventoryUpdate']) }}".replace('inventoryUpdate', inventoryId);
                $('#formUpdate').attr('action', updateUrl);
            });

            // Delete Button Click
            $('.delete-btn').on('click', function() {
                let inventoryId = $(this).data('id');
                let deleteUrl = "{{ route('inventories.destroy', ['inventoryDelete']) }}".replace('inventoryDelete', inventoryId);
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
        var url = "{{ route('inventories.index') }}";
    </script>
    <script src="{{ asset('assets/js/custom_js/search.js') }}"></script>
@endsection
