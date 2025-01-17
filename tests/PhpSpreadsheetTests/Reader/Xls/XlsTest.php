<?php

declare(strict_types=1);

namespace PhpOffice\PhpSpreadsheetTests\Reader\Xls;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheetTests\Functional\AbstractFunctional;

class XlsTest extends AbstractFunctional
{
    /**
     * Test load Xls file.
     */
    public function testLoadXlsSample(): void
    {
        $filename = 'tests/data/Reader/XLS/sample.xls';
        $reader = new Xls();
        $spreadsheet = $reader->load($filename);
        self::assertEquals('Title', $spreadsheet->getSheet(0)->getCell('A1')->getValue());
        $spreadsheet->disconnectWorksheets();
    }

    /**
     * Test load Xls file with invalid xfIndex.
     */
    public function testLoadXlsBug1505(): void
    {
        $filename = 'tests/data/Reader/XLS/bug1505.xls';
        $reader = new Xls();
        $spreadsheet = $reader->load($filename);
        $sheet = $spreadsheet->getActiveSheet();
        $col = $sheet->getHighestColumn();
        $row = $sheet->getHighestRow();

        $newspreadsheet = $this->writeAndReload($spreadsheet, 'Xlsx');
        $newsheet = $newspreadsheet->getActiveSheet();
        $newcol = $newsheet->getHighestColumn();
        $newrow = $newsheet->getHighestRow();

        self::assertEquals($spreadsheet->getSheetCount(), $newspreadsheet->getSheetCount());
        self::assertEquals($sheet->getTitle(), $newsheet->getTitle());
        self::assertEquals($sheet->getColumnDimensions(), $newsheet->getColumnDimensions());
        self::assertEquals($col, $newcol);
        self::assertEquals($row, $newrow);
        self::assertEquals($sheet->getCell('A1')->getFormattedValue(), $newsheet->getCell('A1')->getFormattedValue());
        self::assertEquals($sheet->getCell("$col$row")->getFormattedValue(), $newsheet->getCell("$col$row")->getFormattedValue());
        $spreadsheet->disconnectWorksheets();
        $newspreadsheet->disconnectWorksheets();
    }

    /**
     * Test load Xls file with invalid length in SST map.
     */
    public function testLoadXlsBug1592(): void
    {
        $filename = 'tests/data/Reader/XLS/bug1592.xls';
        $reader = new Xls();
        // When no fix applied, spreadsheet is not loaded
        $spreadsheet = $reader->load($filename);
        $sheet = $spreadsheet->getActiveSheet();
        $col = $sheet->getHighestColumn();
        $row = $sheet->getHighestRow();

        $newspreadsheet = $this->writeAndReload($spreadsheet, 'Xlsx');
        $newsheet = $newspreadsheet->getActiveSheet();
        $newcol = $newsheet->getHighestColumn();
        $newrow = $newsheet->getHighestRow();

        self::assertEquals($spreadsheet->getSheetCount(), $newspreadsheet->getSheetCount());
        self::assertEquals($sheet->getTitle(), $newsheet->getTitle());
        self::assertEquals($sheet->getColumnDimensions(), $newsheet->getColumnDimensions());
        self::assertEquals($col, $newcol);
        self::assertEquals($row, $newrow);

        $rowIterator = $sheet->getRowIterator();

        foreach ($rowIterator as $row) {
            foreach ($row->getCellIterator() as $cellx) {
                /** @var Cell */
                $cell = $cellx;
                /** @scrutinizer ignore-call */
                $valOld = $cell->getFormattedValue();
                $valNew = $newsheet->getCell($cell->/** @scrutinizer ignore-call */ getCoordinate())->getFormattedValue();
                self::assertEquals($valOld, $valNew);
            }
        }
        $spreadsheet->disconnectWorksheets();
        $newspreadsheet->disconnectWorksheets();
    }

    public function testLoadXlsBug1114(): void
    {
        $filename = 'tests/data/Reader/XLS/bug1114.xls';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filename);
        $sheet = $spreadsheet->getActiveSheet();
        self::assertSame(1148140800.0, $sheet->getCell('B2')->getValue());
        $spreadsheet->disconnectWorksheets();
    }
}
