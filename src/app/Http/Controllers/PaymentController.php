<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// paypay関係
use PayPay\OpenPaymentAPI\Client;
use PayPay\OpenPaymentAPI\Models\OrderItem;
use PayPay\OpenPaymentAPI\Models\CreateQrCodePayload;


class PaymentController extends Controller
{
    public function paypay()
    {
        // .envファイルに書いておく
        $client = new Client([
            'API_KEY' => env('PAYPAY_API_KEY'),
            'API_SECRET' => env('PAYPAY_API_SECRET'),
            'MERCHANT_ID' => env('PAYPAY_MERCHANT_ID'),
        ], false);



        // paypayの支払いサイトが完了したら、リダイレクトされるURL
        // ブラウザの戻るボタンで戻っても、支払いIDが決済完了になっているので３秒後にリダイレクトされ直すだけ
        $rediect_url = 'https://paypay.ne.jp/';

        //-------------------------------------
        // 商品情報を生成する
        //-------------------------------------
        $items = (new OrderItem())
            ->setName('チケット一枚')
            ->setQuantity(1)
            ->setUnitPrice(['amount' => 1200, 'currency' => 'JPY']);

        //-------------------------------------
        // QRコードを生成する
        //-------------------------------------
        $payload = new CreateQrCodePayload();
        $payload->setOrderItems($items);
        $payload->setMerchantPaymentId("mpid_" . rand());    // 同じidを使いまわさないこと！
        $payload->setCodeType("ORDER_QR");
        $payload->setAmount(["amount" => 1200, "currency" => "JPY"]);
        $payload->setRedirectType('WEB_LINK');
        $payload->setIsAuthorization(false));
        $payload->setRedirectUrl($rediect_url);
        $payload->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $QRCodeResponse = $client->code->createQRCode($payload);
        if ($QRCodeResponse['resultInfo']['code'] !== 'SUCCESS') {
            echo ("QRコード生成エラー");
            return;
        }
        // paypayの支払いページに行く。支払いが終わったら$payload->setRedirectUrlにリダイレクトされる
        return redirect($QRCodeResponse['data']['url']);
        // 支払いIDはデータベースに保存しておく
        $merchantPaymentId = $QRCodeResponse['data']['merchantPaymentId'];
        Log::info('paypay決済ID', $merchantPaymentId);

        //var_dump($QRCodeResponse);

        //-------------------------------------
        // 決済情報を取得する
        //-------------------------------------
        $QRCodeDetails = $client->payment->getPaymentDetails($merchantPaymentId);
        if ($QRCodeDetails['resultInfo']['code'] !== 'SUCCESS') {
            echo ("決済情報取得エラー");
            return;
        }
        Log::info('paypay決済情報', $QRCodeDetails);
    }
    public function paypay_thanks()
    {
        return 'paypay支払い完了！<br><a href="home">戻る</a>';
    }
}
