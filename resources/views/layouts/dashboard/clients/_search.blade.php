<table id ="tableBody" class="table table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>السم العميل</th>
            <th>رقم الهاتف</th>
            <th>العنوان</th>
            <th>الإجراءات</th> <!-- Actions like Edit/Delete -->
        </tr>
    </thead>
    <tbody>
        @if ($clients->count() > 0)
            @foreach ($clients as $client)
                <tr class="align-middle">

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $client->client_name }}</td>
                    <td>{{ $client->contact_number }}</td>
                    <td>{{ $client->address }}</td>
                    <td>
                        <button class="btn btn-sm btn-success edit-btn" data-bs-toggle="modal"
                            data-bs-target="#updateClient" data-id="{{ $client->id }}"
                            data-name="{{ $client->client_name }}" data-dob="{{ $client->date_of_birth }}"
                            data-gender="{{ $client->gender }}" data-contact="{{ $client->contact_number }}"
                            data-email="{{ $client->email }}" data-address="{{ $client->address }}"
                            data-history="{{ $client->medical_history }}"
                            data-emergency="{{ $client->emergency_contact }}">
                            تعديل</button>
                        <button type="submit" class="btn btn-sm btn-danger delete-btn" data-bs-toggle="modal"
                            data-bs-target="#deleteClient" data-id="{{ $client->id }}">حذف</button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center text-danger">لا توجد بيانات</td>
            </tr>
        @endif
    </tbody>

</table>
