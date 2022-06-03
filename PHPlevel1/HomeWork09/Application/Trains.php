<?php

namespace Application;

use Application\Db;

class Trains
{
    protected string $table = 'trains';
    protected string $timeRoute;
    protected string $route;
    protected int $id;

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
        return '# -> ' . $this->id . '<br>' .
            'Время отправления -> ' . $this->timeRoute . '<br>' .
            'Путь -> ' . $this->route;
    }

    public function getAllWay(): array          //WORK
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


    public function editTrain(int $id, string $route, string $time) //WORK
    {
        if (0 === $id && '' === trim($route) && '' === trim($time)) {
            throw new \Exception('Empty Info');
        }
        $sql = "UPDATE trains SET route=:route,
                                timeRoute=:timeRoute
                                WHERE id=:id";
        $data = [':id' => $id, ':route' => $route, ':timeRoute' => $time];
        $db = new Db();
        return $db->insert($sql, $data);

    }


    public function deleteTrain(int $id): bool  // WORK!!
    {
        if (0 === $id ) {
            throw new \Exception('Empty ID');
        }
        $sql = "DELETE FROM trains WHERE id=:id";
        $data[':id'] = $id;
        $db = new Db();
        return $db->insert($sql, $data);
    }


}