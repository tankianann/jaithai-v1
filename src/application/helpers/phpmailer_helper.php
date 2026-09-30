<?php if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require 'phpmailer/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function phpmailer_send_email2($config)
{
    if ( ! jaithai_outbound_enabled() || jaithai_env('JAITHAI_ELASTIC_EMAIL_API_KEY', '') === '') {
        return false;
    }

    $url = 'https://api.elasticemail.com/v2/email/send';

    try {
        $post = array (
            'from'            => 'catering@jai-thai.com',
            'fromName'        => 'Jai Thai Catering',
            'apikey'          => jaithai_env('JAITHAI_ELASTIC_EMAIL_API_KEY', ''),
            'subject'         => $config[ 'subject' ],
            'bodyHtml'        => $config[ 'message' ],
            'to'              => $config[ 'to' ],
            'isTransactional' => false,
        );

        if (isset($config[ 'attachment' ]) && $config[ 'attachment' ]) {
            $filename                 = $config[ 'attachment_filename' ];
            $file_name_with_full_path = $config[ 'attachment' ];
            $filetype                 = "application/pdf";
            $post[ 'file_1' ]         = new CurlFile($file_name_with_full_path, $filetype, $filename);
        }

        $ch = curl_init();

        curl_setopt_array($ch, array (
            CURLOPT_URL            => $url,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $post,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_SSL_VERIFYPEER => false
        ));

        $result = curl_exec($ch);
        curl_close($ch);


        if (isset($config[ 'cc' ]) && $config[ 'cc' ]) {
            $post[ 'to' ] = $config[ 'cc' ];

            $ch = curl_init();

            curl_setopt_array($ch, array (
                CURLOPT_URL            => $url,
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => $post,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER         => false,
                CURLOPT_SSL_VERIFYPEER => false
            ));

            $result = curl_exec($ch);
            curl_close($ch);
        }

        if (isset($config[ 'bcc' ]) && $config[ 'bcc' ]) {
            $post[ 'to' ] = $config[ 'bcc' ];

            $ch = curl_init();

            curl_setopt_array($ch, array (
                CURLOPT_URL            => $url,
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => $post,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER         => false,
                CURLOPT_SSL_VERIFYPEER => false
            ));

            $result = curl_exec($ch);
            curl_close($ch);
        }

        //echo $result;
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}


function phpmailer_send_email3($config)
{
    if (
        ! jaithai_outbound_enabled()
        || jaithai_env('JAITHAI_SMTP_HOST', '') === ''
        || jaithai_env('JAITHAI_SMTP_USERNAME', '') === ''
        || jaithai_env('JAITHAI_SMTP_PASSWORD', '') === ''
    ) {
        return false;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = jaithai_env('JAITHAI_SMTP_HOST', '');
        $mail->SMTPAuth   = true;
        $mail->Username   = jaithai_env('JAITHAI_SMTP_USERNAME', '');
        $mail->Password   = jaithai_env('JAITHAI_SMTP_PASSWORD', '');                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = (int) jaithai_env('JAITHAI_SMTP_PORT', 587);

        $mail->setFrom($config[ 'from' ], $config[ 'from_name' ]);
        $mail->addAddress($config[ 'to' ]);
        if (isset($config[ 'cc' ]) && $config[ 'cc' ]) {
            $mail->addCC($config[ 'cc' ]);
        }
        if (isset($config[ 'bcc' ]) && $config[ 'bcc' ]) {
            $mail->addBCC($config[ 'bcc' ]);
        }
        if (isset($config[ 'attachment' ]) && $config[ 'attachment' ]) {
            $mail->addAttachment($config[ 'attachment' ]);
        }
        $mail->isHTML(true);
        $mail->Subject = $config[ 'subject' ];
        $mail->Body    = $config[ 'message' ];
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}


function phpmailer_send_email($config)
{
    if ( ! jaithai_outbound_enabled() || jaithai_env('JAITHAI_BREVO_API_KEY', '') === '') {
        return false;
    }

    $api_key = jaithai_env('JAITHAI_BREVO_API_KEY', '');

    $data = [
        'subject'     => $config[ 'subject' ],
        'sender'      => ['name' => $config[ 'from_name' ], 'email' => $config[ 'from' ]],
        'replyTo'     => ['name' => $config[ 'from_name' ], 'email' => $config[ 'from' ]],
        'to'          => [['email' => $config[ 'to' ]]],
        'htmlContent' => $config[ 'message' ],
    ];
    if (isset($config[ 'cc' ]) && $config[ 'cc' ]) {
        $data[ 'cc' ] = [
            ['email' => $config[ 'cc' ]]
        ];
    }
    if (isset($config[ 'bcc' ]) && $config[ 'bcc' ]) {
        $data[ 'bcc' ] = [
            ['email' => $config[ 'bcc' ]]
        ];
    }
    if (isset($config[ 'attachment' ]) && $config[ 'attachment' ]) {
        $data[ 'attachment' ] = [
            [
                'url'  => 'https://www.jai-thai.com/' . $config[ 'attachment' ],
                'name' => $config[ 'attachment_filename' ],
            ]
        ];
    }

    $data    = json_encode($data);
    $headers = [
        "accept: application/json",
        "api-key: ".$api_key,
        "content-type: application/json",
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_URL, "https://api.brevo.com/v3/smtp/email");

    $result = curl_exec($ch);

    curl_close($ch);
}
