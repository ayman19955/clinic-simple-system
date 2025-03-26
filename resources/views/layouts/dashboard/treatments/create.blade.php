<!-- Modal -->
<div class="modal fade" id="createTreatment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">إضافة علاج</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('treatments.store') }}" method="POST">
                @csrf
                <div class="modal-body row">
                    <!-- Appointment Dropdown -->
                    <div class="mb-3">
                        <label for="appointment_id" class="form-label">الموعد</label>
                        <select class="form-control" name="appointment_id" required>
                            @foreach($appointments as $appointment)
                                <option value="{{ $appointment->id }}">
                                    {{ $appointment->client->client_name }} - {{ $appointment->appointment_date }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Treatment Description -->
                    <div class="mb-3">
                        <label for="treatment_description" class="form-label">وصف العلاج</label>
                        <textarea class="form-control" name="treatment_description" required></textarea>
                    </div>

                    <!-- Treatment Date -->
                    <div class="mb-3">
                        <label for="treatment_date" class="form-label">تاريخ العلاج</label>
                        <input type="date" class="form-control" name="treatment_date" required>
                    </div>

                    <!-- Products Used -->
                    <div class="mb-3">
                        <label for="products_used" class="form-label">المنتجات المستخدمة</label>
                        <textarea class="form-control" name="products_used"></textarea>
                    </div>

                    <!-- Results -->
                    <div class="mb-3">
                        <label for="results" class="form-label">النتائج</label>
                        <textarea class="form-control" name="results"></textarea>
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
