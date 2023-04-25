<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;


class FillPDFController extends Controller
{
    public function index()
    {
        return view('dashboard.certificate');
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function process(Request $request)
    {
        // $nama = $request->post('nama');
        $nama = "Nurida Larasati";
        $outputfile = public_path().'certificate.pdf';
        $this->fillPDF(public_path().'\master\certificate.pdf',$outputfile,$nama);

        return response()->file($outputfile);
    }

    public function fillPDF($file, $outputfile,$nama)
    {
        $fpdi = new FPDI;
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'],array($size['width'],$size['height']));
        $fpdi->useTemplate($template);
        $top = 105;
        $right = 135;
        $name = $nama;
        $fpdi->SetFont("helvetica","",17);
        $fpdi->SetTextColor(25,26,25);
        $fpdi->Text($right,$top,$name);

        return $fpdi->Output($outputfile,'F');
    }

}
    