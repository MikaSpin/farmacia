<?php 

namespace App\Http\Controllers;
use App\Productos;
use Illuminate\Http\Request;
use DB;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Productos::all();
        return view('productos.index')
        ->with('productos',$productos)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        Productos::create($data);
        return redirect(route('productos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $productos=Productos::find($id);
        return view('productos.edit')
        ->with('productos',$productos)
        ;
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
         $Pro=Productos::find($id);
        $Pro->update($request->all());

        return redirect(route('productos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro=DB::Select("select * from inventario where inv_id=$id");
        if(empty($pro)){

        Productos::destroy($id);
        return redirect(route('productos'));
        }else{
 $msg="No se puede eliminar este PRODUCTO, por que esta en uso";
 $productos=Productos::all();
        return view('productos.index')->with('msg',$msg)->with('productos',$productos);           
    }
  }  
}
