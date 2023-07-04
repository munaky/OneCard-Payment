<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/* Models */
use App\Models\AdminSettings;
use App\Models\API;
use App\Models\History;
use App\Models\Jurusan;
use App\Models\KasirSettings;
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
            'admin_settings' => AdminSettings::class,
            'api' => API::class,
            'history' => History::class,
            'jurusan' => Jurusan::class,
            'kasir_settings' => KasirSettings::class,
            'kelas' => Kelas::class,
            'murid' => Murid::class,
            'murid_settings' => MuridSettings::class,
            'role' => Role::class,
            'users' => Users::class,
        ];
    }
}
