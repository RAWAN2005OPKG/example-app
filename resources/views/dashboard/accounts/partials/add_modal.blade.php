<div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('dashboard.accounts.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">إضافة حساب جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>اسم الحساب</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>رمز الحساب</label>
                                <input type="text" name="code" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>نوع الحساب</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_main" id="is_main_true" value="1" checked>
                                <label class="form-check-label" for="is_main_true">رئيسي</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_main" id="is_main_false" value="0">
                                <label class="form-check-label" for="is_main_false">فرعي</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="parentAccountSection" style="display: none;">
                        <label>الحساب الرئيسي التابع له</label>
                        <select name="parent_id" class="form-control">
                            <option value="">-- اختر حساب رئيسي --</option>
                            @foreach($mainAccounts as $mainAccount)
                                <option value="{{ $mainAccount->id }}">{{ $mainAccount->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ الحساب</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const parentSection = document.getElementById('parentAccountSection');
        const radios = document.querySelectorAll('input[name="is_main"]');

        radios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.value === '0') { // إذا كان فرعي
                    parentSection.style.display = 'block';
                } else { // إذا كان رئيسي
                    parentSection.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush
