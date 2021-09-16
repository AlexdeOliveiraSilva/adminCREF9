<?php

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\S3\ObjectUploader;
use Aws\Exception\MultipartUploadException;
use Aws\S3\MultipartUploader;
use Aws\Ses\SesClient;
use Aws\Common\Aws;

class Awslib
{



    function uploadFile($file, $key)
    {

        $CI = &get_instance();


        $s3Client = new S3Client([
            'region' => 'us-east-1',
            'credentials' => [
                'key'    => $CI->config->item('aws_access_key'),
                'secret' => $CI->config->item('aws_secret_key'),
            ],
            'version' => 'latest'
        ]);





        $source = $file['tmp_name'];

        $result = $s3Client->putObject(
            array(
                'Bucket' => "cref9",
                'Key'    => $key,
                'SourceFile' => $source,
                'ACL' => "public-read"
            )
        );

        if ($result["@metadata"]["statusCode"] == '200') {
            return $result["ObjectURL"];
        }

        return null;
    }


    public function sendEmail($subject, $to_email, $content)
    {
        $CI = &get_instance();
        $params = array(
            'credentials' => array(
                'key' => $CI->config->item('aws_access_key'),
                'secret' => $CI->config->item('aws_secret_key'),
            ),
            'region' => 'us-east-1',
            'version' => 'latest'
        );
        $SesClient = new SesClient($params);
        $sender_email = 'naoresponda@crefprbeneficios.com.br';
        $recipient_emails = [$to_email];
        // Specify a configuration set. If you do not want to use a configuration comment it or delete.
        //$configuration_set = 'ConfigSet';
        $subject = 'Meu mídia - '.$subject;
        // $plaintext_body = 'This email was sent with Amazon SES using the AWS SDK for PHP.';
        $html_body = $content;
        $char_set = 'UTF-8';
        try {
            $result = $SesClient->sendEmail([
                'Destination' => [
                    'ToAddresses' => $recipient_emails,
                ],
                // 'ReplyToAddresses' => [$sender_email],
                'Source' => $sender_email,
                'Message' => [
                    'Body' => [
                        'Html' => [
                            'Charset' => $char_set,
                            'Data' => $html_body,
                        ],
                        // 'Text' => [
                        //     'Charset' => $char_set,
                        //     'Data' => $plaintext_body,
                        // ],
                    ],
                    'Subject' => [
                        'Charset' => $char_set,
                        'Data' => $subject,
                    ],
                ],
                // If you aren't using a configuration set, comment or delete the following line
                //'ConfigurationSetName' => $configuration_set,
            ]);
            $messageId = $result['MessageId'];
            return true;
        } catch (AwsException $e) {
            // output error message if fails
           return false;
        }
    }
}
