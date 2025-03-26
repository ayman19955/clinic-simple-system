<!-- Modal -->
<div class="modal fade" id="deleteInventory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">حذف عميل</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formDelete" action="" method="POST">
                <div class="modal-body row">
                    @csrf
                    @method('DELETE')
                    <!-- Client Name -->
                    <div class="mb-3 col-md-12">
                       <h5 class="text-danger">هل تريد حذف هذا العنصر ؟</h5>
                    </div>

                    <!-- Date of Birth -->


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
            </form>
        </div>
    </div>
</div>
