<!-- Modal -->
<div class="modal fade" id="updatePayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">تعديل دفعة</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formUpdate" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body row">
                    <!-- Client Dropdown -->
                    <div class="mb-3">
                        <label for="client_id" class="form-label">العميل</label>
                        <select class="form-control" name="client_id" id="client_id" required>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Appointment Dropdown -->
                    <div class="mb-3">
                        <label for="appointment_id" class="form-label">الموعد</label>
                        <select class="form-control" name="appointment_id" id="appointment_id" required>
                            @foreach($appointments as $appointment)
                                <option value="{{ $appointment->id }}">
                                    {{ $appointment->client->client_name }} - {{ $appointment->appointment_date }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Amount -->
                    <div class="mb-3">
                        <label for="amount" class="form-label">المبلغ</label>
                        <input type="number" class="form-control" name="amount" id="amount" step="0.01" required>
                    </div>

                    <!-- Payment Date -->
                    <div class="mb-3">
                        <label for="payment_date" class="form-label">تاريخ الدفع</label>
                        <input type="date" class="form-control" name="payment_date" id="payment_date" required>
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">طريقة الدفع</label>
                        <select class="form-control" name="payment_method" id="payment_method" required>
                            <option value="cash">نقدي</option>
                            <option value="card">بطاقة</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                </div>
            </form>
        </div>
    </div>
</div>
