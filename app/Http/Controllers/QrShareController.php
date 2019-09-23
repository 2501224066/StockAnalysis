<?php

namespace App\Http\Controllers;

use App\Http\Services\QrShareService;
use Illuminate\Http\Request;

class qrShareController extends Controller
{

    protected $qrShareService;

    public function __construct(
        QrShareService $qrShareService
    ){
        $this->qrShareService = $qrShareService;
    }

    // 二维码分享
    public function index(Request $request)
    {   
        $this->verify($request, [
            'share_url' => ['required', 'regex:/^http.*/'],
        ]);

        ob_start();
        $this->qrShareService->synthesisShareImg($request);
        $down_file = ob_get_clean();
        ob_clean ();
        header("content-type:image/jpeg");
        header('Content-Disposition: attachment; filename="share.png"');
        header('Content-Length: ' . strlen($down_file));
        echo $down_file;
    }
}