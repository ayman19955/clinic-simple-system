<!-- Modal -->
<div class="modal fade" id="createInventory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">إضافة منتج</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('inventories.store') }}" method="POST">
                @csrf
                <div class="modal-body row">
                    <!-- Product Name -->
                    <div class="mb-3">
                        <label for="product_name" class="form-label">اسم المنتج</label>
                        <input type="text" class="form-control" name="product_name" required>
                    </div>

                    <!-- Product Type -->
                    <div class="mb-3">
                        <label for="product_type" class="form-label">نوع المنتج</label>
                        <input type="text" class="form-control" name="product_type" required>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label">الكمية</label>
                        <input type="number" class="form-control" name="quantity" min="0" required>
                    </div>

                    <!-- Expiry Date -->
                    <div class="mb-3">
                        <label for="expiry_date" class="form-label">تاريخ الانتهاء</label>
                        <input type="date" class="form-control" name="expiry_date" required>
                    </div>

                    <!-- Supplier Info -->
                    <div class="mb-3">
                        <label for="supplier_info" class="form-label">معلومات المورد</label>
                        <textarea class="form-control" name="supplier_info"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
