<?php
// $Id: install.php 35 2012-02-16 14:12:22Z east $

error_reporting(E_ALL ^ E_NOTICE);

define('DIDA_ROOT', getcwd());

function install(){
  include "myinstall.php";
}