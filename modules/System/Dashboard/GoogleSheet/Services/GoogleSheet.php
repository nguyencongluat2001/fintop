<?php

namespace Modules\System\Dashboard\GoogleSheet\Services;

class GoogleSheet
{
    private $spreadSheetId;
    private $clirnt;
    private $googleSheetService;

    public function __construct(
        )
    {
        $this->spreadSheetId = config('datastudio.google_shet_id');
        $this->client = new \Google_Client();
        $this->client->setAuthConfig(storage_path('credentials.json'));
        $this->client->addScope("https://www.googleapis.com/auth/spreadsheets");
        $this->googleSheetService = new \Google_Service_Sheets($this->client);
    }

    
    public function readGoogleSheet(){
        $dimensions = $this->getDimensions($this->spreadSheetId);
        dd($dimensions);
    }
    private function getDimensions($spreadSheetId){
        $rowDimensions =$this->googleSheetService->spreadsheets_values->batchGet(
            $spreadSheetId,
            ['ranges'=> 'A1:A2','majorDimension'=>'COLUMNS']
        );

        $rowMeta =$rowDimensions->getValueRanges()[0]->values;
        if(! $rowMeta){
            return [
                'error'=>true,
                'message'=>'missing row data'
            ];
        }
        // dd($rowMeta[0]);
        $colDimensions =$this->googleSheetService->spreadsheets_values->batchGet(
            $spreadSheetId,
            ['ranges'=> 'A1:E100','majorDimension'=>'ROWS']
        );
        $colMeta = $colDimensions->getValueRanges()[0]->values;
        if(! $colMeta){
            return [
                'error'=>true,
                'message'=>'mussing row data'
            ];
        }
        dd($colMeta);

        return [
            'error'=>false,
            'rowCount'=>count($rowMeta[0]),
            'colCount'=>$this->colLengthToColumnAddress(count($colMeta[0]))
        ];
    }
    private function colLengthToColumnAddress($number){
        if($number <= 0) return null;

        $letter = '';
        while ($number >0){
            $temp = ($number -1 ) % 26;
            $letter = chr($temp + 65) .$letter;
            $number = ($number - $temp - 1)/26;
        }
        return $letter;
    }

}
