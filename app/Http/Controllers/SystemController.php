<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function getServerRamUsage(): array
    {
        $data = explode("\n", file_get_contents("/proc/meminfo"));
        $meminfo = array();
        $count = 0;

        foreach ($data as $line) {
            if($count >= 5) break;
            $mass = explode(":", $line);
            $key = $mass[0];
            $value = trim($mass[1]);
            $value = explode(' ', $value);
            $meminfo[$key] = $value[0];
            $count++;
        }

        return $meminfo;
    }

    public function getServerMemoryUsage(): string
    {
        return (string)memory_get_usage();
    }

    public function getServerCpuUsage()
    {
        return sys_getloadavg()[0];
    }
}
