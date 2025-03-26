<table id="tableBody" class="table table-sm">
    <thead>
        <tr>
            <th>العميل</th>
            <th>الممارس</th>
            <th>وصف العلاج</th>
            <th>تاريخ العلاج</th>
            <th>المنتجات المستخدمة</th>
            <th>النتائج</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @if ($treatments->count() > 0)
            @foreach ($treatments as $treatment)
                <tr>
                    <!-- Client Name -->
                    <td>{{ $treatment->appointment->client->client_name }}</td>

                    <!-- Practitioner Name -->
                    <td>{{ $treatment->appointment->practitioner->practitioner_name }}</td>

                    <!-- Treatment Description -->
                    <td>{{ $treatment->treatment_description }}</td>

                    <!-- Treatment Date -->
                    <td>{{ $treatment->treatment_date }}</td>

                    <!-- Products Used -->
                    <td>{{ $treatment->products_used ?? 'لا توجد بيانات' }}</td>

                    <!-- Results -->
                    <td>{{ $treatment->results ?? 'لا توجد بيانات' }}</td>

                    <!-- Actions -->
                    <td>
                        <!-- Edit Button -->
                        <button class="btn btn-sm btn-success edit-btn"
                            data-id="{{ $treatment->id }}"
                            data-appointment-id="{{ $treatment->appointment_id }}"
                            data-treatment-description="{{ $treatment->treatment_description }}"
                            data-treatment-date="{{ $treatment->treatment_date }}"
                            data-products-used="{{ $treatment->products_used }}"
                            data-results="{{ $treatment->results }}"
                            data-bs-toggle="modal"
                            data-bs-target="#updateTreatment">
                            تعديل
                        </button>

                        <!-- Delete Button -->
                        <button class="btn btn-sm btn-danger delete-btn"
                            data-id="{{ $treatment->id }}"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteTreatment">
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

<!-- Pagination Links -->
<div id="paginationLinks">
    {{ $treatments->links() }}
</div>
