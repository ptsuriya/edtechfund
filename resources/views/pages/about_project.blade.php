@extends('layouts.master')

@section('title', 'Homepage - BizLand Bootstrap Template')
@section('meta_description', 'Welcome to our website.')

@section('content')
    <!-- About Section -->
    <section id="about" class="about section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p><span>Find Out More</span> <span class="description-title">About the Project</span></p>
        </div>
        <!-- End Section Title -->

        <div class="container">

            <div class="row gy-3">

                <!-- ภาพโครงการ -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('img\aai.png') }}" alt="โครงการ Generative AI" class="img-fluid rounded shadow-sm">
                </div>

                <!-- รายละเอียดโครงการ -->
                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-content ps-0 ps-lg-3">
                        <h3 class="fw-bold text-primary mb-3">
                            โครงการต้นแบบแพลตฟอร์มการบริหารและจัดการการใช้ Generative AI
                        </h3>

                        <p class="fst-italic text-dark">
                            เพื่อเสริมสร้างสมรรถนะบุคลากรในการยกระดับการบริหารภาครัฐดิจิทัล
                            และเพิ่มความมั่นคงปลอดภัยของข้อมูลในสถานศึกษา
                        </p>

                        <ul class="list-unstyled">
                            <li class="d-flex mb-3">
                                <i class="bi bi-diagram-3 text-primary fs-4 me-3"></i>
                                <div>
                                    <h5 class="fw-semibold mb-1">พัฒนาระบบต้นแบบด้วย Generative AI</h5>
                                    <p class="mb-0">สร้างแพลตฟอร์มบริหารจัดการที่ทันสมัย ยกระดับงานราชการสู่ดิจิทัล</p>
                                </div>
                            </li>
                            <li class="d-flex">
                                <i class="bi bi-shield-lock fs-4 text-primary me-3"></i>
                                <div>
                                    <h5 class="fw-semibold mb-1">เน้นความปลอดภัยของข้อมูล</h5>
                                    <p class="mb-0">วางโครงสร้างการจัดการข้อมูลให้สอดคล้องกับมาตรฐานความปลอดภัยภาครัฐ</p>
                                </div>
                            </li>
                        </ul>

                        <p class="mt-3">
                            โครงการดำเนินการโดย <strong>มหาวิทยาลัยราชภัฏรำไพพรรณี จังหวัดจันทบุรี</strong>
                            ร่วมกับ <strong>บริษัท Go Digit จำกัด</strong> ซึ่งมีความเชี่ยวชาญด้านนวัตกรรมเทคโนโลยีดิจิทัล
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /About Section -->

    <!-- Principle & Issues Section -->
    <section id="principle" class="about section bg-light">
        <div class="container section-title" data-aos="fade-up">
            <h2>หลักการและเหตุผล</h2>
            <p><span>แนวคิด</span> <span class="description-title">และประเด็นปัญหาที่เกี่ยวข้อง</span></p>
        </div>

        <div class="container">
            <div class="row gy-4">

                <!-- Left Column -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="about-content pe-lg-3">
                        <h4 class="fw-bold text-primary mb-3">ความสำคัญของโครงการ</h4>
                        <p>
                            ในยุคที่โลกขับเคลื่อนด้วยเทคโนโลยีดิจิทัล ระบบอัตโนมัติ และ AI การบริหารจัดการข้อมูลภายในองค์กร
                            โดยเฉพาะในสถานศึกษา มีบทบาทสำคัญในการเพิ่มประสิทธิภาพการทำงานของบุคลากร
                            พร้อมทั้งตอบสนองการเปลี่ยนแปลงอย่างรวดเร็วด้วยระบบที่โปร่งใสและปลอดภัย
                        </p>

                        <h5 class="fw-semibold text-dark mt-4">การเชื่อมโยงกับนโยบายและแผนระดับชาติ:</h5>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle text-success me-2"></i>Thailand 4.0 และ Digital Government
                                Development Plan 2563–2565</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>แผนพัฒนาดิจิทัลฯ แห่งชาติ ฉบับที่ 1
                                (2560–2564)</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>พระราชบัญญัติการพัฒนาดิจิทัลฯ พ.ศ. 2560
                            </li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>แผนการศึกษาแห่งชาติ พ.ศ. 2560–2579</li>
                        </ul>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-content ps-lg-3">
                        <h4 class="fw-bold text-primary mb-3">ประเด็นปัญหาและความท้าทาย</h4>
                        <ol class="ps-3 text-dark">
                            <li class="mb-3">
                                <strong>การจัดการข้อมูลและองค์ความรู้:</strong><br>
                                ข้อมูลกระจัดกระจาย ค้นหาลำบาก ส่งผลต่อประสิทธิภาพการทำงาน
                            </li>
                            <li class="mb-3">
                                <strong>การใช้งาน AI แบบแยกส่วน:</strong><br>
                                ขาดการบูรณาการ ใช้งบประมาณซ้ำซ้อนจากการใช้แพลตฟอร์มหลายระบบ
                            </li>
                            <li class="mb-3">
                                <strong>ความปลอดภัยและการควบคุม:</strong><br>
                                ไม่มีระบบบริหารจัดการสิทธิ์อย่างชัดเจน เสี่ยงต่อข้อมูลรั่วไหล
                            </li>
                            <li>
                                <strong>ขาดแคลนทักษะด้าน AI:</strong><br>
                                บุคลากรขาดทักษะและแนวทางการพัฒนาอย่างต่อเนื่อง
                            </li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /Principle & Issues Section -->

    <!-- Solution Section -->
    <section id="solution" class="about section">
        <div class="container section-title" data-aos="fade-up">
            <h2>แนวทางการแก้ไขปัญหา</h2>
            <p>
                <span>แนวทาง</span>
                <span class="description-title">การพัฒนาและขับเคลื่อนโครงการ</span>
            </p>
        </div>

        <div class="container">
            <div class="row gy-4 align-items-center">

                <!-- Text Content -->
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                    <div class="about-content pe-lg-4">
                        <p>
                            ในยุคที่ภาครัฐกำลังขับเคลื่อนสู่การเป็น <strong>รัฐบาลดิจิทัล (Digital Government)</strong>
                            และสถานศึกษาต้องปรับตัวเข้าสู่ระบบการบริหารจัดการที่ทันสมัย การใช้เทคโนโลยี <strong>Generative
                                AI</strong>
                            กลายเป็นเครื่องมือสำคัญในการเพิ่มประสิทธิภาพการทำงาน ลดภาระงานซ้ำซ้อน และสนับสนุน
                            <strong>Data-Driven Decision Making</strong>
                        </p>

                        <p>
                            อย่างไรก็ตาม หากไม่มีแนวทางการใช้งานที่ชัดเจน
                            อาจก่อให้เกิดความเสี่ยงด้านความมั่นคงปลอดภัยของข้อมูล
                            และกระทบต่อความน่าเชื่อถือขององค์กร
                        </p>

                        <h5 class="fw-semibold text-dark mt-4 mb-3">แนวทางการแก้ไข:</h5>
                        <ul class="list-unstyled ps-2">
                            <li class="mb-3 d-flex">
                                <i class="bi bi-shield-lock-fill text-success me-3 fs-4"></i>
                                <p class="mb-0">
                                    <strong>พัฒนาแพลตฟอร์มบริหารจัดการ Generative AI</strong>
                                    ที่สามารถควบคุมการเข้าถึง การใช้โทเคน และตรวจสอบการใช้งานได้อย่างเป็นระบบ
                                </p>
                            </li>
                            <li class="mb-3 d-flex">
                                <i class="bi bi-person-check-fill text-success me-3 fs-4"></i>
                                <p class="mb-0">
                                    <strong>เสริมสร้างสมรรถนะบุคลากร</strong>
                                    ให้มีทักษะในการใช้ AI อย่างปลอดภัย มีจริยธรรม และเกิดประสิทธิภาพสูงสุด
                                </p>
                            </li>
                            <li class="mb-3 d-flex">
                                <i class="bi bi-boxes text-success me-3 fs-4"></i>
                                <p class="mb-0">
                                    <strong>ดำเนินโครงการในลักษณะ “ต้นแบบ” (Pilot)</strong>
                                    เพื่อเป็นแนวทางแก่สถานศึกษาและหน่วยงานภาครัฐในอนาคต
                                </p>
                            </li>
                            <li class="d-flex">
                                <i class="bi bi-diagram-3-fill text-success me-3 fs-4"></i>
                                <p class="mb-0">
                                    อ้างอิงตาม <strong>ยุทธศาสตร์ปัญญาประดิษฐ์แห่งชาติ</strong> และ
                                    <strong>นโยบายรัฐบาลดิจิทัล</strong> ของประเทศไทย
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Optional Image -->
                <div class="col-lg-5 d-none d-lg-block" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('img/aai2.png') }}" alt="AI Governance" class="img-fluid rounded shadow">
                </div>

            </div>
        </div>
    </section>
    <!-- /Solution Section -->

    <!-- Objectives Section -->
    <section id="objectives" class="section light-background">
        <div class="container" data-aos="fade-up">

            <!-- Section Title -->
            <div class="section-title">
                <h2>วัตถุประสงค์</h2>
            </div>

            <!-- Objectives List -->
            <div class="mb-5">
                <h5 class="fw-bold">วัตถุประสงค์ของโครงการ</h5>
                <ol>
                    <li>เพื่อพัฒนาแพลตฟอร์มบริหารจัดการการใช้เครื่องมือ Generative AI สำหรับหน่วยงานการศึกษาและภาครัฐ</li>
                    <li>เพื่อส่งเสริมการใช้ Generative AI อย่างปลอดภัย โปร่งใส และสอดคล้องกับนโยบายความมั่นคงด้านข้อมูล</li>
                    <li>เพื่อยกระดับทักษะบุคลากรในการใช้ AI อย่างมีประสิทธิภาพ โดยเฉพาะในการกิจสนับสนุนการบริหารภาครัฐ</li>
                    <li>เพื่อเป็นต้นแบบของการนำเทคโนโลยี AI ไปใช้ในระดับท้องถิ่นตามแนวทางการพัฒนาอย่างยั่งยืน</li>
                </ol>
            </div>

            <!-- Indicators Table -->
            <div>
                <h5 class="fw-bold">ตัวชี้วัดผลลัพธ์</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th style="width: 30%;">ตัวชี้วัด</th>
                                <th><p>คำอธิบายผลลัพธ์ที่คาดว่าจะเกิดขึ้น</p></th>
                                <th style="width: 20%;"><p>ค่าที่ตั้งเป้า (Target)</p></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>ระบบแพลตฟอร์มบริหารจัดการการใช้ Generative AI ได้รับการพัฒนาและใช้งานจริง</td>
                                <td>มีระบบต้นแบบ (Prototype) ที่สามารถจัดการบัญชีผู้ใช้งาน การกำหนดสิทธิ์ และการควบคุมการใช้
                                    AI Tools (Token Management & Access Control)</td>
                                <td>พัฒนาและใช้งานได้ 100% ภายในระยะเวลาโครงการ</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>บุคลากรได้รับการพัฒนาทักษะด้าน Generative AI</td>
                                <td>จำนวนบุคลากรที่เข้าร่วมอบรมเชิงปฏิบัติการ และผ่านการประเมินสมรรถนะตามเกณฑ์</td>
                                <td>อย่างน้อย 100 คน ผ่านการอบรม และ 80% ผ่านการประเมินหลังอบรม</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>คู่มือหรือแนวปฏิบัติ (Guideline) การใช้งาน Generative AI ในภาครัฐและสถานศึกษา</td>
                                <td>จัดทำเอกสารแนวทางการใช้งาน Generative AI อย่างปลอดภัย มีจริยธรรม
                                    และเหมาะสมกับภารกิจราชการ</td>
                                <td>แล้วเสร็จภายในระยะเวลาโครงการ และนำเสนอหน่วยงานที่เกี่ยวข้อง</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>ระดับความพึงพอใจของผู้ใช้งานแพลตฟอร์ม</td>
                                <td>การประเมินผลหลังใช้งานจริงของบุคลากรในสถานศึกษา</td>
                                <td>ได้คะแนนเฉลี่ยความพึงพอใจ ≥ 75%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

    <section id="goals-impact" class="section bg-light py-5">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>เป้าหมาย / ผลผลิต / ผลสัมฤทธิ์ที่เกิดในวงกว้าง</h2>
            </div>

            <div class="mb-4">
                <p>
                    เพื่อพัฒนาแพลตฟอร์มบริหารจัดการการใช้ <strong>Generative AI</strong>
                    และยกระดับสมรรถนะบุคลากรในการใช้เทคโนโลยี AI อย่างปลอดภัย มีประสิทธิภาพ
                    และสอดคล้องกับภารกิจของการบริหารภาครัฐดิจิทัลในสถานศึกษา
                    ตลอดจนวางรากฐานเพื่อการขยายผลไปยังหน่วยงานราชการและสถานศึกษาอื่นในระดับภูมิภาค
                </p>
            </div>

            <div class="mb-5">
                <h5 class="fw-bold">ผลผลิตและผลสัมฤทธิ์ที่คาดว่าจะเกิดขึ้น</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">📌 ระบบต้นแบบแพลตฟอร์มบริหารจัดการการใช้ Generative AI
                        พร้อมใช้งานจริงในหน่วยงานต้นแบบ</li>
                    <li class="list-group-item">📌 บุคลากรจำนวนไม่น้อยกว่า 100 คนผ่านการอบรมและประเมินสมรรถนะการใช้
                        Generative AI</li>
                    <li class="list-group-item">📌 เอกสารแนวทาง (Guideline) การใช้ Generative AI
                        อย่างปลอดภัยและเหมาะสมกับภารกิจภาครัฐ</li>
                    <li class="list-group-item">📌 รายงานการประเมินความพึงพอใจของผู้ใช้งานแพลตฟอร์ม</li>
                </ul>
            </div>

            <div>
                <h5 class="fw-bold">ผลสัมฤทธิ์ที่เกิดในวงกว้าง (Outcomes / Broader Impacts)</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">✅ เกิดต้นแบบการใช้ Generative AI
                        อย่างมีระบบในภาครัฐระดับท้องถิ่นและสถานศึกษา</li>
                    <li class="list-group-item">✅ บุคลากรมีความรู้ ความสามารถ และจริยธรรมในการใช้เทคโนโลยี AI
                        ในการปฏิบัติงาน</li>
                    <li class="list-group-item">✅ หน่วยงานต้นแบบมีความพร้อมในการต่อยอดการประยุกต์ใช้ AI ในงานบริการประชาชน
                        การบริหารจัดการภายใน และการวิเคราะห์ข้อมูล</li>
                    <li class="list-group-item">✅ เกิดความตระหนักรู้และแนวทางการบริหารจัดการเทคโนโลยี AI ในมิตินโยบาย
                        ความมั่นคงปลอดภัย และการคุ้มครองข้อมูลส่วนบุคคล</li>
                </ul>
            </div>

        </div>
    </section>

    <section id="target-beneficiaries" class="section py-5 bg-white">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>กลุ่มเป้าหมายที่ได้รับประโยชน์</h2>
            </div>

            <ul class="list-group list-group-flush mb-5">
                <li class="list-group-item">
                    👥 <strong>กลุ่มเป้าหมายหลัก:</strong>
                    บุคลากรทางการศึกษาจากโรงเรียนในจังหวัดจันทบุรีที่เข้าร่วมโครงการนำร่อง จำนวน <strong>100 คน</strong>
                </li>
                <li class="list-group-item">
                    👥 <strong>กลุ่มเป้าหมายรอง:</strong> บุคลากรทางการศึกษาในเครือข่ายที่เข้าร่วมโครงการนำร่องเพิ่มเติม
                    จำนวน <strong>50 คน</strong>
                </li>
            </ul>

            <div class="section-title">
                <h2>พื้นที่ดำเนินงาน</h2>
            </div>

            <p>
                โครงการนี้ดำเนินการในพื้นที่ <strong>โรงเรียนในจังหวัดจันทบุรี</strong>
                ซึ่งเป็นพื้นที่นำร่องที่มีความพร้อมด้านโครงสร้างพื้นฐานทางเทคโนโลยี
                และมีแนวทางการจัดการเรียนรู้เพื่อความยั่งยืนที่ชัดเจน
            </p>
            <p>
                ในระยะต่อไป โครงการมีเป้าหมายในการ <strong>ขยายผลสู่นวัตกรรมการศึกษา</strong> และ
                <strong>เครือข่ายในภูมิภาคอื่น ๆ ทั่วประเทศ</strong> เพื่อสร้างการเปลี่ยนแปลงอย่างยั่งยืนในระดับประเทศ
            </p>

        </div>
    </section>

    <section id="work-plan" class="section py-5 bg-light">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>แผนดำเนินงานและวิธีการดำเนินงาน</h2>
                <p>การดำเนินโครงการจะแบ่งออกเป็น 4 ระยะหลัก โดยแต่ละระยะมีเป้าหมายและกิจกรรมที่ชัดเจน
                    เพื่อให้สามารถพัฒนาแพลตฟอร์มและสร้างการเปลี่ยนแปลงเชิงระบบได้อย่างเป็นรูปธรรม</p>
            </div>

            <!-- Phase 1 -->
            <div class="mb-4">
                <h4>📌 ระยะที่ 1: การวางแผนและออกแบบระบบ (เดือนที่ 1)</h4>
                <ul>
                    <li>ประชุมวางแผนร่วมระหว่างมหาวิทยาลัยและบริษัท Go Digit จำกัด</li>
                    <li>สำรวจความต้องการและลักษณะการใช้งาน Generative AI ในสถานศึกษาและหน่วยงานภาครัฐ</li>
                    <li>ออกแบบโครงสร้างระบบแพลตฟอร์มบริหารจัดการ AI (AI Access, Token Management, User Governance)</li>
                    <li>กำหนดกรอบหลักสูตรและแนวทางการอบรมบุคลากร</li>
                </ul>
            </div>

            <!-- Phase 2 -->
            <div class="mb-4">
                <h4>📌 ระยะที่ 2: การพัฒนาแพลตฟอร์มและสื่ออบรม (เดือนที่ 2-3)</h4>
                <ul>
                    <li>พัฒนาและทดสอบระบบต้นแบบ (Prototype)</li>
                    <li>สร้างระบบบัญชีผู้ใช้งาน สิทธิ์การเข้าถึง และระบบควบคุมการใช้โทเคน</li>
                    <li>จัดทำชุดเนื้อหาอบรมเชิงปฏิบัติการ (Workshop Modules) และแนวทางประเมินสมรรถนะ</li>
                    <li>ออกแบบเอกสารแนวทาง (Guideline) การใช้งาน Generative AI อย่างปลอดภัย</li>
                </ul>
            </div>

            <!-- Phase 3 -->
            <div class="mb-4">
                <h4>📌 ระยะที่ 3: การนำไปใช้จริงและพัฒนาองค์ความรู้ (เดือนที่ 4-5)</h4>
                <ul>
                    <li>ดำเนินการจัดอบรมบุคลากรไม่น้อยกว่า 100 คน</li>
                    <li>นำระบบแพลตฟอร์มไปทดลองใช้จริงในสถานศึกษาต้นแบบ</li>
                    <li>ประเมินผลการใช้งาน ทั้งด้านสมรรถนะผู้ใช้งานและระดับความพึงพอใจ</li>
                    <li>จัดกิจกรรมถ่ายทอดความรู้ (เวิร์กช็อป, กรณีศึกษา)</li>
                </ul>
            </div>

            <!-- Phase 4 -->
            <div>
                <h4>📌 ระยะที่ 4: การสรุปผลและขยายผล (เดือนที่ 6)</h4>
                <ul>
                    <li>วิเคราะห์ข้อมูลจากการใช้งานจริง และสรุปผลลัพธ์ของโครงการ</li>
                    <li>จัดทำรายงานฉบับสมบูรณ์ พร้อมข้อเสนอเชิงนโยบายและแนวทางขยายผล</li>
                    <li>จัดประชุมวิชาการย่อย หรือเวทีแลกเปลี่ยนเรียนรู้ เพื่อเผยแพร่ผลลัพธ์</li>
                    <li>ประเมินผลลัพธ์และจัดทำข้อเสนอแนะสำหรับโครงการระยะต่อไป</li>
                </ul>
            </div>

        </div>
    </section>

    <section id="project-summary" class="about section bg-light">
        <div class="container section-title" data-aos="fade-up">
            <h2>สรุปโครงการ</h2>
            <p><span>ภาพรวม</span> <span class="description-title">ของโครงการต้นแบบแพลตฟอร์มการบริหารและจัดการการใช้
                    Generative AI</span></p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="about-content">
                <p>
                    โครงการต้นแบบแพลตฟอร์มการบริหารและจัดการการใช้ Generative AI
                    มุ่งเน้นการพัฒนาเครื่องมือและระบบบริหารจัดการที่ทันสมัย
                    เพื่อเสริมสมรรถนะบุคลากรภาครัฐและสถานศึกษาในการใช้เทคโนโลยี Generative AI อย่างปลอดภัย โปร่งใส
                    และสอดคล้องกับนโยบายความมั่นคงด้านข้อมูล
                    โครงการนี้มีเป้าหมายหลักในการสร้างต้นแบบแพลตฟอร์มที่สามารถจัดการบัญชีผู้ใช้งาน
                    กำหนดสิทธิ์ และควบคุมการใช้ AI Tools พร้อมทั้งจัดอบรมบุคลากรทางการศึกษาจากโรงเรียนในจังหวัดจันทบุรีจำนวน
                    100 คน
                    เพื่อยกระดับทักษะและความรู้ด้าน AI อย่างมีประสิทธิภาพ
                </p>
                <p>
                    เมื่อโครงการแล้วเสร็จ คาดว่าจะได้ระบบต้นแบบแพลตฟอร์มบริหารจัดการ Generative AI ที่ใช้งานได้จริง
                    คู่มือแนวทางการใช้งาน AI อย่างปลอดภัย
                    และบุคลากรที่มีทักษะพร้อมจริยธรรมในการใช้ AI ในงานราชการ
                    นอกจากนี้ยังจะสร้างความตระหนักรู้และแนวทางการบริหารจัดการเทคโนโลยี AI ที่เหมาะสมในระดับท้องถิ่น
                    เพื่อเป็นพื้นฐานสำหรับการขยายผลไปยังหน่วยงานและสถานศึกษาอื่น ๆ ในภูมิภาคอย่างยั่งยืน
                    โครงการดำเนินการร่วมกับมหาวิทยาลัยราชภัฏรำไพพรรณี
                    และบริษัท Go Digit จำกัด ที่มีความเชี่ยวชาญด้านนวัตกรรมเทคโนโลยีดิจิทัล
                </p>
            </div>
        </div>
    </section>



@endsection
