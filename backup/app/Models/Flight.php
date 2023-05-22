<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;

/**
 * @property integer $id
 * @property string $to
 * @property string $from
 * @property string $price
 * @property string $flight_number
 * @property string $coach
 * @property string $departure
 * @property string $arrival
 * @property string $age_group
 * @property string $airline
 * @property boolean $status
 * @property boolean $payment_status
 * @property string $payment_method
 * @property string $date_range
 * @property float $amount
 * @property string $created_at
 * @property string $updated_at
 */
class Flight extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['to', 'from', 'price', 'flight_number', 'duration', 'coach', 'departure', 'arrival', 'airline', 'status', 'distance', 'stops',
        'img_url', 'created_at', 'updated_at'];


    public static function imageUpload(Request $request)
    {
        if ($request->file('images')) {
        }
    }

    public static function imageDelete(Model $model)
    {
        $media = Flight::where('p_id', $model->id)->first();

        if (file_exists(public_path() . '/images/products/' . '/' . $media->img_url)) {
            $images = public_path() . '/images/products/' . '/' . $media->thumbnail_img;
            unlink($images);
        }
        $media->delete();
        return redirect('accounts/products');
    }


    public static function imageUpdate(Request $request, Model $model)
    {
        if ($request->file('images')) {
            $media = Media::where('id', $request->get('media_id'))->first();

            foreach ($request->file('images') as $image1) {
                $name = $image1->getClientOriginalName();
                $image1->move(public_path() . '/images/products/', $name);
                $data[] = $name;
                $media->img_url = json_encode($data);
            }
            $image = $request->file('thumbnail');
            $imageName = time() . "." . $image->extension();
            $image->move(public_path() . '/images/products/thumbnail', $imageName);
            $media->thumbnail_img = $imageName;
            $media->update();
        }
    }
}

