<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;

class QrShareService
{
    // 合成保存分享图片
    public function synthesisShareImg(Request $request)
    {
        // 获取背景图
        $background_img = imagecreatefrompng(config('services.user.save_share_background_img'));

        // 获取二维码
        $qrCode = new QrCode($request->share_url);
        $qrCode->setSize(230);
        $qr_img = imagecreatefromstring($qrCode->writeString());

        imagecopymerge($background_img, $qr_img, 250, 960, 0, 0, imagesx($qr_img), imagesy($qr_img), 100);
        imagepng($background_img);
    }
}
