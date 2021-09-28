<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
class EmpleadoController extends Controller
{   public function index()
    {   $datos['empleados']=Empleado::paginate(5);
        return view('empleado.index',$datos);

    }




    public function store(Request $request)
    {   $campos=[
             'nombre'=>'required|string|max:100',
             'ApellidoPaterno'=>'required|string|max:100',
             'ApellidoMaterno'=>'required|string|max:100',
             'Correo'=>'required|email',

         ];
        $this->validate($request,$campos);
        //dd($valor);

        // $datosEmpleado = request()->all();
        $datosEmpleado = request()->except('_token'); // recolectar datos menos token
        Empleado::insert($datosEmpleado); // inserta al base de datos
        $notification='El Empleado se registro correctamente';

       // return response()->json($datosEmpleado);  // para retornar todas los datos del empleado
       return redirect('empleado')->with(compact('notification'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado=Empleado::findOrfail($id);
        return view('empleado.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Correo'=>'required|email',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];

        $this->validate($request,$campos,$mensaje);

        $datosEmpleado = request()->except(['_token','_method']);

        Empleado::where('id','=',$id)->update($datosEmpleado);

        $empleado=Empleado::findOrfail($id);
       // return view('empleado.edit',compact('empleado'));
       return redirect('empleado')->with('mensaje','Empleado Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $empleado=Empleado::findOrfail($id);
       // dd($empleado);
       Empleado::destroy($id);
        return redirect('empleado')->with('mensaje','Empleado Eliminado con exito');
    }
}
