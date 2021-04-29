<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue; 


class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $pdf;
    protected $motor;
    public function __construct($pdf,$motor)
    {
        //
        $this->pdf = $pdf;
        $this->motor = $motor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

      if ($this->motor->infoMotor->email != ""){
        return $this->view('mail.mail')->with(['motor'=>$this->motor])
        ->to($this->motor->infoMotor->email)->cc(['samuel.mayorga@cmeamir.com','sams134@gmail.com','irma.mayorga@cmeamir.com'])
        ->subject('Ingreso de Orden '.strtoupper($this->motor->year)."-".$this->motor->os)->from('info@cmeamir.com','CLINICA DE MOTORES ELECTRICOS AMIR')
        ->attachData($this->pdf,'Ingreso de OS: '.$this->motor->year."-".$this->motor->os.".pdf");
      }
      else
      return $this->view('mail.mail')->with(['motor'=>$this->motor])
      ->to('samuel.mayorga@cmeamir.com')->cc(['sams134@gmail.com','irma.mayorga@cmeamir.com'])
      ->subject('Ingreso de Orden '.strtoupper($this->motor->year)."-".$this->motor->os)->from('info@cmeamir.com','CLINICA DE MOTORES ELECTRICOS AMIR')
      ->attachData($this->pdf,'Ingreso de OS: '.$this->motor->year."-".$this->motor->os.".pdf");
    }
}
