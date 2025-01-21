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




        $this->writeInPosition($pdf, 70.5, 46, $this->thaiText($student->first_name));
        $this->writeInPosition($pdf, 85.5, 46, $this->thaiText($student->last_name));


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


        $pdf->Output();
    }

    public function index() {
        return view('pdf.leave-request.index');
    }
}
