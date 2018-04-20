<?php

declare(strict_types=1);

class Mail {
    
    protected $to;
    protected $subject;
    protected $message;
    protected $from;
    protected $headers;
    protected $startHTML;
    protected $endHTML;

    protected $status;

    public function __construct(String $subject, String $message, String $from, String $to = '') {
        $this->subject = htmlentities(trim($subject));
        $this->message = htmlentities(trim($message));
        $this->from = htmlentities(trim($from));
        $this->to = htmlentities(trim($to));

        if(!$this->to){
            $this->to = 'default@default.com';
        }



        $this->setHeaders([
            'MIME-Version' => '1.0',
            'From' => $this->from
        ]);
        
        $this->setSubject();
        $this->addFormatHTML();
        $this->setMessage();
        $this->send(); 

    }

    protected function setHeaders(Array $headers): void {
        $this->headers = "Content-Type: text/html; charset=UTF-8\n";
        foreach ($headers as $key => $value) {
            $this->headers .= "$key: $value\n";
        }
    }

    protected function setSubject(): void {
        $this->subject = "=?UTF-8?B?".base64_encode($this->subject)."?=";
    }

    protected function addFormatHTML(): void {
        $this->startHTML = '
        <!DOCTYPE html>
        <html lang="pl">
        <head>
            <meta charset="utf-8">
        </head>
        <body>
        ';
        $this->endHTML = '
        </body>
        </html>
        ';
    }

    protected function setMessage(): void {
        $this->message = $this->startHTML.$this->message.$this->endHTML;
    }

    protected function send(): void {
        $this->status = mail($this->to, $this->subject, $this->message, $this->headers);
    }

    public function getStatus(): bool {
        return $this->status;

    }
}




?>