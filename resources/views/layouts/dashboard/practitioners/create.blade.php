<!-- Modal -->
<div class="modal fade" id="createPractitioner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة عميل</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('practitioners.store') }}" method="POST">
                <div class="modal-body row">
                    @csrf

                    <div class="mb-3">
                        <label for="practitioner_name" class="form-label">الاسم</label>
                        <input type="text" class="form-control" name="practitioner_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input type="email" class="form-control text-start" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="contact_number" class="form-label">رقم الهاتف</label>
                        <input type="text" class="form-control" name="contact_number" required>
                    </div>

                    <div class="mb-3">
                        <label for="specialization" class="form-label">التخصص</label>
                        <input type="text" class="form-control" name="specialization" required>
                    </div>

                    <div class="mb-3">
                        <label for="experience_years" class="form-label">سنوات الخبرة</label>
                        <input type="number" class="form-control text-start" name="experience_years" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="availability_hours" class="form-label">ساعات التوفر</label>
                        <input type="text" class="form-control" name="availability_hours" required placeholder="مثال: 9 AM - 5 PM">
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
