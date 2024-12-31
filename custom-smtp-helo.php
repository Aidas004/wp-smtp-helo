<?php
/**
 * Plugin Name: Custom SMTP Plugin
 * Description: A custom SMTP configuration plugin with HELO/EHLO fixes.
 * Version: 1.0
 * Author: Aidas Bagociunas
 */


if (!defined('ABSPATH')) {
    exit; 
}

add_action('phpmailer_init', 'custom_smtp_configure');

function custom_smtp_configure($phpmailer)
{
    $phpmailer->isSMTP();

    // SMTP settings
    $phpmailer->Host = 'smtp.example.com'; 
    $phpmailer->Port = 465;              
    $phpmailer->SMTPAuth = true;         
    $phpmailer->Username = 'mail@example.lt'; 
    $phpmailer->Password = 'password';        
    $phpmailer->SMTPSecure = 'tls';     

    // Fix HELO/EHLO issue
    $phpmailer->Helo = gethostname(); 

    // Set the "From" address
    $phpmailer->setFrom('mail@example.lt', 'Company name'); 
    $phpmailer->CharSet = 'UTF-8';
    $phpmailer->Encoding = 'base64';
    // $phpmailer->SMTPDebug = 2;  // Set to 2 for verbose output, 0 to disable.
    // $phpmailer->Debugoutput = 'html';
}

