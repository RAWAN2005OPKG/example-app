@extends('layouts.container')
@section('title', 'تحويل مالي مركب')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    :root {
        --glass-bg: rgba(255, 255, 255, 0.7);
        --glass-border: rgba(255, 255, 255, 0.3);
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --accent-color: #764ba2;
    }

    body {
        background: #f0f2f5;
    }

    .neo-glass-card {
        background: var(--glass-bg);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .header-gradient {
        background: var(--primary-gradient);
        color: white;
        padding: 2rem;
        text-align: center;
        position: relative;
    }

    .header-gradient h2 {
        font-weight: 700;
        margin: 0;
        letter-spacing: 1px;
    }

    .step-container {
        padding: 2rem;
    }

    .form-section {
        margin-bottom: 2.5rem;
        padding: 1.5rem;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.8);
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--accent-color);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }

    .section-title i {
        margin-left: 10px;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .form-control, .select2-container--default .select2-selection--single {
        border-radius: 10px !important;
        border: 1px solid #ddd !important;
        padding: 0.75rem !important;
        height: auto !important;
        background: white !important;
    }

    .btn-premium {
        background: var(--primary-gradient);
        color: white;
        border: none;
        padding: 1rem 3rem;
        border-radius: 50px;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(118, 75, 162, 0.3);
        transition: all 0.3s ease;
    }

    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(118, 75, 162, 0.4);
        color: white;
    }

    .workflow-indicator {
        display: flex;
        justify-content: center;
        margin-top: -30px;
        position: relative;
        z-index: 10;
    }

    .workflow-step {
        background: white;
        width: 120px;
        padding: 0.75rem;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        margin: 0 10px;
        font-size: 0.85rem;
        font-weight: 600;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .workflow-step.active {
        border-color: var(--accent-color);
        color: var(--accent-color);
        transform: scale(1.05);
    }

    .workflow-arrow {
        align-self: center;
        color: #ccc;
    }

    .hidden-section {
        display: none;
    }

    /* Select2 customization */
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 1.5 !important;
    }
</style>
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="neo-glass-card">
                <div class="header-gradient">
                    <h2><i class="fas fa-random me-2"></i> تحويل مالي مركب</h2>
                    <p class="mb-0 opacity-75">نظام إدارة التدفقات المالية المتقدمة للمشاريع</p>
                </div>

                <div class="workflow-indicator">
                    <div class="workflow-step active" id="step1-indicator">
                        <i class="fas fa-sign-in-alt d-block mb-1"></i> المصدر
                    </div>
                    <div class="workflow-arrow"><i class="fas fa-chevron-left"></i></div>
                    <div class="workflow-step" id="step2-indicator">
                        <i class="fas fa-project-diagram d-block mb-1"></i> المشروع
                    </div>
                    <div class="workflow-arrow"><i class="fas fa-chevron-left"></i></div>
                    <div class="workflow-step" id="step3-indicator">
                        <i class="fas fa-sign-out-alt d-block mb-1"></i> المستلم
                    </div>
                </div>

                <form action="{{ route('dashboard.project-transfers.store') }}" method="POST" id="complexTransferForm">
                    @csrf
                    <div class="step-container">
                        @if (session('error'))<div class="alert alert-danger mb-4">{{ session('error') }}</div>@endif
                        
                        <!-- القسم الأساسي: المبلغ والتاريخ -->
                        <div class="row mb-4">
                            <div class="col-md-6 form-group">
                                <label class="form-label font-weight-bold">المبلغ الكلي (ILS) <span class="text-danger">*</span></label>
                                <input type="number" name="amount" class="form-control" step="0.01" required placeholder="0.00">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label font-weight-bold">تاريخ العملية <span class="text-danger">*</span></label>
                                <input type="date" name="transfer_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>

                        <!-- المرحلة 1: المصدر -->
                        <div class="form-section">
                            <div class="section-title"><i class="fas fa-arrow-right"></i> الخطوة الأولى: تحديد مصدر الأموال</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">نوع المصدر <span class="text-danger">*</span></label>
                                    <select name="from_entity_type" id="from_entity_type" class="form-control select2" required>
                                        <option value="project_balance">رصيد مشروع (داخلي)</option>
                                        <option value="client">عميل (خارجي)</option>
                                        <option value="investor">مستثمر (خارجي)</option>
                                        <option value="safe">خزينة / صندوق</option>
                                    </select>
                                </div>
                                <div class="col-md-6" id="from_entity_id_wrapper">
                                    <label class="form-label" id="from_entity_label">المشروع المصدر</label>
                                    <select name="from_project_id" id="from_project_id" class="form-control select2">
                                        <option value="">-- اختر المشروع --</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }} (الرصيد: {{ number_format($project->balance, 2) }} شيكل)</option>
                                        @endforeach
                                    </select>
                                    
                                    <select name="from_entity_id" id="from_client_id" class="form-control select2 hidden-section">
                                        <option value="">-- اختر العميل --</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>

                                    <select name="from_entity_id" id="from_investor_id" class="form-control select2 hidden-section" disabled>
                                        <option value="">-- اختر المستثمر --</option>
                                        @foreach($investors as $investor)
                                            <option value="{{ $investor->id }}">{{ $investor->name }}</option>
                                        @endforeach
                                    </select>

                                    <select name="from_entity_id" id="from_safe_id" class="form-control select2 hidden-section" disabled>
                                        <option value="">-- اختر الخزينة --</option>
                                        @foreach($safes as $safe)
                                            <option value="{{ $safe->id }}">{{ $safe->name }} ({{ $safe->currency }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="voucher_section" class="mt-4 hidden-section">
                                <div class="alert alert-info py-2" id="voucher_alert"><i class="fas fa-info-circle me-1"></i> سيتم إنشاء سند قبض آلي للمصدر وإضافته لميزانية المشروع المختار</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">نوع السند</label>
                                        <select name="voucher_type" class="form-control select2">
                                            <option value="khaled">سند خالد</option>
                                            <option value="mohammed">سند محمد</option>
                                            <option value="wali">سند وليد</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">توضيح الربط</label>
                                        <div class="pt-2 text-muted small">سيتم ربط هذا السند بالمشروع المختار في "المرحلة الأولى" أعلاه لاستلام المبلغ.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- المرحلة 2: التحويل بين المشاريع (اختياري) -->
                        <div class="form-section">
                            <div class="section-title"><i class="fas fa-exchange-alt"></i> الخطوة الثانية: التحويل لمشروع آخر (اختياري)</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="enableProjectTransfer" name="enable_transfer">
                                        <label class="form-check-label" for="enableProjectTransfer">تفعيل التحويل من المشروع الأول إلى مشروع ثانٍ</label>
                                    </div>
                                </div>
                                <div class="col-md-12 hidden-section" id="project_transfer_details">
                                    <label class="form-label">المشروع المستهدف (المستلم النهائي)</label>
                                    <select name="to_project_id" class="form-control select2">
                                        <option value="">-- اختر المشروع الهدف --</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="alert alert-warning mt-2 py-1 small">ملاحظة: سيتم خصم المبلغ من المشروع الأول وإضافته لهذا المشروع.</div>
                                </div>
                            </div>
                        </div>

                        <!-- المرحلة 3: المستلم النهائي -->
                        <div class="form-section">
                            <div class="section-title"><i class="fas fa-arrow-left"></i> الخطوة الثالثة: وجهة الأموال النهائية</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">أين ستستقر الأموال؟</label>
                                    <select name="to_entity_type" id="to_entity_type" class="form-control select2">
                                        <option value="project_balance">البقاء في رصيد المشروع (دفاتر فقط)</option>
                                        <option value="safe">إيداع فعلي في خزينة</option>
                                        <option value="supplier">صرف فوري لمورد</option>
                                    </select>
                                </div>
                                <div class="col-md-6" id="to_entity_id_wrapper">
                                    <div id="to_project_balance_text" class="pt-4 text-muted">سيبقى المبلغ ضمن ميزانية المشروع ولن يتم إيداعه في خزينة حالياً.</div>
                                    
                                    <select name="to_entity_id" id="to_safe_id" class="form-control select2 hidden-section">
                                        <option value="">-- اختر الخزينة للإيداع --</option>
                                        @foreach($safes as $safe)
                                            <option value="{{ $safe->id }}">{{ $safe->name }} ({{ $safe->currency }})</option>
                                        @endforeach
                                    </select>

                                    <select name="to_entity_id" id="to_supplier_id" class="form-control select2 hidden-section">
                                        <option value="">-- اختر المورد للصرف --</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <label class="form-label font-weight-bold">ملاحظات العملية</label>
                            <textarea name="notes" class="form-control" rows="3" placeholder="اكتب تفاصيل إضافية هنا (مثلاً: دفعة تحت الحساب، تسوية مديونية)..."></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-premium px-5">
                                <i class="fas fa-check-circle me-1"></i> تنفيذ العملية المركبة
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            dir: "rtl",
            width: '100%'
        });

        // مراقبة تغيير نوع المصدر
        $('#from_entity_type').on('change', function() {
            const type = $(this).val();
            
            // إخفاء الكل أولاً
            $('#from_project_id').next('.select2-container').hide();
            $('#from_client_id').next('.select2-container').hide();
            $('#from_investor_id').next('.select2-container').hide();
            $('#from_safe_id').next('.select2-container').hide();
            $('#voucher_section').fadeOut();

            if (type === 'project_balance') {
                $('#from_project_id').next('.select2-container').show();
                $('#from_entity_label').text('المشروع المصدر');
                $('#from_project_id').prop('required', true);
                $('#from_client_id').prop('disabled', true);
                $('#from_investor_id').prop('disabled', true);
                $('#from_safe_id').prop('disabled', true);
            } else if (type === 'client') {
                $('#from_client_id').next('.select2-container').show();
                $('#from_entity_label').text('العميل المصدر');
                $('#voucher_alert').html('<i class="fas fa-info-circle me-1"></i> سيتم إنشاء سند قبض آلي للعميل وإضافته لميزانية المشروع المختار');
                $('#voucher_section').fadeIn();
                $('#from_project_id').next('.select2-container').show();
                $('#from_entity_label').text('المشروع (لاستقبال ميزانية العميل)');
                $('#from_client_id').prop('disabled', false);
                $('#from_client_id').prop('required', true);
                $('#from_investor_id').prop('disabled', true);
                $('#from_safe_id').prop('disabled', true);
            } else if (type === 'investor') {
                $('#from_investor_id').next('.select2-container').show();
                $('#from_entity_label').text('المستثمر المصدر');
                $('#voucher_alert').html('<i class="fas fa-info-circle me-1"></i> سيتم إنشاء سند قبض آلي للمستثمر وإضافته لميزانية المشروع المختار');
                $('#voucher_section').fadeIn();
                $('#from_project_id').next('.select2-container').show();
                $('#from_entity_label').text('المشروع (لاستقبال ميزانية المستثمر)');
                $('#from_investor_id').prop('disabled', false);
                $('#from_investor_id').prop('required', true);
                $('#from_client_id').prop('disabled', true);
                $('#from_safe_id').prop('disabled', true);
            } else if (type === 'safe') {
                $('#from_safe_id').next('.select2-container').show();
                $('#from_entity_label').text('الخزينة المصدر');
                $('#from_safe_id').prop('disabled', false);
                $('#from_safe_id').prop('required', true);
                $('#from_project_id').prop('required', false);
                $('#from_client_id').prop('disabled', true);
                $('#from_investor_id').prop('disabled', true);
            }
            
            updateIndicators(1);
        });

        // مراقبة التحويل بين المشاريع
        $('#enableProjectTransfer').on('change', function() {
            if ($(this).is(':checked')) {
                $('#project_transfer_details').slideDown();
                updateIndicators(2);
            } else {
                $('#project_transfer_details').slideUp();
                updateIndicators(1);
            }
        });

        // مراقبة نوع المستلم
        $('#to_entity_type').on('change', function() {
            const type = $(this).val();
            
            $('#to_project_balance_text').hide();
            $('#to_safe_id').next('.select2-container').hide();
            $('#to_supplier_id').next('.select2-container').hide();

            if (type === 'project_balance') {
                $('#to_project_balance_text').show();
            } else if (type === 'safe') {
                $('#to_safe_id').next('.select2-container').show();
            } else if (type === 'supplier') {
                $('#to_supplier_id').next('.select2-container').show();
            }
            
            updateIndicators(3);
        });

        function updateIndicators(step) {
            $('.workflow-step').removeClass('active');
            if (step >= 1) $('#step1-indicator').addClass('active');
            if (step >= 2) $('#step2-indicator').addClass('active');
            if (step >= 3) $('#step3-indicator').addClass('active');
        }

        // تحفيز البدء
        $('#from_entity_type').trigger('change');
    });
</script>
@endpush
