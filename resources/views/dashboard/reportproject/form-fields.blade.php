
<style>
@import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;600&display=swap');

body {
  font-family: 'Tajawal', sans-serif;
  background: #f8f9fb;
  color: #222;
  direction: rtl;
  margin: 0;
  padding: 20px;
}

.container {
  max-width: 1000px;
  margin: 20px auto;
  background: #fff;
  border-radius: 8px;
  padding: 25px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.section-header {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 15px;
  color: #00897b;
}

.section-header i {
  font-size: 18px;
}

.section-header h3 {
  margin: 0;
  font-size: 18px;
}

.form-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 15px;
}

.form-group {
  display: flex;
  flex-direction: column;
}

.form-group label {
  font-size: 14px;
  color: #444;
  margin-bottom: 6px;
}

.form-group input,
.form-group textarea {
  border: 1px solid #ccc;
  border-radius: 6px;
  padding: 12px 10px;
  font-size: 15px;
  font-family: inherit;
  outline: none;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.form-group textarea {
  min-height: 100px;
  resize: vertical;
}

.form-group input:focus,
.form-group textarea:focus {
  border-color: #00897b;
  box-shadow: 0 0 4px rgba(0,137,123,0.3);
}

h3, label, input, textarea {
  line-height: 3;
}

</style>

<div class="container">

    <!-- المعلومات الأساسية رقم الحوض و رقم الارض-->
    <div class="form-section">
        <div class="section-header"><i class="fas fa-info-circle"></i><h3>المعلومات الأساسية</h3></div>
        <div class="form-grid">
            <div class="form-group"><label>اسم المشروع</label><input type="text" name="project_name"></div>
            <div class="form-group"><label>رقم الحوض</label><input type="text" name="land_number"></div>
            <div class="form-group"><label>موقع المشروع</label><input type="text" name="project_location"></div>
            <div class="form-group"><label>نوع العمل</label><input type="text" name="project_type"></div>
            <div class="form-group"><label> عدد الشقق المقترحة </label><textarea name="apartment_details"></textarea></div>
            <div class="form-group"><label>تكلفة الأرض</label><input type="number" name="land_cost"></div>
            <div class="form-group"><label>المهندسين</label><input type="text" name="engineers"></div>
        </div>
    </div>

    <!-- قسم البلدية -->
    <div class="form-section">
        <div class="section-header"><i class="fas fa-building"></i><h3>البلدية - الأقسام</h3></div>
        <div class="form-grid">
            <div class="form-group"><label>الكهرباء</label><input type="number" name="electricity"></div>
            <div class="form-group"><label>العقد</label><input type="number" name="contract"></div>
            <div class="form-group"><label>الطرق</label><input type="number" name="roads"></div>
            <div class="form-group"><label>التحسين</label><input type="number" name="improvement"></div>
            <div class="form-group"><label>البيئة</label><input type="number" name="environment"></div>
            <div class="form-group"><label>جيحون</label><input type="number" name="johan"></div>
        </div>
    </div>

    <!-- مهندسين -->
    <div class="form-section">
        <div class="section-header"><i class="fas fa-hard-hat"></i><h3>مهندسين المشروع</h3></div>
        <div class="form-grid">
            <div class="form-group"><label>مهندس مراقب العمال</label><input type="text" name="supervisor_engineer"></div>
            <div class="form-group"><label>مهندس تنفيذي</label><input type="text" name="executive_engineer"></div>
            <div class="form-group"><label>مهندس الحديد</label><input type="text" name="iron_engineer"></div>
        </div>
    </div>

    <!-- التكاليف والمتابعة -->
    <div class="form-section">
        <div class="section-header"><i class="fas fa-dollar-sign"></i><h3>التكاليف والمتابعة</h3></div>
        <div class="form-grid">
            <div class="form-group"><label>التكاليف الإجمالية للمشروع</label><input type="number" name="total_cost"></div>
            <div class="form-group"><label>التكاليف الفعلية للمشروع</label><input type="number" name="actual_cost"></div>
            <div class="form-group"><label>سعر الشقة</label><input type="number" name="apartment_price"></div>
            <div class="form-group"><label>نسبة الربح</label><input type="number" name="profit_percentage"></div>
            <div class="form-group"><label>أتعاب الترخيص</label><input type="number" name="licensing_fees"></div>
            <div class="form-group"><label>تكاليف المهندسين</label><input type="number" name="engineers_fees"></div>
            <div class="form-group"><label>بند الإعلان</label><input type="number" name="advertising_cost"></div>
            <div class="form-group"><label>بند الباطون</label><input type="number" name="concrete_cost"></div>
            <div class="form-group"><label>الحفر</label><input type="text" name="excavation"></div>
        </div>
    </div>

    <!-- المقاولين -->
    <div class="form-section">
        <div class="section-header"><i class="fas fa-users"></i><h3>المقاولون</h3></div>
        <div class="form-grid">
            <div class="form-group"><label>المقاول - شغل</label><input type="text" name="contractor_work"></div>
            <div class="form-group"><label>المقاول - عدة</label><input type="text" name="contractor_tools"></div>
            <div class="form-group"><label>اللحيد</label><input type="text" name="welding"></div>
            <div class="form-group"><label>الحجر</label><input type="text" name="stone"></div>
            <div class="form-group"><label>الباطون</label><input type="text" name="concrete"></div>
            <div class="form-group"><label>الكنتير</label><input type="text" name="container"></div>
            <div class="form-group"><label>الكاميرا</label><input type="text" name="camera"></div>
            <div class="form-group"><label>الأسلاك الصغيرة</label><input type="text" name="small_wires"></div>
            <div class="form-group"><label>الحارس</label><input type="text" name="guard"></div>
        </div>
    </div>

    <!-- إضافات أخرى -->
    <div class="form-section">
        <div class="section-header"><i class="fas fa-tools"></i><h3>إضافات</h3></div>
        <div class="form-grid">
            <div class="form-group"><label>تكلفة بين الدرج</label><input type="number" name="stairs_cost"></div>
            <div class="form-group"><label>باب البيت</label><input type="text" name="house_door"></div>
            <div class="form-group"><label>الميدة</label><input type="text" name="mida"></div>
            <div class="form-group"><label>السطح</label><input type="text" name="roof"></div>
            <div class="form-group"><label>طفاية حريق</label><input type="text" name="fire_extinguisher"></div>
            <div class="form-group"><label>بيت الدرج</label><input type="text" name="staircase"></div>
            <div class="form-group"><label>نظام تتبع تسلسل الأوراق</label><input type="text" name="document_tracking"></div>
            <div class="form-group"><label>الضريبة</label><input type="number" name="tax"></div>
        </div>
    </div>

