<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use Exception; //para usar las excepciones debo esportarlas primero (-.-)
use Validator;
use Illuminate\Support\Facades\Hash;
// use App\Http\Middleware\VerifyCsrfToken;

class UserController extends Controller
{
    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth');
     // $this->middleware('vctoken', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all the users in the database and return them        
        $users = User::all();
        return $users;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
                'email' => 'required|email|max:200|unique:users',
                'name'  => 'required|unique:users',
                // 'Rol'   => 'boolean',
                'password' => 'required'
                ]);
            try{
            //$affectedRows = User::where('id', '>', $id)->delete();
            if(!$validator->fails()){
                $user = new User;
                $user->name=$request->input('name');
                $user->email=$request->input('email');
                $user->password = Hash::make($request->input('password'));
                if($request->input('Rol'))
                    $user->Rol="Encargado";
                $user->save();
                return response()->json($user);
            }else{
                return response()->json(array('errors'=>$validator->errors()));
            }
            
            }
        catch (Exception $e)
            { 
                return response()->json($e->getMessage());
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve all the users in the database and return them        
        $users = User::find($id);
        return $users;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        //$arg = $request->input('id');
        $validator= Validator::make($request->all(),[
                'email' => 'required|email|max:200|unique:users',
                'name' => 'required|unique:users',
                'password'=>'required|max:20' 
                ]);

    
        try{

            //$affectedRows = User::where('id', '>', $id)->delete();
            $user = User::find($request->input('id'));
            if(!$validator->errors()->has('email')){
                    $user->email=$request->input('email');
            }
            if(!$validator->errors()->has('name')){
                    $user->name=$request->input('name');
            }
            /*$user->name=$request->input('name');
            $user->email=$request->input('email');*/
            $user->Rol=$request->input('Rol');

            if(!$validator->errors()->has('password'))
            {
                 $user->password=Hash::make($request->input('password'));
            }
            $user->save();
            return response()
            ->json(array('user'=>$user,'errors'=>$validator->errors())); 
            }
         catch (Exception $e)
            {                 
                return response()->json($e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $respuesta =null;
        try{
            //$affectedRows = User::where('id', '>', $id)->delete();
            $user = User::find($id);
            $respuesta = $user;
            $user->delete();
            return $respuesta;
            }
        catch (Exception $e)
            { 
                return $e->getMessage();
            }
    }
   
}
