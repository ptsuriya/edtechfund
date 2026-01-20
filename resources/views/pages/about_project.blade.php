@extends('layouts.master')

@section('title', 'RBRU X Edtech Fund AI Gateway')
@section('meta_description', 'โครงการต้นแบบแพลตฟอร์มการบริหารและจัดการการใช้ Generative AI')

@push('json_ld')
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Event",
      "name": "อบรม Generative AI สำหรับบุคลากรทางการศึกษา",
      "description": "โครงการต้นแบบแพลตฟอร์มการบริหารและจัดการการใช้ Generative AI",
      "eventStatus": "https://schema.org/EventScheduled",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "startDate": "2026-01-27",
      "location": {
        "@type": "Place",
        "name": "มหาวิทยาลัยราชภัฏรำไพพรรณี ตึก 35 ห้องอบรม 35201 และ ห้องปฏิบัติการคอมพิวเตอร์ 35307",
        "address": "มหาวิทยาลัยราชภัฏรำไพพรรณี ตึก 35 ห้องอบรม 35201 และ ห้องปฏิบัติการคอมพิวเตอร์ 35307"
      },
      "organizer": {
        "@type": "Organization",
        "name": "มหาวิทยาลัยราชภัฏรำไพพรรณี"
      },
      "url": "{{ url('/about') }}",
      "inLanguage": "th-TH"
    }
  </script>
@endpush

@section('content')
@include('components.headbanner')

<!-- About Section (อัปเดตถ้อยคำให้สอดคล้องเอกสาร) -->
<section id="about" class="about section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h2>เกี่ยวกับ</h2>
    <p><span>ภาพรวม</span> <span class="description-title">โครงการ</span></p>
  </div>

  <div class="container">
    <div class="row gy-3">
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <img src="{{ asset('img/aai.png') }}" alt="โครงการ Generative AI" class="img-fluid rounded shadow-sm">
      </div>

      <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="about-content ps-0 ps-lg-3">
          <h3 class="fw-bold text-primary mb-3">
            โครงการต้นแบบแพลตฟอร์มการบริหารและจัดการการใช้ Generative AI
          </h3>
          <p class="fst-italic text-dark">
            เสริมสมรรถนะบุคลากร สนับสนุนรัฐบาลดิจิทัล และคุ้มครองความมั่นคงปลอดภัยของข้อมูลในสถานศึกษา
          </p>

          <ul class="list-unstyled">
            <li class="d-flex mb-3">
              <i class="bi bi-diagram-3 text-primary fs-4 me-3"></i>
              <div>
                <h5 class="fw-semibold mb-1">แพลตฟอร์มบริหารจัดการ Generative AI</h5>
                <p class="mb-0">ควบคุมสิทธิ์ การเข้าถึง โทเคน และตรวจสอบการใช้งานอย่างเป็นระบบ</p>
              </div>
            </li>
            <li class="d-flex mb-3">
              <i class="bi bi-shield-lock fs-4 text-primary me-3"></i>
              <div>
                <h5 class="fw-semibold mb-1">ความปลอดภัยและธรรมาภิบาลข้อมูล</h5>
                <p class="mb-0">สอดคล้องมาตรฐานภาครัฐและแนวนโยบายคุ้มครองข้อมูลส่วนบุคคล</p>
              </div>
            </li>
            <li class="d-flex">
              <i class="bi bi-people fs-4 text-primary me-3"></i>
              <div>
                <h5 class="fw-semibold mb-1">พัฒนาและประเมินสมรรถนะบุคลากร</h5>
                <p class="mb-0">จัดอบรมเชิงปฏิบัติการและประเมินผลหลังอบรมตามเกณฑ์</p>
              </div>
            </li>
          </ul>

          <p class="mt-3">
            ดำเนินการโดย <strong>มหาวิทยาลัยราชภัฏรำไพพรรณี</strong> ร่วมกับ
            <strong>บริษัท Go Digit จำกัด</strong>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Principle & Issues Section (คงโครง, เกลาเนื้อหา) -->
<section id="principle" class="about section bg-light">
  <div class="container section-title" data-aos="fade-up">
    <h2>หลักการและเหตุผล</h2>
    <p><span>แนวคิด</span> <span class="description-title">และประเด็นปัญหา</span></p>
  </div>

  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="about-content pe-lg-3">
          <h4 class="fw-bold text-primary mb-3">ความสำคัญ</h4>
          <p>องค์กรภาครัฐและสถานศึกษาต้องการระบบดิจิทัลที่โปร่งใส ปลอดภัย และคล่องตัว พร้อมบุคลากรที่ใช้ AI อย่างมีประสิทธิภาพ</p>
          <h5 class="fw-semibold text-dark mt-4">การเชื่อมโยงนโยบาย</h5>
          <ul class="list-unstyled">
            <li><i class="bi bi-check-circle text-primary me-2"></i>Thailand 4.0 และ Digital Government Development Plan</li>
            <li><i class="bi bi-check-circle text-primary me-2"></i>แผนพัฒนาดิจิทัลแห่งชาติ</li>
            <li><i class="bi bi-check-circle text-primary me-2"></i>กฎหมาย/แนวนโยบายด้านดิจิทัลและการคุ้มครองข้อมูล</li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="about-content ps-lg-3">
          <h4 class="fw-bold text-primary mb-3">ประเด็นปัญหา</h4>
          <ol class="ps-3 text-dark">
            <li class="mb-2"><strong>ข้อมูลกระจัดกระจาย</strong> ส่งผลต่อประสิทธิภาพการทำงานและการค้นคืนความรู้</li>
            <li class="mb-2"><strong>ใช้งาน AI แบบแยกส่วน</strong> ทำให้งบประมาณซ้ำซ้อนและขาดการกำกับดูแล</li>
            <li class="mb-2"><strong>ความมั่นคงปลอดภัย/สิทธิ์เข้าถึง</strong> ยังไม่ชัดเจนและตรวจสอบได้</li>
            <li><strong>ทักษะบุคลากรด้าน AI</strong> ต้องการการยกระดับอย่างเป็นระบบ</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Solution Section (คงโครง, เกลาให้ตรงเอกสาร) -->
<section id="solution" class="about section">
  <div class="container section-title" data-aos="fade-up">
    <h2>แนวทางการแก้ไขปัญหา</h2>
    <p><span>แนวทาง</span> <span class="description-title">การพัฒนาและขับเคลื่อน</span></p>
  </div>

  <div class="container">
    <div class="row gy-4 align-items-center">
      <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
        <div class="about-content pe-lg-4">
          <p>พัฒนาแพลตฟอร์ม <strong>AI Governance</strong> สำหรับ GenAI (Access/Token/Logging/Policy) ควบคู่การอบรมและประเมินสมรรถนะผู้ใช้</p>
          <h5 class="fw-semibold text-dark mt-4 mb-3">หัวใจของแนวทาง</h5>
          <ul class="list-unstyled ps-2">
            <li class="mb-2 d-flex"><i class="bi bi-shield-lock-fill text-primary me-3 fs-4"></i><p class="mb-0"><strong>ควบคุมการเข้าถึงและโทเคน</strong> โปร่งใสและตรวจสอบได้</p></li>
            <li class="mb-2 d-flex"><i class="bi bi-person-check-fill text-primary me-3 fs-4"></i><p class="mb-0"><strong>เสริมสมรรถนะบุคลากร</strong> ผ่าน Workshop/Modules และแบบประเมิน</p></li>
            <li class="mb-2 d-flex"><i class="bi bi-boxes text-primary me-3 fs-4"></i><p class="mb-0"><strong>ดำเนินงานแบบต้นแบบ (Pilot)</strong> เพื่อขยายผล</p></li>
            <li class="d-flex"><i class="bi bi-diagram-3-fill text-primary me-3 fs-4"></i><p class="mb-0">สอดคล้องยุทธศาสตร์ AI แห่งชาติและรัฐบาลดิจิทัล</p></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-5 d-none d-lg-block" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ asset('img/aai2.png') }}" alt="AI Governance" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</section>

<!-- Objectives (อัปเดตให้สอดคล้องไฟล์แผนฯ) -->
<section id="objectives" class="section light-background">
  <div class="container" data-aos="fade-up">
    <div class="section-title"><h2>วัตถุประสงค์</h2></div>
    <div class="mb-5">
      <h5 class="fw-bold">วัตถุประสงค์ของโครงการ</h5>
      <ol>
        <li>พัฒนาแพลตฟอร์มบริหารจัดการการใช้ Generative AI (บัญชี สิทธิ์ โทเคน บันทึกการใช้งาน)</li>
        <li>ยกระดับสมรรถนะบุคลากรในการใช้ AI อย่างปลอดภัย โปร่งใส และมีจริยธรรม</li>
        <li>จัดทำ <em>Guideline</em> การใช้ Generative AI สำหรับหน่วยงานภาครัฐ/สถานศึกษา</li>
        <li>ขยายผลเชิงระบบสู่เครือข่ายการศึกษาและหน่วยงานรัฐระดับภูมิภาค</li>
      </ol>
    </div>

    <div>
      <h5 class="fw-bold">ตัวชี้วัดผลลัพธ์</h5>
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-dark">
            <tr>
              <th style="width:5%">#</th>
              <th style="width:30%">ตัวชี้วัด</th>
              <th>คำอธิบาย</th>
              <th style="width:20%">ค่าเป้าหมาย</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>1</td><td>แพลตฟอร์มต้นแบบพร้อมใช้งาน</td><td>บริหารบัญชี สิทธิ์ โทเคน และบันทึกการใช้งาน</td><td>แล้วเสร็จภายในโครงการ</td></tr>
            <tr><td>2</td><td>การพัฒนาสมรรถนะบุคลากร</td><td>จัดอบรมเชิงปฏิบัติการและประเมินผลหลังอบรม</td><td>≥ 100 คน; ≥ 80% ผ่านเกณฑ์</td></tr>
            <tr><td>3</td><td>จัดทำ Guideline</td><td>แนวทางการใช้ GenAI อย่างปลอดภัยและเหมาะสม</td><td>แล้วเสร็จและเผยแพร่</td></tr>
            <tr><td>4</td><td>ความพึงพอใจผู้ใช้</td><td>สำรวจหลังใช้งานจริง</td><td>เฉลี่ย ≥ 75%</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- Goals & Impact (คงโครง เกลาถ้อยคำ) -->
<section id="goals-impact" class="section bg-light py-5">
  <div class="container" data-aos="fade-up">
    <div class="section-title"><h2>เป้าหมาย / ผลผลิต / ผลสัมฤทธิ์ในวงกว้าง</h2></div>
    <div class="mb-4">
      <p>สร้างต้นแบบการใช้ GenAI อย่างมีระบบในสถานศึกษาและหน่วยงานรัฐ พร้อมยกระดับสมรรถนะบุคลากรและธรรมาภิบาลข้อมูล</p>
    </div>
    <div class="mb-5">
      <h5 class="fw-bold">ผลผลิต</h5>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">แพลตฟอร์มต้นแบบ (AI Gateway)</li>
        <li class="list-group-item">อบรมบุคลากร ≥ 100 คน พร้อมแบบประเมิน</li>
        <li class="list-group-item">เอกสาร Guideline การใช้ GenAI ภาครัฐ/สถานศึกษา</li>
        <li class="list-group-item">รายงานความพึงพอใจผู้ใช้งาน</li>
      </ul>
    </div>
    <div>
      <h5 class="fw-bold">ผลสัมฤทธิ์ (Outcomes)</h5>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">เกิดต้นแบบการกำกับดูแล GenAI ในระดับท้องถิ่น/ภูมิภาค</li>
        <li class="list-group-item">บุคลากรใช้ AI ได้อย่างมีจริยธรรมและปลอดภัย</li>
        <li class="list-group-item">พร้อมต่อยอดการประยุกต์ใช้ AI ในงานบริการ/บริหาร/วิเคราะห์ข้อมูล</li>
        <li class="list-group-item">มีแนวทางกำกับดูแลด้านนโยบาย/ความมั่นคง/PDPA</li>
      </ul>
    </div>
  </div>
</section>

<!-- Target Beneficiaries (คงโครง) -->
<section id="target-beneficiaries" class="section py-5 bg-white">
  <div class="container" data-aos="fade-up">
    <div class="section-title"><h2>กลุ่มเป้าหมายและพื้นที่ดำเนินงาน</h2></div>
    <ul class="list-group list-group-flush mb-4">
      <li class="list-group-item">กลุ่มเป้าหมายหลัก: บุคลากรทางการศึกษาในจังหวัดจันทบุรี (นำร่อง) ~100 คน</li>
      <li class="list-group-item">กลุ่มเป้าหมายรอง: เครือข่ายการศึกษาและหน่วยงานที่เกี่ยวข้อง</li>
    </ul>
    <p>พื้นที่นำร่อง: โรงเรียนในจังหวัดจันทบุรี และเตรียมขยายผลสู่เครือข่ายระดับภูมิภาค</p>
  </div>
</section>

<!-- Work Plan (แทนที่ด้วยโครงจากเอกสารแผนฯ) -->
<section id="work-plan" class="section py-5 bg-light">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>แผนดำเนินงานและวิธีดำเนินงาน</h2>
      <p>ดำเนินโครงการเป็นระยะ พร้อมชุดกิจกรรม/ผลลัพธ์ (Deliverables) ตามลำดับ</p>
    </div>

    <!-- Phase 1 -->
    <div class="mb-4">
      <h4>📌 ระยะที่ 1: วิเคราะห์ความต้องการ & ออกแบบระบบ</h4>
      <ul>
        <li>ประชุมวางแผนร่วม สำรวจการใช้ GenAI ในหน่วยงาน/สถานศึกษา</li>
        <li>ออกแบบสถาปัตยกรรม AI Gateway (Access/Token/Logging/Governance)</li>
        <li>กำหนดกรอบหลักสูตรและ Workshop Modules</li>
      </ul>
      <p class="mb-0"><strong>Deliverables:</strong> TOR/Architecture, Workplan, Syllabus เบื้องต้น</p>
    </div>

    <!-- Phase 2 -->
    <div class="mb-4">
      <h4>📌 ระยะที่ 2: พัฒนา Prototype & ชุดเนื้อหาอบรม</h4>
      <ul>
        <li>พัฒนาและทดสอบระบบต้นแบบ (Prototype)</li>
        <li>สร้างระบบบัญชี สิทธิ์ และการควบคุมโทเคน</li>
        <li>จัดทำ Workshop Modules & แบบประเมิน</li>
        <li>ร่าง Guideline การใช้ GenAI อย่างปลอดภัย</li>
      </ul>
      <p class="mb-0"><strong>Deliverables:</strong> Prototype v1, Workshop Pack v1, Draft Guideline</p>
    </div>

    <!-- Phase 3 -->
    <div class="mb-4">
      <h4>📌 ระยะที่ 3: นำไปใช้จริง & ประเมิน</h4>
      <ul>
        <li>อบรมบุคลากร ≥ 100 คน และประเมินหลังอบรม</li>
        <li>ทดสอบใช้ระบบในหน่วยงานต้นแบบ/สถานศึกษา</li>
        <li>สำรวจความพึงพอใจและรวบรวมข้อเสนอแนะ</li>
      </ul>
      <p class="mb-0"><strong>Deliverables:</strong> Training Report, Satisfaction Survey, Prototype v2</p>
    </div>

    <!-- Phase 4 -->
    <div>
      <h4>📌 ระยะที่ 4: สรุปผล & ขยายผล</h4>
      <ul>
        <li>สังเคราะห์บทเรียน/กรณีศึกษา จัดประชุมวิชาการย่อย/เวทีแลกเปลี่ยน</li>
        <li>จัดทำรายงานฉบับสมบูรณ์และข้อเสนอเชิงนโยบาย</li>
        <li>เผยแพร่ Guideline และแผนขยายผล</li>
      </ul>
      <p class="mb-0"><strong>Deliverables:</strong> Final Report, Guideline (Public), Policy Brief</p>
    </div>
  </div>
</section>

<!-- NEW: Budget Summary (เพิ่มใหม่จากเอกสารแผนฯ) -->
<section id="budget" class="section py-5 bg-white">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>สรุปงบประมาณโครงการ</h2>
      <p>ประมาณการงบประมาณรวม <strong>1,000,000 บาท</strong> แบ่งตามหมวดค่าใช้จ่ายหลัก</p>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered align-middle">
        <thead class="table-dark">
          <tr>
            <th style="width:5%">#</th>
            <th style="width:35%">หมวดค่าใช้จ่าย</th>
            <th>รายละเอียดโดยสรุป</th>
            <th style="width:15%">งบ (บาท)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>ค่าดำเนินงาน/บุคลากรโครงการ</td>
            <td>ค่าตอบแทน/ผู้เชี่ยวชาญ/วิทยากร/บริหารจัดการกิจกรรม</td>
            <td>≈ 340,000</td>
          </tr>
          <tr>
            <td>2</td>
            <td>กิจกรรม/สื่อ/การจัดอบรม</td>
            <td>พัฒนา/ผลิตสื่อ, ค่าใช้จ่ายเวิร์กช็อป, เอกสาร, ประชาสัมพันธ์ ฯลฯ</td>
            <td>≈ 320,000–360,000</td>
          </tr>
          <tr>
            <td>3</td>
            <td>ระบบ AI Gateway (Prototype)</td>
            <td>พัฒนา/ทดสอบระบบต้นแบบ (Access/Token/Logging/Governance)</td>
            <td>≈ 340,000</td>
          </tr>
          <tr>
            <td>4</td>
            <td>เงินสำรองจ่าย/เผื่อเหลือเผื่อขาด</td>
            <td>ไม่เกิน 10% ของวงเงิน</td>
            <td>≈ 100,000</td>
          </tr>
          <tr class="table-secondary">
            <td colspan="3" class="text-end fw-bold">รวม</td>
            <td class="fw-bold">1,000,000</td>
          </tr>
        </tbody>
      </table>
    </div>

    <p class="text-muted small mb-0">
      *ตัวเลขย่อยเป็นสรุปเชิงหมวดจากเอกสารแผนปฏิบัติการ/แผนใช้จ่าย เพื่อสื่อสารบนหน้าเว็บ (รายละเอียดเต็มอยู่ในเอกสารอนุมัติ)
    </p>
  </div>
</section>

<!-- Updated Training Snapshot -->
<section id="training-latest" class="section py-5" style="background: linear-gradient(180deg, #f8fbff 0%, #fff7ed 100%);">
  <div class="container section-title" data-aos="fade-up">
    <h2>กำหนดการอบรมล่าสุด</h2>
    <p><span>สรุปข้อมูลใหม่</span> <span class="description-title">พร้อมลิงก์สมัคร</span></p>
  </div>

  <div class="container">
    <div class="row g-4 align-items-start">
      <div class="col-lg-7">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body p-4">
            <h5 class="fw-bold text-primary mb-3">ตารางกำหนดการ (อัปเดตจาก “กำหนดการ Ver.2_4 Modules.docx”)</h5>
            <div class="timeline">
              <div class="mb-3 d-flex">
                <div class="me-3 fw-bold text-primary">08:00-08:30</div>
                <div>
                  <div class="fw-semibold">ลงทะเบียนและเตรียมความพร้อม</div>
                  <small class="text-muted">ลงทะเบียน ตรวจสอบอุปกรณ์และอินเทอร์เน็ต</small>
                </div>
              </div>
              <div class="mb-3 d-flex">
                <div class="me-3 fw-bold text-primary">08:30-09:00</div>
                <div class="fw-semibold">พิธีเปิดโครงการ</div>
              </div>
              <div class="mb-3 d-flex">
                <div class="me-3 fw-bold text-primary">09:00-10:30</div>
                <div>
                  <div class="fw-semibold">การออกแบบแผนการสอนด้วย Generative AI</div>
                  <small class="text-muted d-block">กิจกรรม: เขียนแผนการสอน T-pack | วิทยากร: อาจารย์ ดร.ศิรินุช ศรารัชต์</small>
                </div>
              </div>
              <div class="mb-3 d-flex">
                <div class="me-3 fw-bold text-primary">10:30-12:00</div>
                <div>
                  <div class="fw-semibold">การออกแบบกิจกรรมการเรียนรู้ด้วย Generative AI</div>
                  <small class="text-muted d-block">วิทยากร: อ.ดร.พีรญา สุขขีวรรณ</small>
                </div>
              </div>
              <div class="mb-3 d-flex">
                <div class="me-3 fw-bold text-primary">12:00-13:00</div>
                <div class="fw-semibold">พักรับประทานอาหาร</div>
              </div>
              <div class="mb-3 d-flex">
                <div class="me-3 fw-bold text-primary">13:00-14:30</div>
                <div>
                  <div class="fw-semibold">การใช้ Generative AI เพื่อการวิจัยในชั้นเรียนอย่างมีจริยธรรม</div>
                  <small class="text-muted d-block">วิทยากร: อ.ดร.พีรญา สุขขีวรรณ, คุณปัญจพัฒน์ เกรียงวีระยุทธ</small>
                </div>
              </div>
              <div class="d-flex">
                <div class="me-3 fw-bold text-primary">14:30-16:00</div>
                <div>
                  <div class="fw-semibold">การใช้ Generative AI เพื่อลดภาระงานที่ไม่ใช่งานสอน</div>
                  <small class="text-muted d-block">วิทยากร: คุณปัญจพัฒน์ เกรียงวีระยุทธ</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body p-4 d-flex flex-column justify-content-between">
            <div>
              <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="badge bg-info text-white fs-6 px-3 py-2 rounded-pill">เปิดรับ 100 ท่าน</span>
                <span class="text-primary fw-bold"><i class="bi bi-calendar-event me-1"></i>27 ม.ค. 2569</span>
              </div>
              <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>มหาวิทยาลัยราชภัฏรำไพพรรณี ตึก 35 ห้องอบรม 35201 และ ห้องปฏิบัติการคอมพิวเตอร์ 35307</p>
              <p class="mb-3 text-muted"><small>เปิดรับสมัครถึง 19 มกราคม 2569</small></p>
              <h6 class="fw-bold text-secondary">หัวข้อเด่น</h6>
              <ul class="list-unstyled mb-4">
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>AI Competency Framework</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Ethics & Human-centered AI</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>AI Pedagogy & Assessment</li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>AI for Professional Development</li>
              </ul>
            </div>
            <div class="d-grid gap-2">
              <a href="{{ route('register_name') }}" class="btn btn-primary">
                <i class="bi bi-list-check me-2"></i>ตรวจสอบรายชื่อผู้สมัคร
              </a>
              <a href="{{ asset('กำหนดการ Ver.2_4 Modules.docx') }}" class="btn btn-outline-primary" target="_blank">
                <i class="bi bi-file-earmark-text me-2"></i>ดาวน์โหลดกำหนดการล่าสุด
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row g-3 mt-4">
      <div class="col-lg-6">
        <img src="{{ asset('img/35Building.webp') }}" alt="อาคาร 35 มหาวิทยาลัยราชภัฏรำไพพรรณี" class="img-fluid rounded shadow-sm">
      </div>
      <div class="col-lg-6">
        <div class="ratio ratio-4x3 h-100">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8751.914369538585!2d102.10126208392838!3d12.657199860058276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310483ec067cb9b5%3A0xa4f9f3c819cd4986!2z4Lit4Liy4LiE4Liy4Lij4LmA4LiJ4Lil4Li04Lih4Lie4Lij4Liw4LmA4LiB4Li14Lii4Lij4LiV4Li04LivIOC4leC4tuC4gSAzNQ!5e1!3m2!1sth!2sth!4v1768280147282!5m2!1sth!2sth" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Project Summary (คงโครง เกลาถ้อยคำ) -->
<section id="project-summary" class="about section bg-light">
  <div class="container section-title" data-aos="fade-up">
    <h2>สรุปโครงการ</h2>
    <p><span>ภาพรวม</span> <span class="description-title">ผลลัพธ์ที่คาดหวัง</span></p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="about-content">
      <p>โครงการมุ่งสร้างแพลตฟอร์มต้นแบบสำหรับกำกับดูแลการใช้ GenAI ในสถานศึกษาและหน่วยงานรัฐ พร้อมยกระดับทักษะบุคลากรและสร้างแนวทางกำกับดูแลที่ปลอดภัยและตรวจสอบได้</p>
      <p>ผลที่คาดว่าจะได้รับ ได้แก่ ระบบต้นแบบพร้อมใช้งานจริง ชุด Workshop & Guideline สำหรับการใช้งานอย่างรับผิดชอบ บุคลากรผ่านการอบรม ≥ 100 คน และการประเมินความพึงพอใจระดับที่น่าพอใจ พร้อมข้อเสนอเชิงนโยบายเพื่อขยายผล</p>
    </div>
  </div>
</section>

<!-- Attachments Section -->
<section id="attachments" class="section py-5 bg-white">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>เอกสารแนบ</h2>
      <p><span></span> <span class="description-title">ไฟล์ประกอบโครงการ</span></p>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th style="width:5%;">#</th>

            <th>คำอธิบาย</th>
            <th style="width:15%;">ดาวน์โหลด</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>

            <td>รายงานความก้าวหน้าและการเบิกจ่ายงวดที่ 1</td>
            <td class="text-center">
              <a href="{{ asset('files/letter1.pdf') }}" class="btn btn-sm btn-primary" target="_blank">
                <i class="bi bi-file-earmark-pdf"></i> ดาวน์โหลด
              </a>
            </td>
          </tr>
          <tr>
            <td>2</td>

            <td>รายละเอียดกิจกรรม แผนการใช้จ่าย และงบประมาณ</td>
            <td class="text-center">
              <a href="{{ asset('files/plans1.pdf') }}" class="btn btn-sm btn-primary" target="_blank">
                <i class="bi bi-file-earmark-pdf"></i> ดาวน์โหลด
              </a>
            </td>
          </tr>
          <tr>
            <td>3</td>

            <td>กำหนดการโครงการ</td>
            <td class="text-center">
              <a href="{{ asset('กำหนดการ Ver.2_4 Modules.docx') }}" class="btn btn-sm btn-primary" target="_blank">
                <i class="bi bi-file-earmark-text"></i> ดาวน์โหลด
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</section>



@endsection
