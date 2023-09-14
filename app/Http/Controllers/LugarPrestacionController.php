<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LugarPrestacion;
use App\Models\Persona;
use App\Models\Contacto;

class LugarPrestacionController extends Controller
{
    public function index()
    {
        $LugarPrestacion= LugarPrestacion::all();
        $paises = $this->obtenerPaises();
        return view('DatosLugarPrestacion.index', ['paises' => $paises], ['LugarPrestacion'=>$LugarPrestacion]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'ape_pat' => 'required',
            'ape_mat' => 'required',

        ]);

        // Crear y guardar el registro de la persona
        $persona = new Persona();
        $persona->nombre = $request->input('nombre');
        $persona->ape_pat = $request->input('ape_pat');
        $persona->ape_mat = $request->input('ape_mat');
        $persona->titulo = $request->input('titulo');
        $persona->save();

    // Crear y guardar el registro de contacto
        $contacto = new Contacto();
        $contacto->telefono_fijo = intval($request->input('telefono_fijo'));
        $contacto->celular = intval($request->input('celular'));
        $contacto->telefono_ref = intval($request->input('telefono_ref'));
        $contacto->correo = $request->input('correo');
        $contacto->save();

    // Crear y guardar el registro del coordinador relacionado con la persona y el contacto
        $coordinador = new Coordinador();
        $coordinador->id_persona = $persona->idpersona; // Asignar el ID de la persona creada
        $coordinador->puesto = $request->input('puesto');
        $coordinador->id_contacto = $contacto->idcontacto; // Asignar el ID del contacto creado
        $coordinador->estatus = $request->input('estatus');
        $coordinador->save();

        return view("LugarPrestacion .message",['msg' => "Registro guardado"]);

    }


    public function obtenerPaises()
    {
        $paises = [
            'Afganistán',
            'Albania',
            'Alemania',
            'Andorra',
            'Angola',
            'Antigua y Barbuda',
            'Arabia Saudita',
            'Argelia',
            'Argentina',
            'Armenia',
            'Australia',
            'Austria',
            'Azerbaiyán',
            'Bahamas',
            'Bangladés',
            'Barbados',
            'Baréin',
            'Bélgica',
            'Belice',
            'Benín',
            'Bielorrusia',
            'Birmania (Myanmar)',
            'Bolivia',
            'Bosnia y Herzegovina',
            'Botsuana',
            'Brasil',
            'Brunéi',
            'Bulgaria',
            'Burkina Faso',
            'Burundi',
            'Bután',
            'Cabo Verde',
            'Camboya',
            'Camerún',
            'Canadá',
            'Catar',
            'Chad',
            'Chile',
            'China',
            'Chipre',
            'Colombia',
            'Comoras',
            'Corea del Norte',
            'Corea del Sur',
            'Costa de Marfil',
            'Costa Rica',
            'Croacia',
            'Cuba',
            'Dinamarca',
            'Dominica',
            'Ecuador',
            'Egipto',
            'El Salvador',
            'Emiratos Árabes Unidos',
            'Eritrea',
            'Eslovaquia',
            'Eslovenia',
            'España',
            'Estados Unidos',
            'Estonia',
            'Etiopía',
            'Filipinas',
            'Finlandia',
            'Fiyi',
            'Francia',
            'Gabón',
            'Gambia',
            'Georgia',
            'Ghana',
            'Granada',
            'Grecia',
            'Guatemala',
            'Guinea',
            'Guinea-Bisáu',
            'Guinea Ecuatorial',
            'Guyana',
            'Haití',
            'Honduras',
            'Hungría',
            'India',
            'Indonesia',
            'Irak',
            'Irán',
            'Irlanda',
            'Islandia',
            'Islas Marshall',
            'Islas Salomón',
            'Israel',
            'Italia',
            'Jamaica',
            'Japón',
            'Jordania',
            'Kazajistán',
            'Kenia',
            'Kirguistán',
            'Kiribati',
            'Kuwait',
            'Laos',
            'Lesoto',
            'Letonia',
            'Líbano',
            'Liberia',
            'Libia',
            'Liechtenstein',
            'Lituania',
            'Luxemburgo',
            'Macedonia del Norte',
            'Madagascar',
            'Malasia',
            'Malaui',
            'Maldivas',
            'Malí',
            'Malta',
            'Marruecos',
            'Mauricio',
            'Mauritania',
            'México',
            'Micronesia',
            'Moldavia',
            'Mónaco',
            'Mongolia',
            'Montenegro',
            'Mozambique',
            'Namibia',
            'Nauru',
            'Nepal',
            'Nicaragua',
            'Níger',
            'Nigeria',
            'Noruega',
            'Nueva Zelanda',
            'Omán',
            'Países Bajos',
            'Pakistán',
            'Palaos',
            'Panamá',
            'Papúa Nueva Guinea',
            'Paraguay',
            'Perú',
            'Polonia',
            'Portugal',
            'Reino Unido',
            'República Centroafricana',
            'República Checa',
            'República del Congo',
            'República Democrática del Congo',
            'República Dominicana',
            'Ruanda',
            'Rumania',
            'Rusia',
            'Samoa',
            'San Cristóbal y Nieves',
            'San Marino',
            'Santa Lucía',
            'Santa Vicente y las Granadinas',
            'Santo Tomé y Príncipe',
            'Senegal',
            'Serbia',
            'Seychelles',
            'Sierra Leona',
            'Singapur',
            'Siria',
            'Somalia',
            'Sri Lanka',
            'Sudáfrica',
            'Sudán',
            'Sudán del Sur',
            'Suecia',
            'Suiza',
            'Surinam',
            'Suazilandia',
            'Tailandia',
            'Tanzania',
            'Tayikistán',
            'Timor Oriental',
            'Togo',
            'Tonga',
            'Trinidad y Tobago',
            'Túnez',
            'Turkmenistán',
            'Turquía',
            'Tuvalu',
            'Ucrania',
            'Uganda',
            'Uruguay',
            'Uzbekistán',
            'Vanuatu',
            'Vaticano',
            'Venezuela',
            'Vietnam',
            'Yemen',
            'Yibuti',
            'Zambia',
            'Zimbabue'
        ];
    
        return $paises;
    }
    
}
