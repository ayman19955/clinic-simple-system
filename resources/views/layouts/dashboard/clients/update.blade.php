<!-- Modal -->
<div class="modal fade" id="updateClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">تعديل عميل</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formUpdate" action="" method="POST">
                <div class="modal-body row">
                    @csrf
                    @method('PUT')
                    <!-- Client Name -->
                    <div class="mb-3 col-md-6">
                        <label for="client_name" class="form-label">اسم العميل</label>
                        <input type="text" name="client_name" class="form-control" id="client_name" required>
                    </div>

                    <!-- Date of Birth -->
                    <div class="mb-3 col-md-6">
                        <label for="date_of_birth" class="form-label">تاريخ الميلاد</label>
                        <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" required>
                    </div>

                    <!-- Gender -->
                    <div class="mb-3 col-md-6">
                        <label class="form-label">الجنس</label>
                        <select name="gender" class="form-control" required>
                            <option value="male">ذكر</option>
                            <option value="female">أنثى</option>
                            <option value="other">آخر</option>
                        </select>
                    </div>

                    <!-- Contact Number -->
                    <div class="mb-3 col-md-6">
                        <label for="contact_number" class="form-label">رقم الهاتف</label>
                        <input type="text" name="contact_number" class="form-control" id="contact_number" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input type="email" name="email" class="form-control text-start" id="email">
                    </div>

                    <!-- Address -->
                    <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">العنوان</label>
                        <textarea name="address" class="form-control" id="address" rows="2" required></textarea>
                    </div>

                    <!-- Medical History -->
                    <div class="mb-3 col-md-6">
                        <label for="medical_history" class="form-label">التاريخ الطبي</label>
                        <textarea name="medical_history" class="form-control" id="medical_history" rows="2"></textarea>
                    </div>

                    <!-- Emergency Contact -->
                    <div class="mb-3 col-md-6">
                        <label for="emergency_contact" class="form-label">جهة الاتصال في حالات الطوارئ</label>
                        <input name="emergency_contact" class="form-control" id="emergency_contact">
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
