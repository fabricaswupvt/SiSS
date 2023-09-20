<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\LugarPrestacion;
use App\Models\Persona;
use App\Models\Contacto;
use App\Models\Direccion;
use App\Models\Colonia;
use App\Models\Ciudad;
use App\Models\Municipio;
use App\Models\Estado;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Supervisor;

class LugarPrestacionController extends Controller
{
    public function index(){

        $datos = DB::table('lugar_prestacion')->get(); // Reemplaza 'nombre_de_la_tabla' con el nombre real de tu tabla
        return view('DatosLugarPrestacion.index', compact('datos'));
    }
    
    public function create(){
        $lugar_prestacion = LugarPrestacion::all();
        $paises = $this->obtenerPaises();

        return view('DatosLugarPrestacion.create', [
            'paises' => $paises,
            'LugarPrestacion' => $lugar_prestacion
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'ape_pat' => 'required',
            'ape_mat' => 'required',
            'titulo' => 'required',
            'cargo' => 'required',
            'telefono_fijo' => 'required',
            'celular' => 'required',
            'telefono_ref' => 'required',
            'correo' => 'required|email',
            'nombre_depto' => 'required',
            'nombre_pais' => 'required',
            'nombre_edo' => 'required',
            'nombre_mun' => 'required',
            'nombre_ciudad' => 'required',
            'nombre_col' => 'required',
            'cp' => 'required',
            'calle' => 'required',
            'no_ext' => 'required',
            'no_int' => 'required',
            'referencia' => 'required',
            'giro' => 'required',
            'tipolp' => 'required',
            'sector' => 'required',
            'nombre_lp' => 'required',
            'rfc' => 'required',

        ]);

        //Crear y guardar el registro de pais
        $pais = new Pais();
        $pais->nombre_pais = $request->input('nombre_pais');
        $pais->save();

        //Crear y guardar el registro de estado
        $estado = new Estado();
        $estado->nombre_edo = $request->input('nombre_edo');
        $estado->id_pais = $pais->idpais; // Asignar el ID del pais creado
        $estado->save();

        //Crear y guardar el registro de municipio
        $municipio = new Municipio();
        $municipio->nombre_mun = $request->input('nombre_mun');
        $municipio->id_estado = $estado->idestado; // Asignar el ID del estado creado
        $municipio->save();

        //Crear y guardar el registro de ciudad
        $ciudad = new Ciudad();
        $ciudad->nombre_ciudad = $request->input('nombre_ciudad');
        $ciudad->id_municipio = $municipio->idmunicipio; // Asignar el ID del municipio creado
        $ciudad->save();

        //Crear y guardar el registro de colonia
        $colonia = new Colonia();
        $colonia->nombre_col = $request->input('nombre_col');
        $colonia->id_ciudad = $ciudad->idciudad; // Asignar el ID de la ciudad creada
        $colonia->cp = $request->input('cp');
        $colonia->save();

        //Crear y guardar el registro de direccion
        $direccion = new Direccion();
        $direccion->calle = $request->input('calle');
        $direccion->no_ext = $request->input('no_ext');
        $direccion->no_int = $request->input('no_int');
        $direccion->id_colonia = $colonia->idcolonia; // Asignar el ID de la colonia creada
        $direccion->referencia = $request->input('referencia');
        $direccion->save();
        
        //Crear y guardar el registro de lugar de prestacion
        $lugar_prestacion = new LugarPrestacion();
        $lugar_prestacion->nombre_lp = $request->input('nombre_lp');
        $lugar_prestacion->rfc = $request->input('rfc');
        $lugar_prestacion->id_direccion = $direccion->iddireccion; // Asignar el ID de la direccion creada
        $lugar_prestacion->tipolp = $request->input('tipolp');
        $lugar_prestacion->sector = $request->input('sector');
        $lugar_prestacion->giro = $request->input('giro');
        $lugar_prestacion->save();

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
    
        //Crear y guardar el registro de supervisor
        $supervisor = new Supervisor();
        $supervisor->cargo = $request->input('cargo');
        $supervisor->id_persona = $persona->idpersona; // Asignar el ID de la persona creada
        $supervisor->id_contacto = $contacto->idcontacto; // Asignar el ID del contacto creado
        $supervisor->save();
        
        //Crear y guardar el registro de departamento 
        $departamento_lp = new Departamento();
        $departamento_lp->nombre_depto = $request->input('nombre_depto');
        $departamento_lp->save();



        return view("DatosLugarPrestacion.message",['msg' => "Registro guardado"]);
       

    }
    public function show(LugarPrestacion $lugar_prestacion)
    {
      
    }

    public function edit($idlugar_prestacion)
    {
        $lugar_prestacion= LugarPrestacion::find($idlugar_prestacion);
        return view('DatosLugarPrestacion.edit',['LugarPrestacion'=>$lugar_prestacion,
        'direccion'=>Direccion::all(),
        'colonia'=>Colonia::all(),
        'ciudad'=>Ciudad::all(),
        'municipio'=>Municipio::all(),
        'estado'=>Estado::all(),
        'pais'=>Pais::all(),
        'departamento'=>Departamento::all(),
        'persona'=>Persona::all(),
        'contacto'=>Contacto::all(),
        'supervisor'=>Supervisor::all(),
    ]);
    }

    public function update(Request $request, $idlugar_prestacion)
    {
        $request->validate([
            'nombre' => 'required',
            'ape_pat' => 'required',
            'ape_mat' => 'required',
            'titulo' => 'required',
            'cargo' => 'required',
            'telefono_fijo' => 'required',
            'celular' => 'required',
            'telefono_ref' => 'required',
            'correo' => 'required|email',
            'nombre_depto' => 'required',
            'nombre_pais' => 'required',
            'nombre_edo' => 'required',
            'nombre_mun' => 'required',
            'nombre_ciudad' => 'required',
            'nombre_col' => 'required',
            'cp' => 'required',
            'calle' => 'required',
            'no_ext' => 'required',
            'no_int' => 'required',
            'referencia' => 'required',
            'giro' => 'required',
            'tipolp' => 'required',
            'sector' => 'required',
            'nombre_lp' => 'required',
            'rfc' => 'required',
        ]);
    
        // Obtener el coordinador que deseas actualizar
        $lugar_prestacion = LugarPrestacion::find($idlugar_prestacion);
        
        $pais = Pais::find($estado->id_pais);
        $pais->nombre_pais = $request->input('nombre_pais');
        $pais->save();

        $estado = Estado::find($municipio->id_estado);
        $estado->nombre_edo = $request->input('nombre_edo');
        $estado->save();

        $municipio = Municipio::find($ciudad->id_ciudad);
        $municipio->nombre_mun = $request->input('nombre_mun');
        $municipio->save();
     
        $ciudad = Ciudad::find($colonia->id_ciudad);
        $ciudad->nombre_ciudad = $request->input('nombre_ciudad');
        $ciudad->save();

        $colonia = Colonia::find($direccion->id_colonia);
        $colonia->nombre_col = $request->input('nombre_col');
        $colonia->cp = $request->input('cp');
        $colonia->save();

        $direccion = Direccion::find($lugar_prestacion->id_direccion);
        $direccion->calle = $request->input('calle');
        $direccion->no_ext = $request->input('no_ext');
        $direccion->no_int = $request->input('no_int');
        $direccion->referencia = $request->input('referencia');
        $direccion->save();
        
        $lugar_prestacion = LugarPrestacion::find($idlugar_prestacion);
        $lugar_prestacion->nombre_lp = $request->input('nombre_lp');
        $lugar_prestacion->rfc = $request->input('rfc');
        $lugar_prestacion->tipolp = $request->input('tipolp');
        $lugar_prestacion->sector = $request->input('sector');
        $lugar_prestacion->giro = $request->input('giro');
        $lugar_prestacion->save();

        $persona = Persona::find($idpersona);
        $persona->nombre = $request->input('nombre');
        $persona->ape_pat = $request->input('ape_pat');
        $persona->ape_mat = $request->input('ape_mat');
        $persona->titulo = $request->input('titulo');
        $persona->save();
    
        $contacto = Contacto::find($idcontacto);
        $contacto->telefono_fijo = intval($request->input('telefono_fijo'));
        $contacto->celular = intval($request->input('celular'));
        $contacto->telefono_ref = intval($request->input('telefono_ref'));
        $contacto->correo = $request->input('correo');
        $contacto->save();

         //Crear y guardar el registro de supervisor
         $supervisor = Supervisor::find($idsupervisor);
         $supervisor->cargo = $request->input('cargo');
         $supervisor->save();
         
         //Crear y guardar el registro de departamento 
         $departamento_lp = Departamento::find($iddepartamento);
         $departamento_lp->nombre_depto = $request->input('nombre_depto');
         $departamento_lp->save();

    
        return view("DatosLugarPrestacion.message", ['msg' => "Registro actualizado"]);
    }
    

        public function destroy($idcoordinador)
        {
            $coordinador = Coordinador::find($idcoordinador);
            $persona = $coordinador->persona;
            $contacto = $coordinador->contacto;
    
            $coordinador->delete();
            $persona->delete();
            $contacto->delete();
    
            return redirect("coordinador");
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
