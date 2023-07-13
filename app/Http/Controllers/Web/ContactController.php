<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Form;
use Illuminate\Http\Request;
use App\Mail\SendNotifications;

class ContactController extends Controller
{
    public function index()
    {
        $contactSettings = getContactPageSettings();

        $seoSettings = getSeoMetas('contact');
        $pageTitle = !empty($seoSettings['title']) ? $seoSettings['title'] : trans('site.contact_page_title');
        $pageDescription = !empty($seoSettings['description']) ? $seoSettings['description'] : trans('site.contact_page_title');
        $pageRobot = getPageRobot('contact');

        $data = [
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'pageRobot' => $pageRobot,
            'contactSettings' => $contactSettings
        ];

        return view('web.default.pages.contact', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|numeric',
            'subject' => 'required|string',
            'message' => 'string'
        ]);

        $data = $request->all();
        unset($data['_token']);
        $data['created_at'] = time();

        Contact::create($data);

        $message = "
            <b>Empresa:<b> " . $data['subject'] . "
            <br>
            <b>Nombre contacto:<b> " . $data['name'] . "
            <br>
            <b>Teléfono contacto:<b> " . $data['phone'] . "
            <br>
            <b>Email contacto:<b> " . $data['email'] . "
            <br>
        ";

        $email = getGeneralSettings('site_email');

        \Mail::to($email)->send(new SendNotifications(['title' => 'Solicitud información', 'message' => $message]));

        return redirect('/');
    }

    public function hola(Request $request)
    {
        $nombre_empresa = request('nombre_empresa');
        $nombre_contacto = request('nombre_contacto');
        $correo_contacto = request('correo_contacto');
        $tel_empresa = request('tel_empresa');
        $tamaño_empresa = request('tamaño_empresa');
        $sector_economico = request('sector_economico');
        $country = request('country');
        $ciudad = request('ciudad');
        Form::create([
            'empresa' => $nombre_empresa,
            'nombre' => $nombre_contacto,
            'correo' => $correo_contacto,
            'telefono' => $tel_empresa,
            'tamaño' => $tamaño_empresa,
            'sector' => $sector_economico,
            'pais' => $country,
            'ciudad' => $ciudad
        ]);
        return back()->with(['msg' => trans('site.contact_store_success')]);
    }
}
