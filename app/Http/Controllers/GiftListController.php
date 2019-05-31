<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiftList;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class GiftListController extends Controller {

  public function __construct(Request $request) {
    $this->request = $request;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return "giftlist create";
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $list = null;
    $giftlists = GiftList::all()->toArray();
    return view('giftlist', compact('giftlists','list'));
  }

  public function store(Request $request) {
    //
    $request->validate([
      'name' => 'required',
      'description' => 'required',
      'type' => 'required|numeric',
      'date' => 'required|date|after:today',
    ]);

    $giftlist = new GiftList();
    $giftlist->name = $request->get('name');
    $giftlist->date = Carbon::parse(strtotime($request->get('date')));
    $giftlist->public = $request->get('public') == 'on' ? 1 : 0;
    $giftlist->description = $request->get('description');
    $giftlist->type = $request->get('type');
    $giftlist->user_id = \Auth::user()->id;
    $giftlist->save();
    return redirect('giftlist')->with('success', 'Gift list has been added');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $list = GiftList::find($id);
    return view('listitem', compact('list', 'id'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function update($id) {
    $this->request->validate([
      'name' => 'required',
      'description' => 'required',
      'type' => 'required|numeric',
      'date' => 'required|date|after:today',
    ]);
    $giftlist = GiftList::find($id);
    $giftlist->name=$this->request->get('name');
    $giftlist->date = Carbon::parse(strtotime($this->request->get('date')));
    $giftlist->public = $this->request->get('public') == 'on' ? 1 : 0;
    $giftlist->description = $this->request->get('description');
    $giftlist->type = $this->request->get('type');
    $giftlist->save();
    return redirect('giftlist');
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
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $gift = GiftList::find($id);
    $gift->delete();

    return redirect('giftlist')->with('success', 'Stock has been deleted Successfully');
  }
}
