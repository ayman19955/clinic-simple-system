<table id="tableBody" class="table table-sm">
    <thead>
        <tr>
            <th>العميل</th>
            <th>الممارس</th>
            <th>تاريخ الموعد</th>
            <th>وقت الموعد</th>
            <th>نوع العلاج</th>
            <th>الحالة</th>
            <th>ملاحظات</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @if ($appointments->count() > 0)
            @foreach ($appointments as $appointment)
                <tr>
                    <!-- Client Name -->
                    <td>{{ $appointment->client->client_name }}</td> <!-- Assuming the Client model has a 'name' field -->

                    <!-- Practitioner Name -->
                    <td>{{ $appointment->practitioner->practitioner_name }}</td> <!-- Assuming the Practitioner model has a 'practitioner_name' field -->

                    <!-- Appointment Date -->
                    <td>{{ $appointment->appointment_date }}</td>

                    <!-- Appointment Time -->
                    <td>{{ $appointment->appointment_time }}</td>

                    <!-- Treatment Type -->
                    <td>{{ $appointment->treatment_type }}</td>

                    <!-- Status -->
                    <td>
                        @if ($appointment->status == 'scheduled')
                            <span class="badge bg-primary">مجدول</span>
                        @elseif ($appointment->status == 'completed')
                            <span class="badge bg-success">مكتمل</span>
                        @elseif ($appointment->status == 'canceled')
                            <span class="badge bg-danger">ملغى</span>
                        @endif
                    </td>

                    <!-- Notes -->
                    <td>{{ $appointment->notes ?? 'لا توجد ملاحظات' }}</td>

                    <!-- Actions -->
                    <td>
                        <!-- Edit Button -->
                        <button class="btn btn-sm btn-success edit-btn"
                            data-id="{{ $appointment->id }}"
                            data-client-id="{{ $appointment->client_id }}"
                            data-practitioner-id="{{ $appointment->practitioner_id }}"
                            data-appointment-date="{{ $appointment->appointment_date }}"
                            data-appointment-time="{{ $appointment->appointment_time }}"
                            data-treatment-type="{{ $appointment->treatment_type }}"
                            data-status="{{ $appointment->status }}"
                            data-notes="{{ $appointment->notes }}"
                            data-bs-toggle="modal"
                            data-bs-target="#updateAppointment">
                            تعديل
                        </button>

                        <!-- Delete Button -->
                        <button class="btn btn-sm btn-danger delete-btn"
                            data-id="{{ $appointment->id }}"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteAppointment">
                            حذف
                        </button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8" class="text-center text-danger">لا توجد بيانات</td>
            </tr>
        @endif
    </tbody>
</table>
