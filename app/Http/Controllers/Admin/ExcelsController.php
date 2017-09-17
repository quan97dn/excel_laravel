<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use PHPExcel_Worksheet_Drawing;
use App\User;

class ExcelsController extends Controller
{
    public function getExportTableUser(Request $request) {

    	// Title name export 
    	$filename = 'chamcong_Vooc_'.date('m-Y');

    	Excel::create($filename, function($excel) {

    		$user = User::get();

    		$excel->setTitle('Excel Timekeeping');

    		$excel->setDescription('Excel Timekeeping Member Vooc');

		    $excel->sheet('ExcelVooc', function($sheet) use ($user) {

		    	// ======================= HEADER VALUE DEFAULT ============================= //

		    	$sheet->setWidth('A', 6);
		    	// include image logo (Vooc)
		     	$objDrawing = new PHPExcel_Worksheet_Drawing;
		        $objDrawing->setPath(public_path('img/logovooc.png')); //your image path
		        $objDrawing->setCoordinates('B2');
		        $objDrawing->setWorksheet($sheet);

		        // text 'Bảng Chấm Công'
		        $sheet->mergeCells('D2:Q2');
		        $sheet->cell('D2', function($cell) {
				    $cell->setValue('BẢNG CHẤM CÔNG');
				    $cell->setFont(['family' => 'Calibri', 'size' => '20', 'bold' =>  true]);
					$cell->setAlignment('center');
				});

		        // text 'Thảng :'
		        $sheet->mergeCells('E4:F4');
		        $sheet->cellS('E4', function($cell) {
				    $cell->setValue('Tháng :');	
				    $cell->setFont(['family' => 'Calibri', 'size' => '11', 'bold' =>  true]);
				});
		        $sheet->mergeCells('G4:I4');
		        $sheet->setCellValue('G4', date('m/Y'));

		        // Text 'Công tiêu chuẩn :'
		        $sheet->mergeCells('J4:N4');
		        $sheet->cellS('J4', function($cell) {
				    $cell->setValue('Ngày công trong tháng :');	
				    $cell->setFont(['family' => 'Calibri', 'size' => '11', 'bold' =>  true]);
				});
		        $sheet->mergeCells('O4:P4');
		        $sheet->setCellValue('O4', ($this->getYearDateN(date('m'), date('Y')) - 8));

		        // Text 'Ghi Chú :'
		        $sheet->mergeCells('E5:F5');
		        $sheet->cellS('E5', function($cell) {
				    $cell->setValue('Ghi Chú :');	
				    $cell->setFont(['family' => 'Calibri', 'size' => '11', 'bold' =>  true]);
				});

		        $sheet->mergeCells('G5:N5');
		        $sheet->setCellValue('G5', 'Làm nguyên ngày, được 1 công, ghi "1"');
		        $sheet->mergeCells('G6:Q6');
		        $sheet->setCellValue('G6', 'Chỉ làm nửa ngày, không nghỉ phép được 1/2 công, ghi "0.5"');
		        $sheet->mergeCells('G7:O7');
		        $sheet->setCellValue('G7', 'Nghỉ 1 ngày phép, được tính 1 công phép, ghi "P"');
		        $sheet->mergeCells('G8:Y8');
		        $sheet->setCellValue('G8', 'Làm nửa ngày và nghỉ 1/2 ngày phép, được tính 1/2 công phép và được tính 1/2 công thường, ghi "P/2"');
		        $sheet->mergeCells('G9:O9');
		        $sheet->setCellValue('G9', 'Nghỉ nguyên ngày, không tính công, ghi "0"');

		        // ============================= Load Table In Database export excel =============================== //
		        
		        // Column STT 
		        $sheet->mergeCells('A11:A12'); // set Cells (STT)
		        $sheet->setBorder('A11:A12', 'thin'); // set Border (STT)
		        $sheet->cellS('A11', function($cell) { // set (STT) text - font- center
				    $cell->setValue('STT');	
				    $cell->setFont(['family' => 'Calibri', 'size' => '11', 'bold' =>  true]);
				    $cell->setAlignment('center');
				    $cell->setValignment('center');
				});

		        // Column ID
		        $sheet->mergeCells('B11:B12'); // set Cells (Mã Nhân Viên)
		        $sheet->setBorder('B11:B12', 'thin'); // set Border (Mã Nhân Viên)
		        $sheet->cellS('B11', function($cell) { // set (Mã NV) text - font- center
				    $cell->setValue('Mã NV');	
				    $cell->setFont(['family' => 'Calibri', 'size' => '11', 'bold' =>  true]);
				    $cell->setAlignment('center');
				    $cell->setValignment('center');
				});

		        $sheet->mergeCells('C11:E11'); // set Cells (Họ Và Tên)
		        $sheet->mergeCells('C12:E12');	// set Cells (Họ và Tên)
		        $sheet->setBorder('C11:E11', 'thin'); // set Border (Họ và Tên)
		        $sheet->setBorder('C12:E12', 'thin'); // set Border (Họ và Tên)
		        $sheet->setMergeColumn(['columns' => ['C', 'D', 'E'], 'rows' => [[11, 12], [11, 12]]]);

		        $sheet->cellS('C11', function($cell) { // set (Họ Và Tên) text - font- center
				    $cell->setValue('Họ Và Tên');	
				    $cell->setFont(['family' => 'Calibri', 'size' => '9', 'bold' =>  true]);
				    $cell->setAlignment('center');
				    $cell->setValignment('center');
				});
		    
		    	for($i = 1; $i < 4; $i++) { // for col (-)

			    	for($y = 13; $y < (13 + count($user)); $y++) { // for col (|)

			        	$sheet->cellS($this->columnCain($i).($y).'', function($cell) use ($i, $y, $user) {

			        		switch($this->columnCain($i)) {
			        			case 'A':
			        				$cell->setValue($y - 12);
			        				break;
			        			case 'B':
			        				$cell->setValue($user[($y - 13)]['id']);
			        				break;
			        			case 'C':
			        				$cell->setValue($user[$y - 13]['f_name'].' '.$user[$y - 13]['l_name']);
			        				break;
			        		}
			        		$cell->setAlignment('left');
						});

			        	$sheet->setBorder($this->columnCain($i).$y.':'.$this->columnCain($i).$y.'', 'thin'); // set border column load database .
						
						$sheet->mergeCells('C'.$y.':'.'E'.$y.''); // set Cells col (Họ Và Tên) .
							
			        }

		    	}
  				
  				// ================================================ Col - (Ngày Làm Việc) ========================================= //

		    	$sheet->mergeCells('F11'.':'.$this->columnCain($this->getYearDateN(date('m'), date('Y')) + 5).'11'); // set Cells (Ngày Làm Việc) .

		    	$sheet->setBorder('F11'.':'.$this->columnCain($this->getYearDateN(date('m'), date('Y')) + 5).'11', 'thin'); // set Border (Ngày Làm Việc) .


		    	for($y = 12; $y < (13 + count($user)); $y++) { // set Border (col 1-max && load ckeck) .

		    		$sheet->setBorder('F'.$y.':'.$this->columnCain($this->getYearDateN(date('m'), date('Y')) + 5).$y, 'thin');
		    	}

		    	$sheet->cellS('F11', function($cell) { // set (Ngày Làm Việc) text - font- center .
				    $cell->setValue('Ngày Làm Việc');	
				    $cell->setFont(['family' => 'Calibri', 'size' => '11', 'bold' =>  true]);
				    $cell->setAlignment('center');
				});

		    	$d = 1; // Vali $d++ set value col (NC) .

		    	$bgCol = ['J', 'K', 'Q', 'R', 'X', 'Y', 'AE', 'AF']; // Col set background active (T7, CN) .

		    	for($i = 6; $i < ($this->getYearDateN(date('m'), date('Y')) + 6); $i++) { // For where date .

		    		$sheet->cellS($this->columnCain($i).'12', function($cell) use($d) {  // set (STT) text - font- center .
					    $cell->setValue($d);	
					    $cell->setFont(['family' => 'Calibri', 'size' => '11', 'bold' =>  true]);
					    $cell->setAlignment('center');
					});

		    		$sheet->setWidth($this->columnCain($i), 5); // set width col (NC).

		    		for($c = 0; $c < count($bgCol); $c++) { // for col set background (T7, CN) .

		    			if($this->columnCain($i) == $bgCol[$c]) {

		    				for($y = 12; $y < (13 + count($user)); $y++) {
		    					$sheet->cells($this->columnCain($i).$y.':'.$this->columnCain($i).$y, function($cells) {
    								$cells->setBackground('#CFCFCF'); // set background col active (t7, cn) .
								});
		    				}
		    				
		    			}

		    		}

					$d++;
		    	}

		    	// ======================================== Col (Rs - (CT/CP/TC/CTR/Gtr)) ========================================== //
		    	
		    	$d = 0; // vali $d++ in for (-).

		    	$lableRs = ['Công thường', 'Công phép', 'Tổng công', 'Cơm trưa', 'Ghi chú']; // lable col result .

		    	// For col Max (getYearDateN) -> col Max (Result) (-) .
		    	for($i = ($this->getYearDateN(date('m'), date('Y')) + 6); $i < ($this->getYearDateN(date('m'), date('Y')) + 11); $i++) {

		    		$sheet->setWidth($this->columnCain($i), 12); // set width col lable result .

		    		$sheet->mergeCells($this->columnCain($i).'11:'.$this->columnCain($i).'12'); // set Cells col lable result .


		    		$sheet->cellS($this->columnCain($i).'11', function($cell) use ($d, $lableRs) {  // set (STT) text - font- center .
		
		    			$cell->setValue($lableRs[$d]);
					    $cell->setFont(['family' => 'Calibri', 'size' => '10.5', 'bold' =>  true]);
					    $cell->setAlignment('center');
				    	$cell->setValignment('center');

					});

			    	for($y = 11; $y < (13 + count($user)); $y++) { // For col max (count user) (|) .

			    		$sheet->setBorder($this->columnCain(($this->getYearDateN(date('m'), date('Y')) + 6)).$y.':'.$this->columnCain($this->getYearDateN(date('m'), date('Y')) + 10).$y, 'thin'); // set Border col result .

			    	}

			    	$d++;
			    }

			    // ====================================== Col (Rs - (NL/QL/HC)) =================================================== //
			    
			    // Cells lable Col Footer .
			    $sheet->mergeCells('C'.(14 + count($user)).':'.'E'.(14 + count($user))); // Col -> (NL).
			    $sheet->mergeCells('P'.(14 + count($user)).':'.'S'.(14 + count($user))); // Col -> (QL).
			    $sheet->mergeCells('AC'.(14 + count($user)).':'.'AG'.(14 + count($user))); // Col -> (HC).

			    $lableFooter   = ['Người lập', 'Quản Lý', 'Hành Chính']; // Lable .
			    $lableValiable = ['C', 'P', 'AC']; // col (-) .

			    for($i = 0; $i < count($lableFooter); $i++) { // For lable .

			    	$sheet->cellS($lableValiable[$i].(14 + count($user)), function($cell) use($i, $lableFooter) { 
					    $cell->setValue($lableFooter[$i]);	
					    $cell->setFont(['family' => 'Calibri', 'size' => '11', 'bold' =>  true]);
					    $cell->setAlignment('center');
					});

			    }
			    
			});

		})->export('xls');
    }

    public function columnCain($_index) {

    	$array = ['null', 'A', 'B', 'C', 'D', 'E','F', 'G', 'H', 'I', 'J', 'K', 
    			  'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V',
    			  'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF',
    			   'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 
    			   'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX'];

    	if($_index == null) 
    		return count($array);
    	else 
    		return $array[$_index];

    }


    // ==== (getYearDateN) get value month && year ==== //
    public function getYearDateN($month, $year) {

    	$Result = null;

    	switch($month)
		{
			case 1:
			case 3:
			case 5:
			case 7:
			case 8:
			case 10:
			case 12: 
				$Result = 30;
			break;
			case 4:
			case 6:
			case 9:
			case 11: 
				$Result = 31;
			break;
			case 2:
			if(nam % 4 == 0)
				$Result = 29;
			else
				$Result = 28;
			break;
		}

		return $Result;

	}


}
