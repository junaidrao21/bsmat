<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('Europe/London');

/** Include PHPExcel_IOFactory */
//require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php';
require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';


if (!file_exists("pam.xlsm")) {
	exit("Please run 05featuredemo.php first." . EOL);
}

$objPHPExcel = PHPExcel_IOFactory::load("pam.xlsx");

$server = "localhost";
$user = "root";
$pass = "password";
$conn = mysqli_connect($server,$user, $pass);
mysqli_select_db($conn,'test');
$result=mysqli_query($conn,"SELECT*FROM data");
$i=12;
while($row = mysqli_fetch_row($result)){
  $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $row[0])
            ->setCellValue('B'.$i, $row[1])
            ->setCellValue('C'.$i, $row[2])
            ->setCellValue('D'.$i, $row[3])
            ->setcellvalue('E'.$i, $row[4])
            ->setcellvalue('F'.$i, $row[5])
            ->setcellvalue('G'.$i, $row[6])
            ->setcellvalue('H'.$i, $row[7])
            ->setcellvalue('I'.$i, $row[8])
            ->setcellvalue('J'.$i, $row[9])
            ->setcellvalue('K'.$i, $row[10])
            ->setcellvalue('L'.$i, $row[11])
            ->setcellvalue('M'.$i, $row[12])
            ->setcellvalue('N'.$i, $row[13]);
  $i++;
}
mysqli_close($conn);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="01simple.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
