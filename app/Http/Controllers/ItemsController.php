<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditItemRequest;
use App\Http\Requests\StoreItemRequest;
use Illuminate\Support\Arr;
use App\Models\Item;

class ItemsController extends Controller
{
    public function showItems()
    {
        return view("items.items", [
            "active" => "items",
            "data" => Item::orderBy("created_at", "desc")->paginate()
        ]);
    }

    public function showAddItem()
    {
        return view("items.addItem", [
            "active" => "items"
        ]);
    }

    public function addItem(StoreItemRequest $request)
    {
        $input = $request->validated();

        $input = Arr::add($input, 'current_stock', Arr::get($input, "stock"));
        Item::create($input);

        return redirect("/items");
    }

    public function showEditItem($id)
    {
        return view("items.editItem", [
            "active" => "items",
            "data" => Item::where("id", $id)->first()
        ]);
    }

    public function editItem(EditItemRequest $request)
    {
        $input = $request->validated();

        Item::where("id", Arr::get($input, "id"))->update($input);

        return redirect("/items");
    }

    public function deleteItem($id)
    {
        Item::destroy($id);

        return redirect("/items");
    }
}
