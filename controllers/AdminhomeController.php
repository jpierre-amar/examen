<?php

class AdminhomeController extends BaseAdminController
{

    public function index()
    {
        // security to avoid direct access
        $this->requireSessionAdmin();


        include 'views/admin/home/index.php';
    }
}
