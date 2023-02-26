<?php
$this->load->view('layout-base/header');
$this->load->view('layout-base/content');

if (strtolower($this->router->fetch_class()) != 'auth') $this->load->view('layout-base/navbar');

$this->load->view($this->router->fetch_class() . '/' . $this->router->fetch_method());
$this->load->view('layout-base/footer');
?>