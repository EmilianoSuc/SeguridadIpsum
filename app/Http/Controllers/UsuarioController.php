<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        //dd($categorias);
        return view('Registro')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customLogin(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Correo' => 'required',
            'Telefono' => 'required',
            'Pais' => 'required',
            'Comiada_Fav' => 'required',
            'Artista_Fav' => 'required',
            'Lugar_Fav' => 'required',
            'Color_Fav' => 'required',
            'Contrasena' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/Datos')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'Titulo' => 'required',
        'Contenido' => 'required',
        'Imagen' => 'required|mimes:jpeg,jpg,png|max:5048',
        'NumeroTel' => 'required',
        'usuario_id' => 'required',
        'categoria_id' => 'required',
    ]);
    $publicaciones=$request->all();

    if ($image=$request->file('Imagen')){
        $SaveImgPath='img/';
        $imageGalleryName=date('YmdHis')."_".$image->getClientOriginalName();
        $image->move($SaveImgPath, $imageGalleryName);
        $publicaciones['Imagen']="$imageGalleryName";
    }

    Publicacion::create($publicaciones);
    return redirect()->route('publicaciones.index');

    Publicacion::create($request->all());
    return redirect()->route('publicaciones.index')
    ->with('success', 'Your post was created');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Lógica para obtener el recurso con el ID proporcionado
        $publicacion = Publicacion::find($id);
    
        // Verifica si se encontró el recurso
        if (!$publicacion) {
            // Manejo de error si el recurso no existe
            return response()->json(['mensaje' => 'Recurso no encontrado'], 404);
        }
    
        // Devuelve la vista o los datos necesarios para mostrar los detalles del recurso
        return view('publicaciones.show', ['publicacion' => $publicacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $usuario=Usuario::pluck('Nombre','id');
        $categoria=Categoria::pluck('Nombre','id');
        $selectedID=0;
        $publicacionID = Publicacion::find($id);
        $publicaciones = Publicacion::with('usuario','categoria')->get();
        $SelectedPost=Publicacion::find($id);
        return view ('admin.publicaciones.edit',
        compact('publicacionID', 'publicaciones','selectedID', 'usuario','categoria' ));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'Titulo' => 'required',
           'Contenido' => 'required',
           'Imagen' => 'required|mimes:jpeg,jpg,png|max:5048',
           'NumeroTel' => 'required',
           'usuario_id' => 'required',
           'categoria_id' => 'required',
        ]);

        $publicacion=Publicacion::find($id);
        $prod=$request->all();
        if ($image=$request->file('Imagen')) {
            unlink('img/'.$publicacion->Imagen);
            $SaveImgPath='img/';
            $imageProductName=date('YmdHis')."_".$image->getClientOriginalName();
            $image->move($SaveImgPath, $imageProductName);
            $prod['Imagen']="$imageProductName";
        }else {
            unset($prod['Imagen']);
        }
        $publicacion->update($prod);

        $usuario=Usuario::pluck('Nombre','id');
        $categoria=Categoria::pluck('Nombre','id');
        $selectedID=0;
        $publicacion=Publicacion::find($id);
        $publicacion->update($request->all());
        return redirect()->route('publicaciones.index')
        ->with('succes', 'Post updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publicacion=Publicacion::find($id);
        $publicacion->delete();
        unlink("public/img/.$publicacion->Imagen");
        return redirect()->route('publicaciones.index')
        ->with('success', 'Post deleted succesfully');
    }
    public function catalogo()
    {
        $publicaciones=Publicacion::all();
        return view('service', compact('publicaciones'));
    } 
}
