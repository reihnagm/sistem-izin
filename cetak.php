<?php

require 'vendor/autoload.php';

$name = $_GET['name'];
$tglOut = $_GET['tgl_out'];
$tglIn = $_GET['tgl_in'];
$need = $_GET['need'];
$class = $_GET['class'];
$parent = $_GET['parent'];
$detail = $_GET['keterangan'];

if($need == "Pulang") {
    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('surat_jalan_pulang.docx');
} else {
    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('surat_jalan_keluar.docx');
}

$templateProcessor->setValue('nama', $name);
$templateProcessor->setValue('wali', $parent);
$templateProcessor->setValue('kelas', $class);
$templateProcessor->setValue('waktu_keluar', $tglOut);
$templateProcessor->setValue('waktu_kembali', $tglIn);
$templateProcessor->setValue('keperluan', $need);
$templateProcessor->setValue('keterangan', $detail);

if($need == "Pulang") {
    $filename = 'surat-jalan-pulang-'.date('Y-m-d').'.docx';
} else {
    $filename = 'surat-jalan-keluar-'.date('Y-m-d').'.docx';
}

$templateProcessor->saveAs($filename);

// Download the generated file
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.$filename.'');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filename));
readfile($filename);
// exit;