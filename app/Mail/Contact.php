<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
   use Queueable, SerializesModels;

   /**
    * Create a new message instance.
    *
    * @return void
    */
   public $judul;
   public $deskripsi;
   public $name;
   public $message;
   public $email;
   public $phone;

   public function __construct($c_judul, $c_deskripsi, $ct_name, $ct_phone, $ct_email, $ct_pesan, $ct_subject)
   {
       
      //
      $this->judul      = $c_judul;
      $this->deskripsi  = $c_deskripsi;
      $this->name       = $ct_name;
      $this->phone      = $ct_phone;
      $this->email      = $ct_email;
      $this->message    = $ct_pesan;
      $this->subject    = $ct_subject;
   }
   /**
    * Build the message.
    *
    * @return $this
    */
   public function build()
   {
      return $this->from('info@konsulin.id', 'Konsulin.id')
         ->subject('Website Message Contact')
         ->view('email.contact', [
            'judul'         => $this->judul,
            'deskripsi'     => $this->deskripsi,
            'name'          => $this->name,
            'phone'         => $this->phone,
            'email'         => $this->email,
            'subject'       => $this->subject,
            'pesan'         => $this->message,
        ]);
   }
}
