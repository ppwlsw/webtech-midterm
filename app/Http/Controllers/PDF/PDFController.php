<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;
use setasign\Fpdi\PdfParser\Filter\FilterException;
use setasign\Fpdi\PdfParser\PdfParserException;
use setasign\Fpdi\PdfParser\Type\PdfTypeException;
use setasign\Fpdi\PdfReader\PdfReaderException;

abstract class PDFController extends Controller
{
    public function __construct(

    ){}

    protected function createPDF(string $path) : Fpdi {
        $file_path = ".." . Storage::url($path);
        $font_dir = ".." . Storage::url('fonts/');

        $pdf = new Fpdi();
        $pdf->AddPage();
        $pdf->setSourceFile($file_path);
        $tplId = $pdf->importPage(1);

        $pdf->useTemplate($tplId, 0, 0, 208);

        $pdf->AddFont('THSarabun', '', 'THSarabun.php', $font_dir);
        $pdf->AddFont('THSarabun', 'Bold', 'THSarabun Bold.php', $font_dir);
        $pdf->SetFont('THSarabun', '', 16);

        return $pdf;
    }

    protected function thaiText(string $text) : string {
        return iconv('UTF-8', 'cp874', $text);
    }

    protected function writeInPosition(Fpdi $pdf, float $x, float $y, string $text) : void {
        $pdf->SetXY($x, $y);
        $pdf->Write(1, $text);
    }

    protected function getDateTime() {
        $date = date('d/m/Y', time());
        $day = explode('/', $date)[0];
        $month = explode('/', $date)[1];
        $year = (int)explode('/', $date)[2];
        $b_year = $year + 543;
        $showed_year = substr((string)$b_year, 2, 2);
        return [
            'day' => $day,
            'month' => $month,
            'year' => $showed_year,
            'full_year' => $b_year,
        ];
    }

    protected function putCheckMarkInPosition(Fpdi $pdf, float $x, float $y) : void {
        $this->writeInPosition($pdf, $x, $y, "v");
        $this->writeInPosition($pdf, $x + 1.25, $y - 0.75, "/");
    }

//    protected function getSemester() {
//        $date_array = $this->getDateTime();
//        $period = "ต้น";
//        $semester_year = $date_array['full_year'];
//        if (in_array($date_array['month'], [12, 1, 2, 3, 4]) ||
//            ((int) $date_array['day'] > 15 && $date_array['month'] == 11)) {
//            $period = "ปลาย";
//            if ($date_array['month'] != 12) {
//                $semester_year = $date_array['full_year'] - 1;
//            }
//        }
//        return [
//            'period' => $period,
//            'semester_year' => (string) $semester_year,
//        ];
//    }

    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws PdfTypeException
     * @throws FilterException
     */
}
