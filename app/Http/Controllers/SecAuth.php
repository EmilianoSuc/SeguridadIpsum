<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SecAuth extends Controller
{
    public function index()
    {
        return view('Login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'correo' => 'required',
            'contrasena' => 'required',
        ]);
   
        $credentials = $request->only('correo', 'contrasena');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/Datos')
            ->withSuccess('Signed in');
        }
  
        return redirect("Login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('Registro');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:users',
            'telefono' => 'required|min:10',
            'pais' => 'required',
            'comida_Fav' => 'required',
            'artista_Fav' => 'required',
            'lugar_Fav' => 'required',
            'color_Fav' => 'required',
            'contrasena' => 'required|min:6|confirmed',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);
           
        $data = $request->all();
        
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('public/img/images');
            $data['imagen'] = basename($imagePath);
        }
        else {
            $data['image'] = null;
        }

        $data['contrasena'] = Hash::make($data['contrasena']);

        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'nombre' => $data['nombre'],
        'apellido' => $data['apellido'],
        'correo' => $data['correo'],
        'telefono' => $data['telefono'],
        'pais' => $data['pais'],
        'comida_Fav' => $data['comida_Fav'],
        'artista_Fav' => $data['artista_Fav'],
        'lugar_Fav' => $data['lugar_Fav'],
        'color_Fav' => $data['color_Fav'],
        'contrasena' => Hash::make($data['contrasena']),
        'image' => $data['image']
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("Login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('Login');
    }
}
