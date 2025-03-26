<!-- Modal -->
<div class="modal fade" id="createPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">إضافة دفعة</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('payments.store') }}" method="POST">
                @csrf
                <div class="modal-body row">
                    <!-- Client Dropdown -->
                    <div class="mb-3">
                        <label for="client_id" class="form-label">العميل</label>
                        <select class="form-control" name="client_id" id="client_id" required>
                            <option value="">اختر العميل</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Appointment Dropdown -->
                    <div class="mb-3">
                        <label for="appointment_id" class="form-label">الموعد</label>
                        <select class="form-control" name="appointment_id" id="appointment_id" required>
                            <!-- Appointments will be populated dynamically here -->
                        </select>
                    </div>

                    <!-- Amount -->
                    <div class="mb-3">
                        <label for="amount" class="form-label">المبلغ</label>
                        <input type="number" class="form-control" name="amount" step="0.01" required>
                    </div>

                    <!-- Payment Date -->
                    <div class="mb-3">
                        <label for="payment_date" class="form-label">تاريخ الدفع</label>
                        <input type="date" class="form-control" name="payment_date" required>
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">طريقة الدفع</label>
                        <select class="form-control" name="payment_method" required>
                            <option value="cash">نقدي</option>
                            <option value="card">بطاقة</option>
                        </select>
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
