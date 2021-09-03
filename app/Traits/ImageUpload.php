<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ImageUpload
{
    public function UserImageUpload($request) // Taking input image as parameter
    {
        if ($request) {
            if (auth()->user()->image) {

                // dd(file_exists(public_path('storage/images/profile/'). auth()->user()->image));

                    if (file_exists(public_path('storage/images/profile/'). auth()->user()->image)){
                        unlink(public_path('storage/images/profile/'). auth()->user()->image);

                }
            }
            $imageName = time() . '.' . $request->extension();
            $request->storePubliclyAs( 'profile', $imageName,'img');
            $request = $imageName;
        }

        return $request; // Just return image
    }
    public function UserImagesUpload($data, $request, $path, $object = null) // Taking input image as parameter
    {
        if ($request->hasFile('images')) {
            if ($object) {
                if ($object->images) {
                    $imagesArr = explode(',', $object->images);
                    foreach ($imagesArr as $item) {
                        if (file_exists(storage_path().$path.$item)) {
                            unlink(storage_path().$path.$item);
                        }
                    }
                }
            }
            $imagesNames = [];
            foreach ($request->images as $key => $item) {
                $imageName = time() . '_' . $key . '.' . $item->extension();
                $item->move(storage_path().$path, $imageName);
                $imagesNames[] = $imageName;
            }
            $imageString = implode(',', $imagesNames);

            $data['images'] = $imageString;
        }

        return $data; // Just return image
    }
}
