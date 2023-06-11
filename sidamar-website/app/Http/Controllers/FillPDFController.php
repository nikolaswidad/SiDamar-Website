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
        $nama = $request->post('nama');
        $judul = $request->post('judul');
        $deskripsi = $request->post('tanggal');
        $outputfile = public_path().'certificate.pdf';
        $this->fillPDF(public_path().'\master\certificate.pdf',$outputfile,$nama,$judul);

        return response()->file($outputfile);
    }

    public function fillPDF($file, $outputfile,$nama,$judul)
    {
        $fpdi = new FPDI;
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'],array($size['width'],$size['height']));
        $fpdi->useTemplate($template);
        $top = 108;
        $right = 47;
        $name = strtoupper($nama);
        // Panggil font Poppins dengan fungsi AddFont()
        $fpdi->AddFont('Poppins', 'B', 'Poppins-Bold.php', true);
        $fpdi->AddFont('Poppins', '', 'Poppins-Regular.php', true);

        $fpdi->SetFont('Poppins', 'B', 39.5);
        $fpdi->SetTextColor(1, 37, 84);
        $fpdi->Text($right,$top,$name);

        $fpdi->SetFont('Poppins', '', 17.8);
        $fpdi->SetTextColor(1, 37, 84);
        $fpdi->Text($right+20.5, $top+33.8, $judul);
        // $fpdi->Text($right, $top+100, $tanggal);

        return $fpdi->Output($outputfile,'F');
    }

}
    