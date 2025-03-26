<table id="tableBody" class="table table-sm">
    <thead>
        <tr>
            <th>الاسم</th>
            <th>التخصص</th>
            <th>رقم الهاتف</th>
            <th>البريد الإلكتروني</th>
            <th>الخبرة</th>
            <th>ساعات العمل</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @if ($practitioners->count() > 0)

            @foreach ($practitioners as $practitioner)
                <tr>
                    <td>{{ $practitioner->practitioner_name }}</td>
                    <td>{{ $practitioner->specialization }}</td>
                    <td>{{ $practitioner->contact_number }}</td>
                    <td>{{ $practitioner->email }}</td>
                    <td>{{ $practitioner->experience_years }} سنوات</td>
                    <td>{{ $practitioner->availability_hours }}</td>
                    <td>
                        <button class="btn btn-sm btn-success edit-btn btn-success btn-sm edit-btn"
                            data-id="{{ $practitioner->id }}" data-name="{{ $practitioner->practitioner_name }}"
                            data-specialization="{{ $practitioner->specialization }}"
                            data-contact="{{ $practitioner->contact_number }}" data-email="{{ $practitioner->email }}"
                            data-experience="{{ $practitioner->experience_years }}"
                            data-availability="{{ $practitioner->availability_hours }}" data-bs-toggle="modal"
                            data-bs-target="#updatePractitioner">
                            تعديل
                        </button>

                        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $practitioner->id }}"
                            data-bs-toggle="modal" data-bs-target="#deletePractitioner">
                            حذف
                        </button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7" class="text-center text-danger">لا توجد بيانات</td>
            </tr>
        @endif
    </tbody>
</table>
