<?php

namespace Sunlong\CaptchaLumen;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

/**
 * Class CaptchaController
 * @package Mews\Captcha
 */
class LumenCaptchaController extends Controller
{

    /**
     * get CAPTCHA
     *
     * @param \Yangbx\CaptchaLumen\CaptchaService $captcha
     * @param string $config
     * @param $captchaId
     * @return \Intervention\Image\ImageManager->response
     */

    public function getCaptcha(Captcha $captcha, $type = 'default', $captchaId)
    {
        header('Content-Type:image/png');
        return $captcha->createById($type, $captchaId)->getContent();
        return response($captcha->createById($type, $captchaId), 200)->header('Content-Type', 'image/png');
    }

    /**
     * get CAPTCHA getCaptchaInfo API
     * @param Request $request
     * @param string $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCaptchaInfo(Request $request, $type = 'default')
    {
        $urlDomain = substr(str_replace($request->decodedPath(), '', $request->url()), 0, -1);
        $captchaUuid = $this->generate_uuid();
        $captchaData = [
            'captchaUrl'=>$urlDomain.'/captcha/'.$type.'/'.$captchaUuid,
            'captchaUuid'=>(string)$captchaUuid
        ];
        if($callback = $request->get('callback','')){
            return response($callback.'('.json_encode($captchaData).')');
        }else{
            return response()->json($captchaData);
        }

    }

    /**
     * generatge UUID
     * @return string
     */
    function generate_uuid(){
        $charId = md5(uniqid(rand(), true));
        $hyphen = chr(45);// "-"
        $uuid = substr($charId, 0, 8).$hyphen
            .substr($charId, 8, 4).$hyphen
            .substr($charId, 12, 4).$hyphen
            .substr($charId, 16, 4).$hyphen
            .substr($charId, 20, 12);
        return $uuid;
    }

}
