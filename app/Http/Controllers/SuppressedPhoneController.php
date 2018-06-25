<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuppressedPhone;

class SuppressedPhoneController extends Controller
{
    //
  public function index()
  {
    return response()->json([
      'total' => SuppressedPhone::count(),
      'results' => SuppressedPhone::all()
    ], 200);
  }

  public function find(SuppressedPhone $phone)
  {
    return $phone;
  }

  public function store(Request $request)
  {
    $phone = SuppressedPhone::create($request->all());

    return response()->json($phone, 201);
  }

  public function update(Request $request, $id)
  {
    $phone = SuppressedPhone::findOrFail($id);
    $phone->update($request->all());

    return response()->json($phone, 204);
  }

  public function delete($id)
  {
    $phone = SuppressedPhone::findOrFail($id);
    $phone->delete();

    return response()->json(null, 204);
  }
}
