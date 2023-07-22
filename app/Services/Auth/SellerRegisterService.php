<?php

namespace App\Services\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\Auth\RegisterInterface;
use App\Models\FoodType;
use App\Models\Role;
use App\Models\Truck;
use App\Models\TruckImage;
use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SellerRegisterService extends Service implements RegisterInterface
{

    public function register($request)
    {
        $Role_ID = $this->GetRoleID($request->role);
        return $this->Transaction($request);
    }

    private function createToken(User $user){
        return $user->createToken("personal access token")->plainTextToken;
    }

    private function GetRoleID($role_name)
    {
        return Role::where("name",$role_name)->first()->id;
    }

    private function addTruck($request,$userID){
        return Truck::create([
            'name'	        => $request->truck_name,
            'plate_no'      => $request->plate_no,
            'license'       => env("APP_URL")."/storage/images/licenses/".$this->uploadLicenseImage($request->file('license')),
            //'image'         => env("APP_URL").":8000/storage/images/trucks/".$this->uploadTruckImage($request->file("truck_image")),
            'delivery'      => $request->delivery,
            'user_id'       => $userID,
            'work_time'     => $request->work_time,
            'delivery_price' => $request->delivery_price
        ]);
    }

    private function createUser($request){
        return User::create([
            'name'  => $request->name,
            'phone' => $request->phone,
            'password'  => Hash::make($request->password),
            'role_id'   => $this->GetRoleID($request->role),
        ]);
    }


    private function addTruckImages($images,$truck_id)
    {
        foreach ($images as $image) {
            TruckImage::create([
                'image'         => env("APP_URL")."/storage/images/trucks/".$this->UploadFile($image,"images/trucks"),
                'truck_id'    => $truck_id,
            ]);
        }
    }

    private function Transaction($request){
        return DB::transaction(function () use ($request) {


            $user = $this->createUser($request);

            $truck = $this->addTruck($request,$user->id);

            $this->addTruckImages($request->file("truck_images"),$truck->id);

            $user->TruckData = $truck;
            $truck->images;

            // create token
            $user->token = $this->createToken($user);

            return $user;
        });
    }

    private function uploadLicenseImage($Image)
    {
        return $this->UploadFile($Image,"/images/licenses");
    }


}
