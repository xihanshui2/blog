<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use wkhtmltox\Image\Converter as ImageConverter;

class PictureController extends Controller
{
    //
    public $path = __DIR__ . '/public/';
    public function index()
    {
        $str = <<<EOD
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Document</title>
            </head>
            <style>
                @font-face {
                    font-family: myFirstFont;
                    src: url('/www/wwwroot/68.168.128.124/blog/public/Microsoft Yahei.ttf');
                }
                
                body {
                    font-family: myFirstFont;
                }
                
                .content-box {
                    text-align: center;
                    overflow: hidden;
                    width: 900px;
                    margin: 0 auto;
                    margin-bottom: 100px;
                }
                
                .content-box img {
                    float: right;
                    width: 300px;
                    margin-top: 20px;
                }
                
                .content-box h1 {
                    margin-top: 100px;
                }
                
                .content-box table {
                    width: 100%;
                }
                
                .content-box table tr td {
                    border: 1px solid black;
                    border-right: 0;
                    border-bottom: 0;
                    padding: 5px 5px;
                }
                
                .content-box table tr td:last-child {
                    border-right: 1px solid black;
                }
                
                .content-box table tr:last-child td {
                    border-bottom: 1px solid black;
                }
                
                .radio-box span {
                    display: inline-block;
                    width: 10px;
                    height: 10px;
                    border: 1px solid black;
                    margin-left: 15px;
                    margin-right: 5px;
                }
                
                .radio-box span.radio-act {
                    background: black;
                }
                
                .radio-box p {
                    display: inline-block;
                    font-size: 12px;
                }
                
                .bank-box span {
                    text-decoration: underline;
                }
                
                .intable tr:last-child td {
                    border-bottom: 0 !important;
                }
                
                .in-mut-table tr td:first-child {
                    border-left: 0;
                }
                
                .in-mut-table tr td:last-child {
                    border-right: 0 !important;
                }
                
                .in-mut-table tr td {
                    border-right: 0 !important;
                    border-bottom: 0 !important;
                    height: 20px;
                    width: 150px;
                    word-break: break-word;
                }
                
                .tip-list p {
                    line-height: 1.6;
                    margin: 0;
                    position: relative;
                }
                
                .user-name {
                    position: absolute;
                    left: 400px;
                    font-weight: bold;
                }
                
                .user-date {
                    left: 650px;
                    position: absolute;
                    font-weight: bold;
                }
                
                .mid-tip {
                    text-align: left;
                    padding-left: 20px;
                    font-size: 12px;
                }
                
                .mid-tip span {
                    font-weight: bold;
                }
                
                .black-tip {
                    background: #a3a3a3;
                    text-align: left;
                    padding-left: 20px !important;
                    font-size: 14px;
                }
                
                .title-name {
                    font-weight: bold;
                }
            </style>
            <body>
                <div class="content-box">
                    <img src="/www/wwwroot/68.168.128.124/blog/public/logo.jpg" />
                    <h1>医疗险理赔申请书</h1>
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="width: 150px;" class="title-name">投保单位</td>
                            <td style="width: 150px;"></td>
                            <td style="width: 150px;" class="title-name">保单号码</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td class="title-name">出险人姓名</td>
                            <td></td>
                            <td class="title-name">性别</td>
                            <td class="radio-box" style="width: 200px;">
                                <span class="radio-act"></span>男
                                <span></span>女
                            </td>
                            <td style="width: 50px;" class="title-name">年龄</td>
                            <td>周岁</td>
                        </tr>
                        <tr>
                            <td style="width: 150px;" class="title-name">工作单位</td>
                            <td style="width: 150px;"></td>
                            <td style="width: 150px;" class="title-name">身份证号</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td style="width: 150px;" class="title-name">联系电话</td>
                            <td style="width: 150px;"></td>
                            <td style="width: 150px;" class="title-name">联系地址</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="6" class="black-tip">
                                申请人与出险人系同一人的，则无须填写本部分
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 150px;" class="title-name">申请人姓名</td>
                            <td style="width: 150px;"></td>
                            <td style="width: 150px;" class="title-name">身份证号码</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td style="width: 150px;" class="title-name">联系电话</td>
                            <td style="width: 150px;"></td>
                            <td style="width: 150px;" class="title-name">联系地址</td>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td class="title-name">申请人身份</td>
                            <td class="radio-box" colspan="5">
                                <span class="radio-act"></span>指定受益人
                                <span></span>受益监护人
                                <span></span>法定受益人
                                <span></span>受益人委托他人
                                <p>（填写授权委托书）</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="black-tip">
                                领取保险金账户信息（若为转账且同投保时所提供的账户信息，无须填写本部分）
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" style="padding: 0;border: 0;">
                                <table class="intable" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td style="width: 120px;" class="title-name">开户行</td>
                                        <td class="bank-box" style="width: 300px;"><span>招商</span> 银行 <span>北京</span>市分行 <span>华贸中心</span> 支行</td>
                                        <td style="width: 90px;" class="title-name">户名</td>
                                        <td style="width: 100px;"></td>
                                        <td style="width: 90px;" class="title-name">账号</td>
                                        <td style="width: 200px;"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 120px;" class="title-name">理赔申请事项</td>
                                        <td class="radio-box" colspan="5">
                                            <span class="radio-act"></span>门急诊医疗
                                            <span></span>住院医疗
                                            <span></span>住院津贴
                                            <span></span>生育医疗
                                            <span></span>手术津贴
                                            <span></span>药房购药
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="black-tip">
                                仅当申请门急诊医疗或住院医疗时,填写下列医疗信息
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="mid-tip">
                                注：相应理赔申请资料请按<span>诊治日期</span>、诊治顺序依次装订在本申请书后，<span>勿粘贴</span>；若需要退发票，请注明并提供相应发票<span>复印件</span>。
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" style="padding: 0;">
                                <table class="intable in-mut-table" border="0" cellspacing="0" cellpadding="0" style="margin-top: 3px;">
                                    <tr>
                                        <td class="title-name">就诊日期</td>
                                        <td class="title-name">就诊医院</td>
                                        <td class="title-name">就诊原因</td>
                                        <td class="title-name">发票张数</td>
                                        <td class="title-name">发票总金额</td>
                                        <td class="title-name">补充说明</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td><span style="float: left;">合计 </span> <span style="float: right;">张</span></td>
                                        <td><span style="float: left;">合计 </span> <span style="float: right;">元</span></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" style="background: #a3a3a3;text-align: left;padding-left: 20px;">
                                申请人声明与授权：
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="tip-list" style="text-align: left;padding-left: 20px;">
                                <p>1．上述各项填报和本人提供的一切资料，均完全属实，如虚假或隐瞒，本人愿承担相应责任。</p>
                                <p>2．本人授权任何知情的单位和个人均可向永安保险公司提供与本理赔申请有关的一切资料。</p>
                                <p>3．本人同意贵公司向医疗及其他有关单位和个人调阅、摘抄、复印与本理赔申请相关的资料。</p>
                                <p>4．本人同意贵公司将有关被保险人的资料用于保险、再保险、数据处理及统计事宜。</p>
                                <p>5．本人清楚明白贵公司的赔付款项一经通过银行成功转账在本理赔申请表所指定的帐户，将视为本人已收到该笔赔偿款项。</p>
                                <p style="height: 150px;padding-top: 20px;"><span class="user-name">申请人签名：<span></span></span> <span class="user-date">日期：<span></span></span>
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </body>
            </html>
EOD;



$converter = new ImageConverter($str, [
	"fmt" => "jpg",
	"out" => $this->path . "test.jpg"
]);

$converter->convert();
    }
}
