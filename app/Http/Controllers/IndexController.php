<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelPlan;
use App\Models\ModelPlanUser;
use App\User;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $objUser;
    private $objPlan;
    private $objPlanUser;

    public function __construct(){
        $this->objUser = new User();
        $this->objPlan = new ModelPlan();
        $this->objPlanUser = new ModelPlanUser();
    }

    public function index()
    {
        //
        $planuser = $this->objPlanUser->all();
        $user = $this->objUser->all();
        $plans = $this->objPlan->all();
        return view('index/index', compact('user','plans'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $plans = $this->objPlan->all();
        return view('index/create',compact('plans'));
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
        
      $data=  $this->objUser->create(
            [
                'nome'=>$request->nome,
                'email'=>$request->email,
                'telefone'=>$request->telefone,
                'estado'=>$request->estado,
                'cidade'=>$request->cidade,
                'nascimento'=>implode("-",array_reverse(explode("/",$request->nascimento)))
            ]
        );
        
        
        if($data){
            
            foreach($request->id_plan as $idplan){
                 $this->objPlanUser->create([
                     'id_plan'=>$idplan,
                     'id_user'=>$data->id
                 ]);
                
            }
            return redirect('/');
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
        //
        $user = $this->objUser->find($id);
        $plansuser = $this->objUser->find($id)->relPlanUser;
        $plans = $this->objPlan->all();
        return view('index/show',compact('user','plansuser','plans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = $this->objUser->find($id);
        $plansuser = $this->objUser->find($id)->relPlanUser;
        $plans = $this->objPlan->all();
        return view('index/create',compact('user','plansuser','plans'));
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
        $user = $this->objUser->where(["id"=>$id])->update(  [
            'nome'=>$request->nome,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
            'estado'=>$request->estado,
            'cidade'=>$request->cidade,
            'nascimento'=>implode("-",array_reverse(explode("/",$request->nascimento)))
        ]);
        if(count($request->id_plan)>0){
            $this->objPlanUser->where(["id_user"=>$id])->delete();   
            foreach($request->id_plan as $idplan){
                 $this->objPlanUser->create([
                     'id_plan'=>$idplan,
                     'id_user'=>$id
                 ]);
                
            }
            return redirect('/');
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
        //
        $del = $this->objUser->destroy($id);
        return($del)?"Registro Excluído":"Falha ao Excluir";
    }
    public function plano()
    {
        //
        return view("index/plano");
    }
}
