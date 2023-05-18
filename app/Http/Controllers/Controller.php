<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\History;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\MuridSettings;
use App\Models\Role;
use App\Models\Users;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $models;

    public function __construct(){
        $this->models = [
            'history' => History::class,
            'jurusan' => Jurusan::class,
            'kelas' => Kelas::class,
            'murid' => Murid::class,
            'murid_settings' => MuridSettings::class,
            'role' => Role::class,
            'users' => Users::class,
        ];
    }
}
