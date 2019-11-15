<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Deals;
use Validator;

class DealsController  extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = Deals::all();
        return $this->sendResponse($deals->toArray(), 'All Deals Returned Successfully...');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Deal resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            // 'name' => 'required',
            // 'detail' => 'required',
            'company_name' => 'required',
            'company_type'=> 'required',
            'industry'=> 'required',
            'address'=> 'required',
            'phone'=> 'required',
            'amount_to_raise'=> 'required',
            'company_cover_photo'=> 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $deal = Deals::create($input);
        // $deal->name = $input['name'];
        // $deal->detail = $input['detail'];
        // $deal->company_name = $input['company_name'];
        // $deal->industry = $input['industry'];
        // $deal->address = $input['address'];
        // $deal->phone = $input['phone'];
        // $deal->email = $input['amount_to_raise'];
        // $deal->company_cover_photo = $input['company_cover_photo'];
        $deal->company_details = $input['company_details'];
        $deal->business_plan = $input['business_plan'];
        $deal->memo_of_understanding = $input['memo_of_understanding'];
        $deal->cert_of_registration = $input['cert_of_registration'];
        $deal->financial_state = $input['financial_state'];
        $deal->cash_flow = $input['cash_flow'];
        $deal->amount_to_raise = $input['amount_to_raise'];
        $deal->certified_audit_acc = $input['certified_audit_acc'];

        $deal->save();
        
        return $this->sendResponse($deal->toArray(), 'Deal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deal = Deals::find($id);
        if (is_null($deal)) {
            return $this->sendError('Sorry Deal not found.');
        }
             return $this->sendResponse($deal->toArray(), 'All Deals retrieved successfully.');
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
        $input = $request->all();
        // $validator = Validator::make($input, [
         
        //     'company_name' => 'required',
        //     'company_type'=> 'required',
        //     'industry'=> 'required',
        //     'address'=> 'required',
        //     'phone'=> 'required',
        //     'amount_to_raise'=> 'required',
        //     'company_cover_photo'=> 'required'
        // ]);

        // if($validator->fails()){
        //     return $this->sendError('Validation Error.', $validator->errors());       
        // }

        $deal = Deals::create($input);
      
        $deal->company_name = $input['company_name'];
        $deal->industry = $input['industry'];
        $deal->address = $input['address'];
        $deal->phone = $input['phone'];
        $deal->email = $input['amount_to_raise'];
        $deal->company_cover_photo = $input['company_cover_photo'];
        $deal->company_details = $input['company_details'];
        $deal->business_plan = $input['business_plan'];
        $deal->memo_of_understanding = $input['memo_of_understanding'];
        $deal->cert_of_registration = $input['cert_of_registration'];
        $deal->financial_state = $input['financial_state'];
        $deal->cash_flow = $input['cash_flow'];
        $deal->amount_to_raise = $input['amount_to_raise'];
        $deal->certified_audit_acc = $input['certified_audit_acc'];

        $deal->save();
        
        return $this->sendResponse($deal->toArray(), 'Deal Updated successfully  !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deal->delete();
        return $this->sendResponse( $deal->toArray(), 'Deal deleted successfully.');
    }
}
