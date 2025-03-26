<table id="tableBody" class="table table-sm">
    <thead>
        <tr>
            <th>العميل</th>
            <th>الموعد</th>
            <th>المبلغ</th>
            <th>تاريخ الدفع</th>
            <th>طريقة الدفع</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @if ($payments->count() > 0)
            @foreach ($payments as $payment)
                <tr>
                    <!-- Client Name -->
                    <td>{{ $payment->client->client_name }}</td>

                    <!-- Appointment Details -->
                    <td>
                        {{ $payment->appointment->client->client_name }} - {{ $payment->appointment->appointment_date }}
                    </td>

                    <!-- Amount -->
                    <td>{{ number_format($payment->amount, 2) }}</td>

                    <!-- Payment Date -->
                    <td>{{ $payment->payment_date }}</td>

                    <!-- Payment Method -->
                    <td>
                        @if ($payment->payment_method == 'cash')
                            نقدي
                        @elseif ($payment->payment_method == 'card')
                            بطاقة
                        @endif
                    </td>

                    <!-- Actions -->
                    <td>
                        <!-- Edit Button -->
                        <button class="btn btn-sm btn-success edit-btn"
                            data-id="{{ $payment->id }}"
                            data-client-id="{{ $payment->client_id }}"
                            data-appointment-id="{{ $payment->appointment_id }}"
                            data-amount="{{ $payment->amount }}"
                            data-payment-date="{{ $payment->payment_date }}"
                            data-payment-method="{{ $payment->payment_method }}"
                            data-bs-toggle="modal"
                            data-bs-target="#updatePayment">
                            تعديل
                        </button>

                        <!-- Delete Button -->
                        <button class="btn btn-sm btn-danger delete-btn"
                            data-id="{{ $payment->id }}"
                            data-bs-toggle="modal"
                            data-bs-target="#deletePayment">
                            حذف
                        </button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center text-danger">لا توجد بيانات</td>
            </tr>
        @endif
    </tbody>
</table>

<!-- Pagination Links -->
<div id="paginationLinks">
    {{ $payments->links() }}
</div>
