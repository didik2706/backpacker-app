<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditCustomerRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class CustomersController extends Controller
{
    public function showCustomers()
    {
        return view("customers.customers", [
            "active" => "customers",
            "data" => Customer::orderBy("created_at", "desc")->paginate()
        ]);
    }

    public function showDetailCustomer($id)
    {
        return view("customers.showDetail", [
            "active" => "customers",
            "data" => Customer::where("id", $id)->first()
        ]);
    }

    public function showAddCustomer()
    {
        return view("customers.addCustomer", [
            "active" => "customers"
        ]);
    }

    public function addCustomer(StoreCustomerRequest $request)
    {
        $input = $request->validated();

        $image_path = $input["image_identity"]->store("identities");
        $photo_path = $input["photo"]->store("photos");

        Customer::create([
            "name" => $input["name"],
            "address" => $input["address"],
            "phone_number" => $input["phone_number"],
            "type_identity" => $input["type_identity"],
            "image_identity" => $image_path,
            "photo" => $photo_path
        ]);

        return redirect("/customers");
    }

    public function showEditCustomer($id)
    {
        return view("customers.editCustomer", [
            "active" => "customers",
            "data" => Customer::where("id", $id)->first()
        ]);
    }

    public function editCustomer(EditCustomerRequest $request)
    {
        // validate input
        $input = $request->validated();

        // retrive previous data
        $oldData = Customer::where("id", $request->id)->first();
        // check image identity
        if ($request->image_identity != null) {
            Storage::delete($oldData->image_dentity);
        }
        
        // check photo
        if ($request->photo != null) {
            Storage::delete($oldData->photo);
        }

        Customer::where("id", $request->id)->update([
            "name" => $input["name"],
            "address" => $input["address"],
            "phone_number" => $input["phone_number"],
            "type_identity" => $input["type_identity"],
            "image_identity" => ($request->image_identity != null) ? $request->image_identity->store("identities") : $oldData->image_identity,
            "photo" => ($request->photo != null) ? $request->photo->store("photos") : $oldData->photo
        ]);
        
        return redirect("/customers");
    }

    public function deleteCustomer($id)
    {
        Customer::destroy($id);

        return redirect("/customers");
    }
}
