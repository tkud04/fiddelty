<?php
namespace App\Helpers\Contracts;

Interface HelperContract
{
        public function sendEmail($data,$viewType,$type);
        public function bomb($data);
}
 ?>