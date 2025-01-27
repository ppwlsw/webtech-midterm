<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Repositories\StudentRepository;

class PDFLeaveRequestController extends PDFController
{

    public function __construct(
        private StudentRepository $studentRepository,
    ){}

    public function pdf() : void {$pdf = $this->createPDF('pdf/leave-request.pdf');

        $student = $this->studentRepository->getById(auth()->user()->student->id);

        $pdf->SetFont('THSarabun', '', 14);

        $this->writeInPosition($pdf,35,34.25, $this->thaiText($student->advisor_first_name . ' ' . $student->advisor_last_name));

        $date_array = $this->getDateTime();

        $this->writeInPosition($pdf, 134.75, 34.25, $date_array["day"]);

        $this->writeInPosition($pdf, 148.25, 34.25, $date_array["month"]);

        $this->writeInPosition($pdf, 162.25, 34.25, $date_array["year"]);

        $this->writeInPosition($pdf, 70.5, 48.80, $this->thaiText($student->first_name));
        $this->writeInPosition($pdf, 85.5, 48.80, $this->thaiText($student->last_name));


        $student_code = $student->student_code;
        $x = 46.5;

        for ($i = 0; $i < strlen($student_code); $i++) {
            $this->writeInPosition($pdf, $x, 59.5, $student_code[$i]);
            $x += 5.25;
            if ($i == 2) { $x += 0.25; }
            if ($i == 6) { $x -= 0.25; }
            if ($i == 7) { $x -= 0.25; }
            if ($i == 8) { $x -= 0.25; }
        }

        $semester = $student->semester;
        if ($semester == 1 || $semester == 1.5) {$x = 1;}
        if ($semester == 2 || $semester == 2.5) {$x = 2;}
        if ($semester == 3 || $semester == 3.5) {$x = 3;}
        if ($semester == 4 || $semester == 4.5) {$x = 4;}
        $this->writeInPosition($pdf,110, 59.5, $x);


        $this->writeInPosition($pdf, 151.75, 59.5, $this->thaiText("วิทยาการคอมพิวเตอร์"));

        $this->writeInPosition($pdf, 46.75, 70, $student->telephone_num);

        $pdf->Output();
    }

    public function index() {
        return view('pdf.leave-request.index');
    }
}
