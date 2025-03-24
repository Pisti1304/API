<?php

require_once("restezelo.php");
require("oscar.php");

class OscarrestKezelo extends RestKezelo
{
    function getAllOscars()
    {
        $oscars = new Oscar();
        $sorAdat = $oscars->getAllOscars();

        if(empty($sorAdat))
        {
            $statusCode=404;
            $sorAdat= array('error' => 'No Oscars found!');
        }
        else
        {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=UTF-8');

        $result["Oscars"] = $sorAdat;

        $response = $this->encodeJson($result);
        echo $response;

    }

    function getOscarById($m_ID)
    {
        $oscars = new Oscar();
        $sorAdat = $oscars->getOscarsById($m_ID);

        if(empty($sorAdat))
        {
            $statusCode=404;
            $sorAdat= array('error' => 'No Oscars found by id!');
        }
        else
        {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=UTF-8');

        $result["OscarsById"] = $sorAdat;

        $response = $this->encodeJson($result);
        echo $response;
    }

    function getOscarsByType($Mt_name)
    {
        $oscars = new Oscar();
        $sorAdat = $oscars->getOscarsByType($Mt_name);

        if(empty($sorAdat))
        {
            $statusCode=404;
            $sorAdat= array('error' => 'No Oscars found by this type!');
        }
        else
        {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=UTF-8');

        $result["Oscars"] = $sorAdat;

        $response = $this->encodeJson($result);
        echo $response;
    }


    function encodeJson($responseData)
    {
        return json_encode($responseData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }


}
