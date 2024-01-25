<?php

namespace App\Export;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Throwable;

/**
 * Class ExportController
 * @package App\Export
 */
class ExportController extends DefaultValueBinder implements ShouldAutoSize, WithTitle, WithHeadings, WithStyles, WithCustomValueBinder, FromArray
{
	private array $fields = ['Country', 'Country Code', 'MCC', 'MNC', 'Title', 'Operator'];

	/**
	 * @return array|NULL
	 * @throws Throwable
	 */
	public function array(): array
	{
		return networkProviderController()->fetchForExport();
	}

	/* @return string */
	public function title(): string
	{
		return 'Network providers';
	}

	/*** @return array */
	public function headings(): array
	{
		return $this->fields;
	}

	/**
	 * @param Worksheet $sheet
	 * @return array[]
	 */
	public function styles(Worksheet $sheet): array
	{
		$sheet->setAutoFilter('A1:' . $sheet->getHighestColumn() . '1');
		return [
			'A1:' . $sheet->getHighestColumn() . '1' => [
				'font'      => ['bold' => TRUE, 'size' => 12],
				'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
				'borders'   => [
					'allBorders' => ['borderStyle' => Border::BORDER_MEDIUM, 'color' => ['argb' => '000000']],
				],
			],
		];
	}

	/**
	 * @param Cell $cell
	 * @param      $value
	 * @return bool
	 * @throws Throwable
	 */
	public function bindValue(Cell $cell, $value): bool
	{
		$columnNumber = Coordinate::columnIndexFromString($cell->getColumn());
		$field        = $this->fields[$columnNumber - 1];
		if (in_array($field, ['MCC'], TRUE)) {
			$cell->setValueExplicit($value, DataType::TYPE_STRING2);
			return TRUE;
		}
		if (is_numeric($value)) {
			$cell->setValueExplicit($value, DataType::TYPE_NUMERIC);
			return TRUE;
		}
		return parent::bindValue($cell, $value);
	}
}