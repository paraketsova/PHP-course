<?php
require_once 'Person.php';
class App
{
    public static function main()
    {
        $people = self::generate_people($_GET['count'] ?? 1);
        self::render_people($people);
    }
    public static function generate_people($count)
    {
        for ($i = 0; $i < $count; $i++) {
            $p = new Person();
            $people[] = $p->to_array();
        }
        return $people;
    }
    public static function render_people($people)
    {
        $json = json_encode($people, JSON_UNESCAPED_UNICODE);
        echo $json;
    }
}