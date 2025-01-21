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


        $this->writeInPosition($pdf, 151.75, 55.58, $this->thaiText("วิทยาศาสตร์"));
        $this->writeInPosition($pdf, 46.75, 67.3, $this->thaiText("วิทยาการคอมพิวเตอร์"));

        $this->writeInPosition($pdf, 118.75, 67.3, $student->telephone_num);


        $pdf->Output();
    }

    public function index() {
        return view('pdf.leave-request.index');
    }
}
