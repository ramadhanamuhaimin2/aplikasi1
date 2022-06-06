<?php

class app
{
    public function data_KA()
    {
        require('controllers/CKA.php');
        $mhs = new CKA();
        $mhs->cetakListKA();
    }
}
