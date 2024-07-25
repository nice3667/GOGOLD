<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'packet_age',
        'is_popular',
    ];

    public function descriptions()
    {
        return $this->hasMany(PackageDescription::class);
    }

    public function addDescriptions($package, $package_id)
    {
        foreach ($package->descriptions as $description) {
            $item = new PackageDescription();
            $item->package_id = $package_id;
            $item->descriptions = $description;
            $this->descriptions()->save($item);
        }
    }
    public function updateDescriptions(array $descriptions)
    {
        $this->descriptions()->delete();
    }

}