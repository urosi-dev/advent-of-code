<?php

namespace App;

class Runner
{
    private array $modules = [];

    private function importAll(): void
    {
        for ($i = 1; $i <= 25; $i++) {

            $day = str_pad((string)$i, 2, "0", STR_PAD_LEFT);

            $path = __DIR__ . "/day_$day/index.php";

            if (file_exists($path)) {
                require_once $path;

                $this->modules["day_$day"] = "\\App\\day_$day\\solve";
            }
        }
    }

    public function run(array $argv): void
    {
        $this->importAll();

        $args = array_slice($argv, 1);

        $test = in_array("--test=true", $args);

        $dayArg = null;

        foreach ($args as $arg) {
            if (str_starts_with($arg, "--day=")) {
                $dayArg = str_pad(substr($arg, 6), 2, "0", STR_PAD_LEFT);
            }
        }

        if ($dayArg) {
            $this->runDay($dayArg, $test);
            return;
        }

        foreach ($this->modules as $day => $func) {
            $this->execute($day, $func, $test);
        }
    }

    private function runDay(string $day, bool $test): void
    {
        $key = "day_$day";

        if (!isset($this->modules[$key])) {
            echo "No module found for $key", PHP_EOL;
            return;
        }

        $this->execute($key, $this->modules[$key], $test);
    }

    private function execute(string $day, callable $func, bool $test): void
    {
        $file = trim(file_get_contents(
            getcwd() . "/src/$day/" . ($test ? "test" : "input")
        ));

        $start = microtime(true);

        $solution = $func($file);

        $time = round((microtime(true) - $start) * 1000, 2);

        echo "$day ({$time}ms)", PHP_EOL;
        echo "- p1: {$solution->p1}", PHP_EOL;
        echo "- p2: {$solution->p2}", PHP_EOL;
    }
}
