<div class="modal fade" id="addEntryModal" tabindex="-1" role="dialog" aria-labelledby="addEntryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('dashboard.journal-entries.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addEntryModalLabel">إضافة قيد يومية يدوي</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="entry_date">التاريخ</label>
                            <input type="date" class="form-control" id="entry_date" name="date" value="{{ old('date', date('Y-m-d')) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="entry_description">البيان / الوصف</label>
                            <input type="text" class="form-control" id="entry_description" name="description" value="{{ old('description') }}" placeholder="وصف المعاملة" required>
                        </div>
                    </div>

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>الحساب</th>
                                    <th style="width: 120px;">مدين</th>
                                    <th style="width: 120px;">دائن</th>
                                    <th style="width: 50px;"></th>
                                </tr>
                            </thead>
                            <tbody id="journal-items-body">
                                @if(old('items'))
                                    @foreach(old('items') as $i => $item)
                                        <tr>
                                            <td>
                                                <select name="items[{{$i}}][account_id]" class="form-control select2-account" required>
                                                    <option></option>
                                                    @foreach($accounts as $account)
                                                        <option value="{{ $account->id }}" @selected($account->id == $item['account_id'])>{{ $account->name }} ({{ $account->code }})</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="number" name="items[{{$i}}][debit]" class="form-control debit-input" step="0.01" placeholder="0.00" value="{{ $item['debit'] }}"></td>
                                            <td><input type="number" name="items[{{$i}}][credit]" class="form-control credit-input" step="0.01" placeholder="0.00" value="{{ $item['credit'] }}"></td>
                                            <td><button type="button" class="btn btn-sm btn-light-danger remove-row"><i class="fas fa-trash"></i></button></td>
                                        </tr>
                                    @endforeach
                                @else
                                    @for ($i = 0; $i < 2; $i++)
                                    <tr>
                                        <td>
                                            <select name="items[{{$i}}][account_id]" class="form-control select2-account" required>
                                                <option></option>
                                                @foreach($accounts as $account)
                                                    <option value="{{ $account->id }}">{{ $account->name }} ({{ $account->code }})</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="number" name="items[{{$i}}][debit]" class="form-control debit-input" step="0.01" placeholder="0.00"></td>
                                        <td><input type="number" name="items[{{$i}}][credit]" class="form-control credit-input" step="0.01" placeholder="0.00"></td>
                                        <td><button type="button" class="btn btn-sm btn-light-danger remove-row"><i class="fas fa-trash"></i></button></td>
                                    </tr>
                                    @endfor
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <button type="button" id="add-row" class="btn btn-sm btn-light-primary mt-2"><i class="fas fa-plus"></i> إضافة سطر</button>

                    <hr>
                    <div class="d-flex justify-content-end">
                        <table class="table table-borderless w-50">
                            <tbody>
                                <tr>
                                    <td>الإجمالي المدين:</td>
                                    <td id="total-debit" class="font-weight-bold">0.00</td>
                                </tr>
                                <tr>
                                    <td>الإجمالي الدائن:</td>
                                    <td id="total-credit" class="font-weight-bold">0.00</td>
                                </tr>
                                <tr>
                                    <td>الفرق:</td>
                                    <td id="total-difference" class="font-weight-bold">0.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ القيد</button>
                </div>
            </form>
        </div>
    </div>
</div>
