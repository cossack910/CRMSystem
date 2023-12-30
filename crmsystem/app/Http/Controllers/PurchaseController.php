<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\Order;
use Inertia\Inertia;
use Illuminate\Support\Facades\{DB, Log};

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //合計
        $orders = Order::groupBy("id")->selectRaw('id, customer_name, sum(subtotal) as total, status, created_at')->paginate(50);

        return Inertia::render('Purchases/Index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::select('id', 'name', 'kana', 'birthday')->get();
        $items = Item::select('id', 'name', 'price')->where('is_selling', true)->get();

        return Inertia::render('Purchases/Create', [
            'customers' => $customers,
            'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePurchaseRequest $request)
    {
        DB::beginTransaction();
        try {
            $purchase = Purchase::create([
                'customer_id' => $request->customer_id,
                'status' => $request->status,
            ]);

            foreach ($request->items as $item) {
                $purchase->items()->attach(
                    $purchase->id,
                    [
                        'item_id' => $item['id'],
                        'quantity' => $item['quantity']
                    ]
                );
            }
            DB::commit();
            return to_route('dashboard');
        } catch (\Exception $e) {
            Log::info($e);
            Log::alert("購入登録処理失敗");
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //小計
        $items = Order::where('id', $purchase->id)->get();
        //合計
        $order = Order::groupBy('id')->where('id', $purchase->id)->selectRaw('id, customer_name, sum(subtotal) as total, status, created_at')->get();

        return Inertia::render('Purchases/Show', [
            'items' => $items,
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        $purchase = Purchase::find($purchase->id);
        $allItems = Item::select('id', 'name', 'price')->get();
        $items = [];

        foreach ($allItems as $allItem) {
            $quantity = 0;
            foreach ($purchase->items as $item) {
                if ($allItem->id === $item->id) {
                    $quantity = $item->pivot->quantity;
                    array_push($items, [
                        'id' => $allItem->id,
                        'name' => $allItem->name,
                        'price' => $allItem->price,
                        'quantity' => $quantity
                    ]);
                }
            }
        }

        $order = Order::groupBy('id')->where('id', $purchase->id)->selectRaw('id, customer_name, customer_id, status, created_at')->get();

        return Inertia::render('Purchases/Edit', [
            'items' => $items,
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        $purchase->status = $request->status;
        $purchase->save();

        $items = [];
        foreach ($request->items as $item) {
            $items = $items + [
                $item['id'] => ['quantity' => $item['quantity']]
            ];
        }
        $purchase->items()->sync($items);
        return to_route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
