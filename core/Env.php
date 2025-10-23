<?php
class Env {
    private static array $vars = [];

    public static function load(string $path): void {
        if (!file_exists($path)) return;
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line){
            if(str_starts_with(trim($line), '#')) continue;
            [$name, $value] = explode('=', $line, 2);
            self::$vars[trim($name)] = trim($value);
        }
    }

    public static function get(string $key, ?string $default = null): ?string {
        return self::$vars[$key] ?? $default;
    }
}