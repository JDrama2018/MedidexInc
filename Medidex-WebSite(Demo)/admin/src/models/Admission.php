<?php

namespace Medidex\Models;

use Medidex\Libraries\Request;

class Admission extends Model
{
    public $code;
    public $description;
    public $startDate;
    public $endDate;

    public function __construct($code, $description, $startDate, $endDate)
    {
        $this->code = $code;
        $this->description = $description;
        $this->startDate = date('Y-m-d H:i:s', $startDate);
        $this->endDate = date('Y-m-d H:i:s', $endDate);
    }

    public static function getAdmissions()
    {
        $query  = "full=true";
        $headers = [
            'Authorization: Basic ' .self::$apiKey
        ];

        $url = self::$baseURLString . "/vaults/1c2150aa-3845-41a2-8db2-badd8a43b641/schemas/b8f28f0b-9839-4495-bb30-9eab0274cb1c/documents";
        $response = Request::httpGetRequest($url, $query, $headers);
        $responseObject = json_decode($response);

        if (isset($responseObject->data)) {
            return self::mapObject($responseObject->data->items);
        }

        return [];
    }

    public static function mapObject($items)
    {
        $admissions = [];
        foreach ($items as $item) {
            $jsonStr = base64_decode($item->document);
            $jsonObj = json_decode($jsonStr);
            $admissions[] = new Admission(
                $jsonObj->code,
                $jsonObj->description,
                $jsonObj->start_date,
                $jsonObj->end_date
            );
        }

        return $admissions;
    }
}