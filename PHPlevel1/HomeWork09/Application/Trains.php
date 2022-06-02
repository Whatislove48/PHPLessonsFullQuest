<?php

namespace Application;

use Application\Db;

class Trains
{
    protected string $table = 'trains';
    protected string $timeRoute;
    protected string $route;

//    public function __construct(string $time, string $way)
//    {
//        if ('' === $time || '' === $way) {
//            throw new \Exception('Неверное расписание');
//        }
//        $this->time = $time;
//        $this->way = $way;
//    }

    public function getRoute(): string    // WORK!!!
    {
        return 'Время отправления -> ' . $this->timeRoute . '<br>' .
            'Путь -> ' . $this->route;
    }

    public function getAllWay(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . $this->table;
        $allWay = $db->query($sql, Trains::class);
        return $allWay;

    }

    public function addTrain(string $route, string $time) // WORK
    {
        $db = new Db();
        $data = [':route' => $route, ':timeRoute' => $time];
        $sql = "INSERT INTO trains (route,timeRoute) VALUES (
                                             :route,:timeRoute)";
        return $db->insert($sql, $data);
    }

    public function deleteTrain(int $id):bool  // WORK!!
    {
        $sql = "DELETE FROM trains WHERE id=:id";
        $data[':id'] = $id;
        $db = new Db();
        return $db->insert($sql,$data);
    }


}