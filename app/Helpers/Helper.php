<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Helper
{
    public static function getColumnOnLang(String $column): string
    {
        return $column . '_' . app()->getLocale();
    }

    public static function correctPhoneStyle (String $phone) : String
    {
        if (Str::startsWith($phone, '01')) {
            $phone = '+2' . $phone;
        } elseif (Str::startsWith($phone, '1')) {
            $phone = '+20' . $phone;
        } elseif (Str::startsWith($phone, '201')) {
            $phone = '+' . $phone;
        }
        return $phone;
    }

    public static function getFullAddress($address): string
    {
        $isArabic = app()->getLocale() == 'ar';

        $output = $address['address'] ? $address['address'] . ', ' : '';
        $output .= $address['building'] ? ($isArabic ? 'عمارة: ' : 'building: ') . $address['building'] . ', ' : '';
        $output .= $address['floor'] ? ($isArabic ? 'دور: ' : 'floor: ') . $address['floor'] . ', ' : '';
        $output .= $address['flat'] ? ($isArabic ? 'شقة: ' : 'flat: ') . $address['flat'] : '';

        return $output;
    }

    public static function storeImage($image, $publicFolder): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        return $image->storeAs('public/assets/images/' . $publicFolder, $imageName);
    }

    public static function deleteImage($image): void
    {
        if (File::exists(public_path($image))) {
            File::delete(public_path($image));
        }
    }
}
