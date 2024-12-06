<?php
require 'PhpSpreadsheet/vendor/autoload.php';

// Usar las clases de PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include 'db_connection.php';

// Obtener la lista de voluntarios
$sql = "SELECT * FROM Voluntarios";
$result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Nombre');
$sheet->setCellValue('C1', 'Apellido');
$sheet->setCellValue('D1', 'Correo');
$sheet->setCellValue('E1', 'Teléfono');
$sheet->setCellValue('F1', 'Comisión');
$sheet->setCellValue('G1', 'Disponibilidad');
$sheet->setCellValue('H1', 'Mensaje');
$sheet->setCellValue('I1', 'Fecha de Registro');

$rowNumber = 2;
while ($row = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $rowNumber, $row['ID_Voluntario']);
    $sheet->setCellValue('B' . $rowNumber, $row['Nombre']);
    $sheet->setCellValue('C' . $rowNumber, $row['Apellido']);
    $sheet->setCellValue('D' . $rowNumber, $row['Correo']);
    $sheet->setCellValue('E' . $rowNumber, $row['Telefono']);
    $sheet->setCellValue('F' . $rowNumber, $row['Comision']);
    $sheet->setCellValue('G' . $rowNumber, $row['Disponibilidad']);
    $sheet->setCellValue('H' . $rowNumber, $row['Mensaje']);
    $sheet->setCellValue('I' . $rowNumber, $row['Fecha_Registro']);
    $rowNumber++;
}

$writer = new Xlsx($spreadsheet);
$writer->save('voluntarios.xlsx');

echo "Archivo Excel creado exitosamente!";
$conn->close();
?>
