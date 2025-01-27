<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Repositories\StudentRepository;

class PDFResignationController extends PDFController
{

        public function __construct(
            private StudentRepository $studentRepository,
        ){}


        public function pdf() : void {$pdf = $this->createPDF('pdf/resignation.pdf');

            $student = $this->studentRepository->getById(auth()->user()->student->id);
        $pdf->SetFont('THSarabun', '', 14);

        $this->writeInPosition($pdf,26,31.5, $this->thaiText($student->advisor_first_name . ' ' . $student->advisor_last_name));

        $date_array = $this->getDateTime();

        $this->writeInPosition($pdf, 161.75, 31.8, $date_array["day"]);

        $this->writeInPosition($pdf, 175.25, 31.8, $date_array["month"]);

        $this->writeInPosition($pdf, 191.25, 31.8, $date_array["year"]);


        $this->writeInPosition($pdf, 70.5, 44, $this->thaiText($student->first_name));
        $this->writeInPosition($pdf, 85.5, 44, $this->thaiText($student->last_name));


        $student_code = $student->student_code;
        $x = 41;

        for ($i = 0; $i < strlen($student_code); $i++) {
            $this->writeInPosition($pdf, $x, 55.58, $student_code[$i]);
            $x += 5.8;
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
        $this->writeInPosition($pdf,115, 55.5, $x);


        $this->writeInPosition($pdf, 151.75, 55.58, $this->thaiText("วิทยาศาสตร์"));
        $this->writeInPosition($pdf, 46.75, 67.3, $this->thaiText("วิทยาการคอมพิวเตอร์"));

        $this->writeInPosition($pdf, 118.75, 67.3, $student->telephone_num);


        $pdf->Output();
    }

    public function index() {
        return view('pdf.leave-request.index');
    }
}
