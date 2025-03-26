<!-- Modal -->
<div class="modal fade" id="updateAppointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">تعديل موعد</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formUpdate" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body row">

                    <div class="mb-3 col-md-6">
                        <label for="client_id" class="form-label">العميل</label>
                        <select class="form-control" name="client_id" id="client_id" required>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="practitioner_id" class="form-label">الممارس</label>
                        <select class="form-control" name="practitioner_id" id="practitioner_id" required>
                            @foreach($practitioners as $practitioner)
                                <option value="{{ $practitioner->id }}">{{ $practitioner->practitioner_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="appointment_date" class="form-label">تاريخ الموعد</label>
                        <input type="date" class="form-control text-start" name="appointment_date" id="appointment_date" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="appointment_time" class="form-label">وقت الموعد</label>
                        <input type="time" class="form-control text-start" name="appointment_time" id="appointment_time" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="treatment_type" class="form-label">نوع العلاج</label>
                        <input type="text" class="form-control" name="treatment_type" id="treatment_type" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="status" class="form-label">الحالة</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="scheduled">مجدول</option>
                            <option value="completed">مكتمل</option>
                            <option value="canceled">ملغى</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">ملاحظات</label>
                        <textarea class="form-control" name="notes" id="notes"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
