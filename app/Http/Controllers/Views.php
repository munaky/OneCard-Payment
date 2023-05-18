<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Views extends Controller
{
    public function __invoke(Request $req, $role, $page)
    {
        info('Controller: Views; Method: __invoke');

        if (!view()->exists("users.$role.$page.index")) {
            return Etc::errView(404);
        };

        if (method_exists($this, $role.$page)) {
            $data = $this->{$role.$page}($req);
            $content = view("users.$role.$page.index", ['data' => $data]);
        } else {
            $content = view("users.$role.$page.index");
        }

        return view("users.$role.index", ['content' => $content]);
    }

    private function muridhistory()
    {
        info('Controller: Views; Method: muridhistory');

        return $this->models['history']::where('murid_id', session()->get('user')->id)
            ->get();
    }
}
