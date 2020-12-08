<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class OrdersController extends Controller
{
    private $modelName = 'orders';


    public function index()
    {
        $orders = Order::paginate(20);

        return view('admin.index')->with([
            'modelName' => $this->modelName,
            'records' => $orders,
            'createLink' => route('orders.create'),
            'basePath' => route('orders.index'),
            'modelColumns' => Arr::except(Schema::getColumnListing('orders'), [2,7,5])
        ]);
    }

    public function create()
    {
        return view('admin.orders.create')->with([
            'url' => route('orders.store'),
            'users' => User::all(),
        ]);
    }


    public function store(Request $request)
    {
        // shipping_id(1), user_id, address_id, expected_date, total, code(generate)
        dd($request->all());
        // Order::create(Arr::except($request->all(), ['_token']));

        // return redirect()->route('orders.index');
    }


    public function show($id)
    {
        $record = Arr::except(
            Order::where('id', $id)->first()->getOriginal(),
            [
                'created_at',
                'updated_at',
                'shipping_id'
            ]
        );

        $order = Order::where('id', $id)->first();

        $relationships['Products'] = $order->products;

        return view('admin.show', [
            'modelName' => 'Orders',
            'basePath' => route('orders.index'),
            'record' => $record,
            'relationships' => $relationships

        ]);
    }


    public function edit($id)
    {
        $order = Order::where('id', $id)->first();
        $orderUser = $order->user_id;
        $order = Arr::except($order, [
            'id',
            'created_at',
            'updated_at',
            'shipping_id'
        ]);
        $user = User::where('id', $orderUser)->first();
       

        return view('admin.orders.edit')->with([
            'order' => $order,
            'url' => route('orders.update', ['order' => $id]),
            'userAddresses' => $user->addresses,
            'addresses' => $user->addresses
        ]);
    }


    public function update(Request $request, $id)
    {
        $fields = Arr::except($request->all(), [
            '_token',
            '_method'
        ]);

        Order::where('id', $id)->update($fields);

        return redirect()->route('orders.index');
    }


    public function destroy($id)
    {
        Order::where('id', $id)->first()->delete();

        return redirect()->route('orders.index');
    }
}
