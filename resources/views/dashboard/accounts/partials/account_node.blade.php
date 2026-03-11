<li>
    <div class="account-item">
        <div class="account-info">
            <i class="icon {{ $account->isSubAccount() ? 'fas fa-file-alt' : 'fas fa-folder-open' }}"></i>
            <div>
                <span class="name">{{ $account->name }}</span>
                <span class="code">{{ $account->code }}</span>
            </div>
            {{-- إضافة شارة للتمييز --}}
            @if($account->isSubAccount())
                <span class="badge badge-sub">فرعي</span>
            @else
                <span class="badge badge-main">رئيسي</span>
            @endif
        </div>
        <div class="action-buttons">
            <button type="button" class="btn-icon" data-toggle="modal" data-target="#editAccountModal"
                data-action="{{ route('dashboard.accounts.update', $account->id) }}"
                data-name="{{ $account->name }}"
                data-code="{{ $account->code }}"
                data-type="{{ $account->type }}"
                data-parent_id="{{ $account->parent_id }}"
                data-is_active="{{ $account->is_active ? 1 : 0 }}">
                <i class="fas fa-edit"></i>
            </button>
            {{-- يمكن إضافة زر حذف هنا  --}}
        </div>
    </div>

    {{-- إذا كان للحساب أبناء، قم بعرضهم --}}
    @if ($account->children && $account->children->isNotEmpty())
        <ul>
            @foreach ($account->children as $child)
                @include('dashboard.accounts.partials.account_node', ['account' => $child])
            @endforeach
        </ul>
    @endif
</li>
