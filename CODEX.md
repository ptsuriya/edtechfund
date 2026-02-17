# CODEX Project Brief: edtechfundpromax

## 1) ภาพรวมโปรเจค
- โปรเจคนี้เป็นเว็บประชาสัมพันธ์/ข้อมูลโครงการ `RBRU X Edtech Fund AI Gateway`
- ใช้ `Laravel 10` + `Blade` เป็นหลัก (ไม่มี SPA framework)
- เนื้อหาส่วนใหญ่เป็นหน้าแบบ static content แต่มีบางหน้าโหลดข้อมูลแบบ client-side จาก Google Apps Script API

## 2) Stack และเวอร์ชันสำคัญ
- Backend: `PHP ^8.1`, `laravel/framework ^10.10`
- Frontend build: `Vite ^5`, `laravel-vite-plugin ^1`
- UI: Bootstrap template (assets อยู่ใน `public/template`)
- JS data-fetching ส่วนใหญ่เขียน inline ใน Blade

## 3) โครงสร้างที่ควรรู้ก่อนแก้
- Route หลัก: `routes/web.php`
- Controller ที่มี logic: `app/Http/Controllers/AboutController.php`
- Layout หลัก: `resources/views/layouts/master.blade.php`
- Navbar/เมนู: `resources/views/components/navbar.blade.php`
- หน้า Home: `resources/views/welcome.blade.php`
- หน้าคอนเทนต์หลัก: `resources/views/pages/*.blade.php`
- รูป/ไฟล์แนบ: `public/img`, `public/files`

## 4) เส้นทางหน้าเว็บ (จาก `routes/web.php`)
- `/` -> `welcome`
- `/about` -> `pages.about_project`
- `/about/document` -> `pages.document`
- `/helpbook` -> `pages.helpbook`
- `/faq` -> `pages.faq`
- `/about/reserchers` -> `AboutController@reserchers`
- `/about/participants` -> `AboutController@participants`
- `/register` -> `pages.register`
- `/ActivityPicrture` -> `pages.activity_picture`
- `/register-name` -> `pages.register_name`

หมายเหตุ: มีชื่อที่สะกดแปลกและใช้งานจริงอยู่แล้ว เช่น `reserchers`, `ActivityPicrture` ห้ามรีเนมหรือแก้ route โดยไม่เช็คผลกระทบทั้งเมนู/ลิงก์/SEO

## 5) จุดที่มี Dynamic Data / External Integration
- `resources/views/pages/participants_summary.blade.php`
  - ดึงข้อมูลรายชื่อจาก Google Apps Script (`action=read&path=API`)
  - มี search/sort และ sessionStorage cache (`participantsSummaryCache_v1`)
- `resources/views/pages/register_name.blade.php`
  - ดึงข้อมูลจาก Apps Script endpoint เดียวกัน
  - มี search/sort และซ่อน/แสดงคอลัมน์ตามข้อมูลจริง
- `resources/views/layouts/master.blade.php`
  - prefetch ข้อมูล API เข้า sessionStorage (`registerNameCache_v2`) เพื่อลดเวลาโหลด
- `resources/views/pages/activity_picture.blade.php`
  - ใช้ Google Drive folder link + embedded preview

ถ้า API เปลี่ยน schema ให้แก้ `mapRows/pickValue/render` ในแต่ละหน้า ไม่ได้มี shared service กลาง

## 6) วิธีรันในเครื่อง
1. `cp .env.example .env`
2. `composer install`
3. `php artisan key:generate`
4. `npm install`
5. `php artisan serve`
6. `npm run dev`

หมายเหตุ: โปรเจคนี้แทบไม่พึ่งฐานข้อมูลสำหรับหน้า public ปัจจุบัน แต่ config DB ใน `.env` ยังเป็นค่า Laravel มาตรฐาน

## 7) แนวทางแก้ไขที่ปลอดภัยสำหรับ Codex
- ถ้าแก้หน้าเว็บทั่วไป: แก้ที่ Blade ใน `resources/views/...`
- ถ้าแก้เมนู: แก้ `components/navbar.blade.php` และตรวจ route name ให้ตรง
- ถ้าแก้ SEO/meta/asset รวม: แก้ `layouts/master.blade.php`
- หลีกเลี่ยงการแก้ไฟล์ vendor/template จำนวนมากถ้าไม่จำเป็น
- ระวัง hardcoded URL ภายนอก (PowerBI, Google Drive, Apps Script, ระบบ login ภายนอก)
- ตรวจ responsive ทุกครั้งเมื่อเพิ่มตารางหรือ iframe

## 8) คำสั่งเช็คก่อนส่งงาน
- รัน test ขั้นต่ำ: `php artisan test`
- ถ้าแก้ JS/CSS: `npm run build`
- เช็ค syntax Blade/PHP จุดที่แก้ และเช็ค route link ไม่แตก

## 9) Known Risks / Technical Debt
- Business logic อยู่ใน Blade หลายหน้า (inline script ยาว)
- URL ภายนอก hardcoded หลายจุด ไม่มี config กลาง
- route/path สะกดผิดเชิงประวัติศาสตร์ (`reserchers`, `ActivityPicrture`) ทำให้ refactor ต้องระวัง
- README ยังเป็นค่า default Laravel ไม่อธิบายโดเมนงานของโปรเจค

## 10) Suggested Next Refactor (ถ้าจะยกระดับในอนาคต)
- ย้าย external URLs ไป `config/project.php` + `.env`
- แยก JS ของแต่ละหน้าออกจาก Blade ไปไฟล์ module
- เพิ่ม feature tests สำหรับ route สำคัญและ HTTP status
- ทำ README โปรเจคจริง (deploy, data flow, owner endpoints)
