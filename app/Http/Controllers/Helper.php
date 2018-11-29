<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use PHPMailer\PHPMailer\PHPMailer;

class Helper
{   
    public static function toKh($number)
    {
        $n = ["០","១","២","៣","៤","៥","៦","៧","៨","៩"];
        $kh = "";
        for($i=0;$i<strlen($number);$i++)
        {
            $kh .= $n[(int) $number[$i]];
        }
        return $kh;
    }
    public static function khMonth($month)
    {
        $khmer_month = ['','មករា','កុម្ភៈ',' មីនា','មេសា','ឧសភា','មិថុនា','កក្កដា','សីហា','កញ្ញា','តុលា','វិច្ឆិកា','ធ្នូ'];
        return $khmer_month[(int) $month];
    }
}