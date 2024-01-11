<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use WP_REST_Request;

class WP_Mail
{
    private $errors     = [];
    private $to         = 'ruslan.dev@vyatka-it.ru';
    private $from       = 'info@vyatka-it.ru';
    private $from_title = 'Bedrock';
    private $subject    = 'Новая заявка';
    private $message    = '';

    public function send(WP_REST_Request $request): array
    {
        if ($this->simpleValidate($request)) {
            $response = $this->mail();

            if ($response) {
                return [
                    'success' => 'Успешно'
                ];
            } else {
                return [
                    'errors' => [
                        'Ошибка отправки'
                    ]
                ];
            }
        } else {
            return [
                'errors' => [
                    'Ошибка отправки'
                ]
            ];
        }
    }

    private function simpleValidate(WP_REST_Request $request) : bool
    {
        if (!empty($request->get_param('phone'))) {
            $this->errors[ 'phone' ] = 'Укажите телефон';
        }

        return empty($this->errors);
    }

    private function mail() : bool
    {
        //$mailer = new PHPMailer();
        //$mailer->CharSet = 'UTF-8';
        //$mailer->Subject = $this->subject;
        //$mailer->Body = $this->message;
        //$mailer->isHTML(false);
        //$mailer->setFrom($this->from, $this->from_title);
        //$mailer->addAddress($this->to);
        //
        //if ($this->send()) {
            return true;
        //}
        //
        //return false;
    }
}
