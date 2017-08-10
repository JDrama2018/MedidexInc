<?php

namespace Medidex\Models;

use Medidex\Libraries\Request;

class Appointment extends Model
{
    public $name;
    public $specialty;
    public $place;
    public $availableDate;
    public $description;

    public function __construct($name, $specialty, $place, $availableDate, $description)
    {
        $this->name = $name;
        $this->specialty = $specialty;
        $this->place = $place;
        $this->availableDate = date('Y-m-d H:i:s', $availableDate);
        $this->description = $description;
    }

    public static function getAppointments()
    {
        $query  = "full=true";
        $headers = [
            'Authorization: Basic ' .self::$apiKey
        ];

        $url = self::$baseURLString . "/vaults/1c2150aa-3845-41a2-8db2-badd8a43b641/schemas/dc857533-8ab8-4979-a65f-893a7f06a609/documents";
        $response = Request::httpGetRequest($url, $query, $headers);
        $responseObject = json_decode($response);

        if (isset($responseObject->data)) {
            return self::mapObject($responseObject->data->items);
        }

        return [];
    }

    public static function mapObject($items)
    {
        $appointments = [];
        foreach ($items as $item) {
            $jsonStr = base64_decode($item->document);
            $jsonObj = json_decode($jsonStr);
            $appointments[] = new Appointment($jsonObj->name, $jsonObj->specialty, $jsonObj->place, $jsonObj->available_date, $jsonObj->description);
        }

        return $appointments;
    }
}