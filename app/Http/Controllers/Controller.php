<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            if (session('errorCategory')) {
                $html = "<ul style='list-style: none;'>";
                foreach (session('errorCategory') as $error) {
                    $html .= "<li>$error[0]</li>";
                }
                $html .= "</ul>";

                Alert::html('Nama Kategori Buku telah terdaftar', $html, 'error');
            }

            if (session('errorRack')) {
                $html = "<ul style='list-style: none;'>";
                foreach (session('errorRack') as $error) {
                    $html .= "<li>$error[0]</li>";
                }
                $html .= "</ul>";

                Alert::toast('Nama Rak Buku telah terdaftar', 'error')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
            }

            if (session('errorMember')) {
                $html = "<ul style='list-style: none;'>";
                foreach (session('errorMember') as $error) {
                    $html .= "<li>$error[0]</li>";
                }
                $html .= "</ul>";

                Alert::html('Data Gagal Di-input, karena:', $html, 'error');
            }

            if (session('errorBook')) {
                $html = "<ul style='list-style: none;'>";
                foreach (session('errorBook') as $error) {
                    $html .= "<li>$error[0]</li>";
                }
                $html .= "</ul>";

                Alert::html('Nomor ISBN telah terdaftar', $html, 'error');
            }

            return $next($request);
        });
    }
}
