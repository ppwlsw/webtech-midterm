<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Repositories\StudentRepository;

class PDFStudyColabController extends PDFController
{

    public function __construct(
        private StudentRepository $studentRepository,
    ){}

    public function pdf() : void {$pdf = $this->createPDF('pdf/study-colab.pdf');

        $student = $this->studentRepository->getById(auth()->user()->student->id);

        $pdf->SetFont('THSarabun', '', 14);

        $this->writeInPosition($pdf,35,47.25, $this->thaiText($student->advisor_first_name . ' ' . $student->advisor_last_name));

        $date_array = $this->getDateTime();

        $this->writeInPosition($pdf, 139.75, 34.25, $date_array["day"]);

        $this->writeInPosition($pdf, 160.25, 34.25, $date_array["month"]);

        $this->writeInPosition($pdf, 189.25, 34.25, $date_array["year"]);

        $this->writeInPosition($pdf, 70.5, 55.80, $this->thaiText($student->first_name));
        $this->writeInPosition($pdf, 85.5, 55.80, $this->thaiText($student->last_name));

        $this->writeInPosition($pdf,140 ,55.80,$this->thaiText($student->student_code));

        $semester = $student->semester;
        if ($semester == 1 || $semester == 1.5) {$x = 1;}
        if ($semester == 2 || $semester == 2.5) {$x = 2;}
        if ($semester == 3 || $semester == 3.5) {$x = 3;}
        if ($semester == 4 || $semester == 4.5) {$x = 4;}
        $this->writeInPosition($pdf,190, 55.80, $x);


        $this->writeInPosition($pdf, 40, 62, $this->thaiText("วิทยาการคอมพิวเตอร์"));


        $pdf->Output();
    }

}
