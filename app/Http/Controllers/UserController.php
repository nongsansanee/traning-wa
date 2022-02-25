<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  แบบที่ 1
        // $validated = $request->validate([
        //     'firstName' => 'required',
        //     'lastName' => 'required',
        //     'phone' => 'required',
        // ]);

        //แบบที่ 2
        $validateRules = [
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => ['required','size:10'],
        ];

        $validateMessage = [
            'firstName.required' => 'กรุณาระบุชื่อ',
            'lastName.required' => 'กรุณาระบุนามสกุล',
            'phone.required' => 'กรุณาระบุเบอร์โทรศัพท์มือถือ',
            'phone.size' => 'กรุณาระบุเบอร์โทรศัพท์มือถือให้ถูกต้อง',
        ];

        request()->validate($validateRules, $validateMessage);
        return "OK";
       
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
        //
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
}
