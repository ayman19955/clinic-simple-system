<table id="tableBody" class="table table-sm">
    <thead>
        <tr>
            <th>اسم المنتج</th>
            <th>النوع</th>
            <th>الكمية</th>
            <th>تاريخ الانتهاء</th>
            <th>المورد</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @if ($inventories->count() > 0)
            @foreach ($inventories as $item)
                <tr>
                    <!-- Product Name -->
                    <td>{{ $item->product_name }}</td>

                    <!-- Product Type -->
                    <td>{{ $item->product_type }}</td>

                    <!-- Quantity -->
                    <td class="{{ $item->quantity <= 5 ? 'text-danger fw-bold' : '' }}">
                        {{ $item->quantity }}
                        @if ($item->quantity <= 5)
                            <span class="badge bg-warning">منخفض!</span>
                        @endif
                    </td>

                    <!-- Expiry Date -->
                    <td class="{{ \Carbon\Carbon::parse($item->expiry_date)->isPast() ? 'text-danger' : '' }}">
                        {{ $item->expiry_date }}
                        @if (\Carbon\Carbon::parse($item->expiry_date)->isPast())
                            <span class="badge bg-danger">منتهي!</span>
                        @elseif(\Carbon\Carbon::parse($item->expiry_date)->diffInDays(now()) <= 30)
                            <span class="badge bg-warning">قريب!</span>
                        @endif
                    </td>

                    <!-- Supplier Info -->
                    <td>{{ Str::limit($item->supplier_info, 20) ?? 'غير محدد' }}</td>

                    <!-- Actions -->
                    <td>
                        <!-- Edit Button -->
                        <button class="btn btn-sm btn-success edit-btn" data-id="{{ $item->id }}"
                            data-product-name="{{ $item->product_name }}" data-product-type="{{ $item->product_type }}"
                            data-quantity="{{ $item->quantity }}" data-expiry-date="{{ $item->expiry_date }}"
                            data-supplier-info="{{ $item->supplier_info }}" data-bs-toggle="modal"
                            data-bs-target="#updateInventory">
                            <i class="bi bi-pencil"></i> تعديل
                        </button>

                        <!-- Delete Button -->
                        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $item->id }}"
                            data-bs-toggle="modal" data-bs-target="#deleteInventory">
                            <i class="bi bi-trash"></i> حذف
                        </button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center text-danger py-4">لا توجد منتجات في المخزون</td>
            </tr>
        @endif
    </tbody>
</table>


