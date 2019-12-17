<?php


namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/** @Entity */
class Flight {

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /** @Column(type="integer", length=11) */
    private $departure_airport;

    /** @Column(type="integer", length=11) */
    private $arrival_airport;

    /** @Column(type="datetime") */
    private $departure_datetime;

    /** @Column(type="datetime") */
    private $arrival_departure;

    /** @Column(type="integer", length=11) */
    private $main_pilot;

    /**
     * Flight constructor.
     * @param $id
     * @param $departure_airport
     * @param $arrival_airport
     * @param $departure_datetime
     * @param $arrival_departure
     * @param $main_pilot
     */
    public function __construct($id, $departure_airport, $arrival_airport, $departure_datetime, $arrival_departure, $main_pilot) {
        $this->id = $id;
        $this->departure_airport = $departure_airport;
        $this->arrival_airport = $arrival_airport;
        $this->departure_datetime = $departure_datetime;
        $this->arrival_departure = $arrival_departure;
        $this->main_pilot = $main_pilot;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDepartureAirport()
    {
        return $this->departure_airport;
    }

    /**
     * @param mixed $departure_airport
     */
    public function setDepartureAirport($departure_airport): void
    {
        $this->departure_airport = $departure_airport;
    }

    /**
     * @return mixed
     */
    public function getArrivalAirport()
    {
        return $this->arrival_airport;
    }

    /**
     * @param mixed $arrival_airport
     */
    public function setArrivalAirport($arrival_airport): void
    {
        $this->arrival_airport = $arrival_airport;
    }

    /**
     * @return mixed
     */
    public function getDepartureDatetime()
    {
        return $this->departure_datetime;
    }

    /**
     * @param mixed $departure_datetime
     */
    public function setDepartureDatetime($departure_datetime): void
    {
        $this->departure_datetime = $departure_datetime;
    }

    /**
     * @return mixed
     */
    public function getArrivalDeparture()
    {
        return $this->arrival_departure;
    }

    /**
     * @param mixed $arrival_departure
     */
    public function setArrivalDeparture($arrival_departure): void
    {
        $this->arrival_departure = $arrival_departure;
    }

    /**
     * @return mixed
     */
    public function getMainPilot()
    {
        return $this->main_pilot;
    }

    /**
     * @param mixed $main_pilot
     */
    public function setMainPilot($main_pilot): void
    {
        $this->main_pilot = $main_pilot;
    }
}