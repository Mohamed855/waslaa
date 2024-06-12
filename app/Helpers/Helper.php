<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class Helper
{
    public static function getColumnOnLang(String $column): string
    {
        return $column . '_' . App::getLocale();
    }

    public static function correctPhoneStyle (String $phone): String
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

    public static function searchOnQuery ($query, $searchable, $keyword)
    {
        $query = $query->where($searchable[0], 'like', '%' . trim($keyword) . '%');
        for ($i = 1; $i < count($searchable); $i++) {
            $query = $query->orWhere($searchable[$i], 'like', '%' . $keyword . '%');
        }
        return $query;
    }

    public static function getFullAddress($address): string
    {
        $isArabic = App::getLocale() == 'ar';

        $output = $address['address'] ? $address['address'] . ', ' : '';
        $output .= $address['building'] ? ($isArabic ? 'عمارة: ' : 'building: ') . $address['building'] . ', ' : '';
        $output .= $address['floor'] ? ($isArabic ? 'دور: ' : 'floor: ') . $address['floor'] . ', ' : '';
        $output .= $address['flat'] ? ($isArabic ? 'شقة: ' : 'flat: ') . $address['flat'] : '';

        return $output;
    }

    public static function storeImage($image, $publicFolder): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        return $image->storeAs('public/images/' . $publicFolder, $imageName);
    }

    public static function deleteImage($image): void
    {
        if (File::exists(public_path($image))) {
            File::delete(public_path($image));
        }
    }

    public static function getPaginatedData($data): array
    {
        $pageCount = 10;
        $totalCount = $data->count();
        return [
            'pageCount' => $pageCount,
            'totalCount' => $totalCount,
            'totalPages' => ceil($totalCount / $pageCount),
            'data' => $data
        ];
    }
}
