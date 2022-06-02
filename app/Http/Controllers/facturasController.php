<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facturas;
use App\Detalle;
use App\Inventario;
use DB;
use PDF;
class facturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $facturas=DB::select("select * from facturas");
        return view('facturas.index')
        ->with('facturas',$facturas)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productos=DB::select("SELECT * from productos");
        // $productos=DB::select("SELECT * from producto");
        return view('facturas.create')
        ->with('productos',$productos)
        // ->with('productos',$productos)
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->all();
        $factura=Facturas::create($data);
        return redirect(route('facturas.edit',$factura->fac_id));

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
        $factura=Facturas::find($id);
        $productos=DB::select("SELECT * from productos");
        // $productos=DB::select("SELECT * from producto");
        $detalle=DB::select("SELECT * FROM facturas_detalle fd 
                             JOIN productos p ON fd.prod_id=p.prod_id  
                             WHERE fd.fac_id=$id");
        return view('facturas.edit')
        ->with('factura',$factura)
        ->with('productos',$productos)
        ->with('detalle',$detalle)
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
        //
    }

    
     


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   public function detalle(Request $req){
         $datos=$req->all();
         if(isset($datos['prod_id'])){

             $prod_id=$datos['prod_id'];
             $prod=DB::select("select * from productos where prod_id=$prod_id");
             $prod=$prod[0];
         }
        
         $fac_id=$datos['fac_id'];
         if(empty($fac_id)){
            $productos=DB::select("SELECT * from productos");
      
            return view('facturas.create')
            ->with('productos',$productos)
         
            ;
         }
         
         if(isset($datos['btn_detalle'])=='btn_detalle'){
                ///GUARDO EL DETALLE 

                if(isset($datos['prod_id'] )&& isset($datos['fad_cantidad'])){
                    $datos['fad_vu']=$prod->prod_precio;
                    $datos['fad_vt']=$prod->prod_precio*$datos['fad_cantidad'];
                    $inv=DB::select("select * from inventario where prod_id=$prod->prod_id");
                    $inv=$inv[0];
                   $inv_id=$inv->inv_id;
                    $inv_cantidad=$inv->inv_cantidad-$datos['fad_cantidad'];
                  
            inventario::where('inv_id', $inv_id)->update(array('inv_cantidad' => $inv_cantidad));
    
               Detalle::create($datos);
                    
                }else{
 
                }

               
         }
         if(isset($datos['btn_eliminar'])>0){
                ///ELIMINO EL DETALLE    
                $fad_id=$datos['btn_eliminar'];
                Detalle::destroy($fad_id);    

         }
       return redirect(route('facturas.edit',$fac_id));
    }

   public function facturas_pdf($fac_id){
        
        $factura=DB::select("
            SELECT * FROM facturas f
      
            WHERE f.fac_id=$fac_id ");

        $detalle=DB::select("SELECT * FROM facturas_detalle d 
                        JOIN productos p ON p.prod_id=d.prod_id
                   WHERE d.fac_id=$fac_id 
            ");

        $pdf = PDF::loadView('facturas.pdf',[ 'factura'=>$factura[0],'detalle'=>$detalle ]);
        return $pdf->stream('factura.pdf');
    }
public function facturas_anular($fac_id)
    {
        DB::update("UPDATE facturas SET fac_estado=2 where fac_id=$fac_id");
        return redirect(route('facturas.index'));
    }

}
