<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Repositories\StudentRepository;

class PDFGeneralRequestController extends PDFController
{

    public function __construct(
        private StudentRepository $studentRepository,
    ){}

    public function pdf() : void {$pdf = $this->createPDF('pdf/general-request.pdf');

        $student = $this->studentRepository->getById(auth()->user()->student->id);

        $pdf->SetFont('THSarabun', '', 14);

        $this->writeInPosition($pdf,35,48, $this->thaiText($student->advisor_first_name . ' ' . $student->advisor_last_name));

        $date_array = $this->getDateTime();

        $this->writeInPosition($pdf, 153.75, 37, $date_array["day"]);

        $this->writeInPosition($pdf, 165.25, 37, $date_array["month"]);

        $this->writeInPosition($pdf, 180.25, 37, $date_array["year"]);

        $this->writeInPosition($pdf, 70.5, 61.80, $this->thaiText($student->first_name));
        $this->writeInPosition($pdf, 85.5, 61.80, $this->thaiText($student->last_name));


        $student_code = $student->student_code;
        $x = 46.5;

        for ($i = 0; $i < strlen($student_code); $i++) {
            $this->writeInPosition($pdf, $x, 73.5, $student_code[$i]);
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
        $this->writeInPosition($pdf,110, 72.5, $x);


        $this->writeInPosition($pdf, 151.75, 72.5, $this->thaiText("วิทยาการคอมพิวเตอร์"));

        $this->writeInPosition($pdf, 46.75, 83, $student->telephone_num);

        $pdf->Output();
    }


}
