<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use App\Repositories\StudentRepository;

class PDFKU3Controller extends PDFController
{
    public function __construct(
        private StudentRepository $studentRepository,
    ){}


    public function pdf() : void {$pdf = $this->createPDF('pdf/KU3.pdf');

        $student = $this->studentRepository->getById(auth()->user()->student->id);
        $pdf->SetFont('THSarabun', '', 14);


        $semester = $student->semester;
        if ($semester == 1 || $semester == 2 || $semester == 3 || $semester == 4) {
            $x = 1;
        }else {$x = 2;}
        $this->writeInPosition($pdf,40, 30.5, $x);


        $date_array = $this->getDateTime();
        $this->writeInPosition($pdf, 115, 30.5, 25 . $date_array["year"]);

        $this->writeInPosition($pdf, 170, 30.5, $this->thaiText('บางเขน'));

        $this->writeInPosition($pdf, 55.5, 46, $this->thaiText($student->first_name));
        $this->writeInPosition($pdf, 70.5, 46, $this->thaiText($student->last_name));


        $student_code = $student->student_code;
        $x = 44;

        for ($i = 0; $i < strlen($student_code); $i++) {
            $this->writeInPosition($pdf, $x, 38.58, $student_code[$i]);
            $x += 7;
            if ($i == 2) { $x += 0.25; }
            if ($i == 6) { $x -= 0.25; }
            if ($i == 7) { $x -= 0.25; }
            if ($i == 8) { $x -= 0.25; }
        }


        $this->writeInPosition($pdf, 40, 53, $this->thaiText("วิทยาศาสตร์"));
        $this->writeInPosition($pdf, 48.75, 60.3, $this->thaiText("วิทยาการคอมพิวเตอร์"));

        $this->writeInPosition($pdf, 170, 46, $student->telephone_num);

        $this->writeInPosition($pdf, 70, 67.55, $this->thaiText($student->advisor_first_name . ' ' . $student->advisor_last_name));


        $pdf->Output();
    }

    public function index() {
        return view('pdf.leave-request.index');
    }
}
